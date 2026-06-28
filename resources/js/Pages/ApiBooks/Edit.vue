<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const props = defineProps({
    book: Object
})

const form = useForm({
    title: props.book.title,
    author: props.book.author,
    price: props.book.price
})

const submit = () => {
    form.put(`/books/${props.book.id}`)
}
</script>

<template>
<div class="max-w-xl mx-auto p-6">

    <h1 class="text-3xl font-bold mb-6">
        Edit Buku
    </h1>

    <form @submit.prevent="submit">

        <input
            v-model="form.title"
            class="w-full border p-3 rounded mb-4"
        >

        <input
            v-model="form.author"
            class="w-full border p-3 rounded mb-4"
        >

        <input
            v-model="form.price"
            type="number"
            class="w-full border p-3 rounded mb-4"
        >

        <button
            class="bg-yellow-500 text-white px-4 py-2 rounded"
        >
            Update
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