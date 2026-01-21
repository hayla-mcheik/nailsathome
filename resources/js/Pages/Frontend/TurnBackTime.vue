<template>
        <GuestLayout>
  <TurnBackTime :turnbacktime="turnbacktime" />
          </GuestLayout>
</template>

<script setup>


import TurnBackTime from '@/Components/TurnBackTime.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    turnbacktime: Array,
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