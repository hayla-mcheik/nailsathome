<template>
    <GuestLayout>
        <Head title="What You Knead" />
        
        <BrochureSection 
            themeColor="theme-orange"
            sideTitle="What You Knead"
            sectionTitle="What You Knead"
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