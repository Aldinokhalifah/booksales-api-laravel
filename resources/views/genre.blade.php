<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Genre</title>
</head>
<body>
    <h1>Halaman Genre</h1>
    <ol>
        <h2>Genre yang tersedia:</h2>
        @foreach ($genres as $genre)
            <li>{{$genre}}</li>
        @endforeach
    </ol>
</body>
</html>