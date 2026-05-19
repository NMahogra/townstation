<script>
import { ref } from 'vue';

export default {
    setup() {
        const count = ref(0);

        return { count };
    }
}
</script>

<template>
    <div class="flex flex-col items-center justify-center h-screen bg-gray-100 gap-4">
        <h1 class="text-3xl font-bold text-amber-600">
            Hello World!
        </h1>

        <button @click="count++" class="px-4 py-2 bg-amber-500 text-white rounded">
            Count is: {{ count }}
        </button>
    </div>
</template>