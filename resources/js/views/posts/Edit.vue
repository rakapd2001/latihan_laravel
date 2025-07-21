<template>
  <div class="max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Postingan</h1>
    <form @submit.prevent="updatePost" class="space-y-4">
      <input v-model="title" class="w-full border px-4 py-2 rounded" />
      <textarea v-model="content" class="w-full border px-4 py-2 rounded"></textarea>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useRoute, useRouter } from 'vue-router'

const title = ref('')
const content = ref('')
const route = useRoute()
const router = useRouter()

onMounted(async () => {
  const { data } = await axios.get(`/api/posts/${route.params.id}`)
  title.value = data.title
  content.value = data.content
})

const updatePost = async () => {
  await axios.put(`/api/posts/${route.params.id}`, { title: title.value, content: content.value })
  router.push('/')
}
</script>
