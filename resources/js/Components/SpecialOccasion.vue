<template>
    <div class="special-occasions-root pt-5 pb-24 position-relative overflow-hidden bg-white">
        <div class="watermark-layer">
            <svg class="watermark-svg" viewBox="0 0 100 100" fill="none">
                <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#b95c19" stroke-width="0.1" opacity="0.1" />
            </svg>
        </div>

        <div class="container-fluid px-lg-5 position-relative z-2">
            <div class="section-header text-center mb-12">
                <h2 class="display-title mt-2">Special Occasions</h2>
            </div>

            <div class="row g-4 justify-content-center">
                <div v-for="(service, index) in specialocsasion" :key="service.id" class="col-lg-4 col-md-6">
                    <div class="occasion-card">
                        <div class="card-inner p-5 text-center d-flex flex-column h-100">
                            <span class="occ-index">/ 0{{ index + 1 }}</span>
                            
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

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Montserrat:wght@300;400;600;700&display=swap');


/* Header Styling */
.eyebrow {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    color: #b95c19;
}

.display-title {
    font-size: 26px;
    text-transform: uppercase;
    color: #51555A;
    font-weight: 700;
}

.lux-accent-line {
    width: 35px;
    height: 1px;
    background-color: #b95c19;
}

/* Card Styling - Small & Elegant */
.occasion-card {
    background: #ffffff;
    border: 1px solid #f2f2f2; /* Ultra thin border */
    transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
    height: 100%;
}

.occasion-card:hover {
    border-color: #b95c19;
    transform: translateY(-5px);
}

.occ-index {
    font-size: 0.6rem;
    font-weight: 700;
    color: #b95c19;
    margin-bottom: 20px;
    display: block;
}

.occ-title {
    font-size: 0.7rem; /* Small scale for luxury */
    color: #51555A;
    font-weight: 700;
    line-height: 1.4;
}

.occ-description {
    font-size: 0.7rem; /* Matches boutique brochure body */
    color: #51555A;
    font-weight: 400;
}

.occ-link {
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    color: #b95c19;
    opacity: 0.8;
}

/* Background Art */
.watermark-layer {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 30%;
    pointer-events: none;
    opacity: 0.4;
}

.watermark-svg {
    width: 100%;
    animation: pulse 10s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.1); opacity: 0.5; }
}

.z-2 { z-index: 2; }

@media (max-width: 991px) {
    .display-title { font-size: 1.1rem; font-weight: 700; }
    .occ-description { font-size: 0.7rem; }
}
</style>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ specialocsasion: Array });


</script>
