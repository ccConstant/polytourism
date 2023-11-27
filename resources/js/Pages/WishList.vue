<template>
    <Navigation :connected="props.auth.user" />
    <br><br><br><br><br><br><br>

    <Header class="center" :level="2">Bienvenue dans votre wish liste</Header>

    <p id="welcome" class="large3">Bienvenue dans notre répertoire complet de lieux touristiques à Lyon. Explorez cette
        magnigique ville en découvrant une variété d'attractions, de restaurants, de musées, de parcs et bien plus encore.
        </p>


    <div>
        

        <div class="d-flex flex-wrap gap-3 my-5 container section justify-content-center ">
            <Place :place="{
                id: 1,
                plc_nom: 'Hotel de ville',
                plc_theme: 'activite',
                plc_tarifsenclair: 'gratuit',
                plc_illustrations: 'https://images.unsplash.com/photo-1597692289746-070a015e0714?q=80&w=1635&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            }" />
            <Place :place="{
                id: 1,
                plc_nom: 'Hotel de ville',
                plc_theme: 'activite',
                plc_tarifsenclair: 'gratuit',
                plc_illustrations: 'https://images.unsplash.com/photo-1597692289746-070a015e0714?q=80&w=1635&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            }" />
            <Place :place="{
                id: 1,
                plc_nom: 'Hotel de ville',
                plc_theme: 'activite',
                plc_tarifsenclair: 'gratuit',
                plc_illustrations: 'https://images.unsplash.com/photo-1597692289746-070a015e0714?q=80&w=1635&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            }" />
            <Place :place="{
                id: 1,
                plc_nom: 'Hotel de ville',
                plc_theme: 'activite',
                plc_tarifsenclair: 'gratuit',
                plc_illustrations: 'https://images.unsplash.com/photo-1597692289746-070a015e0714?q=80&w=1635&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            }" />
            <Place :place="{
                id: 1,
                plc_nom: 'Hotel de ville',
                plc_theme: 'activite',
                plc_tarifsenclair: 'gratuit',
                plc_illustrations: 'https://images.unsplash.com/photo-1597692289746-070a015e0714?q=80&w=1635&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            }" />
            <Place :place="{
                id: 1,
                plc_nom: 'Hotel de ville',
                plc_theme: 'activite',
                plc_tarifsenclair: 'gratuit',
                plc_illustrations: 'https://images.unsplash.com/photo-1597692289746-070a015e0714?q=80&w=1635&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            }" />



        </div>

        <br><br><br><br><br><br><br>
    </div>

    <Footer />
</template>

<style lang="css">
h1 {
    text-align: center;
    font-size: 40px;
    font-weight: bold;
}

.element {
    border-radius: 30px;
    border-style: solid;
    height: auto;
    border-color: black;
}

#welcome {
    margin-top: 40px;
    margin-left: 60px;
    margin-right: 60px;
    margin-bottom: 40px;
    text-align: justify;

}


.yellow {

    color: yellow;
}

.empty-star {
    color: #e5e0e0;

}

#Discover {
    margin-top: 40px;
}

#ListPlaces {
    margin-left: 45px;
}

#FiltrerPar {
    margin-bottom: 20px;
    margin-left: 60px;
    font-size: 20px;
    font-weight: bold;


}
</style>

<script setup>
import Header from '@/Components/Header.vue'
import Place from '@/Components/Place.vue'
import Button from '@/Components/Button.vue'
import Footer from '@/Components/Footer.vue'
import Navigation from '@/Components/Navigation.vue'
import Input from '@/Components/Input.vue'
import { ref } from 'vue'

const showFilterBar = ref(false)
const props = defineProps(['auth'])

const stars = [0, 1, 2, 3, 4]
const selectedStars = ref(-1)

</script>