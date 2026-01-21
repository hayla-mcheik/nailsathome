<template>
        <GuestLayout>
         <SpaLuxSection :spaTreatments="spaTreatments" />

          </GuestLayout>
</template>

<script setup>
import About from '@/Components/About.vue';
import BrochureSection from '@/Components/BrochureSection.vue';
import SpaLuxSection from '@/Components/SpaLuxSection.vue';
import Spoil from '@/Components/Spoil.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    spaTreatments: Array,
    spoilyourFeet: Array,
    brochureSections: Object
});
</script>

<style scoped>
/* Gold Theme for Hair */
.gold { background-color: #faefed; color: #000; }
.gold .heading-font { color: #faefed; }
.section-watermark{
    display: none !important;
}
</style>