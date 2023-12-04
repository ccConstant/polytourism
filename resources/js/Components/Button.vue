<template>
   <a class="cursor-pointer" :class="buttonType == 'danger' ? 'btn-mini-danger ' : buttonType == 'mini-primary' ? 'btn-mini-primary' : buttonType == 'mini-secondary' ? 'btn-mini-secondary' : 'btn-primary' " >
        <slot></slot>
   </a>
</template>

<script setup>
const props = defineProps(['buttonType'])

</script>

<style>

</style>