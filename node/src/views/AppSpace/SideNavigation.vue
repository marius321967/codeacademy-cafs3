<template>
  <nav class="nav flex-column app-space-navigation">
    <router-link class="nav-link" to="/user/tasks">Tasks</router-link>
    <a class="nav-link" href="#">Statistics</a>
  </nav>
</template>

<style lang="scss">
.app-space-navigation {
  background-color: rgba(216, 216, 216, 0.143);

  .nav-link.active {
    font-weight: bold;
  }
}
</style>
