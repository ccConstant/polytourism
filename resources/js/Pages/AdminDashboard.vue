<template>
  <div>
    <Navigation :auth="auth" />
    <section class="section container d-flex flex-column gap-5">
        <Header :level="1">bienvenue admin</Header>
        <Table v-if="userLoaded" title="liste des utilisateurs" :onSearch="searchByName" :attr="usersAttributes" :data="users" :onEdit="onEditUser" :delete="onDeleteUser"></Table>
        <Table v-if="placesLoaded" title="liste des lieux" :onSearch="searchPlaceByName" :attr="placesAttributes" :data="places" :onEdit="onEditPlace" :delete="onDeletePlace">
            <Button><a href="/newPlace">ajouter un lieu</a></Button>
        </Table>
        <Table v-if="placesUpdatesLoaded" title="liste des lieux à valider" :onSearch="searchByName" :attr="placesUpdtAttributes" :data="placesUpdated" :accept="onAccept" :decline="onDecline"></Table>
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
import { parseString } from '@/utils/fonctions'

const usersAttributes = ['id','name','email', 'pseudo', 'gender', 'role']

const placesAttributes = ['id', 'nom',  'adresse', 'tarif', 'contact']
const placesUpdtAttributes = ['id', 'nom',  'adresse', 'contact', 'tarif']

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
    console.log('data is loaded')
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
        delete place.plc_rating
        //console.log(place.plc_address)
        let adr = parseString(place.plc_address)
        place.plc_address = adr.streetAddress + ' ' + adr.addressLocality + ' ' + adr.postalCode + ' ' + adr.addressCountry
        let contact = parseString(place.plc_contact)[0]
        try{
            place.plc_contact = contact['Téléphone'] || contact['Mél'] || contact['Site web (URL)']
        }catch(e){
            console.log(place)
            console.log(parseString(place.plc_contact))
            console.log(e)
        }
        
    });
    places.value = data
    placesLoaded.value = true

}).catch((error => console.log(error)))

//get places
axios.get('/placeUpdate/all').then(response => {
    let data = response.data
    console.log(data)
    data.forEach(place => {
        delete place.plcUpdt_theme;
        delete place.plcUpdt_descrcourtfr;
        delete place.plcUpdt_descrdetailfr;
        delete place.plcUpdt_ouvertureenclair;
        delete place.plc_id;
        delete place.plcUpdt_illustrations;
        delete place.plcUpdt_validated;
        delete place.updated_at;
        delete place.created_at;

        place.plcUpdt_address = JSON.parse(place.plcUpdt_address)
        place.plcUpdt_address = place.plcUpdt_address.streetAddress

        place.plcUpdt_contact = JSON.parse(place.plcUpdt_contact)
        place.plcUpdt_contact = `tel : ${place.plcUpdt_contact[0]['Téléphone']}, mél : ${place.plcUpdt_contact[1]['Mél']}`
    })
    //ID	NOM	ADRESSE	TARIF	CONTACT
    
    placesUpdated.value = data
    console.log(data)
    placesUpdatesLoaded.value = true

}).catch((error => console.log(error)))

const searchByName = (data,input) => {
    console.log('data : ',data)
    return data.filter((elem) => {
        return elem.name.toLowerCase().includes(input.toLowerCase())
    })
}

const searchPlaceByName = (data, input) => {
    return data.filter((elem) => {
        return elem.plc_nom.toLowerCase().includes(input.toLowerCase())
    })
}

const onEditUser = async (id,role) => {
    let url = ''
    if(role == 'admin')
        url = 'setRoleToAdmin'
    else if (role == 'utilisateur')
        url = 'setRoleToUser'
    await axios.post('/users/'+url+'/'+id)
    .then(response => console.log(response))
    .catch(error => console.log(error))
    location.reload()
}
const onDeleteUser = async (id) => {
    
    await axios.post('/users/delete/'+id)
        .then(response => console.log(response))
        .catch(error => console.log(error))
    location.reload()
}

const onEditPlace = async (id) => {
    location.href = '/comparePlace/'+id
}

const onDeletePlace = async (id) => {

    await axios.post('/place/delete/'+id)
        .then(response => console.log(response))
        .catch(error => console.log(error))
    location.reload()
}

const onDecline = async (id) => {
    ///placeUpdate/validate/
    await axios.post('/placeUpdate/validate/' + id)
        .then(response => console.log(response))
        .catch(error => console.log(error))
    location.reload();
}
const onAccept = async (id) => {
    await axios.post('/placeUpdate/delete/' + id)
        .then(response => console.log(response))
        .catch(error => console.log(error))
    location.reload();
}

</script>

<style>
.searchBar{
    width: 300px;
}
.table{
    border-radius: 10px;
}
</style>