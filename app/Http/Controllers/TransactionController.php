<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::with('user', 'book')->get();

        if($transactions->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Resources Not Found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Transactions",
            "data" => $transactions
        ], 200);
    }

    public function show($id) {
        $transaction = Transaction::with('user', 'book')->find($id);

        if(!$transaction) {
            return response()->json([
                "success" => false,
                "message" => "Transaction Not Found",
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get Detail Transactions",
            "data" => $transaction
        ], 200);
    }

    public function store(Request $request) {
        // validator & cek validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Validation Error",
                "data" => $validator->errors()
            ], 422);
        }

        // genereate order number
        $uniqueCode = "ORD." . strtoupper(uniqid());

        // ambil data user login
        $user = auth('api')->user();

        if(!$user) {
            return response()->json([
                "success" => false,
                "message" => "Unauthorized",
            ], 401);
        }

        // mencari data buku
        $book = Book::find($request->book_id);

        // cek stok buku
        if($book->stock < $request->quantity) {
            return response()->json([
                "success" => false,
                "message" => "Stock Not Enough",
            ], 400);
        }

        // hitung total harga
        $totalAmount = $book->price * $request->quantity;

        // kurangi stok buku
        $book->stock -= $request->quantity;
        $book->save();

        // simpan data transaksi
        $transactions = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            "success" => true,
            "message" => "Transactions Created Successfully",
            "data" => $transactions
        ], 201);
    }

    public function update(Request $request, $id) {
        $transaction = Transaction::find($id);

        if(!$transaction) {
            return response()->json([
                "success" => false,
                "message" => "Transaction Not Found",
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => "Validation Error",
                "data" => $validator->errors()
            ], 422);
        }

        $user = auth('api')->user();
        if(!$user) {
            return response()->json([
                "success" => false,
                "message" => "Unauthorized",
            ], 401);
        }

        // Kembalikan stok buku lama
        $oldBook = Book::find($transaction->book_id);
        $oldBook->stock += $transaction->quantity;
        $oldBook->save();

        // Ambil data buku baru
        $newBook = Book::find($request->book_id);

        // Cek stok buku baru
        if($newBook->stock < $request->quantity) {
            // Kembalikan lagi stok buku lama jika gagal
            $oldBook->stock -= $transaction->quantity;
            $oldBook->save();
            
            return response()->json([
                "success" => false,
                "message" => "Stock Not Enough",
            ], 400);
        }

        // Kurangi stok buku baru
        $newBook->stock -= $request->quantity;
        $newBook->save();

        // Hitung total harga baru
        $totalAmount = $newBook->price * $request->quantity;

        // update transaksi
        $transaction->update([
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            "success" => true,
            "message" => "Transaction Updated Successfully",
            "data" => $transaction
        ], 200);
    }

    public function destroy($id) {
        $transaction = Transaction::find($id);

        if(!$transaction) {
            return response()->json([
                "success" => false,
                "message" => "Transaction Not Found",
            ], 404);
        } else {
            $transaction->delete();
            return response()->json([
                "success" => true,
                "message" => "Transaction ID: $id Deleted",
            ], 200);
        }
    }
}
