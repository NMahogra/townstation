<script setup> //menggunakan script setup untuk mendefinisikan props yang akan diterima dari controller
defineProps({ 
    sales: Array, //mendefinisikan props sales yang akan menerima data penjualan dalam bentuk array
    sort: String //mendefinisikan props sort yang akan menerima informasi tentang urutan sort dalam bentuk string
})
</script>

<template>
    <div>
        <h1>Daftar Penjualan Buku</h1>

        <a href="/sales?sort=desc">
            Penjualan Terbesar
        </a>

        |

        <a href="/sales?sort=asc">
            Penjualan Terkecil
        </a>

        <table border="1">
            <thead>
                <tr>
                    <th>Nama Buku</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                <tr
                    v-for="sale in sales"
                    :key="sale.id"
                >
                    <td>{{ sale.book.title }}</td>
                    <td>{{ sale.quantity }}</td>
                    <td>{{ sale.total_price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>