<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Input from '@/Components/Input.vue'
import Title from '@/Components/Title.vue'
import {schema} from '../../../formsValidators/connectUser'

import { ref } from 'vue';


const form = ref({
    email: '',
    password: '',
});

const connectUser = () => {
    const {error,value} = schema.validate(form.value)
    if(error){
        console.log(error)
    }else{
        console.log('test passed')
    }
};
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

                <button class="btn">se connecter</button>
            </div>
        </form>
    </GuestLayout>
</template>
