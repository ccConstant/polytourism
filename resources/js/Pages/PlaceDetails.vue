<template>
  <div class="d-flex flex-column">
    <Navigation :auth="auth" />
    <section v-if="placeLoaded" class="section bg-img d-flex justify-content-center">
      <img :src="place.plc_illustrations" class="img-fluid w-100" alt="">
    </section>
    <div v-if="placeLoaded">
    <section class="section container d-flex flex-column gap-5">
      <div class="d-flex flex-column gap-1">
        <Header class="text-start" :level="2">{{ place.plc_nom }}</Header>
        <span class="place-theme">
            <span class="block" v-for="theme in parseString(place.plc_theme)" :key="theme">#{{ theme }}</span>
        </span> 
      </div>
      <Header class="text-start" :level="3">Description</Header>
      <p class="large3">{{ place.plc_descrdetailfr }}</p>
    </section>
    <section class="section container d-flex flex-column align-items-center gap-5">
      <div class=" align-items-center justify-content-center d-flex gap-5 flex-wrap">
        <div class="img img-fluid">
          <img :src="url" alt="">
        </div >
        <div class="d-flex gap-5 flex-column">
          <Header level="4">Localisation & infos pratiques</Header>
          <div class="d-flex gap-4 flex-column">
            <Info :hasBorder="false" :info="place.plc_address.streetAddress + ' ' + place.plc_address.addressLocality + ' ' + place.plc_address.postalCode + ' ' + place.plc_address.addressCountry"><i class="fa-solid fa-location-dot fa-xl" style="color: #000000;"></i></Info>
            <Info v-if="place.plc_tarifsenclair" :hasBorder="false" :info="place.plc_tarifsenclair"><i class="fa-solid fa-sack-dollar fa-xl" style="color: #000000;"></i></Info>
            <Info v-if="place.plc_phone" :hasBorder="false" :info="place.plc_phone"><i class="fa-solid fa-phone fa-xl" style="color: #000000;"></i></Info>
            <Info v-if="place.plc_mail" :hasBorder="false" :info="place.plc_mail"><i class="fa-regular fa-envelope fa-xl" style="color: #000000;"></i></Info>
            <Info v-if="place.plc_webSite" :hasBorder="false" :info="place.plc_webSite"><i class="fa-solid fa-globe fa-xl" style="color: #000000;"></i></Info>
            <Info v-if="place.plc_ouvertureenclair" :hasBorder="false" :info="place.plc_ouvertureenclair"><i class="fa-regular fa-calendar fa-xl" style="color: #000000;"></i></Info>
            <Info :hasBorder="false" info="ouvert tous le temps"><i class="fa-regular fa-clock fa-xl" style="color: #000000;"></i></Info>
          </div>
        </div>
      </div>
      <PopUp v-model="comment" :onSubmit="onSubmit" :onClose="onClose" title="Ajouter un commentaire" type="textarea" placeholder="Donnez votre avis ..." :note="true"  v-if="showPopUp" />
      <div class="d-flex align-items-center ">
        <Button @click="handleShow">Ajouter un commentaire</Button>
        <Button @click="handleModify(id)">Suggérer une modification</Button>
      </div>
    </section>
    <section v-if="allComments.length > 0" class="section container d-flex flex-column gap-5 align-items-start">
      <Header level="2">Note moyenne : {{ rating }}</Header>
      <Header level="2">Avis de Nos Chers Clients : </Header>
      <div class="d-flex w-100 justify-content-between align-items-center">
        <i class="fa-solid fa-chevron-left fa-2xl"  @click="() => { if(startIndex > 0){ endIndex--; startIndex-- }}" :class="startIndex <= 0 ? 'disabled' : 'enabled'"></i>
        <div  v-if="commentsLoaded" class="d-flex w-100 gap-2 justify-content-center">
          <Comment v-for="comment in allComments.slice(startIndex, endIndex +1)" :key="comment" :comment="comment" />
          
        </div>
        <i class="fa-solid fa-chevron-right fa-2xl" @click="() => { if (endIndex < allComments.length - 1) { endIndex++; startIndex++ }}" :class="endIndex >= allComments.length - 1 ? 'disabled' : 'enabled'"></i>
      </div>
      
    </section>
    </div>
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
import { ref, watch } from 'vue'
import axios from 'axios'
import { parseString } from '@/utils/fonctions'

const props = defineProps(['auth'])
console.log(props.auth.user)
const showPopUp = ref(false)
const onClose = () => showPopUp.value = false
const handleShow = () => {
  showPopUp.value = true
  /*axios.post('/comment/add', {
    plc_id: place.value.id,
    user_id: 1,
    comm_rating: 5,
    comm_title: "",
    comm_text: "",
  }).then((response) => console.log(response.data)).catch((error) => console.log(error));*/ 
  //TODO 
}

const place = ref(null)
const placeLoaded = ref(false)
const url = ref('')
const comment = ref({})
const commentsLoaded = ref(false)
const rating = ref(-1)

const id = window.location.pathname.split('/')[2]

watch(comment,() => console.log('comment updated',comment.value))

axios.get('/comment/average/'+id)
.then((res) => {
  console.log(typeof res.data)
  rating.value = rating.value ? res.data.toFixed(2) : 0
})
.catch(err => console.log(err))

axios.get('/place/'+id).then((response) => {
  console.log(response.data)
  place.value = response.data

  place.value.plc_address = place.value.plc_address.replace(/'/g, '"')
  place.value.plc_address = JSON.parse(place.value.plc_address.substring(1,place.value.plc_address.length - 1))

  let contact = parseString(place.value.plc_contact)
  for(let i =0 ; i < contact.length ; i++){
    if(Object.keys(contact[i])[0] == 'Téléphone'){
      place.value.plc_phone = contact[i]['Téléphone']
    }else if (Object.keys(contact[i])[0] == 'Mél') {
      place.value.plc_mail = contact[i]['Mél']
    } else if (Object.keys(contact[i])[0] == 'Site web (URL)') {
      place.value.plc_webSite = contact[i]['Site web (URL)']
      console.log(contact[i]['Site web (URL)'])
    }
  }

  placeLoaded.value = true
}).catch((error) => console.log(error))

const  getComments = () => {
  axios.get('/comment/place/' + id).then((response) => {
    allComments.value = response.data
    commentsLoaded.value = true
  })
}

getComments();

const handleModify = (id) => window.location.href = '/comparePlace/' + id

const onSubmit = () => {
  console.log({
    ...comment.value,
    com_title: 'my comment',
    user_id: props.auth.user.id,
    user_pseudo: props.auth.user.pseudo,
    plc_id: id,
  })
  axios.post('/comment/add',{
    ...comment.value,
    com_title : 'my comment',
    user_id : props.auth.user.id,
    user_pseudo : props.auth.user.pseudo,
    plc_id : id,
  }).then(response => {
    getComments()
    location.reload()
  })
  
  .catch((error => console.log(error))).finally(() => {
    console.log('on finally')
    onClose()
  })}

const allComments = ref([])
const startIndex = ref(0)
const endIndex = ref(2)


</script>

<style>
.bg-img{
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