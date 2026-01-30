<template>
    <GuestLayout>
        <Banner :sliders="sliders" />
        <Categories :categories="categories" />
        <About :about="about" :images="aboutImages" />
        <SpecialOccasion :specialocsasion="specialocsasion" />
         <BestDeals :packages="packages" />
      
        <Testimonials :testimonials="testimonials" />
        <InstagramGallery :gallery="gallery" />
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