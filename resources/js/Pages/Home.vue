<template>
  <div>
    <Navigation :auth="auth" />
    <section id="home" class="d-flex container align-items-center section gap-3">
      <div class="w-50">
        <h1 class="large-title">Bienvenue sur <span class="primary-color">Polytourisme</span></h1>
        <p class="unselected-color my-5 large3"><span class="primary-color">Polytourisme</span> vous guide et vous accompagne dans votre découverte de la merveuilleuse ville de Lyon.
                                    Découvrez la beuaté de Lyon à travers nos activités recommandés.</p>
        <a href="/ListPlaces"> <Button>Découvrir Lyon</Button></a>
      </div>
      <div class="w-50">
        <img src="https://images.unsplash.com/photo-1555141816-810dd5692b6a?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded-top" alt="">
      </div>
    </section>
    <section id="proposition" class="light-blue section">
      <div class="container">
        <Header level="1" class="my-5">proposition</Header>
        <p class="section-para">Nos Propositions pour vous : </p>
        <div class="d-flex flex-column flex-xl-row gap-3 align-items-center justify-content-center">
          <Place v-for="place in allPlaces.slice(index,index+3)" :key="place" :place="{
            ...place,
            plc_theme: parseString(place.plc_theme),
          }"/>
                  
        </div>
      </div>
    </section>
    <section id="presentation" class="section container">
      <Header level="1" class="my-5">présentation</Header>
      <div class="d-flex flex-wrap justify-content-center gap-5">
        <Presentation 
        image="https://images.unsplash.com/photo-1664533019724-c4b70ca5dd68?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
        title="Gastronomie de renom" 
        description="Lyon est une destination de choix pour les amateurs de cuisine. La ville est célèbre pour ses bouchons traditionnels, ses plats délicieux, et ses marchés animés. Les visiteurs peuvent déguster des mets lyonnais authentiques, tels que la quenelle, le gratin dauphinois, et la saucisse de Lyon, dans un cadre convivial."/>
        <Presentation 
        image="https://images.unsplash.com/photo-1608123104239-ca5daa88a1d3?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
        flip="true" 
        title="Belle Vue Panoramique" 
        description="Lyon est une ville située entre deux fleuves, le Rhône et la Saône, offrant de superbes panoramas. Les touristes peuvent profiter de vues imprenables depuis des points de vue tels que la colline de Fourvière, le parc de la Tête d'Or, et la Croix-Rousse. Ces sites offrent des perspectives magnifiques sur la ville, ses ponts, et son architecture, ce qui en fait des lieux parfaits pour la photographie et l'appréciation des paysages urbains."/>
        <Presentation 
        image="https://images.unsplash.com/photo-1559510655-ff1f9cb6819a?q=80&w=1730&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
        flip="true" 
        title="Patrimoine historique et culturel" 
        description=" Lyon offre une expérience culturelle riche, avec son quartier du Vieux Lyon médiéval, ses traboules, ses églises anciennes, et ses musées renommés. Les touristes peuvent découvrir l'histoire fascinante de la ville tout en flânant dans ses rues pittoresques."/>
        <Presentation 
        image="https://plus.unsplash.com/premium_photo-1661957705604-15f37be44856?q=80&w=1673&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
        title="Fête des Lumières" 
        description="La Fête des Lumières est l'un des événements les plus emblématiques de Lyon. Chaque année en décembre, la ville s'illumine avec des installations lumineuses spectaculaires créées par des artistes du monde entier. C'est une célébration magique à ne pas manquer."/>
      </div>
    </section>
    <section id="about" class="section light-yellow">
      <div class="container d-flex flex-column align-items-center gap-4">
          <Header level="1" class="my-5">qui sommes-nous ?</Header>
          <p class="text-center large2"><span class="primary-color">polytourisme </span>est une équipe d’étudiants de l’école polytechnique Lyon en informatique </p>
          <img src="../../../public/temp/polytech.jpg" class="img-fluid rounded-top" alt="">
          <p class="large1">Notre mission</p>
          <p class="text-center large2">Notre mission est de vous faire découvrir Lyon de manière inoubliable. Nous voulons que chaque visite à Lyon soit une aventure mémorable.</p>
      </div>
    </section>
    <section id="contact" class="section container d-flex flex-column align-items-center gap-5">
      <Header level="1" class="my-5">Besoin d'aide ?</Header>
      <p class="large2 text-center">Bienvenue dans notre section de contact et d'aide. Nous sommes là pour répondre à vos questions, résoudre vos problèmes et vous assister dans la planification de votre séjour à Lyon. N'hésitez pas à nous contacter pour toute demande d'information, d'assistance ou de soutien. Votre expérience compte beaucoup pour nous.</p>
      <h1 class="header-1 light header-margin-top">Nos conseillers à votre écoute</h1>
      <p class="large2 text-center">Notre équipe dévouée est prête à vous aider. Si vous avez des questions sur nos activités, nos sorties, nos restaurants recommandés ou tout autre aspect de votre voyage à Lyon.</p>
    </section>
    <Footer />
  </div>
</template>

<script setup>
import Navigation from '@/Components/Navigation.vue'
import Button from '@/Components/Button.vue'
import Header from '@/Components/Header.vue'
import Place from '@/Components/Place.vue'
import Presentation from '@/Components/Presentation.vue'
import Info from '@/Components/Info.vue'
import Footer from '@/Components/Footer.vue'
import { ref } from 'vue'

const props = defineProps(['auth'])
if(props.auth)
  localStorage.setItem('user',JSON.stringify(props.auth.user))
console.log(props.auth.user)

const allPlaces = ref([])
const index = ref(0);

function parseString(str) {
  try {
    return JSON.parse(str.replace(/'/g, '"').substring(1, str.length - 1))
  } catch (e) {
    return ''
  }
}

axios.get('/place/all').then(response => {
  allPlaces.value = response.data;
}).catch((error => console.log(error)))
/*
setInterval(() => {
  index.value++;
},10000);
*/
</script>

<style>

</style>