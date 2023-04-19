<script setup lang="ts">
import SideNavigation from './SideNavigation.vue'
</script>

<template>
  <div class="admin-layout">
    <div class="admin-navigation">
      <SideNavigation></SideNavigation>
    </div>
    <div class="admin-page">
      <router-view></router-view>
    </div>
  </div>
</template>

<style lang="scss">
.admin-layout {
  display: flex;

  .admin-navigation {
    flex: 0.15;
  }
  .admin-page {
    flex: 0.85;
  }
}
</style>
