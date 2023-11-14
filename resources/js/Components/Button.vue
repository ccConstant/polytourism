<template>
   <router-link class="cursor-pointer" :class="buttonType == 'mini-primary' ? 'btn-mini-primary' : buttonType == 'mini-secondary' ? 'btn-mini-secondary' : 'btn-primary' " >
        <slot></slot>
   </router-link>
</template>

<script setup>
const props = defineProps(['buttonType'])

</script>

<style>

</style>