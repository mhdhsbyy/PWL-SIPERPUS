<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Daftar Buku</h2>
    @forelse ($bookshelf->books as $book)
        <div>
            ID : {{ $book->id }}
            Judul : {{ $book->title }}
            Pengarang : {{ $book->author }}
        </div>
    @empty
        <div>Buku Kosong!</div>
    @endforelse
</body>
</html>