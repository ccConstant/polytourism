
<template>
    <div id="NewPlace">
    <Navigation :auth="auth" />
    <br><br><br><br><br><br><br>
    
    <Header class="center"  :level="2" fw-bold>Ajouter un nouveau lieu</Header>
    <div id="image">
    <img src="https://www.tictactrip.eu/blog/wp-content/uploads/2020/11/Couverture-Lyon-1160x652.png" class="u-fit u-res w-100" alt="">
    </div >
    <p id="instructions">N’hésitez pas à <span class="fw-bold"> nous suggérer </span> des nouveau lieux pour les proposer aux touristes</p><br><br>
    
    
    
      
    <div class="div d-flex align-items-center container  gap-5 section ">
        <Input class="flexcontainer" v-model="form.plc_nom" title="Intitulé" placeholder="Intitulé"  />
        <Input class="flexcontainer" v-model="form.plc_theme" type="select" title="Thèmes" placeholder="--Choisissez les thèmes--" :labels="themes"  :options="themes"/> 
    </div>   <br>
    <div class="div d-flex align-items-center container gap-5 section ">
        <Input class="flexcontainer" v-model="form.plc_address.streetAddress" title="Adresse" placeholder="Adresse"  />
        <Input class="flexcontainer" v-model="form.plc_tarifsenclair" title="Tarif" placeholder="Indiquez le tarif de service"  />
    </div>   <br>
    <div class="div d-flex align-items-center container gap-5 section ">
        <Input class="flexShortDesc" v-model="form.plc_descrcourtfr" title="Description courte" placeholder="Description courte"  />
    </div><br>
    <div class="div d-flex align-items-center container gap-5 section ">    
        <Input class="flexDetaiDesc" v-model="form.plc_descrdetailfr" type="textarea" title="Description détaillée" placeholder="Description détaillée ... "  />
    </div>  <br>
    <div class="div d-flex align-items-center container gap-5 section ">
        <Input class="flexcontainer" v-model="form.plc_contact[0]['Téléphone']" title="Numéro de téléphone" placeholder="+33"  />
        <Input  class="flexcontainer" v-model="form.plc_contact[1]['Mél']" title="Adresse mail" placeholder="@"  />
    </div>  <br>
    <div class="div d-flex align-items-center container gap-5 section ">
        <Input class="flexcontainer"  title="Lien externe" placeholder="https://"  />
        <div class="d-flex flex-column flex-wrap gap-3">
            <label>Jours d'ouverture</label>
            <div class="d-flex flex-wrap gap-3">
                <div v-for="day in days" :key="day" class="d-flex gap-2 align-items-center">
                    
                    <input type="checkbox" :value="day" :id="day"/>
                    <label :for="day">{{ day }}</label>
                </div>
            </div>
        </div>
    </div> <br>


    <div class="div d-flex align-items-center container gap-5 section ">
        <p>Début de service :</p>
        <input type="time" class="element" v-model="hourOfStart" title="Début de service" id="appt" name="appt" min="09:00" max="18:00" required />
      
        <p>Fin de service :</p>
        <input type="time" class="element" :disabled="!hourOfStart" v-model="hourOfend" title="Fin de service" id="appt" name="appt" :min="hourOfStart" max="18:00" required />
    </div> <br>
    
    <div class="div d-flex align-items-center container gap-5 section ">
        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com --> 
</div>
<Error v-if="errorMessage" :onErrorClose="onErrorClose" :message="errorMessage" />
      
    
<br/>
<br/>
<br/>
<br/>


    


    <div id="instructions">

        <h1> Instructions </h1><br><br><br>

     <p> Merci de contribuer à notre communauté en partageant vos connaissances sur les lieux touristiques de Lyon. Pour ajouter un nouveau lieu, suivez ces étapes simples : </p> <br><br>

     <p >
<span class="fw-bold"> 1. Intitulé de lieu touristique</span> : Indiquez le nom complet du lieu touristique que vous souhaitez ajouter. <br><br>
<span class="fw-bold"> 2. Thémes</span> : Choisissez les thémes qui correspondent le mieux au lieu touristique que vous souhaitez ajouter, par exemple : musée, parc, restaurant, monument, etc.<br><br>
<span class="fw-bold"> 3. Type </span>:  Précisez le type du lieu, comme restauration,hotellerie,patrimoine culturel,commerce et service, etc.<br><br>
<span class="fw-bold"> 4. Adresse</span> :  Indiquez l'adresse complète du lieu touristique, y compris le code postal, pour que les visiteurs puissent facilement le trouver.<br><br>
<span class="fw-bold"> 5. Description Courte </span>: Fournissez une brève description du lieu en quelques phrases. Cela peut inclure des points forts, des caractéristiques uniques, ou des informations attractives.<br><br>
<span class="fw-bold"> 6. Description Longue </span>: Décrivez plus en détail le lieu touristique, ses attractions, son histoire, et toute information que vous jugez importante pour les visiteurs.<br><br>
<span class="fw-bold"> 7. Numéro de Téléphone </span>: Veuillez fournir  un numéro de contact.<br><br>
<span class="fw-bold"> 8. Adresse E-mail </span>: Incluez une adresse e-mail de contact.<br><br>
<span class="fw-bold"> 9. Lien Externe </span>: Si le lieu a un site web ou une page de réseaux sociaux que vous souhaitez partager, ajoutez le lien externe.<br><br>
<span class="fw-bold"> 10. Jours d'Ouverture </span>: Indiquez les jours de la semaine où le lieu est ouvert au public.<br><br>
<span class="fw-bold"> 11. Heures de Service </span>: Précisez les heures d'ouverture et de fermeture habituelles du lieu touristique.<br><br>
<span class="fw-bold"> 12. Tarif </span>: Si le lieu a un coût d'entrée, veuillez l'indiquer ici.<br><br>
<span class="fw-bold"> 13. Ajout des Images</span> : Téléchargez des images du lieu touristique pour aider les visiteurs à le visualiser. Vous pouvez télécharger plusieurs images pour donner une vue complète.<br><br></p>

<div class="fw-bold">
<p>Assurez-vous de fournir des informations précises et complètes pour aider les futurs visiteurs à Lyon à découvrir de nouveaux lieux passionnants. Votre contribution est précieuse pour notre communauté !</p><br>

<p>Après avoir soumis les détails, notre équipe examinera votre suggestion avant de la publier sur le site. Nous nous réservons le droit de modifier ou de rejeter les contributions qui ne respectent pas nos directives.</p><br>

<p>Merci de partager vos découvertes avec nous et de contribuer à rendre le voyage à Lyon encore plus mémorable pour tous.</p><br><br><br>

</div>

    <div class="d-flex justify-content-center">
        <Button @click="addPlace">Suggérez le lieu</Button>
    </div>
</div>

</div>
<Footer />
</template>



<script setup>
import Header from '@/Components/Header.vue'
import Button from '@/Components/Button.vue'
import Footer from '@/Components/Footer.vue'
import Navigation from '@/Components/Navigation.vue'
import Input from '@/Components/Input.vue'
import Error from '@/Components/Error.vue'
import {schema} from '../../formsValidators/addPlace.js'
import { ref } from 'vue'
import axios from 'axios'

const errorMessage = ref(null)
const props = defineProps(['auth'])

/**
 * "{'postalCode': '69003', 'streetAddress': '129 rue Servient', 'addressCountry': 'FR', 'addressLocality': 'Lyon 3ème'}"
 */

const form = ref({
    'plc_nom' : '',
    'plc_theme' : '',
    'plc_address' : {
        'postalCode' : '',
        'streetAddress' : '',
        'addressCountry' : 'FR',
        'addressLocality' : ''
    },
    'plc_descrcourtfr': '',
    'plc_descrdetailfr' : '',
    'plc_contact' : [{
        'Téléphone': ''
    },
    {
        'Mél' : ''
    }
    ],

    'plc_ouvertureenclair': null,
    'plc_tarifsenclair': '',
    'plc_illustrations' : null,
    'plc_validated' : false,
})

const days = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];

const hourOfStart = ref(null)
const hourOfend = ref(null)

const themes = ref([])
axios.get('/place/themes').then((res) => themes.value = res.data).catch((err) => console.log(err))

function onFileChange(e) {
    console.log('file updated')
    console.log(e)
    var files = e.target.files || e.dataTransfer.files;
    if (!files.length)
        return;
    form.value.plc_illustrations = files[0]
    console.log(form.value)
}

const addPlace = () => {
    form.value.plc_ouvertureenclair = `de ${hourOfStart.value} à ${hourOfend.value}`
    form.value.plc_theme = JSON.stringify([form.value.plc_theme]);
    
    console.log(form.value)
    const { error, value } = schema.validate(form.value)
    if (error) {
        console.log(error.message)
        errorMessage.value = error.message
    } else {
        form.value.plc_contact = JSON.stringify(form.value.plc_contact);
        form.value.plc_address = JSON.stringify(form.value.plc_address);
        console.log(form.value)
        axios.post('/placeUpdate/add',form.value)
            .then((response) => {
                location.href = '/listPLaces';
                console.log(response)
            })
            .catch((error) => console.log(error))
}}
/**
 * SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`polytourism`.`place_updates`, CONSTRAINT `place_updates_plc_id_foreign` FOREIGN KEY (`plc_id`) REFERENCES `places` (`id`) ON DELETE CASCADE) (Connection: mysql, SQL: insert into `place_updates` (`plcUpdt_nom`, `plcUpdt_theme`, `plcUpdt_address`, `plcUpdt_descrcourtfr`, `plcUpdt_descrdetailfr`, `plcUpdt_contact`, `plcUpdt_ouvertureenclair`, `plcUpdt_tarifsenclair`, `plc_id`, `updated_at`, `created_at`) values (La Tour de la Part-Dieu, ["Patrimoine - Unesco"], {"postalCode":"","streetAddress":"7 rue Pailleron Lyon 4ème 69004 FR","addressCountry":"FR","addressLocality":""}, Plongez dans l'harmonie naturelle du Jardin Étoilé, un lieu où la magie de la nature se mêle à l'art et à l'exploration céleste. Découvrez des jardins luxuriants, des sculptures inspirantes, et des soirées étoilées enchanteuses., La Tour de la Part-DieuLa Tour de la Part-DieuLa Tour de la Part-DieuLa Tour de la Part-DieuLa Tour de la Part-DieuLa Tour de la Part-Dieu, [{"Téléphone":"0478291493"},{"Mél":"substrat@abcdugout.com"}], de 21:36 à 22:36, 10, 6, 2024-01-14 20:36:21, 2024-01-14 20:36:21))
 */

/**
 * SQLSTATE[23000]: Integrity constraint violation: 4025 CONSTRAINT `place_updates.plcUpdt_address` failed for `polytourism`.`place_updates` 
 * (Connection: mysql, SQL: insert into `place_updates` 
 * (`plcUpdt_nom`, `plcUpdt_theme`, `plcUpdt_address`, `plcUpdt_descrcourtfr`, `plcUpdt_descrdetailfr`, `plcUpdt_contact`, `plcUpdt_ouvertureenclair`, `plcUpdt_tarifsenclair`, `plc_id`, `updated_at`, `created_at`) 
 * values
 *  (test, ["Patrimoine - Unesco"], "{"postalCode":"","streetAddress":"7 rue Pailleron Lyon 4ème 69004 FR","addressCountry":"FR","addressLocality":""}", testtesttesttesttesttesttest, test desc, "[{"Téléphone":"0478291493"},{"Mél":"substrat@abcdugout.com"}]", de 21:32 à 00:32, 10, 6, 2024-01-14 20:32:19, 2024-01-14 20:32:19))
 */
const onErrorClose = () => {
    errorMessage.value = null
}


</script>



<style lang="css">
@media screen and (max-width : 800px) {
    .div{
        flex-direction: column;
    }
    .div > div,.div > input{
        width: 100%;
    }
}
.yellow{

    color: rgb(255, 255, 0);
}

.empty-star{
    color: #e5e0e0;
    
}
h1{
    text-align:center;
    font-size:40px;
    font-weight: bold;
}
.element{
    border-radius:10px;
    border-style: gray;
    height:auto;
    border-color:black;
}
#welcome{
    margin-top: 40px;
    margin-left: 60px;
    margin-right: 60px;
    margin-bottom:40px;
    text-align: justify;
    
}
#Discover{
    margin-top: 40px;
}

#NewPlace{
    margin-left: 80px;
    margin-right: 80px;
}

#instructions{
    margin-bottom: 20px;
    
    font-size: 20px ;
    text-align:justify;
    
    

}

#image{
   
    margin-top: 50px;
    margin-bottom: 30px;
}


.flexcontainer{
    width: 50%;
}

.flexShortDesc{
    width:100%
}
.flexDetaiDesc{
    width: 100%;
    height: 60%;
}
.flexImg{
    width:100%;
}

.input {
  margin: 0.4rem 0;
  width: 50%;
}
</style>

