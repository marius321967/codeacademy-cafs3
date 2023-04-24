<script setup lang="ts">
import { onMounted, ref } from 'vue'
import type { IUser } from '../../interfaces'
import { useAuthStore } from '../../stores/auth'

const users = ref<IUser[]>([])
const authStore = useAuthStore()

onMounted(() => {
  authStore.httpClient?.get('/users').then((res) => (users.value = res.data))
})
</script>

<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="user in users">
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.role }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
