<template>
        <GuestLayout>

 <div class="inner-banner-minimal pt-100 mt-3 pb-50">   
               <Breadcrumbs
      title="Contact" 
      height="50vh" 
    />   
    </div>
         <Contact />
     </GuestLayout>
</template>

<script setup>
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import Contact from '@/Components/Contact.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';


</script>

<style scoped>

</style>