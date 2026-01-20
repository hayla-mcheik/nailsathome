<template>
    <GuestLayout>
        <section class="hair-brochure-header ptb-100 bg-[#faefed] text-white text-center">
            <div class="container">
                <h1 class="font-serif text-3xl mb-4">Hair At Home</h1>


            </div>
        </section>

        <section v-for="(services, groupName) in sections" :key="groupName" class="hair-section py-12 bg-white border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 mb-4">
                        <h2 class="font-serif text-2xl text-[#b95c19] sticky top-24">{{ groupName }}</h2>
                    </div>

                    <div class="col-lg-9">
                        <div class="row g-4">
                            <div v-for="service in services" :key="service.id" class="col-md-6">
                                <div class="service-item pb-3 border-bottom border-gray-100">
                                    <div class="d-flex justify-content-between align-items-baseline">
                                        <h3 class="font-bold text-lg uppercase tracking-tight">{{ service.service_name }}</h3>
                                        
                                        <div class="text-right">
                                            <span v-if="service.price_standard" class="font-bold text-[#b95c19]">
                                                {{ service.price_standard }}
                                            </span>
                                            
                                            <div v-if="service.price_majirel || service.price_inoa" class="text-xs flex gap-3 mt-1">
                                                <span v-if="service.price_majirel">Majirel: <b>{{ service.price_majirel }}</b></span>
                                                <span v-if="service.price_inoa">Inoa: <b>{{ service.price_inoa }}</b></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <p v-if="service.description" class="text-sm text-gray-500 mt-2 italic">
                                        {{ service.description }}
                                    </p>
                                    <span v-if="service.duration" class="text-[10px] text-gray-400 uppercase tracking-widest">
                                        <i class="ri-time-line"></i> {{ service.duration }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-12 bg-[#fafafa] text-center">
            <div class="container">
                <p class="text-gray-500 mb-4 italic">5% VAT Applicable</p>
                <a href="https://wa.me/97142828385" target="_blank" class="nav-cta-btn">Book Your Hair Session</a>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    sections: Object
});
</script>

<style scoped>
.lux-line { width: 40px; height: 1px; background: white; }
.hair-section:nth-child(even) { background-color: #fdfaf8; }

.nav-cta-btn {
    background: #b95c19;
    color: white;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: 700;
    display: inline-block;
    text-decoration: none;
    transition: 0.3s;
}

.nav-cta-btn:hover {
    background: #000;
    transform: translateY(-3px);
}
</style>