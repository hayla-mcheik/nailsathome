<template>
    <GuestLayout>
        <Head title="Leave Me Soft" />
        
        <BrochureSection 
            themeColor="theme-orange"
            sideTitle="Leave Me Soft"
            sectionTitle="Waxing & Threading"
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