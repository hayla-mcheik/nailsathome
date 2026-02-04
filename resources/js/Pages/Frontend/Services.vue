<template>
        <GuestLayout>


<div class="inner-banner-minimal pt-100 mt-3 pb-50">   
               <Breadcrumbs
      title="Services" 
      height="50vh" 
    />   
    </div>
<Categories :categories="categories" />
   
     </GuestLayout>
</template>

<script setup>
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import Categories from '@/Components/Categories.vue';
import Services from '@/Components/Services.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    categories: Array,
});
</script>

<style scoped>

</style>