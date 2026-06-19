<script setup>
import { ref, onMounted } from 'vue'
import { Link, router } from '@inertiajs/vue3'

const sales = ref([])
const sort = ref('desc')

const deleteSale = (id) => {
  //lengkapi fungsi untuk delete sales
}

const loadData = async (newSort = null) => {
    //ambil data via api, boleh pakai native fetch atau axios
    try {
        
    } catch (error) {
        
    }
}

onMounted(() => {
    
})
</script>

<template>
    <div>
        <h1>Daftar Penjualan Buku</h1>

        <!-- panggil untuk sort terbesar -->
        <button > 
            Penjualan Terbesar
        </button>

        |

        <!-- panggil untuk sort terkecil -->
        <button>
            Penjualan Terkecil
        </button>

        <!-- panggil link untuk ke page create -->
        <Link >
            <button>Tambah Penjualan</button>
        </Link>

        <table border="1">
            <thead>
                <tr>
                    <th>Nama Buku</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Aksi</th>
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
                    <td>
                        <!-- panggil untuk ke page edit -->
                        <Link>Edit</Link> |
                        <!-- panggil fungsi hapus by id sales -->
                        <button >Hapus</button> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>