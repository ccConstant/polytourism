<template>
    <div class="place">
        <div class="place-image">
            
            <img :src=url class="img-fluid rounded-top" alt="">
        </div>
        <div class="d-flex wrapper flex-column justify-content-between px-3 py-2">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="place-title" ><a :href="'/placeView/'+place.id">{{ place.plc_nom }}</a></h2>
                <i @click="toggleLike" class=" fa-heart cursor-pointer" :class="isLiked ? 'fa-solid': 'fa-regular'"></i>
            </div>
            <div class="d-flex my-3 justify-content-between align-items-center">
                <span class="place-theme" v-if="!place.plc_theme.startsWith('[\'')">{{ place.plc_theme }}</span>
                <span v-else class="place-theme">
                    <span class="block" v-for="theme in place.plc_theme.substring(1, place.plc_theme.length - 1).split(',')" :key="theme">#{{ theme }}</span>
                </span>    
                <span class="place-price">{{ place.plc_tarifsenclair  }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
import axios from "axios"
import isArray from "lodash/isArray"
import { ref } from "vue"

const props = defineProps(['place'])
const emit = defineEmits(['refreshPage'])
const user = JSON.parse(localStorage.getItem('user'))
let url = ref('')
try{
    if (!props.place.plc_illustrations.startsWith('{') && !props.place.plc_illustrations.startsWith('[')) {
        url.value = props.place.plc_illustrations
    }else{
        let images = props.place.plc_illustrations ? JSON.parse(props.place.plc_illustrations.replace(/'/g, '"').replace(/'/g, '"').substring(1, props.place.plc_illustrations.length - 1)) : ''
        url.value = isArray(images) ? images[0].url : images.url
    }
}catch(e){
    
}
const isLiked = ref(false)
let id

if(user){
    axios.get('/wishlist/'+user.id).then((response) => {
        response.data.forEach(element => {
            if(element.plc_id == props.place.id){
                isLiked.value = true;
                return;
            }
        });
    }).catch(e => console.log(e))
}

const toggleLike = () => {
    if(!user)
        return ;
    if(isLiked.value){
        // je n'arrive pas à rentrer dans le then parce que axios renvoie network error meme si il met à jour la db et effectue les bonnes
        // operations 
        console.log('delete !!!!',props.place.id_wishList)
        axios.post('/wishlist/delete/'+ props.place.id_wishList).then((res) => {
            console.log('succed to delete')
            isLiked.value = false
            emit('refreshPage');
        }).catch((error) => console.log(error))
    }else{
        
        axios.post('/wishlist/add',{
            plc_id : props.place.id,
            user_id : user.id
        }).then((res) => {
            console.log('like added')
            isLiked.value = true
            id = res.data.wsh_id
        }).catch((error) => console.log(error))
    }
    
}

</script>

<style>
.wrapper{
    height: 210px;
}
</style>