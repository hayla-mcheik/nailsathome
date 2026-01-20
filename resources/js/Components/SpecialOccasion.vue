<template>
    <div class="services-area ptb-100">
        <div class="container">
            <div class="section-title mb-45 text-center">
                <h2 class="font-serif text-3xl mt-2">Special Occasions</h2>
                <div class="section-vector mt-3">
                    <img src="/assets/images/shape/section-vector.png" alt="vector" class="mx-auto" />
                </div>
            </div>

            <div class="row g-4">
   
                    <div v-for="service in specialocsasion" :key="service.id" class="col-lg-4 col-md-6">
                        <div class="services-card">
                            <div class="card-image-wrap">
                                <Link>
                                    <img :src="service.image ? '/storage/' + service.image : '/assets/images/placeholder.jpg'" 
                                         class="service-main-img" />
                            
                                </Link>
                            </div>

                            <div class="content p-4 text-center">
                                <h3 class="font-serif text-2xl mb-2">{{ service.title }}</h3>
                                
                                <div class="service-meta mb-3" >
                                {{ service.description }}
                                </div>

                            </div>
                        </div>
                    </div>
              
            </div>

            <div class="services-vector">
                <img src="/assets/images/services/services-vector.png" alt="vector" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ specialocsasion: Array });


</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap');

.font-serif { font-family: 'Playfair Display', serif; }

.services-card {
    background: #fff;
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    height: 100%;
    border: 1px solid #f0f0f0;
}

.services-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(185, 92, 25, 0.1);
}

.card-image-wrap {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.service-main-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.services-card:hover .service-main-img {
    transform: scale(1.1);
}

.image-overlay {
    position: absolute;
    inset: 0;
    background: rgba(185, 92, 25, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: 0.4s;
}

.services-card:hover .image-overlay {
    opacity: 1;
}

.view-text {
    color: white;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    border: 2px solid white;
    padding: 8px 20px;
}

.read-more-link {
    color: #b95c19;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 13px;
    letter-spacing: 1px;
    text-decoration: none;
    transition: 0.3s;
}

.read-more-link:hover {
    color: #000;
}

.services-vector {
    position: absolute;
    bottom: 0;
    left: 0;
    z-index: -1;
    opacity: 0.5;
}
.service-meta{
    font-size: 14px;
    color:#555555;
    
}
</style>