<h1>Detail Buku</h1>

<p>
    <strong>Judul:</strong>
    {{ $book->title }}
</p>

<p>
    <strong>Author:</strong>
    {{ $book->author }}
</p>

<p>
    <strong>Harga:</strong>
    {{ $book->price }}
</p>

<a href="{{ route('books.index') }}">
    Kembali
</a>