<script setup>
import {schema} from '../../../formsValidators/createUser'
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Input from '@/Components/Input.vue'
import Title from '@/Components/Title.vue'
import { ref } from 'vue';

const form = ref({
    name: '',
    email: '',
    country : '',
    birth_date : '',
    gender : '',
    password: '',
    password_confirmation: '',
});
// à changer
const countries = [
    'Abkhazie',
'Afghanistan',
'Fidji',
'Finlande',
'France',
'Gabon',
'Gambie',
'Géorgie',
'Ghana',
'Grenade(pays)',
'Grèce',
'Guatemala',
'Guinée',
'Guinée équatoriale',
'Guinée - Bissau',
'Guyana',
'Haïti',
'Honduras',
'Hongrie',
'Îles Cook',
'Inde',
'Indonésie',
'Irak',
'Iran',
'République d\'Irlande',
'Islande,',
]

const submit = () => {
    console.log(form.value)
    const {error,value} = schema.validate(form.value)
    if(error){
        console.log(error)
    }else{
        console.log('Test passed')
    }

};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
        
        <Title title="Créer un nouveau compte" />

        <form @submit.prevent="submit" class="d-flex flex-column gap-3">
            <div>
                <Input  v-model="form.name" title="Nom complet" type="text" placeholder="nom complet" hint="Votre nom doit contenir au moins 5 caractères" />
            </div>
            <div>
                <Input v-model="form.email"  title="Adresse e-mail" type="email" placeholder="adresse e-mail" hint="Exemple : nom@example.com" />
            </div>
            <div>
                <Input v-model="form.country"  title="Pays" type="select" :options="countries" placeholder="-- Pays --" hint="Choississez votre pays" />
            </div>
            <div>
                <Input v-model="form.birth_date"  title="Date de naissance" type="date" hint="Saisir votre date de naissance" />
            </div>
            <div>
                <Input v-model="form.gender"  title="Sexe" type="select" :options="['Homme','Femme','Autre']" placeholder="Sexe" hint="Choisir votre sexe" />
            </div>
            <div>
                <Input v-model="form.password"  title="mot de passe" type="password" placeholder="mot de passe" hint="Votre mot de passe doit contenir au moins 8 caractères dont une majuscule, une minuscule et un caractère spécial" />
            </div>
            <div>
                <Input v-model="form.password_confirmation"  title="confirmer votre mot de passe" type="password" placeholder="confirmer votre mot de passe" hint="Les deux mots de passe doivent être identiques" />
            </div>

            

            <div class="flex flex-column-reverse items-center justify-end mt-4">
                <p
                    :href="route('login')"
                    
                >
                    vous avez déjà un compte ? 
                    <router-link class="link">connectez-vous</router-link>
            </p>

                <button class="btn" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Créer votre compte
                </button>
            </div>
        </form>
    </GuestLayout>
</template>
