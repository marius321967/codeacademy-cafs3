<script setup lang="ts">
import { useAuthStore } from '../stores/auth'
import { roles } from '../composables/roles'
import CONFIG from '../config.json'
import { computed, inject } from 'vue'
import NavigationBrand from '../components/NavigationBrand.vue'

const authStore = useAuthStore()

const { isUserAdmin, isUserRegular } = roles()

const avatarElementStyle = computed(() => ({
  backgroundImage: `url(${CONFIG.api.address}/users/${authStore.user?.id}/avatar)`
}))
</script>

<template>
  <nav
    class="navbar navbar-expand navbar-dark bg-dark"
    aria-label="Second navbar example"
  >
    <div class="container-fluid">
      <navigation-brand></navigation-brand>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <router-link class="nav-link" to="/about">About</router-link>
          </li>

          <li class="nav-item" v-if="!authStore.isLoggedIn">
            <router-link class="nav-link" to="/login">Login</router-link>
          </li>

          <li class="nav-item" v-if="isUserRegular">
            <router-link class="nav-link" to="/user">App</router-link>
          </li>

          <li class="nav-item" v-if="isUserAdmin">
            <router-link class="nav-link" to="/admin">Admin</router-link>
          </li>
        </ul>

        <ul class="navbar-nav" v-if="authStore.user">
          <li class="nav-item">
            <a href="#" class="nav-link" @click.prevent="authStore.logout"
              >Logout</a
            >
          </li>

          <li class="nav-item">
            <router-link class="nav-link" to="/profile">
              <template v-if="!authStore.user.has_avatar">
                Profile ({{ authStore.user.name }})
              </template>

              <div
                class="avatar"
                v-if="authStore.user.has_avatar"
                :style="avatarElementStyle"
              ></div>
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
