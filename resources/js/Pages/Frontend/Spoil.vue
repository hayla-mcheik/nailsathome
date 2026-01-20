<template>
        <GuestLayout>
  <Spoil :spoilyourFeet="spoilyourFeet" />
          </GuestLayout>
</template>

<script setup>

import Spoil from '@/Components/Spoil.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    spoilyourFeet: Array,
});
</script>

<style scoped>
/* Gold Theme for Hair */
.gold { background-color: #faefed; color: #000; }
.gold .heading-font { color: #faefed; }
</style>