<h1>Daftar Penjualan Buku</h1>

<a href="/sales?sort=desc">
    Penjualan Terbesar
</a>

|

<a href="/sales?sort=asc">
    Penjualan Terkecil
</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Nama Buku</th>
        <th>Jumlah Terjual</th>
        <th>Total Penjualan</th>
    </tr>

    @foreach($sales as $sale)
    <tr>
        <td>{{ $sale->book->title }}</td>
        <td>{{ $sale->quantity }}</td>
        <td>{{ $sale->total_price }}</td>
    </tr>
    @endforeach

</table>