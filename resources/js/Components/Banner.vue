<template>
  <div class="banner-area brochure-theme">
    <div class="container-fluid p-0">
      <div class="row g-0 align-items-stretch">
        <div class="col-lg-5 d-flex align-items-center bg-white p-5 lg:p-12">
          <div class="content-wrapper w-100">
            <swiper
              v-if="sliders?.length > 0"
              :modules="[Autoplay, Pagination, EffectFade]"
              :slides-per-view="1"
              :loop="true"
              :effect="'fade'"
              :autoplay="{ delay: 6000, disableOnInteraction: false }"
              :pagination="{ clickable: true }"
              @slideChange="onSlideChange"
              class="brochure-slider"
            >
              <swiper-slide v-for="slider in sliders" :key="slider.id">
                <div class="banner-content">
                  <span class="subtitle">Nails At Home Salon</span>
                  <h1 class="heading-font">{{ slider.title }}</h1>
                  <div class="lux-divider"></div>
                  <p class="description-text">{{ slider.description }}</p>
                  
         
                </div>
              </swiper-slide>
            </swiper>
          </div>
        </div>

        <div class="col-lg-7 position-relative">
          <div class="icon-frame-side h-100">
            <div class="accent-box"></div>
            
            <div class="icon-visual-wrapper d-flex align-items-center justify-content-center h-100">
              <svg class="watermark-icon" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="white" stroke-width="0.3" opacity="0.6" />
                <path d="M50 30C52 40 65 42 75 42C65 45 52 48 50 70C48 48 35 45 25 42C35 42 48 40 50 30Z" stroke="white" stroke-width="0.2" opacity="0.4" />
                <circle cx="50" cy="50" r="2" fill="white" opacity="0.5" />
              </svg>

              <div class="vector-overlay d-none d-md-block">
                <img src="/assets/images/home-one/home-vector.png" alt="Vector Design" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination, EffectFade } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

const props = defineProps({ sliders: Array });
const activeIndex = ref(0);

const onSlideChange = (swiper) => {
  activeIndex.value = swiper.realIndex;
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&display=swap');

.brochure-theme {
    min-height: 80vh;
    overflow: hidden;
}

/* Typography */
.heading-font {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.5rem, 5vw, 4rem);
    color: #2d2d2d;
    line-height: 1.1;
    margin: 20px 0;
}

.subtitle {
    color: #e1b39d;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-weight: 700;
    font-size: 0.9rem;
}

.description-text {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
    max-width: 90%;
}

/* Accents */
.lux-divider {
    width: 60px;
    height: 3px;
    background-color: #e1b39d;
    margin-bottom: 30px;
}

/* Right Side Icon Container */
.icon-frame-side {
    background-color: #e1b39d; /* Your brand color as background */
    overflow: hidden;
    position: relative;
}

.accent-box {
    position: absolute;
    top: 40px;
    right: 40px;
    bottom: 40px;
    left: 40px;
    border: 1px solid rgba(255, 255, 255, 0.4);
    pointer-events: none;
    z-index: 2;
}

.watermark-icon {
    width: 60%;
    max-width: 400px;
    animation: rotateIcon 40s linear infinite;
}

@keyframes rotateIcon {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.vector-overlay {
    position: absolute;
    bottom: 20px;
    right: 20px;
    width: 200px;
    opacity: 0.3;
    filter: brightness(0) invert(1); /* Makes the vector white */
    z-index: 3;
}

/* Swiper Customization */
:deep(.swiper-pagination-bullet-active) {
    background: #e1b39d !important;
}

@media (max-width: 991px) {
    .brochure-theme { min-height: auto; }
    .heading-font { font-size: 2.2rem; }
    .icon-frame-side { height: 400px; }
}
</style>