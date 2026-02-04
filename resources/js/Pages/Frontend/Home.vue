<template>
    <GuestLayout>
        <Banner :sliders="sliders" />
        <About id="about-section" :about="about" :images="aboutImages" />
        


        <Categories :categories="categories" />
             <VipDiscretion />
            <Testimonials :testimonials="testimonials" />
       
        <SpecialOccasion :specialocsasion="specialocsasion" />
        <!-- <InstagramGallery :gallery="gallery" /> -->
    </GuestLayout>
</template>

<script setup>
import About from '@/Components/About.vue';
import Banner from '@/Components/Banner.vue';
import BestDeals from '@/Components/BestDeals.vue';
import Categories from '@/Components/Categories.vue';
import InstagramGallery from '@/Components/InstagramGallery.vue';
import SpecialOccasion from '@/Components/SpecialOccasion.vue';
import Testimonials from '@/Components/Testimonials.vue';
import VideoSection from '@/Components/VideoSection.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import VipDiscretion from './VipDiscretion.vue';

// Define the props coming from the Controller
const props = defineProps({
    sliders: Array,
    about: Object,
    aboutImages: Array,
    categories: Array,
    testimonials: Array,
    gallery: Array,
    packages: Array,
    spaTreatments: Array,
    specialocsasion: Array
});
</script>