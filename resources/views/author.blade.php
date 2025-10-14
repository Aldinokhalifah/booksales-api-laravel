<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Author</title>
</head>
<body>
    <h1>Halaman Author</h1>
    <ol>
        <h2>Author yang tersedia:</h2>
        @foreach ($authors as $author)
            <li>
                <strong>Nama</strong>: {{$author['name']}} <br>
                <strong>Bio</strong>: {{$author['bio']}}
            </li>
        @endforeach
    </ol>
</body>
</html>