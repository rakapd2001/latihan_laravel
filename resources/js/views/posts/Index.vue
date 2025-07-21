<template>
  <div>
    <h1 class="text-2xl font-bold mb-4">Daftar Postingan</h1>
    <router-link to="/posts/create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Tambah Post</router-link>

    <ul class="mt-4 space-y-2">
      <li v-for="post in posts" :key="post.id" class="p-4 bg-white shadow rounded relative">
        <div class="flex justify-between items-start">
          <div>
            <h2 class="text-xl font-semibold">{{ post.title }}</h2>
            <p class="text-gray-700">{{ post.content }}</p>
          </div>

          <!-- Tombol Titik Tiga -->
          <div class="relative inline-block text-left">
            <button @click="toggleDropdown(post.id)" class="p-1 rounded hover:bg-gray-100">
              ⋮
            </button>

            <!-- Dropdown Menu -->
            <div v-if="dropdownOpen === post.id" class="absolute right-0 z-10 mt-2 w-32 bg-white border rounded shadow-lg">
              <router-link :to="`/posts/${post.id}/edit`" class="block px-4 py-2 hover:bg-gray-100 text-sm text-gray-700">Edit</router-link>
              <button @click="deletePost(post.id)" class="block w-full text-left px-4 py-2 hover:bg-red-100 text-sm text-red-600">Hapus</button>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      posts: [],
      dropdownOpen: null, // Untuk mengontrol menu titik tiga
    };
  },
  mounted() {
    this.fetchPosts()
  },
  methods: {
    fetchPosts() {
      axios.get('/api/posts')
        .then(response => {
          this.posts = response.data
        })
        .catch(error => {
          console.error('Gagal mengambil postingan:', error)
        });
    },
    toggleDropdown(id) {
      this.dropdownOpen = this.dropdownOpen === id ? null : id
    },
    deletePost(id) {
      if (confirm('Apakah Anda yakin ingin menghapus postingan ini?')) {
        axios.delete(`/api/posts/${id}`)
          .then(() => {
            this.posts = this.posts.filter(post => post.id !== id)
          })
          .catch(error => {
            console.error('Gagal menghapus postingan:', error)
          })
      }
    }
  }
}
</script>

