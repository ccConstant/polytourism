
<template>
    <div id="NewPlace">
    <Navigation :connected="true" />
    <br><br><br><br><br><br><br>
    
    <Header class="center"  :level="2" fw-bold>Ajouter un nouveau lieu</Header>
    <div id="image">
    <img src="https://www.tictactrip.eu/blog/wp-content/uploads/2020/11/Couverture-Lyon-1160x652.png" class="u-fit u-res w-100" alt="">
    </div >
    <p id="instructions">N’hésitez pas à <span class="fw-bold"> nous suggérer </span> des nouveau lieux pour les proposer aux touristes</p><br><br>
    
    
    
      
    <div class="div d-flex align-items-center container  gap-5 section ">
        <Input class="flexcontainer" v-model="form.plc_nom" title="Intitulé" placeholder="Intitulé"  />
        <Input class="flexcontainer" v-model="form.plc_theme" type="select" title="Thèmes" placeholder="--Choisissez les thèmes--"  :options="themes"/> 
    </div>   <br>
    <div class="div d-flex align-items-center container gap-5 section ">
        <Input class="flexcontainer" v-model="form.plc_address" title="Adresse" placeholder="Adresse"  />
        <Input class="flexcontainer" v-model="form.plc_tarifsenclair" title="Tarif" placeholder="Indiquez le tarif de service"  />
    </div>   <br>
    <div class="div d-flex align-items-center container gap-5 section ">
        <Input class="flexShortDesc" v-model="form.plc_descrcourtfr" title="Description courte" placeholder="Description courte"  />
    </div><br>
    <div class="div d-flex align-items-center container gap-5 section ">    
        <Input class="flexDetaiDesc" v-model="form.plc_descrdetailfr" type="textarea" title="Description détaillée" placeholder="Description détaillée ... "  />
    </div>  <br>
    <div class="div d-flex align-items-center container gap-5 section ">
        <Input class="flexcontainer" v-model="form.plc_contact.tel" title="Numéro de téléphone" placeholder="+33"  />
        <Input  class="flexcontainer" v-model="form.plc_contact.email" title="Adresse mail" placeholder="@"  />
    </div>  <br>
    <div class="div d-flex align-items-center container gap-5 section ">
        <Input class="flexcontainer"  title="Lien externe" placeholder="https://"  />
        <Input class="flexcontainer"  type="select" :multiple="true" title="Jours d'ouvertures" placeholder="--Indiquez vos jours d'ouvertures--" :options="['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche']" />
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

const form = ref({
    'plc_nom' : '',
    'plc_theme' : '',
    'plc_address' : '',
    'plc_descrcourtfr': '',
    'plc_descrdetailfr' : '',
    'plc_contact' : {
        tel : '',
        email : ''
    },
    'plc_ouvertureenclair': null,
    'plc_tarifsenclair': '',
    'plc_illustrations' : null,
    'plc_validated' : false,
})


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
    form.value.plc_ouvertureenclair = `de ${hourOfStart} à ${hourOfend}`
    const { error, value } = schema.validate(form.value)
    if (error) {
        console.log(error.message)
        errorMessage.value = error.message
    } else {
    axios.post('/place/add',form.value)
    .then((response) => console.log(response))
    .catch((error) => console.log(error))
}}

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

