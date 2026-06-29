<script setup>
import { ref, onMounted } from 'vue'
import { Link, router } from '@inertiajs/vue3'

const sales = ref([])
const sort = ref('desc')
const loading = ref(false)

const deleteSale = (id) => {
  if (!confirm('Yakin ingin menghapus data penjualan ini?')) return
router.delete(`/sales/${id}`,{
    onSuccess:()=>loadData()
})
}

const sortBy = async (order) => {
    sort.value = order
    await loadData()
}


const loadData = async () => {
    loading.value = true

    try {
        const response = await fetch(`/sales/data?sort=${sort.value}`)
        sales.value = await response.json()

    } catch (error) {
        console.log(error)

    } finally {
        loading.value = false

    }

}

onMounted(() => {
    loadData()
})
</script>

<template>
    <div class="flex justify-between mb-5">

<h1 class="text-3xl font-bold">

Data Penjualan 

</h1>

<Link href="/sales/create">

<button
class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700">

Tambah

</button>

</Link>

</div>

  <div class="flex gap-3 mb-5">

<button
    @click="sortBy('desc')"
    class="bg-green-500 text-white px-4 py-2 rounded"
>
    Terbesar
</button>

<button
    @click="sortBy('asc')"
    class="bg-orange-500 text-white px-4 py-2 rounded"
>
    Terkecil
</button>

</div>

<div
v-if="loading"
class="text-center text-gray-500 py-10">

Loading...

</div>

<table
v-if="!loading"
class="w-full border">

<thead class="bg-gray-200">

<tr>

<th class="p-3">Buku</th>

<th>Qty</th>

<th>Total</th>

<th>Aksi</th>

</tr>

</thead>

<tbody>

<tr
v-for="sale in sales"
:key="sale.id">

<td class="p-3">

{{ sale.book.title }}

</td>

<td>

{{ sale.quantity }}

</td>

<td>

Rp {{ sale.total_price }}

</td>

<td class="space-x-2">

<Link
:href="`/sales/${sale.id}/edit`">

<button
class="bg-yellow-500 text-white px-3 py-1 rounded">

Edit

</button>

</Link>

<button
@click="deleteSale(sale.id)"
class="bg-red-600 text-white px-3 py-1 rounded">

Hapus

</button>

</td>

</tr>

</tbody>

</table>
</template>