<template>
    <div class="flex items-center justify-between py-4">
                                  
        <button class="bg-indigo-500 text-white p-2"
        v-on:click.prevent="addToCart"
        >Add to cart</button>
    </div>
</template>

<script setup>
    const addToCart = () => {
        console.log('Added to cart');
    }
</script>