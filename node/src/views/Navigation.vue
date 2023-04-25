<script setup lang="ts">
import { Role } from '../interfaces'
import { useAuthStore } from '../stores/auth'

const authStore = useAuthStore()
</script>

<template>
  <nav
    class="navbar navbar-expand navbar-dark bg-dark"
    aria-label="Second navbar example"
  >
    <div class="container-fluid">
      <router-link class="navbar-brand" to="/">MyProduct</router-link>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <router-link class="nav-link" to="/about">About</router-link>
          </li>

          <li class="nav-item" v-if="!authStore.isLoggedIn">
            <router-link class="nav-link" to="/login">Login</router-link>
          </li>

          <li
            class="nav-item"
            v-if="authStore.isLoggedIn && authStore.user?.role == Role.regular"
          >
            <router-link class="nav-link" to="/user">App</router-link>
          </li>

          <li
            class="nav-item"
            v-if="authStore.isLoggedIn && authStore.user?.role == Role.admin"
          >
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
              Profile ({{ authStore.user.name }})
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>
