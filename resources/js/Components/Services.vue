<template>
    <div class="services-area ptb-100">
        <div class="container">
            <div class="section-title mb-45 text-center">
                <h2 class="font-serif text-5xl mt-2">SERVICES Details</h2>
                <div class="section-vector mt-3">
                    <img src="/assets/images/shape/section-vector.png" alt="vector" class="mx-auto" />
                </div>
            </div>

            <div class="row g-4">
                <template v-for="category in categories" :key="category.id">
                    <div v-for="service in category.services" :key="service.id" class="col-lg-4 col-md-6">
                        <div class="services-card">
                            <div class="card-image-wrap">
                                <Link :href="getServiceRoute(service)">
                                    <img :src="service.image ? '/storage/' + service.image : '/assets/images/placeholder.jpg'" 
                                         class="service-main-img" />
                            
                                </Link>
                            </div>

                            <div class="content p-4 text-center">
                                <h3 class="font-serif text-2xl mb-2">{{ service.name }}</h3>
                                
                                <div class="service-meta mb-3" v-if="service.variants?.length">
                                    <span class="text-muted"><i class="ri-time-line"></i> {{ service.variants[0].duration }} mins</span>
                                    <span class="price-tag ms-3 font-bold text-[#b95c19]">Starting ${{ Math.min(...service.variants.map(v => v.price)) }}</span>
                                </div>

                                <Link :href="getServiceRoute(service)" class="read-more-link">
                                    Explore Service <i class="ri-arrow-right-line"></i>
                                </Link>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="services-vector">
                <img src="/assets/images/services/services-vector.png" alt="vector" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ categories: Array });

// Helper to route to your new brochure pages
const getServiceRoute = (service) => {
    const name = service.name.toLowerCase();
    if (name.includes('nail')) return route('gorgeousnails');
    if (name.includes('wax') || name.includes('soft')) return route('leavemesoft');
    if (name.includes('massage') || name.includes('knead')) return route('whatyouknead');
    if (name.includes('hair')) return route('hairathome');
    return route('treatyourself'); // Default
};
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
</style>