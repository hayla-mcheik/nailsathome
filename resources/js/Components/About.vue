<template>
    <div class="about-area section-bg pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-item">
                        <swiper
                            v-if="images?.length > 0"
                            :modules="modules"
                            :loop="true"
                            :autoplay="{ delay: 3000 }"
                            :pagination="{ clickable: true }"
                            class="about-slider"
                        >
                            <swiper-slide v-for="img in images" :key="img.id" class="about-img">
                                <div class="top-border"></div>
                                <img :src="'/storage/' + img.image" alt="About" />
                                <div class="bottom-border"></div>
                            </swiper-slide>
                        </swiper>

                        <div class="about-vector">
                            <img src="/assets/images/about/about-vector.png" alt="About" />
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-content pl-1">
                        <div class="section-title">
                            <span>About us</span>
                            <h2>{{ about?.title }}</h2>
       
<p v-html="formatDescription(about?.description)"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Autoplay, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';

const modules = [Autoplay, Pagination];
defineProps({ about: Object, images: Array });

const formatDescription = (text) => {
    if (!text) return '';
    return text.replace(/\n/g, '<br>');
};
</script>