<script setup>
import { Link, router } from '@inertiajs/vue3'

const props = defineProps({
    books: Array
})

const destroy = (id) => {
    if (confirm('Yakin hapus buku ini?')) {
        router.delete(`/books/${id}`)
    }
}
</script>

<template>
<div class="max-w-6xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Daftar Buku</h1>

        <Link
            href="/books/create"
            class="bg-green-500 text-white px-4 py-2 rounded"
        >
            Tambah Buku
        </Link>
    </div>

    <table class="w-full bg-white shadow rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">Judul</th>
                <th class="p-3 text-left">Author</th>
                <th class="p-3 text-left">Harga</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr
                v-for="book in books"
                :key="book.id"
                class="border-t"
            >
                <td class="p-3">{{ book.title }}</td>
                <td class="p-3">{{ book.author }}</td>
                <td class="p-3">Rp {{ book.price }}</td>

                <td class="p-3 flex gap-2 justify-center">

                    <Link
                        :href="`/books/${book.id}`"
                        class="bg-blue-500 text-white px-3 py-1 rounded"
                    >
                        Detail
                    </Link>

                    <Link
                        :href="`/books/${book.id}/edit`"
                        class="bg-yellow-500 text-white px-3 py-1 rounded"
                    >
                        Edit
                    </Link>

                    <button
                        @click="destroy(book.id)"
                        class="bg-red-500 text-white px-3 py-1 rounded"
                    >
                        Hapus
                    </button>

                </td>
            </tr>
        </tbody>
    </table>

</div>
</template>