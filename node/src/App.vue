<script setup lang="ts">
import { RouterView } from 'vue-router'
import Navigation from './components/Navigation.vue'
import { onMounted } from 'vue'
import { useAuthStore } from './stores/auth'

const authStore = useAuthStore()

onMounted(() => authStore.checkTokenStorage())
</script>

<template>
  <Navigation />

  <div class="container pt-4">
    <router-view></router-view>
  </div>
</template>

<style lang="scss">
@use '../node_modules/bootstrap/scss/bootstrap.scss';
</style>
