<template>
    <div class="services-area brochure-bg ptb-100 position-relative overflow-hidden">
        <div class="about-icon-wrap">
            <svg class="about-watermark" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#e1b39d" stroke-width="0.3" opacity="0.15" />
            </svg>
        </div>

        <div class="container position-relative z-index-2">
            <div class="section-title mb-5 text-center">
                <span class="eyebrow-text">Curated Experiences</span>
                <h2 class="font-serif text-5xl mt-2">Special Occasions</h2>
                <div class="lux-divider mx-auto"></div>
            </div>

            <div class="row g-4 justify-content-center">
                <div v-for="service in specialocsasion" :key="service.id" class="col-lg-4 col-md-6">
                    <div class="editorial-service-card h-100">
                        <div class="card-body-lux p-5 text-center d-flex flex-column h-100">
                            <div class="card-icon mb-4">
                                <i class="ri-star-line text-[#e1b39d] text-3xl"></i>
                            </div>

                            <h3 class="font-serif service-title mb-3">{{ service.title }}</h3>
                            
                            <div class="service-meta-description mb-4">
                                {{ service.description }}
                            </div>

                            <div class="mt-auto">
                                <div class="minimal-accent-line mx-auto mb-3"></div>
                                <span class="lux-tag">Signature Service</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Inter:wght@300;400;600&display=swap');

.brochure-bg {
    background-color: #fffaf8;
    font-family: 'Inter', sans-serif;
}

.font-serif { font-family: 'Playfair Display', serif; }

.eyebrow-text {
    display: block;
    color: #e1b39d;
    text-transform: uppercase;
    letter-spacing: 4px;
    font-weight: 700;
    font-size: 0.8rem;
}

.lux-divider {
    width: 50px;
    height: 2px;
    background-color: #e1b39d;
    margin-top: 20px;
}

/* New Editorial Card Design */
.editorial-service-card {
    background: #fff;
    border: 1px solid rgba(225, 179, 157, 0.2);
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    position: relative;
}

.editorial-service-card:hover {
    transform: translateY(-8px);
    border-color: #e1b39d;
    box-shadow: 0 20px 40px rgba(225, 179, 157, 0.1);
}

.service-title {
    font-size: 1.75rem;
    color: #1a1a1a;
    line-height: 1.2;
}

.service-meta-description {
    font-size: 1rem;
    color: #666;
    line-height: 1.7;
    font-weight: 300;
}

.minimal-accent-line {
    width: 30px;
    height: 1px;
    background-color: #e1b39d;
}

.lux-tag {
    font-size: 0.65rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #999;
    font-weight: 700;
}

/* Background Art */
.about-icon-wrap {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 40%;
    pointer-events: none;
}

.about-watermark {
    width: 100%;
    animation: slowRotate 50s linear infinite;
}

@keyframes slowRotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.z-index-2 { z-index: 2; }

@media (max-width: 991px) {
    .text-5xl { font-size: 2.5rem; }
    .p-5 { padding: 30px !important; }
}
</style>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ specialocsasion: Array });


</script>
