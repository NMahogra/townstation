<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>

    <style>
        body{
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            margin:0;
        }

        table{
            border-collapse:collapse;
        }

        th, td{
            border:1px solid black;
            padding:10px;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
    </tr>

    @foreach($books as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->price }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>