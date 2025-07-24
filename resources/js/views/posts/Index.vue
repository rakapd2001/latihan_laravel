<template>
  <div>
    <PageTitle title="Artikel Terbaru" />
    
    <ul class="mt-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <li
        v-for="post in posts"
        :key="post.id"
        class="bg-white border-2 border-gray-400  dark:bg-gray-800 rounded-xl shadow-md p-5 relative"

      >
        <!-- Tanggal dibuat -->
        <span
          class="bg-black text-white text-xs px-3 py-1 font-semibold rounded-full dark:bg-white dark:text-black"
          v-if="post.created_at"
        >
          {{ formatDate(post.created_at) }}
        </span>
          <div class="ml-2 mt-2 flex-1"> 
              <h1 class="text-lg font-bold mb-2 text-gray-900 dark:text-white">
                {{ post.title }}
              </h1>
              <p class="text-m text-black dark:text-gray-300 mb-4">
                {{ post.content }}
              </p>
          </div>
     
        <!-- Menu Titik Tiga -->
        <div class="absolute top-0 right-0 m-4">
          <div class="relative inline-block text-left">
            <button @click="toggleDropdown(post.id)" class="text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 p-1 rounded-full">
              ⋮
            </button>

            <!-- Dropdown -->
            <div
              v-if="dropdownOpen === post.id"
              class="absolute right-0 mt-2 w-32 bg-white dark:bg-gray-900 border border-gray-600 dark:border-gray-700 rounded-md shadow-md z-50"
            >
              <router-link
                :to="`/posts/${post.id}/edit`"
                class="block px-4 py-2 text-sm hover:bg-gray-400 dark:hover:bg-gray-800 text-gray-800 dark:text-gray-200"
              >
                Edit
              </router-link>
              <button
                @click="deletePost(post.id)"
                class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-300 dark:hover:bg-red-800"
              >
                Hapus
              </button>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>
<script>
import axios from 'axios'
import PageTitle from '../components/PageTitle.vue'

export default {
  components: {
    PageTitle,
  },
  data() {
    return {
      posts: [],
      dropdownOpen: null,
    };
  },
  mounted() {
    this.fetchPosts();
  },
  methods: {
    fetchPosts() {
      axios.get('/api/posts')
        .then(response => {
          this.posts = response.data;
        })
        .catch(error => {
          console.error('Gagal mengambil postingan:', error);
        });
    },
    toggleDropdown(id) {
      this.dropdownOpen = this.dropdownOpen === id ? null : id;
    },
    deletePost(id) {
      if (confirm('Apakah Anda yakin ingin menghapus postingan ini?')) {
        axios.delete(`/api/posts/${id}`)
          .then(() => {
            this.posts = this.posts.filter(post => post.id !== id);
          })
          .catch(error => {
            console.error('Gagal menghapus postingan:', error);
          });
      }
    },
    formatDate(dateStr) {
      const options = { year: 'numeric', month: 'short', day: 'numeric' };
      return new Date(dateStr).toLocaleDateString('id-ID', options);
    }
  }
}
</script>
