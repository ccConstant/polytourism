<template>
  <div>
    <Navigation :auth="auth" />
    <section class="section container d-flex flex-column gap-5">
        <Header :level="1">bienvenue admin</Header>
        <Table v-if="userLoaded" title="liste des utilisateurs" :onSearch="searchByName" :attr="usersAttributes" :data="users" :onEdit="onEditUser" :delete="onDeleteUser"></Table>
        <Table v-if="placesLoaded" title="liste des lieux" :onSearch="searchPlaceByName" :attr="placesAttributes" :data="places" :onEdit="onEditPlace" :delete="onDeletePlace">
            <Button><a href="/">ajouter un lieu</a></Button>
        </Table>
        <Table v-if="placesUpdatesLoaded" title="liste des lieux à valider" :onSearch="searchByName" :attr="placesAttributes" :data="placesUpdated" :accept="onAccept" :decline="onDecline"></Table>
    </section>
    <Footer />
  </div>
</template>

<script setup>
import Navigation from '@/Components/Navigation.vue'
import Header from '@/Components/Header.vue'
import Table from '@/Components/Table.vue'
import Button from '@/Components/Button.vue'
import Footer from '@/Components/Footer.vue'
import { ref } from 'vue'

const usersAttributes = ['id','name','email', 'pseudo', 'gender', 'role']

const placesAttributes = ['id', 'nom',  'adresse', 'contact', 'tarif']

const props = defineProps(['auth'])

if(props.auth.user.role != 'admin'){
    window.location.href = '/'
}

const places =ref([])
let placesLoaded = ref(false)
const placesUpdated = ref([])
let placesUpdatesLoaded = ref(false)


const users = ref([])
let userLoaded = ref(false)

function parseString(str) {
    try{
        return JSON.parse(str.replace(/'/g, '"').substring(1, str.length - 1))
    }catch(e){
        return ''
    }
}

//get users
axios.get('/users').then(response => {
    let data = response.data
    data.forEach(user => {
        delete user.email_verified_at
        delete user.created_at
        delete user.updated_at
    });
    users.value = data
    userLoaded.value = true

}).catch((error => console.log(error)))

//get places
axios.get('/place/all').then(response => {
    let data = response.data
    /*
    {
        "postalCode":"69003",
        "streetAddress":"129 rue Servient",
        "addressCountry":"FR",
        "addressLocality":"Lyon 3ème"
    }
    */ 
    data.forEach(place => {
        delete place.plc_illustrations
        delete place.plc_theme
        //console.log(place.plc_address)
        let adr = parseString(place.plc_address)
        place.plc_address = adr.streetAddress + ' ' + adr.addressLocality + ' ' + adr.postalCode + ' ' + adr.addressCountry
        let contact = parseString(place.plc_contact)[0]
        place.plc_contact = contact['Téléphone'] || contact['Mél'] || contact['Site web (URL)']
    });
    places.value = data
    placesLoaded.value = true

}).catch((error => console.log(error)))

//get places
axios.get('/placeUpdate/all').then(response => {
    let data = response.data
    console.log(data)
    placesUpdated.value = data
    placesUpdatesLoaded.value = true

}).catch((error => console.log(error)))

const searchByName = (data,input) => {
    return data.filter((elem) => {
        return elem.nom.toLowerCase().includes(input.toLowerCase())
    })
}

const searchPlaceByName = (data, input) => {
    return data.filter((elem) => {
        return elem.plc_nom.toLowerCase().includes(input.toLowerCase())
    })
}

const onEditUser = async (id,role) => {
    console.log('here in edit user',id)
    await axios.post('/users/setRoleToAdmin/'+id)
    .then(response => console.log(response))
    .catch(error => console.log(error))
    
}
const onDeleteUser = async (id, role) => {
    await axios.delete('/profile')
        .then(response => console.log(response))
        .catch(error => console.log(error))

}

const onEditPlace = async (id) => {
    location.href = '/comparePlace/'+id
}

const onDeletePlace = async (id) => {
    await axios.post('/place/delete/'+id)
        .then(response => console.log(response))
        .catch(error => console.log(error))
}

const onDelete = (data,id) => data.filter((elem) => elem.id !== id)
const onEdit = (data,id) => data
const onDecline = (data,id) => data.filter((elem) => elem.id !== id)
const onAccept = (data,id) => data.filter((elem) => elem.id !== id)
</script>

<style>
.searchBar{
    width: 300px;
}
.table{
    border-radius: 10px;
}
</style>