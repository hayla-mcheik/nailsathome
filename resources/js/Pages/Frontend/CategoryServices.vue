<template>
    <GuestLayout>
<div class="inner-banner-minimal pt-100 mt-3 pb-50">     
             <Breadcrumbs 
      :title="category.name" 
      height="50vh" 
    />      
        </div>

        <div class="services-details-area py-5 bg-white">
            <div class="container px-lg-5">
                
                <div v-for="(service, index) in category.services" 
                     :key="service.id" 
                     class="service-block-row mb-120">
                    
                    <div class="row align-items-start" :class="{ 'flex-row-reverse': index % 2 !== 0 }">
                        
                        <div class="col-lg-7 px-lg-5">
                            <div class="service-text-content">
                                <div class="service-intro-header mb-5">
                                    <span class="service-index">{{ String(index + 1).padStart(2, '0') }}</span>
                                    <h3 class="service-name-title">{{ service.name }}</h3>
                                    <p v-if="service.description" class="service-description-main">
                                        {{ service.description }}
                                    </p>
                                </div>

                                <div class="treatments-container">
                                    <div v-for="variant in service.variants" :key="variant.id" class="treatment-entry mb-4">
                                        <div class="d-flex justify-content-between align-items-baseline mb-1">
                                            <h4 class="treatment-title">
                                                {{ variant.title }}
                                                <span v-if="variant.duration" class="duration-tag">
                                                    ({{ variant.duration }} MINS)
                                                </span>
                                            </h4>
                                            <span class="treatment-price">{{ variant.price }} AED</span>
                                        </div>
                                        
                                        <p v-if="variant.description" class="treatment-detail-text">
                                            {{ variant.description }}
                                        </p>
                                        
                                        <div class="booking-cta">
                                            <a href="https://wa.me/97142828385" target="_blank" class="wa-link">
                                                Inquire via WhatsApp <i class="ri-whatsapp-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 sticky-top-col">
                            <div class="image-frame">
                                <img :src="service.image ? `/storage/${service.image}` : '/assets/images/placeholder.jpg'" 
                                     class="service-feature-img" 
                                     :alt="service.name">
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
import { Link } from '@inertiajs/vue3';

defineProps({
    category: Object
});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;400;600&display=swap');

/* ZigZag Desktop Logic */
@media (min-width: 992px) {
    .service-block-row:nth-child(even) .row {
        flex-direction: row-reverse;
    }
    /* Image stays in view while scrolling long lists */
    .sticky-top-col {
        position: sticky;
        top: 100px;
        padding-top: 20px;
    }
}

/* Luxury Typography (Small Font Scale) */
.eyebrow {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 5px;
    color: #b95c19;
    text-transform: uppercase;
}

.display-title {
    font-size: 0.8;
}

.service-index {
    font-size: 0.7rem;
    color: #51555A;
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
}

.service-name-title {
    font-size: 0.8rem;
    color: #51555A;
}

.service-description-main {
    font-size: 0.7rem;
    color: #51555A;
    margin-top: 15px;
    border-left: 1px solid #51555A;
    padding-left: 20px;
}

/* Treatment Entries */
.treatment-entry {
    padding-bottom: 15px;
    border-bottom: 1px solid #f9f9f9;
}

.treatment-title {
    font-size: 0.7rem;
    font-weight: 600;
    color: #51555A;
}

.duration-tag {
    font-size: 0.7rem;
    font-weight: 300;
    color: #51555A;
    margin-left: 4px;
}

.treatment-price {
    font-size: 0.7rem;
    font-weight: 700;
    color: #51555A;
}

.treatment-detail-text {
    font-size: 0.7rem; /* Boutique small text */
    color: #51555A;
    font-weight: 300;
    margin-top: 5px;
}

.wa-link {
    font-size: 9px;
    font-weight: 700;
    color: #51555A;
    text-transform: uppercase;
    text-decoration: none;
    letter-spacing: 1px;
}

/* Image Presentation */
.image-frame {
    background: #fafafa;
    padding: 10px;
}

.service-feature-img {
    width: 100%;
    aspect-ratio: 4 / 5;
    object-fit: cover;
    display: block;
}

.mb-120 { margin-bottom: 120px; }

@media (max-width: 991px) {
    .mb-120 { margin-bottom: 80px; }
    /* Mobile: Image first, then list */
    .row { flex-direction: column-reverse !important; }
    .sticky-top-col { margin-bottom: 40px; }
    .display-title { font-size: 1.1rem; }
}
</style>