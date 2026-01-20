<template>
        <GuestLayout>
    <About :about="about" :images="aboutImages" />
          </GuestLayout>
</template>

<script setup>
import About from '@/Components/About.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    about: Object,
    aboutImages: Array,
});
</script>

<style scoped>

</style>