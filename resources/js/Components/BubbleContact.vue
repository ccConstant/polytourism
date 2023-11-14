<template>
  <div class="d-flex align-items-center gap-3 border border-black px-2 py-3 rounded-4">
    <slot></slot>
    <p class="large2">{{ info }}</p>
  </div>
</template>

<script setup>
const props = defineProps(['info'])
</script>

<style>

</style>