<template>
    <div>
        <Navigation :connected="props.auth.user" />
        <section class="section container d-flex flex-column align-items-center gap-5">
            <Header :level="2">mon compte</Header>
            <div class="d-flex w-full flex-wrap fluid my-20 justify-space-between gap-5">
                <div class="d-flex align-items-center gap-5 w-[500px]" v-for="key in Object.keys(object)" :key="key">
                    <Input class="input" :title="key" v-model="object[key]" :disabled="true" />
                    <i @click="() => onClick(key)" class="fa-solid fa-pencil fa-lg" style="color: #000000;"></i>
                </div>
            </div>
            <Button @click="deleteUser" buttonType="danger">Supprimer votre compte</Button>
            <PopUp  :onClose="onClose" :onSubmit="onSubmit" title="Modifier vos informations" v-model="input" type="text" placeholder="Saisir la nouvelle valeur" v-if="showPopUp"  />
        </section>
        <Footer />
    </div>
</template>

<script setup>
import Navigation from '@/Components/Navigation.vue'
import Header from '@/Components/Header.vue'
import Input from '@/Components/Input.vue'
import PopUp from '@/Components/PopUp.vue'
import Button from '@/Components/Button.vue'
import Footer from '@/Components/Footer.vue'
import { ref } from 'vue'
import axios from 'axios'

const props = defineProps(['auth'])
console.log(props.auth.user.email)

const showPopUp = ref(false)
const modifierField = ref('')
let isDeleting = false;
const input = ref('')
const onClose = () => showPopUp.value = false
const onSubmit = () => {
    object.value[modifierField.value] = input.value
    axios.patch('profile',{
        ...props.auth.user,
        name : object.value.nom,
        email : object.value.email,
    }).then((response) => console.log(response))
    .catch((error) => console.log(error))
    onClose()
}
const onClick = (field) => {
    showPopUp.value = true
    modifierField.value = field
}

const deleteUser = () => {
    /*axios.delete('profile')
    .then((response) => console.log(response))
    .catch((error) => console.log(error))*/
    // pour supprimer son compte il faut saisir son mot de passe est ce qu'on peut contorner ça ? 
}
const password = ref('')
const object = ref({
    nom : props.auth.user.name,
    email : props.auth.user.email,
})



</script>

<style>
.fluid{
    justify-content: space-between;
}
@media screen and (max-width: 576px) {
    .fluid{
    justify-content: center;
}
}
.input{
    width: 100%;
    font-size: 36px;
}
.input input{
    font-size: 30px;
}
</style>