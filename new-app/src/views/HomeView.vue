<!-- <script setup>
import TheWelcome from '../components/TheWelcome.vue'
</script>

<template>
  <main>
    <TheWelcome />
  </main>
</template> -->


<script setup>
import { ref } from 'vue';
const products = ref(null);
fetch('https://testapi.jasonwatmore.com/products')
    .then(response => response.json())
    .then(data => products.value = data);
</script>

<template>
    <div class="card m-3">
        <h2>This is Home Page</h2><br>
        <h5 class="card-header text-center">Vue 3 fetch data from API</h5>
        <div class="card-body">
            <div v-if="products">
                <h5>Products</h5>
                <ul class="mb-0">
                    <li v-for="product in products" :key="product.id">{{product.name}}</li>
                </ul>
            </div>
            <div v-if="!products" class="text-center">
                <div class="spinner-border spinner-border-sm"></div>
            </div>
        </div>
    </div>
</template>