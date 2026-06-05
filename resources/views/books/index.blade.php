<h1>Daftar Buku</h1>

<a href="{{ route('books.create') }}">
    Tambah Buku
</a>

<table border="1">
    <tr>
        <th>Judul</th>
        <th>Author</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    @foreach($books as $book)
    <tr>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->price }}</td>

        <td>
            <a href="{{ route('books.edit',$book->id) }}">
                Edit
            </a>

            <form action="{{ route('books.destroy',$book->id) }}"
                  method="POST">
                @csrf
                @method('DELETE')

                <button type="submit">
                    Hapus
                </button>
            </form>
        </td>
        <td>
            <a href="{{ route('books.show', $book->id) }}">
            Detail
    </a>
</td>
    </tr>
    @endforeach

</table>