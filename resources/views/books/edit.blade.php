<h1>Edit Buku</h1>

<form action="{{ route('books.update',$book->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <input
        type="text"
        name="title"
        value="{{ $book->title }}">

    <input
        type="text"
        name="author"
        value="{{ $book->author }}">

    <input
        type="number"
        step="0.01"
        name="price"
        value="{{ $book->price }}">

    <button type="submit">
        Update
    </button>

</form>