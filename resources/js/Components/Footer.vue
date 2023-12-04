<template>
  <footer class="section py-3 light-green">
    <div class="container d-flex flex-column gap-3">
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column gap-3">
                <p class="large3 primary-color">Polytourisme</p>
                <p class="large3">votre agence de tourisme à Lyon</p>
                <div class="d-flex gap-2">
                    <i class="fa-brands fa-instagram" style="color: #335eea;"></i>
                    <i class="fa-brands fa-facebook" style="color: #335eea;"></i>
                    <i class="fa-brands fa-x-twitter" style="color: #335eea;"></i>
                </div>
            </div>
            <div class="d-flex flex-column gap-3">
                <p class="large3 primary-color">Liens rapides</p>
                <div class="d-flex gap-3">
                    <a href="#" v-for="link in links" :key="link" class="unselected-color uppercase">{{ link }}</a>
                </div>
                <div class="d-flex justify-content-between">
                        <a href="#" class="primary-color uppercase">se connecter</a>
                        <a href="#" class="primary-color uppercase">s'inscrire</a>
                    </div>
            </div>
        </div>
        <p class="large3 text-center uppercase">Fait avec ❤️ par l’équipe <span class="primary-color">polytourisme</span></p>
    </div>
  </footer>
</template>

<script setup>
const links = ['accueil', 'decouvrir lyon', 'presentation', 'a propos', 'contact']

</script>

<style>

</style>