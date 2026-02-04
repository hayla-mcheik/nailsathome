<template>
  <div class="banner-area brochure-theme position-relative">
    
    <div class="slider-container">
      <div v-for="(slider, index) in sliders" :key="slider.id" 
           class="slider-item" 
           :class="{ 'active': activeIndex === index }"
           :style="{ backgroundImage: `url(/storage/${slider.image})` }">
        
        <div class="black-overlay"></div>

        <div class="container-fluid h-100 position-relative content-wrapper">
          <div class="row h-100 align-items-center">
            <div class="col-12 text-center mt-5">
              <div class="text-content slide-up-animation">
                <h1 class="brand-title" v-html="slider.title || 'HEAVENLY SPA<br>BY WESTIN™'"></h1>
       
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="banner-footer d-flex justify-content-between align-items-end px-lg-5 pb-4">
      
      <div class="operating-hours-wrap d-none d-md-block">
        <div class="op-hours-content d-flex align-items-center gap-3">
          <span class="op-label text-uppercase">Operating Hours</span>
          <span class="op-separator"></span>
          <span class="op-time">Daily: 10 am – 10 pm</span>
          <i class="ri-add-circle-line op-icon"></i>
        </div>
      </div>

      <div class="scroll-indicator-wrap" @click="scrollToAbout" role="button" aria-label="Scroll to About Section">
        <div class="scroll-content">
          <span class="scroll-text text-uppercase">Scroll</span>
          <div class="scroll-line-container">
            <div class="scroll-line-base"></div>
            <div class="scroll-line-animated"></div>
          </div>
        </div>
      </div>

      <div class="footer-spacer d-none d-lg-block" style="width: 250px;"></div>
    </div>

  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const props = defineProps({
    sliders: { type: Array, default: () => [] }
});

const activeIndex = ref(0);
let sliderInterval = null;

/**
 * Animated Smooth Scroll Function
 * Accounts for the sticky navbar height
 */
const scrollToAbout = () => {
    const element = document.getElementById('about-section');
    if (element) {
        const navbarHeight = 80; // Approximate height of your sticky navbar
        const elementPosition = element.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - navbarHeight;

        window.scrollTo({
            top: offsetPosition,
            behavior: 'smooth'
        });
    }
};

/**
 * Slider Logic
 */
const startSlider = () => {
    if (props.sliders && props.sliders.length > 1) {
        sliderInterval = setInterval(() => {
            activeIndex.value = (activeIndex.value + 1) % props.sliders.length;
        }, 5000);
    }
};

onMounted(() => {
    startSlider();
});

onUnmounted(() => {
    if (sliderInterval) clearInterval(sliderInterval);
});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&family=Playfair+Display:wght@400;700&display=swap');

.brochure-theme {
    height: 100vh;
    width: 100%;
    overflow: hidden;
    background: #000;
}

/* SLIDER BASE */
.slider-container {
    position: absolute;
    inset: 0;
}

.slider-item {
    position: absolute;
    inset: 0;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transition: opacity 1.5s ease-in-out;
    z-index: 1;
}

.slider-item.active {
    opacity: 1;
    z-index: 2;
}

.black-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.45);
    z-index: 2;
}

.content-wrapper {
    z-index: 3;
}

.brand-title {
    font-family: 'Playfair Display', serif;
    color: #ffffff;
    font-size: clamp(2rem, 3vw, 3rem);
    font-weight: 700;
    line-height: 1;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.logo-accent-line {
    width: 70px;
    height: 1px;
    background: #ffffff;
    margin-top: 30px;
    opacity: 0.6;
}

/* FOOTER & SCROLL ANIMATION */
.banner-footer {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    z-index: 10;
    color: #fff;
    font-family: 'Montserrat', sans-serif;
}

.scroll-indicator-wrap {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    bottom: 0;
    cursor: pointer;
    transition: opacity 0.3s ease;
}

.scroll-indicator-wrap:hover {
    opacity: 0.7;
}

.scroll-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 15px;
}

.scroll-text {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 4px;
}

/* THE ANIMATED SCROLL LINE */
.scroll-line-container {
    position: relative;
    width: 1px;
    height: 90px;
    background: rgba(255, 255, 255, 0.2);
    overflow: hidden;
}

.scroll-line-animated {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, transparent, #fff, transparent);
    animation: pulseLine 5s infinite ease-in-out;
}

@keyframes pulseLine {
    0% { transform: translateY(-100%); }
    100% { transform: translateY(100%); }
}

/* OPERATING HOURS STYLES */
.op-label { font-size: 10px; font-weight: 800; letter-spacing: 2px; }
.op-separator { width: 30px; height: 1px; background: rgba(255,255,255,0.4); }
.op-time { font-size: 11px; font-weight: 400; }

/* TEXT ANIMATION */
.slide-up-animation {
    animation: slideUp 1.2s ease-out forwards;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 768px) {
    .scroll-line-container { height: 60px; }
    .brand-title { font-size: 2.2rem; }
    .scroll-content{
      display: none;
    }
}
</style>