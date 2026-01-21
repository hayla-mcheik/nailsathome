<template>
    <GuestLayout>
        <section class="hair-brochure-header ptb-100 bg-[#fffaf8] position-relative overflow-hidden">
            <div class="watermark-layer">
                <svg viewBox="0 0 100 100" fill="none" class="w-64 opacity-10">
                    <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#e1b39d" stroke-width="0.3" />
                </svg>
            </div>
            
            <div class="container position-relative z-2 text-center">
                <span class="eyebrow-lux">Professional Artistry</span>
                <h1 class="font-serif text-6xl mt-3 mb-4 text-[#1a1a1a]">Hair At Home</h1>
                <div class="lux-divider-gold mx-auto"></div>
                <p class="header-subtitle mt-4">Dubai’s premier mobile hair boutique.</p>
            </div>
        </section>

        <section v-for="(services, groupName) in sections" :key="groupName" class="hair-section py-20 bg-white border-bottom-lux">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-3">
                        <div class="sticky-top" style="top: 120px;">
                            <span class="cat-num-lux">0{{ Object.keys(sections).indexOf(groupName) + 1 }}</span>
                            <h2 class="font-serif text-4xl text-[#1a1a1a] mt-2">{{ groupName }}</h2>
                            <div class="accent-bar mt-3"></div>
                        </div>
                    </div>

                    <div class="col-lg-9">
                        <div class="row g-4">
                            <div v-for="service in services" :key="service.id" class="col-md-6">
                                <div class="hair-service-item h-100 pb-4">
                                    <div class="d-flex justify-content-between align-items-baseline gap-3">
                                        <h3 class="service-name-font">{{ service.service_name }}</h3>
                                        <span class="dotted-spacer"></span>
                                        
                                        <div class="price-box text-end">
                                            <span v-if="service.price_standard" class="main-price">
                                                <small>AED</small> {{ service.price_standard }}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div v-if="service.price_majirel || service.price_inoa" class="special-prices mt-2">
                                        <div v-if="service.price_majirel" class="color-tag">
                                            Majirel <span class="tag-price">AED {{ service.price_majirel }}</span>
                                        </div>
                                        <div v-if="service.price_inoa" class="color-tag">
                                            Inoa <span class="tag-price">AED {{ service.price_inoa }}</span>
                                        </div>
                                    </div>
                                    
                                    <p v-if="service.description" class="service-desc mt-3">
                                        {{ service.description }}
                                    </p>
                                    
                                    <div v-if="service.duration" class="service-duration mt-2">
                                        <i class="ri-time-line"></i> {{ service.duration }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-[#fffaf8] text-center position-relative">
            <div class="container">
                <p class="text-sm tracking-widest uppercase text-[#999] mb-4">5% VAT Applicable</p>
                <h2 class="font-serif text-4xl mb-5">Ready for your transformation?</h2>
                <a href="https://wa.me/97142828385" target="_blank" class="editorial-cta-btn">
                    Book Your Session <i class="ri-whatsapp-line"></i>
                </a>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Inter:wght@300;400;700&display=swap');

/* Base Styles */
.font-serif { font-family: 'Playfair Display', serif; }
.hair-section { font-family: 'Inter', sans-serif; }

/* Header Elements */
.eyebrow-lux {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 5px;
    font-weight: 700;
    color: #e1b39d;
}

.lux-divider-gold { width: 60px; height: 1.5px; background: #e1b39d; }

.header-subtitle {
    font-size: 1.1rem;
    color: #666;
    font-weight: 300;
}

/* Sidebar Elements */
.cat-num-lux {
    font-size: 0.8rem;
    font-weight: 700;
    color: #e1b39d;
    letter-spacing: 2px;
}

.accent-bar { width: 30px; height: 1px; background: #e1b39d; }

/* Service Item Styling */
.hair-service-item {
    border-bottom: 1px solid rgba(0,0,0,0.05);
}

.service-name-font {
    font-size: 1.1rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #1a1a1a;
    margin: 0;
}

.dotted-spacer {
    flex-grow: 1;
    border-bottom: 1px dotted #e1b39d;
    position: relative;
    top: -5px;
}

.main-price {
    font-weight: 700;
    font-size: 1.1rem;
    color: #1a1a1a;
}

.main-price small {
    font-size: 0.6rem;
    color: #e1b39d;
    margin-right: 3px;
}

/* Color Tags (Majirel/Inoa) */
.special-prices {
    display: flex;
    gap: 15px;
}

.color-tag {
    font-size: 0.65rem;
    text-transform: uppercase;
    font-weight: 700;
    color: #999;
}

.tag-price {
    color: #1a1a1a;
    margin-left: 5px;
}

.service-desc {
    font-size: 0.85rem;
    line-height: 1.6;
    color: #666;
    font-weight: 300;
    font-style: italic;
}

.service-duration {
    font-size: 0.65rem;
    text-transform: uppercase;
    color: #e1b39d;
    font-weight: 700;
    letter-spacing: 1px;
}

/* CTA Styling */
.editorial-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 15px;
    background: #1a1a1a;
    color: white;
    padding: 18px 45px;
    text-transform: uppercase;
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 2px;
    text-decoration: none;
    transition: 0.4s;
}

.editorial-cta-btn:hover {
    background: #e1b39d;
    transform: translateY(-5px);
}

.watermark-layer {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    pointer-events: none;
    z-index: 1;
}

.border-bottom-lux {
    border-bottom: 1px solid rgba(225, 179, 157, 0.2);
}

@media (max-width: 991px) {
    .text-6xl { font-size: 3rem; }
    .sticky-top { position: static !important; margin-bottom: 40px; }
}
</style>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    sections: Object
});
</script>

