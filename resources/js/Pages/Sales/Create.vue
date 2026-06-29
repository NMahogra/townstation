<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const props = defineProps({
    books: Array
})

const form = useForm({
    book_id: '',
    quantity: '',
    total_price: ''
})

const submit = () => {
    form.post('/sales')
}
</script>

<template>
    <div class="min-h-screen bg-gray-100 py-10">

        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">

            <h1 class="text-3xl font-bold text-center mb-8">
                Tambah Penjualan
            </h1>

            <form @submit.prevent="submit">

                <!-- Buku -->
                <div class="mb-5">
                    <label class="block mb-2 font-semibold">
                        Buku
                    </label>

                    <select
                        v-model="form.book_id"
                        class="w-full border rounded-lg p-3"
                    >
                        <option value="">-- Pilih Buku --</option>

                        <option
                            v-for="book in books"
                            :key="book.id"
                            :value="book.id"
                        >
                            {{ book.title }}
                        </option>
                    </select>
                </div>

                <!-- Quantity -->
                <div class="mb-5">
                    <label class="block mb-2 font-semibold">
                        Quantity
                    </label>

                    <input
                        v-model="form.quantity"
                        type="number"
                        class="w-full border rounded-lg p-3"
                    >
                </div>

                <!-- Total -->
                <div class="mb-8">
                    <label class="block mb-2 font-semibold">
                        Total Harga
                    </label>

                    <input
                        v-model="form.total_price"
                        type="number"
                        class="w-full border rounded-lg p-3"
                    >
                </div>

                <div class="flex justify-between">

                    <Link
                        href="/sales"
                        class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600"
                    >
                        Kembali
                    </Link>

                    <button
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700"
                    >
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>
</template>