<template>
    <h1 :class="`header-${level}`"><slot></slot></h1>
</template>

<script setup>
const props = defineProps(['level'])
console.log(props)
</script>

<style>

</style>