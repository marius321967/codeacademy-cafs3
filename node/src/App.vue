<script setup lang="ts">
import { onMounted, provide } from 'vue'
import { RouterView } from 'vue-router'
import { useAuthStore } from './stores/auth'
import Navigation from './views/Navigation.vue'

const authStore = useAuthStore()

onMounted(() => authStore.checkTokenStorage())

provide('app-name', 'Task Tracker')
</script>

<template>
  <Navigation />

  <router-view></router-view>
</template>

<style lang="scss">
@use './assets/app.scss';
@use '../node_modules/bootstrap/scss/bootstrap.scss';
</style>
