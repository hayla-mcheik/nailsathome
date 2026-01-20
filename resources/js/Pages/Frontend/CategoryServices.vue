<template>
    <GuestLayout>
  <div class="inner-banner">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <div class="inner-title">
                            <h3>Service Details</h3>
                            <ul>
                                <li>
                                  <Link href="/">Home</Link>
                                </li>
                                <li>Service Details</li>
                            </ul>
                        </div>
                    </div>

            
                </div>
            </div>
        </div>
        <div class="services-details-area ptb-100 bg-[#fafafa]">
            <div class="container">
                <div class="section-title text-center mb-50">
                    <span class="uppercase tracking-widest text-[#b95c19] font-bold text-sm">Service Menu</span>
                    <h2 class="font-serif text-5xl mt-2">{{ category.name }}</h2>
                    <div class="lux-line mx-auto mt-3"></div>
                </div>

                <div class="row justify-content-center">
                    <div v-for="service in category.services" :key="service.id" class="col-lg-4 col-md-6 mb-4">
                        <div class="service-card-minimal p-5 border-0 rounded-0 shadow-sm hover:shadow-lg transition bg-white h-100">
                            
                            <h3 class="font-bold text-2xl mb-3 text-gray-900 border-bottom pb-2">{{ service.name }}</h3>
                            
                            <p v-if="service.description" class="text-gray-500 text-sm mb-4 leading-relaxed italic">
                                {{ service.description }}
                            </p>

                            <div class="variants-list mt-4">
                                <div v-for="variant in service.variants" :key="variant.id" 
                                     class="d-flex justify-content-between align-items-baseline mb-3">
                                    <div class="flex-grow-1 pr-3">
                                        <div class="font-semibold text-md text-gray-800 uppercase tracking-tight">{{ variant.title }}</div>
                                        <div v-if="variant.duration" class="text-xs text-gray-400 mt-1 uppercase tracking-wider">
                                            <i class="ri-time-line"></i> {{ variant.duration }} mins
                                        </div>
                                    </div>
                                    <div class="dots-spacer flex-grow-1 border-bottom border-dotted border-gray-300 mx-2 mb-1"></div>
                                    <div class="text-[#b95c19] font-bold text-lg">
                                        ${{ variant.price }}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 text-center">
                                <a href="https://wa.me/97142828385" target="_blank" 
                                   class="booking-link text-xs font-bold uppercase tracking-widest text-gray-400 hover:text-[#b95c19] transition">
                                    Book This Service <i class="ri-arrow-right-line ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import NavLink from '@/Components/NavLink.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    category: Object
});
</script>

<style scoped>
/* Luxury Typography */
.font-serif { font-family: 'Cormorant Garamond', serif; }

.service-card-minimal {
    border-top: 4px solid #b95c19 !important; /* Elegant top border accent */
    transition: all 0.4s ease;
}

.lux-line {
    width: 60px;
    height: 1px;
    background-color: #b95c19;
}

/* Classic Menu Dots Effect */
.dots-spacer {
    height: 1px;
    border-bottom: 2px dotted #eee !important;
}

.booking-link {
    text-decoration: none;
    border-bottom: 1px solid transparent;
}

.booking-link:hover {
    border-bottom: 1px solid #b95c19;
}

/* Spacing and Hover */
.service-card-minimal:hover {
    transform: translateY(-8px);
}
</style>