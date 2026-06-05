<h1>Tambah Buku</h1>

<form action="{{ route('books.store') }}"
      method="POST">

    @csrf

    <input
        type="text"
        name="title"
        placeholder="Judul">

    <input
        type="text"
        name="author"
        placeholder="Author">

    <input
        type="number"
        step="0.01"
        name="price"
        placeholder="Harga">

    <button type="submit">
        Simpan
    </button>

</form>