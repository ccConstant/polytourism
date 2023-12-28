<template>
    
    <Navigation :connected="auth.user" />
    <br><br><br><br><br><br><br>
    
    <Header class="center" :level="2">Découvrez les lieux touristiques de Lyon</Header>

    <p id="welcome" class="large3">Bienvenue dans notre répertoire complet de lieux touristiques à Lyon. Explorez cette magnigique ville en découvrant une variété d'attractions, de restaurants, de musées, de parcs et bien plus encore. Utilisez les filtres ci-dessous pour afficher votre recherche en fonction de vos préférences.</p>
    
    
    <div >
        <div class="d-flex align-items-center container section justify-content-between">
            <Header :level="4" > Filtré par : </Header>
            <Input type="text" title="intitulé" v-model="filter.name" :isInline="true" placeholder="Intitulé"/> 
            <Input type="select" title="Thèmes" v-model="filter.theme" :isInline="true" placeholder="Thèmes" :options="['Restaurants','Nocturne','Patrimoine','Lieux de spectacle','Shopping','Hébergement']"/> 
            <div class="d-flex justify-content-between my-3 align-items-center">
             <div>
                 <i class="fa-solid fa-star fa-lg cursor-pointer" v-for="index in stars" :key="index" @click="selectedStars = index" :class="selectedStars >= index ? 'yellow' : 'empty-star' " ></i>
             </div>
           </div>
            
        </div>
       
        <div class="d-flex flex-wrap gap-3 my-5 container section justify-content-center ">
            <Place v-for="place in filteredPlaces.slice(page*limit, (page+1) * limit)" :key="place" :place="{
                ...place,
            }" />
            
            
        </div>
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item cursor-pointer" @click="minPage > 1 ? minPage -= 1 : minPage"><a class="page-link">Précédent</a></li>
                <li class="page-item" v-for="pg in Array.from({ length: maxPage }, (_, i) => i + 1).slice(minPage-1, minPage-1 +nbPageLinks)" :key="pg">
                    <a class="page-link cursor-pointer" :class="page == pg -1? 'active' : ''" @click="page = pg - 1">{{ pg }}</a>
                </li>

                <li class="page-item cursor-pointer" @click="minPage < maxPage - nbPageLinks ? minPage += 1 : minPage" ><a class="page-link">Suivant</a></li>
            </ul>
            </nav>
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
import { ref, watch } from 'vue'
import axios from 'axios'

const props = defineProps(['auth']);
const showFilterBar=ref(false)
const filteredPlaces=ref([])
const pageList = ref([])
const filter = ref({
    theme : '',
    name : '',
    min : 0,
    max : null,
    rating : 0
})

watch(filter.value,() => {
    filteredPlaces.value = allPlaces.value.filter((place) => {
        return place.plc_theme.includes(filter.value.theme) && place.plc_nom.toLowerCase().includes(filter.value.name)
    })
    maxPage.value = filteredPlaces.value.length / limit;
    minPage.value = 1
    page.value = 0
    console.log(minPage.value)
})

const allPlaces = ref([])
axios.get('/place/all').then(response => {
    allPlaces.value = response.data
    filteredPlaces.value = allPlaces.value
    maxPage.value = filteredPlaces.value.length / limit;
    console.log(allPlaces.value[10])
}).catch((error => console.log(error)))



const stars = [0,1,2,3,4]
const selectedStars = ref(-1)
const page = ref(0);
const limit = 15
const nbPageLinks = 3
const minPage = ref(1)
const maxPage = ref(-1)

</script>
