<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Input from '@/Components/Input.vue'
import Title from '@/Components/Title.vue'
import Error from '@/Components/Error.vue';
import Navigation from '@/Components/Navigation.vue';
import {schema} from '../../../formsValidators/connectUser'

import { ref } from 'vue';
import axios from 'axios'

const errorMessage = ref(null)
const form = ref({
    email: '',
    password: '',
});

const connectUser = async () => {
    const {error,value} = schema.validate(form.value)
    if(error){
        console.log(error)
        errorMessage.value = error.message
    }else{
       axios.post('login',{
            email:form.value.email,
            password:form.value.password,
        })
        .then(response =>{window.location.href = "/"})
        .catch(error => errorMessage.value = 'email ou mot de passe sont incorrects' );
    }
};

const onErrorClose = () => {
    errorMessage.value = null
}

</script>

<template>
    <Navigation />
    <GuestLayout>
        
        <Head title="Log in" />

        <Title title="Accès client" />

        <form @submit.prevent="connectUser" class="d-flex flex-column gap-3">
            <div>
                <Input  v-model="form.email"  title="adresse e-mail" type="email" placeholder="adresse e-mail" />
            </div>
            <div>
                <Input v-model="form.password"  title="votre mot de passe" type="password" placeholder="votre mot de passe" />
            </div>

            <Error v-if="errorMessage" :onErrorClose="onErrorClose" :message="errorMessage" />

            <div class="d-flex flex-column-reverse items-center justify-end mt-4">
                <p> <a class="link" href="forgot-password" > Mot de passe oublié ? </a></p>
                <p>
                    vous n'avez pas de compte ? 
                    
                    <a href="/register"><router-link class="link">Créez-en un</router-link></a>
        </p>

                <button class="btn btn-primary">se connecter</button>
            </div>
        </form>
    </GuestLayout>
</template>
