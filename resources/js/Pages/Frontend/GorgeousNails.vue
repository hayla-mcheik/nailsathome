<template>
    <GuestLayout>
        <Head title="Gorgeous Nails" />
        
        <BrochureSection 
            themeColor="theme-brown"
            sideTitle="Gorgeous Nails"
            sectionTitle="Technicals"
            :services="services"
        />
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import BrochureSection from '@/Components/BrochureSection.vue';
import { Head } from '@inertiajs/vue3';

defineProps({ services: Array });
</script>