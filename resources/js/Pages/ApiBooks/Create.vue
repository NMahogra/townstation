<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    title: '',
    author: '',
    price: ''
})

const submit = () => {
    form.post('/books')
}
</script>

<template>
<div class="max-w-xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        Tambah Buku
    </h1>

    <form @submit.prevent="submit">

        <input
            v-model="form.title"
            placeholder="Judul Buku"
            class="w-full border p-3 rounded mb-4"
        >

        <input
            v-model="form.author"
            placeholder="Nama Author"
            class="w-full border p-3 rounded mb-4"
        >

        <input
            v-model="form.price"
            placeholder="Harga"
            type="number"
            class="w-full border p-3 rounded mb-4"
        >

        <button
            class="bg-green-500 text-white px-4 py-2 rounded"
        >
            Simpan
        </button>

        <Link
            href="/books"
            class="ml-2 text-gray-500"
        >
            Kembali
        </Link>

    </form>

</div>
</template>