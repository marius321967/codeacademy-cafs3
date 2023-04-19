<template>
  <nav class="nav flex-column admin-navigation">
    <router-link class="nav-link" to="/admin">Home</router-link>
    <router-link class="nav-link" to="/admin/users">Users</router-link>
  </nav>
</template>

<style lang="scss">
.admin-navigation {
  background-color: rgba(216, 216, 216, 0.143);

  .nav-link.active {
    font-weight: bold;
  }
}
</style>
