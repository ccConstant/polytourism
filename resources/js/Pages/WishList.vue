<template >
    <Navigation  :auth="auth" />
    <br><br><br><br><br><br><br>
    <Header class="center" :level="2">Bienvenue dans votre Wishlist</Header>

    <p id="welcome" class="large3">Bienvenue dans notre répertoire complet de lieux touristiques à Lyon. Explorez cette
        magnifique ville en découvrant une variété d'attractions, de restaurants, de musées, de parcs et bien plus encore.
        </p>


    <div>
        <div v-if="placeLoaded" class="d-flex flex-wrap gap-3 my-5 container section justify-content-center ">
            
            <Place v-for="place in places" @refresh-page="refresh" :key="place.id" :place="{
                ...place,
                plc_theme: parseString(place.plc_theme),
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
import Footer from '@/Components/Footer.vue'
import Navigation from '@/Components/Navigation.vue'
import axios from 'axios'
import { ref } from 'vue'
import { parseString } from '@/utils/fonctions'

const props = defineProps(['auth'])

const places = ref([])
const placeLoaded = ref(false)
const refresh = () => {
    places.value = []
    axios.get('/wishlist/' + props.auth.user.id).then(async (response) => {
        console.log(response.data)
        await response.data.forEach(async element => {
            console.log(element)
            await axios.get('/place/' + element.plc_id).then((res) => {
                places.value.push({
                    ...res.data,
                    id: element.plc_id,
                    id_wishList: element.id
                })
                console.log(res.data)
            }).catch(error => console.log(error))
        });
        console.log('fin')
        placeLoaded.value = true
    }).catch((error) => console.log('failed')).finally(() => console.log('finally...'))
}

refresh();

</script>