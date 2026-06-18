<script setup>
import { ref, onMounted } from 'vue'

const books = ref([])
const loading = ref(true)

const getBooks = async () => {
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
    <div class="min-h-screen bg-gradient-to-br from-slate-100 to-blue-100 p-8">

        <!-- Header -->
        <div class="max-w-6xl mx-auto mb-10">
            <h1 class="text-5xl font-bold text-center text-gray-800 mb-3">
                📚 Open Library Explorer
            </h1>

            <p class="text-center text-gray-500">
                Menampilkan data buku dari Open Library API
            </p>
        </div>

        <!-- Loading -->
        <div
            v-if="loading"
            class="flex justify-center items-center h-40"
        >
            <div class="text-center">
                <div
                    class="w-12 h-12 border-4 border-blue-500 border-t-transparent rounded-full animate-spin mx-auto mb-3"
                ></div>

                <p class="text-gray-600">
                    Mengambil data buku...
                </p>
            </div>
        </div>

        <!-- Books -->
        <div
            v-else
            class="max-w-6xl mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-6"
        >
            <div
                v-for="book in books"
                :key="book.key"
                class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl hover:-translate-y-1 transition duration-300"
            >
                <div class="flex justify-between items-start mb-4">

                    <h2
                        class="font-bold text-xl text-gray-800 line-clamp-2"
                    >
                        {{ book.title }}
                    </h2>

                    <span
                        class="bg-blue-100 text-blue-700 text-xs px-3 py-1 rounded-full"
                    >
                        {{ book.first_publish_year ?? 'N/A' }}
                    </span>

                </div>

                <p class="text-gray-600 mb-2">
                    ✍️
                    <span class="font-medium">
                        {{ book.author_name?.[0] ?? 'Unknown Author' }}
                    </span>
                </p>

                <p class="text-gray-500 text-sm">
                    Buku ditemukan melalui Open Library API
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div
            v-if="!loading"
            class="text-center mt-10 text-gray-500"
        >
            Total Buku Ditampilkan:
            <span class="font-bold">
                {{ books.length }}
            </span>
        </div>

    </div>
</template>