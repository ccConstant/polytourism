<template>
<div class="position-fixed top-0 start-0 bottom-0 end-0 d-flex align-items-center justify-content-center bg-[#000000af]">
  <div @click="handleClick" class="w-fit border border-[#000] rounded-3 p-4 d-flex flex-column align-items-center gap-4 z-10 bg-[#ffffff] ">
    <div class="d-flex align-items-center gap-5">
        <Header :level="2">{{ title }}</Header>
        <i class="fa-solid fa-x fa-xl cursor-pointer" @click="onClose"></i>
    </div>
    <div v-if="note" class="d-flex align-items-center justify-content-end gap-3">
        <Header :level="3">Note : </Header>
        <i class="fa-solid fa-star fa-lg cursor-pointer" v-for="index in stars" :key="index" @click="selectedStars = index" :class="selectedStars >= index ? 'yellow' : 'empty-star'" ></i>
    </div>
    <Input :type="type" @input="update" :full="true" :placeholder="placeholder" />
    
    <Button @click="onSubmit">{{ title }}</Button>
  </div>
</div>
</template>

<script setup>
import { onBeforeMount, onBeforeUnmount, onMounted, onUpdated, ref } from 'vue';
import Header from './Header.vue';
import Input from './Input.vue';
import Button from './Button.vue';

const props = defineProps(['onClose','onSubmit','modelValue','type','title','note','placeholder'])
const element = ref(null)

const stars = [0, 1, 2, 3, 4]
const selectedStars = ref(-1)

const emits = defineEmits(['update:modelValue'])

const update = function (e) {
    emits('update:modelValue', e.target.value)
}



</script>

<style>
.yellow{

    color: yellow;
}

.empty-star{
    color: #e5e0e0;
    
}
</style>