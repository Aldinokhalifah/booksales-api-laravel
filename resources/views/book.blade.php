<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Book</title>
</head>
<body>
    <h1>Halaman Book</h1>
    <ol>
        <h2>Book yang tersedia:</h2>
        @foreach ($books as $book)
            <li>
                <strong>Judul</strong>: {{$book['judul']}} <br>
                <strong>Deskripsi</strong>: {{$book['description']}} <br>
                <strong>Author</strong>: {{$book['author']}}
            </li>
        @endforeach
    </ol>
</body>
</html>