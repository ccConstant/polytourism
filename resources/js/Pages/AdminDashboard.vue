<template>
  <div>
    <Navigation />
    <section class="section container d-flex flex-column gap-5">
        <Header :level="1">bienvenue admin</Header>
        <Table title="liste des utilisateurs" :onSearch="searchByName" :attr="usersAttributes" :data="users" :delete="onDelete"></Table>
        <Table title="liste des lieux" :onSearch="searchByName" :attr="placesAttributes" :data="places" :delete="onDelete" :edit="onEdit">
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
const places = [
    {
        id: 1,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 2,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 3,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 4,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 5,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 6,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 7,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 8,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 9,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 10,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 11,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 12,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 13,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 14,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 15,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 16,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 17,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 18,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 19,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 20,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 21,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
    {
        id: 22,
        nom: 'nom',
        contact: 'otto',
        adresse: 'Lyon',
        tarif: '3.2'
    },
]
const users = ref([])

axios.get('/users').then(response => users.value=response.data).catch((error => console.log(error)))
console.log(users)

const searchByName = (data,input) => {
    return data.filter((elem) => {
        console.log(elem.nom,input)
        return elem.nom.includes(input)
    })
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