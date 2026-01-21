<template>
    <section class="spa-experience py-24 bg-[#fffaf8] text-[#1a1a1a] overflow-hidden">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="philosophy-sticky sticky-top" style="top: 120px;">
                        <span class="eyebrow-lux">Facial Collection</span>
                        <h2 class="script-title text-4xl mb-4 mt-2">Let's Turn Back Time</h2>
                        <div class="accent-bar-gold mb-4"></div>
                        <p class="philosophy-text mb-4">
                            All the best of our spa ingredients go into our facial treatments. 
                            Our massage techniques will take your skin on a journey of total renewal.
                        </p>
                        
                        <div class="section-watermark mt-5">
                            <svg viewBox="0 0 100 100" fill="none" class="w-32 opacity-10">
                                <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#e1b39d" stroke-width="0.3" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="menu-header mb-12 d-flex align-items-end justify-content-between">
                        <div>
                             <h2 class="font-serif text-5xl mb-2">Age-Defying Facials</h2>
                             <span class="tax-tag">5% VAT Applicable</span>
                        </div>
                        <div class="header-line flex-grow-1 ms-4 mb-2 border-bottom-dotted"></div>
                    </div>

                    <div class="row g-5">
                        <div v-for="item in turnbacktime" :key="item.id" class="col-md-6">
                            <div class="treatment-entry h-100">
                                <div class="entry-header d-flex align-items-baseline justify-content-between mb-2">
                                    <h3 class="entry-title font-serif">
                                        {{ item.title }} 
                                    </h3>
                                    <span class="dots-spacer"></span>
                                    <span class="entry-price">AED {{ item.price }}</span>
                                </div>
                                
                                <div class="entry-meta mb-2" v-if="item.duration">
                                    <span class="duration-label">{{ item.duration }}</span>
                                </div>

                                <p class="entry-description">
                                    {{ item.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display:ital,wght@0,700;1,400&family=Inter:wght@300;400;700&display=swap');

.script-title {
    font-family: 'Dancing Script', cursive;
    color: #1a1a1a;
}

.font-serif {
    font-family: 'Playfair Display', serif;
}

.eyebrow-lux {
    font-family: 'Inter', sans-serif;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 4px;
    font-weight: 700;
    color: #e1b39d;
}

.philosophy-text {
    font-family: 'Inter', sans-serif;
    font-size: 0.95rem;
    line-height: 1.8;
    color: #444;
    font-weight: 300;
}

.accent-bar-gold {
    width: 40px;
    height: 1px;
    background-color: #e1b39d;
}

/* Treatment Menu Styling */
.entry-title {
    font-size: 1.3rem;
    color: #1a1a1a;
    margin: 0;
}

.dots-spacer {
    flex-grow: 1;
    border-bottom: 1px dotted #ccc;
    margin: 0 10px;
    position: relative;
    top: -5px;
}

.entry-price {
    font-family: 'Inter', sans-serif;
    font-weight: 700;
    color: #1a1a1a;
    white-space: nowrap;
}

.duration-label {
    font-size: 0.65rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #e1b39d;
    font-weight: 700;
}

.entry-description {
    font-size: 0.85rem;
    line-height: 1.7;
    color: #666;
    font-weight: 300;
}

.tax-tag {
    font-size: 0.6rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #999;
}

.border-bottom-dotted {
    border-bottom: 1px dotted rgba(0,0,0,0.1);
}

@media (max-width: 991px) {
    .philosophy-sticky { position: static; margin-bottom: 50px; }
    .text-5xl { font-size: 2.5rem; }
}
</style>
<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ turnbacktime: Array });
</script>

