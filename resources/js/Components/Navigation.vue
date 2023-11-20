<template>
    <div class="border-bottom fixed top-0 left-0 right-0 bg-white">
        <nav class="navbar navbar-stick gap-3 px-2 container border-bottom py-2 ">
          <h1 class="navbar-brand primary-color">Polytourisme.</h1>
          <div class="d-lg-none">
            <i @click="showNavBarLinks = !showNavBarLinks" class="fa-solid fa-bars icon"></i>
          </div>
          <div v-if="showNavBarLinks" class="d-flex gap-3 ">
              <a href="#" v-for="(link,index) in links" :key="index" class="text-uppercase" :class="index == 0 ? 'primary-color' : 'unselected-color'">{{ link }}</a>
              
          </div>
          <div  v-if="UserIsConnected && showNavBarLinks" class="d-flex gap-3">
              <a href="/login"> <Button buttonType="mini-primary"> se connecter</Button> </a>
              <a href="/register"> <Button buttonType="mini-secondary">s'inscrire</Button></a>
          </div>
          <div v-if="showNavBarLinks && !UserIsConnected"  class="dropdown show">
            <a @click="showDropDownLinks = !showDropDownLinks" class="btn btn-secondary dropdown-toggle btn-mini-primary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              mon compte
            </a>
      
            <div class="dropdown-menu" :class="showDropDownLinks ? 'show' : ''" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">mes infos</a>
              <a class="dropdown-item" href="#">wishlist</a>
              <a class="dropdown-item" href="#">historique</a>
              <a class="dropdown-item" href="#">déconnexion</a>
            </div>
          </div>
        </nav>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import Button from './Button.vue';

const links = ['accueil','Laissez nous vous guider','presentation','a propos','contact']

const UserIsConnected = true
const showDropDownLinks = ref(false)
const showNavBarLinks = ref(true)

addEventListener("resize", (e) => {
    if (window.innerWidth > 1020)
        showNavBarLinks.value = true
    else if(showNavBarLinks.value == true){
        showNavBarLinks.value = false
    }
})

</script>

<style>

</style>