<template>
    <GuestLayout>
        <div class="inner-banner-minimal pt-100 mt-3 pb-50">     
            <Breadcrumbs title="Brands we Use" height="50vh" />      
        </div>

        <div class="brands-area pb-100 mt-5 bg-white">
            <div class="container px-lg-5">
                <div v-for="(brand, index) in brands" :key="brand.id" 
                     class="brand-row mb-120" 
                     :class="{ 'flex-row-reverse': index % 2 !== 0 }">
                    
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="brand-image-frame">
                                <img :src="'/storage/' + brand.image" class="img-fluid brand-img" :alt="brand.title">
                            </div>
                        </div>

                        <div class="col-lg-6 px-lg-5">
                            <div class="brand-text-box">
                                <h3 class="brand-display-title">Rejuvenate with {{ brand.title }}</h3>
                                <div class="lux-line-gold my-4"></div>
                                <p class="brand-description-small">
                                    {{ brand.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
defineProps({ brands: Array });
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap');

/* Alternating Desktop Logic */
@media (min-width: 992px) {
    .brand-row:nth-child(even) .row { flex-direction: row-reverse; }
}

.brand-display-title {
    font-size: 20px;
    color: #51555A;
    font-weight: 600;
}

.brand-description-small {
    font-size: 0.7rem; /* Small scale */
    line-height: 2;
    color: #51555A;
}

.brand-image-frame {
    padding: 20px;
    background: #fafafa;
}

.brand-img {
    width: 100%;
    aspect-ratio: 16/10;
    object-fit: contain;
}

.lux-line-gold { width: 40px; height: 1px; background-color: #b95c19; }
.mb-120 { margin-bottom: 120px; }
@media (max-width: 991px) {
.brand-display-title {
    margin-top: 20px;
    font-size: 1.1rem;
    color: #51555A;
    font-weight: 700;
}

}
</style>