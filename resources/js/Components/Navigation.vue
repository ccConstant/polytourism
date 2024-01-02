<template>
    <div class="nav border-bottom fixed top-0 left-0 right-0 bg-white">
        <nav class="navbar navbar-stick gap-3 px-2 container border-bottom py-2 ">
          <a href="/" class="navbar-brand primary-color">Polytourisme.</a>
          <div class="d-lg-none">
            <i @click="showNavBarLinks = !showNavBarLinks" class="fa-solid fa-bars icon"></i>
          </div>
          <div v-if="showNavBarLinks" class="d-flex gap-3 ">
              <a :href="link.link" v-for="(link,index) in links" :key="index" class="text-uppercase" @click="clickedLink = index" :class="index == clickedLink ? 'primary-color' : 'unselected-color'">{{ link.nom }}</a>
              
          </div>
          <div  v-if="!UserIsConnected && showNavBarLinks" class="d-flex gap-3">
              <a href="/login"> <Button buttonType="mini-primary"> Se connecter</Button> </a>
              <a href="/register"> <Button buttonType="mini-secondary">S'inscrire</Button></a>
          </div>
          <div v-if="showNavBarLinks && UserIsConnected"  class="dropdown show">
            <a @click="showDropDownLinks = !showDropDownLinks" class="btn btn-secondary dropdown-toggle btn-mini-primary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              mon compte
            </a>
      
            <div class="dropdown-menu" :class="showDropDownLinks ? 'show' : ''" aria-labelledby="dropdownMenuLink">
              <a @click="showDropDownLinks = false" class="dropdown-item" href="/myaccount">Mes infos</a>
              <a @click="showDropDownLinks = false" class="dropdown-item" v-if="connected.role == 'admin'" href="/admin">Tableau de bord</a>
              <a @click="showDropDownLinks = false" class="dropdown-item" href="/wishlist">Wishlist</a>
              <a @click="showDropDownLinks = false" class="dropdown-item" href="/history">Historique</a>
              <a @click="logout" class="dropdown-item cursor-pointer">Déconnexion</a>
            </div>
          </div>
        </nav>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import Button from './Button.vue';
import axios from 'axios';

const links = [{
  nom : 'accueil',
  link: '/#home',
  }, {
  nom: 'Laissez-nous vous guider',
  link: '/#proposition',
}, {
  nom: 'présentation',
  link: '/#presentation',
}, {
  nom: 'à propos',
  link: '/#about',
}, {
  nom: 'contact',
  link: '/#contact',
}
]
const props = defineProps(['connected'])
console.log(props)
const UserIsConnected = props.connected
const clickedLink = ref(0)
const showDropDownLinks = ref(false)
const showNavBarLinks = ref(true)

addEventListener("resize", (e) => {
    if (window.innerWidth > 1020)
        showNavBarLinks.value = true
    else if(showNavBarLinks.value == true){
        showNavBarLinks.value = false
    }
})

const logout = () => { 
  showDropDownLinks.value = false
  axios.post('/logout')
  localStorage.clear()
  console.log('logout')
  window.location.reload()
  window.location.href = '/';
}

</script>

<style>
.nav{
  z-index: 100;
}
</style>