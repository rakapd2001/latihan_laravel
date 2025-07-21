<template>
  <div class="max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Buat Postingan Baru</h1>
    <form @submit.prevent="submitForm" class="space-y-4">
      <input v-model="title" class="w-full border px-4 py-2 rounded" placeholder="Judul" />
      <textarea v-model="content" class="w-full border px-4 py-2 rounded" placeholder="Isi Konten"></textarea>
      <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

const title = ref('')
const content = ref('')
const router = useRouter()

const submitForm = async () => {
  await axios.post('/api/posts', { title: title.value, content: content.value })
  router.push('/')
}
</script>
