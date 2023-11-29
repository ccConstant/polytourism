<template>
    
    <Navigation />
    <br><br><br><br><br><br><br>
    
    <Header class="center" :level="2">Découvrez les lieux touristiques de Lyon</Header>

    <p id="welcome" class="large3">Bienvenue dans notre répertoire complet de lieux touristiques à Lyon. Explorez cette magnigique ville en découvrant une variété d'attractions, de restaurants, de musées, de parcs et bien plus encore. Utilisez les filtres ci-dessous pour afficher votre recherche en fonction de vos préférences.</p>
    
    
    <div >
        <div class="d-flex align-items-center container section justify-content-between">
            <Header :level="4" > Filtré par : </Header>
            <Input type="select" title="Thèmes" :isInline="true" placeholder="Thèmes" :options="['Restaurants','Nocturne','Patrimoine','Lieux de spectacle','Shopping','Hébergement']"/> 
            <Button @click="showFilterBar=!showFilterBar" buttonType='mini-primary'> + de filtres</Button>
        </div>
       <div v-if="showFilterBar" class="d-flex justify-content-between container section my-3 align-items-center">
         <Input type="number" title="min" placeholder="min" :isInline="true" />
         <Input type="number" title="max" placeholder="max" :isInline="true" />
         <div>
            <i class="fa-solid fa-star fa-lg cursor-pointer" v-for="index in stars" :key="index" @click="selectedStars = index" :class="selectedStars >= index ? 'yellow' : 'empty-star' " ></i>
          
         </div>
       </div>
    <div class="d-flex flex-wrap gap-3 my-5 container section justify-content-center ">
          {{ allPlaces }}
          <Place v-for="place in allPlaces" :key="place" :place="{
              ...place,
              plc_illustrations: 'https://images.unsplash.com/photo-1597692289746-070a015e0714?q=80&w=1635&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
          }" />
          
        
    </div>
    
    <br><br><br><br><br><br><br>
    </div>
    <div class="d-flex justify-content-center">
        <Button>Suggérez un lieu</Button>
    </div>
   
    <Footer/>

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
    margin-left: 60px;
    margin-right: 60px;
    margin-bottom:40px;
    text-align: justify;
    
}


.yellow{

    color: yellow;
}

.empty-star{
    color: #e5e0e0;
    
}

#Discover{
    margin-top: 40px;
}

#ListPlaces{
    margin-left: 45px;
}

#FiltrerPar{
    margin-bottom: 20px;
    margin-left: 60px;
    font-size: 20px ;
    font-weight: bold;
    

}
</style>

<script setup>
import Header from '@/Components/Header.vue'
import Place from '@/Components/Place.vue'
import Button from '@/Components/Button.vue'
import Input from '@/Components/Input.vue'
import Footer from '@/Components/Footer.vue'
import Navigation from '@/Components/Navigation.vue'
import { ref } from 'vue'
import axios from 'axios'

const showFilterBar=ref(false)

const allPlaces = ref([])
axios.get('place/all').then(response => allPlaces.value = response.data).catch((error => console.log(error)))
//console.log(allPlaces.value)

const stars = [0,1,2,3,4]
const selectedStars = ref(-1)

</script>
