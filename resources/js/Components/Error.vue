<template>
    <div class="alert alert-danger" role="alert">
        <h1>{{ message }}<span @click="onErrorClose" >X</span></h1>
    </div>
</template>

<script setup>
const props = defineProps(['message','onErrorClose'])
</script>


<style scoped>
div{
    width: fit-content;
    text-align: center;
    margin: auto;
}
span{
    margin-left: 15px;
    color: rgb(61, 60, 60);
    cursor: pointer;
}
span:hover{
    color: rgb(0, 0, 0);
}
</style>