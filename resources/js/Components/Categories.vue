<template>
    <div class="features-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
                <div v-for="category in categories" :key="category.id" class="col-lg-3 col-md-6">
                    <div class="features-card">
                        <Link :href="route('category.services', category.id)">
                            <div class="img">
                                <img :src="category.image ? '/storage/' + category.image : '/assets/images/features/features-img1.jpg'" alt="features" />
                            </div>
                        </Link>
                        
                        <div class="content">
                            <div class="top-icon">
                                <i class="flaticon-make-up"></i>
                            </div>
                            <h3>
                                <Link :href="route('category.services', category.id)">{{ category.name }}</Link>
                            </h3>
                            
                            <Link :href="route('category.services', category.id)" class="more-btn">
                                <i class="flaticon-arrow-pointing-to-right"></i>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ categories: Array });
</script>
<style scoped>
/* Target the existing .img div and the img inside it */
.features-card .img {
    width: 100%;
    overflow: hidden; /* Keeps the zoom effect inside the box */
}

.features-card .img img {
    width: 100%;
    
    /* 1. Set your preferred ratio here */
    /* Use 1/1 for Square, 4/3 for Standard, or 16/9 for Cinematic */
    aspect-ratio: 1 / 1; 
    
    /* 2. This ensures the image fills the ratio without squishing */
    object-fit: cover;
    object-position: center;
    
    /* Optional: smooth transition for hover */
    transition: transform 0.5s ease;
}

/* Optional: Slight zoom on hover for a premium feel */
.features-card:hover .img img {
    transform: scale(1.08);
}
</style>