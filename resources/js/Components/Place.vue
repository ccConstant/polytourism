<template>
    <div class="place">
        <div class="place-image">
            <img :src="place.plc_illustrations" class="img-fluid rounded-top" alt="">
        </div>
        <div class="d-flex flex-column px-3 py-2">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="place-title" >{{ place.plc_nom }}</h1>
                <i @click="isLiked = !isLiked" class=" fa-heart" :class="isLiked ? 'fa-solid': 'fa-regular'"></i>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <span class="place-theme">#{{ place.plc_theme }}</span>
                <span class="place-price">{{ place.plc_tarifsenclair }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue"

const props = defineProps(['place'])
const isLiked = ref(true)
</script>

<style>

</style>