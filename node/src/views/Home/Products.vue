<script setup lang="ts">
import { ref } from 'vue'
import type { IProduct } from '../../interfaces'
import Product from './Product.vue'

const products = ref<IProduct[]>([
  {
    name: 'Chairs',
    description: 'We make the greatest chairs'
  },
  {
    name: 'Tables',
    description: 'Improve your interior with our kitchen tables'
  },
  {
    name: 'Beds',
    description: 'Very comfy'
  },
  {
    name: 'Cupboards',
    description: 'Very functional'
  }
])
</script>

<template>
  <div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
    <product v-for="product in products" :product="product"></product>
    <!-- <div class="bg-light me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-5">Another headline</h2>
        <p class="lead">And an even wittier subheading.</p>
      </div>
      <div
        class="bg-dark shadow-sm mx-auto"
        style="width: 80%; height: 300px; border-radius: 21px 21px 0 0"
      ></div>
    </div> -->
  </div>
</template>
