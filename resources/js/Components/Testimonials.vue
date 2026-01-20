<template>
    <div class="testimonial-area section-bg pt-100 pb-70">
        <div class="container">
            <div class="section-title mb-45 text-center">
                <span>Our Testimonial</span>
                <h2>What Our Clients Feedback</h2>
            </div>

            <swiper
                v-if="testimonials?.length > 0"
                :modules="modules"
                :loop="true"
                :autoplay="{ delay: 4000 }"
                :pagination="{ clickable: true }"
                :breakpoints="{
                    '320': { slidesPerView: 1 },
                    '768': { slidesPerView: 2 },
                    '1024': { slidesPerView: 3 }
                }"
                class="testimonial-slider"
            >
                <swiper-slide v-for="item in testimonials" :key="item.id" class="testimonial-item">
                
                    <div class="h-[80px] w-[80px] bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center font-bold">
                        {{ item.client_name.charAt(0) }}
                    </div>
                    <h3>{{ item.client_name }}</h3>
                    <p>{{ item.feedback }}</p>
                    <div class="rating">
                        <i v-for="star in 5" :key="star" 
                           :class="star <= item.rating ? 'ri-star-fill' : 'ri-star-line'">
                        </i>
                    </div>
                </swiper-slide>
            </swiper>
        </div>
    </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';

const modules = [Autoplay, Pagination];
defineProps({ testimonials: Array });
</script>