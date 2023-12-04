<template>
  <div :class="hasBorder ? 'border border-black rounded-4' : ''" class="d-flex align-items-center gap-3  px-2 py-3 ">
    <slot></slot>
    <p class="large3">{{ info }}</p>
  </div>
</template>

<script setup>
const props = defineProps(['info','hasBorder'])
</script>

<style>

</style>