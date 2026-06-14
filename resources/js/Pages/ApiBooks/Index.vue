    <script setup>
import { ref, onMounted } from 'vue' //script setup untuk mendefinisikan data dan lifecycle hook yang akan digunakan dalam komponen ini/

const books = ref([]) //mendefinisikan data books yang akan menyimpan daftar buku yang diambil dari API dalam bentuk array
const loading = ref(true) //mendefinisikan data loading yang akan menyimpan status loading saat mengambil data dari API dalam bentuk boolean

const getBooks = async () => { //fungsi untuk mengambil data buku dari API secara asynchronous
    try {
        const response = await fetch(
            'https://openlibrary.org/search.json?q=laravel'
        )

        const data = await response.json()

        books.value = data.docs.slice(0, 10) 
    } catch (error) {
        console.error(error)
    } finally {
        loading.value = false
    }
}

onMounted(() => {
    getBooks()
})
</script>

<template>
    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6">
            Open Library API
        </h1>

        <div v-if="loading">
            Loading...
        </div>

        <div
            v-for="book in books"
            :key="book.key"
            class="border p-4 mb-3 rounded"
        >
            <h2 class="font-bold text-lg">
                {{ book.title }}
            </h2>

            <p>
                Author:
                {{ book.author_name?.[0] ?? 'Unknown' }}
            </p>

            <p>
                Tahun:
                {{ book.first_publish_year }}
            </p>
        </div>
    </div>
</template>