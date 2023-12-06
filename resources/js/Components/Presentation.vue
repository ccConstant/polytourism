<template>
  <div class="d-flex presentation gap-4" :class="flip ? 'flex-column-reverse' : 'flex-column'">
    <div>
        <img :src=image class="img-fluid rounded-top" alt="">
    </div>
    <div>
        <h1 class="my-3">{{ title }}</h1>
        <p >{{ description }}</p>
    </div>
  </div>
</template>

<script setup>
const props = defineProps(['title','description','flip','image'])
</script>

<style>

</style>