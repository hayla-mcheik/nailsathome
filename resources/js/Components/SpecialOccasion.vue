<template>
    <div class="special-occasions-root pt-5 pb-24 position-relative overflow-hidden bg-white">
        <div class="watermark-layer">
            <svg class="watermark-svg" viewBox="0 0 100 100" fill="none">
                <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#b95c19" stroke-width="0.1" opacity="0.1" />
            </svg>
        </div>

        <div class="container-fluid px-lg-5 position-relative z-2">
            <div class="section-header text-center mb-5">
                <h2 class="display-title mt-2">Private & Special Events</h2>
                <div class="lux-accent-line mx-auto mt-3"></div>
            </div>

            <div class="row g-4 justify-content-center">
                <div v-for="(service, index) in specialocsasion" :key="service.id" class="col-lg-4 col-md-6">
                    <div class="occasion-card">
                        <div class="occ-image-wrapper">
                            <img 
                                :src="service.image ? `/storage/${service.image}` : '/assets/images/placeholder.jpg'" 
                                :alt="service.title" 
                                class="occ-card-img"
                            >
                        </div>

                        <div class="card-inner p-4 text-center d-flex flex-column">
               
                            
                            <h3 class="occ-title mb-3">{{ service.title }}</h3>
                            
                            <div class="occ-description">
                                {{ service.description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ 
    specialocsasion: Array 
});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Montserrat:wght@300;400;600;700&display=swap');

/* Header Styling */
.display-title {
    font-size: 26px;
    text-transform: uppercase;
    color: #b95c19;
    font-weight: 700;
    letter-spacing: 2px;
}

.lux-accent-line {
    width: 40px;
    height: 1px;
    background-color: #b95c19;
}

/* Card Structure */
.occasion-card {
    display: flex;
    flex-direction: column;
    background: #ffffff;
    border: 1px solid #f2f2f2;
    transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
    height: 100%; /* Ensures all cards in a row match height */
}

.occasion-card:hover {
    border-color: #b95c19;
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

/* Standardized Image Handling */
.occ-image-wrapper {
    width: 100%;
    aspect-ratio: 3 / 4; /* Forces all images to the same vertical ratio */
    overflow: hidden;
    background: #f8f8f8;
}

.occ-card-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Crops image to fill the 3:4 box without stretching */
    display: block;
    transition: transform 0.8s ease;
}

.occasion-card:hover .occ-card-img {
    transform: scale(1.08);
}

/* Typography */
.card-inner {
    flex-grow: 1; /* Pushes content to fill the card height */
}

.occ-index {
    font-size: 0.65rem;
    font-weight: 700;
    color: #b95c19;
    margin-bottom: 15px;
    display: block;
}

.occ-title {
    font-family: 'Montserrat', sans-serif !important;
    font-size: 0.9rem;
    color: #51555A;
    font-weight: 700;
    line-height: 1.4;
    text-transform: uppercase;
}

.occ-description {
    font-family: 'Montserrat', sans-serif !important;
    font-size: 0.8rem;
    color: #51555A;
    font-weight: 400;
    line-height: 1.6;
}

/* Watermark Background */
.watermark-layer {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 30%;
    pointer-events: none;
    z-index: 1;
}

.watermark-svg {
    width: 100%;
    animation: pulse 10s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.2; }
    50% { transform: translate(-50%, -50%) scale(1.1); opacity: 0.4; }
}

.z-2 { z-index: 2; }

@media (max-width: 991px) {
    .display-title { font-size: 1.2rem; }
    .occ-image-wrapper { aspect-ratio: 4 / 5; } /* Slightly shorter on mobile if needed */
}
</style>