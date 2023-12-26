<template>
    <div class="flex flex-column align-items-center">
        <Navigation :connected="true" />
        <Header class="header" :level="1" >modifier le lieu</Header>

        <div v-if="data" class="container">
            <div class="left">

                <div v-for="prop in Object.keys(form)" :key="prop">
                    <i class="fa-solid fa-x" v-if="listViewed.indexOf(prop) == -1" @click="decline(prop)"></i>
                    <Input  v-model="form[prop]"  :title="obj[prop].title" :options="themes" :type="obj[prop].type" :placeholder="obj[prop].title" />
                </div> 
                
            </div>
            <div class="separator"></div>
            <div class="right">

                    <div v-for="prop in Object.keys(data)" :key="prop">
                        <i class="fa-solid fa-check" v-if="listViewed.indexOf(prop) == -1" @click="accept(prop)"></i>
                        <Input :disabled="true" v-model="data[prop]"  :title="obj[prop].title"  :options="themes" :type="obj[prop].type" :placeholder="obj[prop].title" />
                    </div> 

            </div>
        </div>
        <Error v-if="errorMessage" :onErrorClose="onErrorClose" :message="errorMessage" />
        <Button class="my-4" @click="validate">Valider</Button>
    </div>
</template>

<script setup>
import Navigation from '@/Components/Navigation.vue'
import Header from '@/Components/Header.vue'
import Input from '@/Components/Input.vue'
import Button from '@/Components/Button.vue'
import Error from '@/Components/Error.vue'

import { ref } from 'vue'
import {schema} from '@/../formsValidators/updatePlace'
import axios from 'axios'

const data = ref(null)
const themes = ref([])
const errorMessage = ref(null)
const form  = ref({
    plc_nom : '',
    plc_theme : '',
    plc_address : '',
    plc_descrcourtfr : '',
    plc_descrdetailfr : '' ,
    plc_tarifsenclair  : 0,
    tel : '',
    email : ''
})
let place = {}
const obj = {
    plc_nom: {title : 'Intitulé',type: 'text'},
    plc_theme: {title : 'Thèmes',type: 'select'},
    plc_address: {title : 'Adresse',type: 'text'},
    plc_tarifsenclair: {title : 'Tarif',type: 'number'},
    plc_descrcourtfr: {title : 'Description courte',type: 'textarea'},
    plc_descrdetailfr: {title : 'Description détaillée',type: 'textarea'},
    tel: {title : 'Numéro de téléphone',type: 'text'},
    email: {title : 'Adresse mail',type: 'text'}
}
const listViewed = ref([])

const id = window.location.pathname.split('/')[2]

function parseString(str){
    return JSON.parse(str.replace(/'/g, '"').substring(1, str.length - 1))
}
const onErrorClose = () => {
    errorMessage.value = null
}
function decline(str){
    listViewed.value.push(str)
}
function accept(str){
    form.value[str] =  data.value[str]
    listViewed.value.push(str)
}

function validate(){

    const { error, value } = schema.validate(form.value)
    if (error) {
        console.log(error)
        errorMessage.value = error.message
    }else{
        console.log({
            ...place,
            ...form.value,
            plc_validated : true
        })
        axios.post('/place/update/'+id,{
            ...place,
            ...form.value,
            plc_validated : true
        })
        .then((resp) => {
            console.log(resp)
            window.location.href = '/listPlaces'
        })
        .catch((err) => console.log(err))
    }

}

axios.get('/place/themes')
.then(res => themes.value = res.data)

axios.get('/place/'+id)
.then((response) => {
    let resp = response.data
    place = response.data
    resp.plc_address = parseString(resp.plc_address)
    resp.plc_contact = parseString(resp.plc_contact)
    resp.plc_theme = (parseString(resp.plc_theme))[0]
    console.log(resp.plc_theme)
    for(let i = 0 ; i < resp.plc_contact.length ; i++){
        if(resp.plc_contact[i]['Téléphone']){
            resp.tel = resp.plc_contact[i]['Téléphone']
        }else if(resp.plc_contact[i]['Mél']){
            resp.email = resp.plc_contact[i]['Mél']
        }
    }

    resp.plc_address = `${resp.plc_address.streetAddress} ${resp.plc_address.addressLocality} ${resp.plc_address.postalCode} ${resp.plc_address.addressCountry}`
    delete resp.plc_contact
    delete resp.plc_ouvertureenclair
    delete resp.plc_modepaiement
    delete resp.plc_rating
    delete resp.plc_illustrations

    console.log(resp)
    data.value = resp
})
.catch((error) => console.log(error))



</script>

<style scoped>
.container{
    display : flex;
    gap: 30px;
}
.container div{
    flex-grow: 1;
    position: relative;
}

.container div i{
    position: absolute;
    color: white;
    padding: 5px;
    border-radius: 4px;
    cursor: pointer;
    width: 25px;
    height: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 2;
}
.container .right i{
    left: -30px;
    transform: translate(-50%,+50%);
    background: rgb(3, 97, 3);
    
}

.container .left i{
    right: -32px;
    transform: translate(50%,150%);
    background: rgb(211, 10, 10);
}

.container .right i:hover{
    background: green;
}
.container .left i:hover{
    background: red;
}

.header{
    margin: 100px 0 50px 0;
}
.separator{
    background: black;
    display: inline-block;
    flex-shrink: 1;
    max-width: 2px;
}
</style>