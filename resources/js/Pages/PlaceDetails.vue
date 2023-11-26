<template>
  <div>
    <Navigation />
    <section class="section bg-img">
    </section>
    <section class="section container d-flex flex-column gap-5">
      <div class="d-flex flex-column gap-1">
        <Header class="text-start" :level="2">Hotel de ville</Header>
        <span class="place-theme">#activite</span>
      </div>
      <Header class="text-start " :level="3">Description</Header>
      <p class="large3"><span class="fw-bold">L'Hôtel de Ville</span> de Lyon, situé sur la Place des Terreaux, est un bijou néo-classique du 17e siècle. Conçu par l'architecte Simon Maupin, il se distingue par ses colonnes corinthiennes, ses sculptures élaborées, et son fronton allégorique. Au cœur de la place, il est entouré par le Musée des Beaux-Arts et la fontaine Bartholdi. Le bâtiment sert de siège à l'administration municipale, où les décisions clés pour la ville sont prises. La salle des mariages est une pièce magnifique pour les cérémonies civiles. De plus, l'Hôtel de Ville est le centre de nombreux événements culturels, dont la Fête des Lumières en décembre. Des visites guidées permettent d'explorer son histoire et son architecture. En somme, l'Hôtel de Ville de Lyon est un mélange d'histoire, d'art et de gouvernance au cœur de la ville.</p>
    </section>
    <section class="section container d-flex flex-column align-items-center gap-5">
      <div class=" align-items-center justify-content-center d-flex gap-5 flex-wrap">
        <div class="img img-fluid">
          <img src="../../../public/temp/lyon2.jpg" alt="">
        </div >
        <div class="d-flex gap-5 flex-column">
          <Header level="4">Localisation & infos pratiques</Header>
          <div class="d-flex gap-4 flex-column">
            <Info :hasBorder="false" info="1 Pl.de la Comédie, 69001 Lyon"><i class="fa-solid fa-location-dot fa-xl" style="color: #000000;"></i></Info>
            <Info :hasBorder="false" info="Gratuit"><i class="fa-solid fa-sack-dollar fa-xl" style="color: #000000;"></i></Info>
            <Info :hasBorder="false" info="06.06.06.06.06"><i class="fa-solid fa-phone fa-xl" style="color: #000000;"></i></Info>
            <Info :hasBorder="false" info="info@lyon.fr"><i class="fa-regular fa-envelope fa-xl" style="color: #000000;"></i></Info>
            <Info :hasBorder="false" info="tous les jours"><i class="fa-regular fa-calendar fa-xl" style="color: #000000;"></i></Info>
            <Info :hasBorder="false" info="ouvert tous le temps"><i class="fa-regular fa-clock fa-xl" style="color: #000000;"></i></Info>
          </div>
        </div>
      </div>
      <PopUp :onClose="onClose" v-if="showPopUp" />
      <Button @click="handleShow">Ajouter un commentaire</Button>
    </section>
    <section v-if="allComments.length > 0" class="section container d-flex flex-column gap-5 align-items-start">
      <Header level="2">Avis de Nos Chers Clients : </Header>
      <div class="d-flex justify-content-between align-items-center">
        <i class="fa-solid fa-chevron-left fa-2xl"  @click="() => { if(startIndex > 0){ endIndex--; startIndex-- }}" :class="startIndex <= 0 ? 'disabled' : 'enabled'"></i>
        <div class="d-flex gap-2">
          <Comment v-for="comment in allComments.slice(startIndex, endIndex +1)" :key="comment" :comment="comment" />
          
        </div>
        <i class="fa-solid fa-chevron-right fa-2xl" @click="() => { if (endIndex < allComments.length - 1) { endIndex++; startIndex++ }}" :class="endIndex >= allComments.length - 1 ? 'disabled' : 'enabled'"></i>
      </div>
      
    </section>
    <Footer />
  </div>
</template>

<script setup>
import Navigation from '@/Components/Navigation.vue'
import Header from '@/Components/Header.vue'
import Info from '@/Components/Info.vue'
import Button from '@/Components/Button.vue'
import Footer from '@/Components/Footer.vue'
import PopUp from '@/Components/PopUp.vue'
import Comment from '@/Components/Comment.vue'
import { ref } from 'vue'

const showPopUp = ref(false)
const onClose = () => showPopUp.value = false
const handleShow = () => {
  showPopUp.value = true
}

const allComments = [{
  name: 'Anonyme 1',
  rating: 5,
  desc: 'L\'Hôtel de Ville de Lyon est une merveille architecturale ! J\'ai été captivée par la richesse de son histoire et la beauté de sa façade.',
  date: '22/11/2023'
}, {
  name: 'Anonyme 2',
  rating: 5,
  desc: 'L\'Hôtel de Ville de Lyon est une merveille architecturale ! J\'ai été captivée par la richesse de son histoire et la beauté de sa façade.',
  date: '22/11/2023'
}, {
  name: 'Anonyme 3',
  rating: 5,
  desc: 'L\'Hôtel de Ville de Lyon est une merveille architecturale ! J\'ai été captivée par la richesse de son histoire et la beauté de sa façade.',
  date: '22/11/2023'
}, {
  name: 'Anonyme 4',
  rating: 5,
  desc: 'L\'Hôtel de Ville de Lyon est une merveille architecturale ! J\'ai été captivée par la richesse de son histoire et la beauté de sa façade.',
  date: '22/11/2023'
}, {
  name: 'Anonyme 5',
  rating: 5,
  desc: 'L\'Hôtel de Ville de Lyon est une merveille architecturale ! J\'ai été captivée par la richesse de son histoire et la beauté de sa façade.',
  date: '22/11/2023'
}, {
  name: 'Anonyme 6',
  rating: 5,
  desc: 'L\'Hôtel de Ville de Lyon est une merveille architecturale ! J\'ai été captivée par la richesse de son histoire et la beauté de sa façade.',
  date: '22/11/2023'
}, {
  name: 'Anonyme 7',
  rating: 5,
  desc: 'L\'Hôtel de Ville de Lyon est une merveille architecturale ! J\'ai été captivée par la richesse de son histoire et la beauté de sa façade.',
  date: '22/11/2023'
}]
const startIndex = ref(0)
const endIndex = ref(2)


</script>

<style>
.bg-img{
  background: url('../../../public/temp/lyon2.jpg');
  height: 600px;
  background-position: center center;
  background-size: cover;
}
.bg-flou{
  background-color: rgb(230, 223, 223);
}
.enabled{
  cursor: pointer;
  color: black;
}
.disabled{
  cursor: not-allowed;
  color: rgb(138, 141, 141);;
}
.img{
  width: 50%;
}
@media screen and (max-width: 1030px) {
  .img{
    width: 100%;
    margin-bottom: 30px;
  }
}
</style>