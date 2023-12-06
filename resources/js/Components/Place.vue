<template>
    <div class="place">
        <div class="place-image">
            
            <img :src=url class="img-fluid rounded-top" alt="">
        </div>
        <div class="d-flex wrapper flex-column justify-content-between px-3 py-2">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="place-title" >{{ place.plc_nom }}</h2>
                <i @click="isLiked = !isLiked" class=" fa-heart" :class="isLiked ? 'fa-solid': 'fa-regular'"></i>
            </div>
            <div class="d-flex my-3 justify-content-between align-items-center">
                <span class="place-theme" v-if="!place.plc_theme.startsWith('[\'')">{{ place.plc_theme }}</span>
                <span v-else class="place-theme">
                    <span class="block" v-for="theme in place.plc_theme.substring(1, place.plc_theme.length - 1).split(',')" :key="theme">#{{ theme }}</span>
                </span>    
                <span class="place-price">{{ place.plc_tarifsenclair ? place.plc_tarifsenclair.substring(0,10)+ '...' : 'GRATUIT' }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
import isArray from "lodash/isArray"
import { ref } from "vue"

const props = defineProps(['place'])
console.log(props.place)
let url = ref('')
try{
    console.log('try')
    if (!props.place.plc_illustrations.startsWith('{') && !props.place.plc_illustrations.startsWith('[')) {
        url.value = props.place.plc_illustrations
    }else{
        let images = props.place.plc_illustrations ? JSON.parse(props.place.plc_illustrations.replace(/'/g, '"').replace(/'/g, '"').substring(1, props.place.plc_illustrations.length - 1)) : ''
        url.value = isArray(images) ? images[0].url : images.url
    }
}catch(e){
    
}
const isLiked = ref(true)
</script>

<style>
.wrapper{
    height: 210px;
}
</style>