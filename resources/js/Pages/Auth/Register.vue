<script setup>
import {schema} from '../../../formsValidators/createUser'
import GuestLayout from '@/Layouts/GuestLayout.vue';
import Input from '@/Components/Input.vue'
import Title from '@/Components/Title.vue'
import Error from '@/Components/Error.vue'
import Navigation from '@/Components/Navigation.vue';
import { ref } from 'vue';
import axios from 'axios';

const form = ref({
    name: '',
    email: '',
    country : '',
    birth_date : '',
    pseudo : '',
    gender : '',
    password: '',
    password_confirmation: '',
});

const errorMessage = ref(null)

// à changer
const countries = [
'Abkhazie',
'Afghanistan',
'Afrique du Sud',
'Albanie',
'Algérie',
'Allemagne',
'Andorre',
'Angola',
'Antigua - et - Barbuda',
'Arabie saoudite',
'Argentine',
'Arménie',
'Australie',
'Autriche',
'Azerbaïdjan',
'Bahamas',
'Bahreïn',
'Bangladesh',
'Barbade',
'Belgique',
'Belize',
'Bénin',
'Bhoutan',
'Birmanie',
'Biélorussiea',
'Bolivie',
'Bosnie - Herzégovine',
'Botswana',
'Brunei',
'Brésil',
'Bulgarie',
'Burkina Faso',
'Burundi',
'Cambodge',
'Cameroun',
'Canada',
'Cap - Vert',
'Chili',
'Chine',
'Chypre(pays)',
'Chypre du Nord',
'Colombie',
'Comores(pays)',
'République du Congo',
'République démocratique du Congo',
'Corée du Nord',
'Corée du Sud',
'Costa Rica',
'Côte d Ivoire',
'Croatie',
'Cuba',
'Danemark',
'Djibouti',
'Dominique(pays)',
'Égypte',
'Émirats arabes unis',
'Équateur(pays)',
'Érythrée',
'Espagne',
'Estonie',
'Eswatini',
'États - Unis',
'Éthiopie',
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
'République d Irlande',
'Islande',
'Israël',
'Italie',
'Jamaïque',
'Japon',
'Jordanie',
'Kazakhstan',
'Kenya',
'Kirghizistan',
'Kiribati',
'Kosovo',
'Koweït',
'Laos',
'Lesotho',
'Lettonie',
'Liban',
'Liberia',
'Libye',
'Liechtenstein',
'Lituanie',
'Luxembourg(pays)',
'Macédoine du Nord',
'Madagascar',
'Malaisie',
'Malawi',
'Maldives',
'Mali',
'Malte',
'Maroc',
'Maurice(pays)',
'Mauritanie',
'Mexique',
'Micronésie(pays)',
'Moldavie',
'Monaco',
'Mongolie',
'Monténégro',
'Mozambique',
'Namibie',
'Nauru',
'Népal',
'Nicaragua',
'Niger',
'Nigeria',
'Niué',
'Norvège',
'Nouvelle - Zélande',
'Oman',
'Ossétie du Sud - Alanie',
'Ouganda',
'Ouzbékistan',
'Pakistan',
'Palaos',
'Palestine(État)',
'Panama',
'Papouasie - Nouvelle - Guinée',
'Paraguay',
'Pays - Bas',
'Pérou',
'Pologne',
'Porto Rico',
'Portugal',
'Qatar',
'République centrafricaine',
'République dominicaine',
'Roumanie',
'Royaume - Uni',
'Russie',
'Rwanda',
'République tchèque',
'Sahara occidental',
'Saint - Christophe - et - Niévès',
'Saint - Marin',
'Saint - Vincent - et - les Grenadines',
'Sainte - Lucie',
'Îles Salomon',
'Salvador',
'Samoa',
'São Tomé - et - Principe',
'Sénégal',
'Serbie',
'Seychelles',
'Sierra Leone',
'Singapour',
'Slovaquie',
'Slovénie',
'Somalie',
'Soudan',
'Soudan du Sud',
'Sri Lanka',
'Suisse',
'Suriname',
'Suède',
'Syrie',
'Tadjikistan',
'Taïwan',
'Tanzanie',
'Tchad',
'Thaïlande',
'Timor oriental',
'Togo',
'Tonga',
'Transnistrie',
'Trinité - et - Tobago',
'Tunisie',
'Turkménistan',
'Turquie',
'Tuvalu',
'Ukraine',
'Uruguay',
'Vanuatu',
'Vatican',
'Venezuela',
'Viêt Nam',
'Yémen',
'Zambie',
'Zimbabwe'
]

const submit = async () => {
    console.log(form.value)
    const {error,value} = schema.validate(form.value)
    if(error){
        console.log(error.message)
        errorMessage.value = error.message
    }else{
        /*INSERT INTO`users`(`id`, `name`, `email`, `gender`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
         VALUES('1', 'abdelhak', 'abdelhak@email.com', 'Man', '2023-11-01 21:25:25', 'abdelhak', 'scsq', '2023-11-01 21:25:25', '2023-11-01 21:25:25');*/
        axios.post('register',{
                name:form.value.name,
                email:form.value.email,
                gender:form.value.gender,
                pseudo:form.value.pseudo,
                password:form.value.password,
                password_confirmation:form.value.password_confirmation,
            })
            .then(response =>{
                console.log("accepted")
                localStorage.setItem('user',response.data)
                console.log(response)
                window.location.href = "/"
            })
            .catch(error => {
                errorMessage.value = 'Une erreur s\'est produite'
                console.log(error)
            });
       // console.log(response)
    }    
};
const onErrorClose = () => {
    errorMessage.value = null
}
</script>

<template>
    <Navigation />
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
                <Input v-model="form.pseudo"  title="Pseudo" type="text" placeholder="Pseudo" hint="Exemple : Pseudo utilisé pour saisir des commentaires" />
            </div>
            <div>
                <Input v-model="form.country"  title="Pays" type="select" :labels="countries" :options="countries" placeholder="-- Pays --" hint="Choississez votre pays" />
            </div>
            <div>
                <Input v-model="form.birth_date"  title="Date de naissance" type="date" hint="Saisir votre date de naissance" />
            </div>
            <div>
                <Input v-model="form.gender"  title="Sexe" type="select" :labels="['Homme','Femme','Autre']" :options="['Man','Woman','Other']" placeholder="Genre" hint="Choisir votre sexe" />
            </div>
            <div>
                <Input v-model="form.password"  title="mot de passe" type="password" placeholder="mot de passe" hint="Votre mot de passe doit contenir au moins 8 caractères dont une majuscule, une minuscule et un caractère spécial" />
            </div>
            <div>
                <Input v-model="form.password_confirmation"  title="confirmer votre mot de passe" type="password" placeholder="confirmer votre mot de passe" hint="Les deux mots de passe doivent être identiques" />
            </div>

            <Error v-if="errorMessage" :onErrorClose="onErrorClose" :message="errorMessage" />

            <div class="flex flex-column-reverse items-center justify-end mt-4">
                <p
                    :href="route('login')"
                    
                >
                    vous avez déjà un compte ? 
                    <router-link class="link">connectez-vous</router-link>
            </p>

                <button class="btn btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Créer votre compte
                </button>
            </div>
        </form>
    </GuestLayout>
</template>
