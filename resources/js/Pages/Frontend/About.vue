<template>
        <GuestLayout>
<div class="inner-banner-minimal pt-100 mt-3 pb-50">     
             <Breadcrumbs 
      title="About Us" 
      height="50vh" 
    />      
        </div>

    <About :about="about" :images="aboutImages" />
          </GuestLayout>
</template>

<script setup>
import About from '@/Components/About.vue';
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    about: Object,
    aboutImages: Array,
});
</script>

<style scoped>

</style>