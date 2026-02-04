<template>
    <div class="testimonial-area pt-5 pb-5 position-relative overflow-hidden" :style="backgroundStyle">
        <div class="container position-relative z-10">
            <div class="section-title mb-12 text-center">
                <h2 class="display-title mt-2 text-white">Reviews</h2>
            </div>

            <swiper
                v-if="testimonials?.length > 0"
                :modules="modules"
                :loop="true"
                :centeredSlides="true"
                :autoplay="{ delay: 5000 }"
                :pagination="{ clickable: true }"
                :slides-per-view="1"
                class="testimonial-slider max-w-2xl mx-auto"
            >
                <swiper-slide v-for="item in testimonials" :key="item.id" class="testimonial-item px-4 pb-12">
                    <div class="testimonial-card text-center">
                        <p class="feedback-text mb-4 text-white">"{{ item.feedback }}"</p>
                        
                        <h3 class="client-name text-white">{{ item.client_name }}</h3>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';

const modules = [Autoplay, Pagination];
defineProps({ testimonials: Array });

// Dynamic background style
const backgroundStyle = computed(() => ({
    backgroundImage: `url('/assets/images/megamenu-bg.jpg')`,
    backgroundSize: 'cover',
    backgroundPosition: 'center',
    backgroundAttachment: 'fixed' // Parallax effect for luxury feel
}));
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Montserrat:wght@300;400;600;700&display=swap');

.eyebrow-lux {
    font-family: 'Montserrat', sans-serif;
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 5px;
    font-weight: 700;
    color: #b95c19;
}

.display-title {
    font-size: 26px;
    font-weight: 700;
    color: #51555A;
}

.lux-line-gold {
    width: 35px;
    height: 1px;
    background-color: #b95c19;
}

/* Avatar Styling */
.avatar-circle {
    height: 60px;
    width: 60px;
background-color: transparent !important;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    font-size: 1.2rem;
    color: #b95c19;
}
.testimonial-card{
    background-color: transparent !important;
    padding: 0px !important;
}
/* Text Scaling - Small & Editorial */
.feedback-text {
    font-size: 0.7rem; /* Pull-quote size */
    line-height: 1.8;
    color: #51555A;
    font-weight: 400;
}

.client-name {
    font-family: 'Montserrat', sans-serif;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #1a1a1a;
}

.client-label {
    font-size: 9px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #999;
}

/* Swiper Dots Styling */
:deep(.swiper-pagination-bullet-active) {
    background: #b95c19;
}

@media only screen and (max-width: 767px) {
    .display-title { font-size: 1.1rem; }
    .feedback-text { font-size: 0.7rem; }
}
</style>