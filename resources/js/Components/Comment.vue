<template>
    <div class="w-[400px] bg-[#AEF2EE] d-flex px-2 py-4 flex-column gap-3 rounded-3 align-items-center">
        <div class="d-flex gap-5 align-items-center">
            <Header :level="2">{{ comment.user_pseudo }}</Header>
            <div class="d-flex gap-3 align-items-center">
                <i class="fa-solid fa-star fa-lg " style="color: yellow;" ></i>
                <Header :level="3">{{ comment.com_rating }}</Header>
            </div>
        </div>
        <p>{{ comment.com_text }}</p>
        <p>publié le {{ dayjs(comment.com_date).format('DD/MM/YYYY') }}</p>
    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue'
import dayjs from 'dayjs';

const props = defineProps(['comment'])
console.log(props.comment)
</script>

<style>

</style>