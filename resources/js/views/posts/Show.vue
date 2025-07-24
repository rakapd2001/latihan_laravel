<template>
  <div class="max-w-xl mx-auto bg-white shadow p-6 rounded">
    <h1 class="text-3xl font-bold">{{ post.title }}</h1>
    <p class="mt-2 text-gray-700">{{ post.content }}</p>
    <router-link to="/" class="text-blue-600 mt-4 block">← Kembali</router-link>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import axios from 'axios'

const post = ref({})
const route = useRoute()

onMounted(async () => {
  const { data } = await axios.get(`/api/posts/${route.params.id}`)
  post.value = data
})
</script>
