<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Input from '@/Components/Input.vue'
import Title from '@/Components/Title.vue'
import Error from '@/Components/Error.vue';
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
        const response = await axios.post('/login',value)
        console.log(response)
    }
};

const onErrorClose = () => {
    errorMessage.value = null
}

</script>

<template>
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
                <p
                    class="link"
                >
                    mot de passe oublié ?
            </p>
                <p
                    :href="route('password.request')"
                >
                    vous n'avez pas de compte ? <router-link class="link">créez-en un</router-link>
        </p>

                <button class="btn btn-primary">se connecter</button>
            </div>
        </form>
    </GuestLayout>
</template>
