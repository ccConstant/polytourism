<template>
  <div>
    <Navigation />
    <section class="d-flex container align-items-center section gap-3">
      <div class="w-50">
        <h1 class="large-title">Bienvenue sur <span class="primary-color">Polytourisme</span></h1>
        <p class="unselected-color my-5 large1"><span class="primary-color">Polytourisme</span> vous guide et vous accompagne dans votre découverte de la merveuilleuse ville de Lyon.
                                    Découvrez la beuaté de Lyon à travers nos activités recommandés.</p>
        <Button>laissez nous vous guider</Button>
      </div>
      <div class="w-50">
        <img src="@/../../../../public/temp/lyon1.jpg" class="img-fluid rounded-top" alt="">
      </div>
    </section>
    <section class="light-blue section">
      <div class="container">
        <Header>proposition</Header>
        <p class="section-para">Nos Propositions pour vous : </p>
        <div class="d-flex gap-3 justify-content-center">
          <Place />
          <Place />
          <Place />
        </div>
      </div>
    </section>
    <section class="section container">
      <Header>présentation</Header>
      <div class="d-flex flex-wrap justify-content-center gap-5">
        <Presentation title="Belle Vue Panoramique" description="Lyon est une ville située entre deux fleuves, le Rhône et la Saône, offrant de superbes panoramas. Les touristes peuvent profiter de vues imprenables depuis des points de vue tels que la colline de Fourvière, le parc de la Tête d'Or, et la Croix-Rousse. Ces sites offrent des perspectives magnifiques sur la ville, ses ponts, et son architecture, ce qui en fait des lieux parfaits pour la photographie et l'appréciation des paysages urbains."/>
        <Presentation flip="true" title="Belle Vue Panoramique" description="Lyon est une ville située entre deux fleuves, le Rhône et la Saône, offrant de superbes panoramas. Les touristes peuvent profiter de vues imprenables depuis des points de vue tels que la colline de Fourvière, le parc de la Tête d'Or, et la Croix-Rousse. Ces sites offrent des perspectives magnifiques sur la ville, ses ponts, et son architecture, ce qui en fait des lieux parfaits pour la photographie et l'appréciation des paysages urbains."/>
        <Presentation flip="true" title="Belle Vue Panoramique" description="Lyon est une ville située entre deux fleuves, le Rhône et la Saône, offrant de superbes panoramas. Les touristes peuvent profiter de vues imprenables depuis des points de vue tels que la colline de Fourvière, le parc de la Tête d'Or, et la Croix-Rousse. Ces sites offrent des perspectives magnifiques sur la ville, ses ponts, et son architecture, ce qui en fait des lieux parfaits pour la photographie et l'appréciation des paysages urbains."/>
        <Presentation title="Belle Vue Panoramique" description="Lyon est une ville située entre deux fleuves, le Rhône et la Saône, offrant de superbes panoramas. Les touristes peuvent profiter de vues imprenables depuis des points de vue tels que la colline de Fourvière, le parc de la Tête d'Or, et la Croix-Rousse. Ces sites offrent des perspectives magnifiques sur la ville, ses ponts, et son architecture, ce qui en fait des lieux parfaits pour la photographie et l'appréciation des paysages urbains."/>
      </div>
    </section>
    <section class="section light-yellow">
      <div class="container d-flex flex-column align-items-center gap-4">
          <Header>qui sommes-nous ?</Header>
          <p class="text-center large2"><span class="primary-color">polytourisme </span>est une équipe d’étudiants de l’école polytechnique Lyon en informatique </p>
          <img src="../../../public/temp/polytech.jpg" class="img-fluid rounded-top" alt="">
          <p class="large3">Notre mission</p>
          <p class="text-center large2">Notre mission est de vous faire découvrir Lyon de manière inoubliable. Nous voulons que chaque visite à Lyon soit une aventure mémorable.</p>
      </div>
    </section>
    <section class="section container d-flex flex-column align-items-center gap-5">
      <Header>Besoin d'aide ?</Header>
      <p class="large2 text-center">Bienvenue dans notre section de contact et d'aide. Nous sommes là pour répondre à vos questions, résoudre vos problèmes et vous assister dans la planification de votre séjour à Lyon. N'hésitez pas à nous contacter pour toute demande d'information, d'assistance ou de soutien. Votre expérience compte beaucoup pour nous.</p>
      <h1 class="header light header-margin-top">Nos conseillers à votre écoute</h1>
      <p class="large2 text-center">Notre équipe dévouée est prête à vous aider. Si vous avez des questions sur nos activités, nos sorties, nos restaurants recommandés ou tout autre aspect de votre voyage à Lyon, veuillez nous contacter par l'un des moyens suivants :</p>
      <div class="d-flex justify-centent-center gap-5">
        <BubbleContact info="06.06.06.06.06"><i class="fa-solid fa-phone fa-2xl"></i></BubbleContact>
        <BubbleContact info="polytourisme@contact.fr"><i class="fa-solid fa-envelope fa-2xl"></i></BubbleContact>
      </div>
    </section>
    <Footer />
  </div>
</template>

<script setup>
import Navigation from '@/Components/Navigation.vue'
import Button from '@/Components/Button.vue'
import Header from '@/Components/Header.vue'
import Place from '@/Components/Place.vue'
import Presentation from '@/Components/Presentation.vue'
import BubbleContact from '@/Components/BubbleContact.vue'
import Footer from '@/Components/Footer.vue'

</script>

<style>

</style>