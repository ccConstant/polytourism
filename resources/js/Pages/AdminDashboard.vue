<template>
  <div>
    <Navigation :connected="true" />
    <section class="section container d-flex flex-column gap-5">
        <Header :level="1">bienvenue admin</Header>
        <Table v-if="userLoaded" title="liste des utilisateurs" :onSearch="searchByName" :attr="usersAttributes" :data="users" :onEdit="onEditUser" :delete="onDelete"></Table>
        <Table v-if="placesLoaded" title="liste des lieux" :onSearch="searchByName" :attr="placesAttributes" :data="places" :delete="onDelete" :edit="onEdit">
            <Button><a href="/">ajouter un lieu</a></Button>
        </Table>
        <Table title="liste des lieux à valider" :onSearch="searchByName" :attr="placesAttributes" :data="places" :accept="onAccept" :decline="onDecline"></Table>
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

const placesAttributes = ['id', 'nom', 'contact', 'adresse', 'tarif']

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
        place.plc_address = 'adresse'
    });
    places.value = data
    placesLoaded.value = true

}).catch((error => console.log(error)))

//get places
axios.get('/placeUpdate/all').then(response => {
    let data = response.data
    placesUpdated.value = data
    placesUpdatesLoaded.value = true

}).catch((error => console.log(error)))

const searchByName = (data,input) => {
    return data.filter((elem) => {
        return elem.nom.includes(input)
    })
}

const onEditUser = async (id,role) => {
    console.log(id)
    await axios.post('/users/setRoleToAdmin/'+id)
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