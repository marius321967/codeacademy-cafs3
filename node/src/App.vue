<script setup lang="ts">
import { RouterView } from 'vue-router'
import Navigation from './views/Navigation.vue'
import { onMounted } from 'vue'
import { useAuthStore } from './stores/auth'

const authStore = useAuthStore()

onMounted(() => authStore.checkTokenStorage())
</script>

<template>
  <Navigation />

  <router-view></router-view>
</template>

<style lang="scss">
@use '../node_modules/bootstrap/scss/bootstrap.scss';
</style>
