<template>
    
    <Navigation />
    <br><br><br><br><br><br><br>
    <h1> Découvrez les lieux touristiques de Lyon</h1>
    <p id="welcome">Bienvenue dans notre répertoire complet de lieux touristiques à Lyon. Explorez cette magnigique ville en découvrant une variété d'attractions, de restaurants, de musées, de parcs et bien plus encore. Utilisez les filtres ci-dessous pour afficher votre recherche en fonction de vos préférences.</p>

    <div class="d-flex gap-3 justify-content-center">
          <Place />
          <Place />
          <Place />
    </div>
    <br><br>
    <div class="d-flex gap-3 justify-content-center">
          <Place />
          <Place />
          <Place />
    </div>
    <br><br><br><br><br><br><br>
    
    <div class="center" >
        <Button>Suggérez un lieu</Button>
    </div>
     <Footer />
</template>

<style lang="css">
h1{
    text-align:center;
    font-size:40px;
    font-weight: bold;
}
.element{
    border-radius:30px;
    border-style: solid;
    height:auto;
    border-color:black;
}
#welcome{
    margin-top: 40px;
    margin-left: 150px;
    margin-right: 150px;
    margin-bottom:40px;
    text-align: justify;
}
#Discover{
    margin-top: 40px;
}



</style>

<script setup>
import Header from '@/Components/Header.vue'
import Place from '@/Components/Place.vue'
import Button from '@/Components/Button.vue'
import Footer from '@/Components/Footer.vue'
import Navigation from '@/Components/Navigation.vue'
</script>
