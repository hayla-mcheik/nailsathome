<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Footer from '@/Components/Footer.vue';
import TheHeader from '@/Components/TheHeader.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
   <TheHeader />
            <slot />
    <Footer />
</template>
