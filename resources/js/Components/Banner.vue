<template>
  <div class="banner-area">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <swiper
            v-if="sliders?.length > 0"
            :modules="[Autoplay, Pagination]"
            :slides-per-view="1"
            :loop="true"
            :autoplay="{ delay: 5000, disableOnInteraction: false }"
            :pagination="{ clickable: true }"
            @slideChange="onSlideChange"
            class="banner-slider"
          >
            <swiper-slide v-for="slider in sliders" :key="slider.id">
              <div class="banner-content">
                <span class="subtitle">Nails At Home Salon</span>
                <h1>{{ slider.title }}</h1>
                <p>{{ slider.description }}</p>
  
              </div>
            </swiper-slide>
          </swiper>
        </div>

        <div class="col-lg-6">
          <div class="banner-img">
            <div class="woman">
              <img src="/assets/images/home-one/woman.png" alt="Banner Woman" /> 
              <div class="vector">
                <img src="/assets/images/home-one/home-vector.png" alt="Vector Design" />
              </div>
            </div>
            <div class="nail-img"> 
              <img 
                v-if="sliders?.length > 0"
                :src="'/storage/' + sliders[activeIndex].image" 
                alt="Nail Detail" 
                class="transition-fade"
              />
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
import { Autoplay, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';

const props = defineProps({ sliders: Array });

// Track the active slide index
const activeIndex = ref(0);

const onSlideChange = (swiper) => {
  // swiper.realIndex gives the correct index even when loop is true
  activeIndex.value = swiper.realIndex;
};
</script>

<style scoped>
/* Added a smooth transition when the image changes */
.nail-img img {
    transition: opacity 0.5s ease-in-out;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.banner-img {
    position: relative;
}
</style>