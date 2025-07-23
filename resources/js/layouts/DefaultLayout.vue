<template>
  <div class="bg-white dark:bg-gray-900 min-h-screen">
    <TheNavbar />
    <main >
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 bg-white dark:bg-gray-900">
        <!-- Komponen halaman (seperti Dashboard, Team, dll.) akan dirender di sini -->
        <router-view />
      </div>
    </main>
  </div>
</template>

<script setup>
import TheNavbar from '../views/components/TheNavbar.vue'
const user = window.user; // Ambil user dari Laravel
const isLoggedIn = user !== null;
console.log('DefaultLayout dimuat');
</script>

