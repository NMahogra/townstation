<script setup>
import { Link } from '@inertiajs/vue3'

const props = defineProps({
    book: Object
})
</script>

<template>
<div class="max-w-xl mx-auto p-6">

    <div class="bg-white shadow rounded p-6">

        <h1 class="text-3xl font-bold mb-4">
            {{ book.title }}
        </h1>

        <p class="mb-2">
            <strong>Author:</strong>
            {{ book.author }}
        </p>

        <p class="mb-2">
            <strong>Harga:</strong>
            Rp {{ book.price }}
        </p>

        <Link
            href="/books"
            class="bg-blue-500 text-white px-4 py-2 rounded inline-block mt-4"
        >
            Kembali
        </Link>

    </div>

</div>
</template>