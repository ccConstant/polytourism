<template>
    <div>
        <Navigation />
        <section class="section container">
            <Header :level="2">mon compte</Header>
            <div class="d-flex flex-wrap fluid gap-5 ">
                <div class="d-flex align-items-center gap-5 w-[500px]" v-for="key in Object.keys(object)" :key="key">
                    <Input class="input" :title="key" v-model="object[key]" :disabled="true" />
                    <i @click="() => onClick(key)" class="fa-solid fa-pencil fa-lg" style="color: #000000;"></i>
                </div>
            </div>
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
import Footer from '@/Components/Footer.vue'
import { ref } from 'vue'

const showPopUp = ref(false)
const modifierField = ref('')
const input = ref('')
const onClose = () => showPopUp.value = false
const onSubmit = () => {
    console.log(modifierField.value)
    console.log(input.value)
    object.value[modifierField.value] = input.value
    onClose()
    console.log(object.value)
}
const onClick = (field) => {
    showPopUp.value = true
    modifierField.value = field
}

const object = ref({
    nom : 'myName',
    email : 'myName@gmail.fr',
    adresse : '11 rue de la liberté',
    tel : '06.06.06.06',
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