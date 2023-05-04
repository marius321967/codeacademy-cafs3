<script setup lang="ts">
import type { IProduct } from '../../../interfaces'

const props = defineProps<{
  product: IProduct
}>()
</script>

<template>
  <div
    class="bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden w-25"
  >
    <div class="my-3 py-3">
      <h2 class="display-5">{{ props.product.name }}</h2>
      <p class="lead">{{ props.product.description }}</p>
    </div>
    <div class="bg-light shadow-sm mx-auto"></div>
  </div>
</template>
