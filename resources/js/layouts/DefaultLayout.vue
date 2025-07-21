<template>
  <div class="min-h-full">
    <TheNavbar />
    <!-- Judul akan diambil dari meta data rute -->
    <TheHeader :title="$route.meta.title" />
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Komponen halaman (seperti Dashboard, Team, dll.) akan dirender di sini -->
        <router-view />
      </div>
    </main>
  </div>
</template>

<script setup>
import TheNavbar from '../views/components/TheNavbar.vue'
import TheHeader from '../views/components/TheHeader.vue'
</script>

