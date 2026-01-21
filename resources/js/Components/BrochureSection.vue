<template>
    <section :class="['spa-experience py-24 position-relative overflow-hidden', themeColor]">
        
        <div class="section-watermark">
            <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#e1b39d" stroke-width="0.2" opacity="0.15" />
            </svg>
        </div>

        <div class="container position-relative z-index-10">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="sidebar-sticky sticky-top" style="top: 120px;">
                        <span class="eyebrow-lux">Luxury Selection</span>
                        <h2 class="script-title mt-2 mb-4">{{ sideTitle }}</h2>
                        <div class="lux-line mb-4"></div>
                        <div class="philosophy-content">
                            <p class="manifesto-p">After all, you deserve only the best!</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="menu-header mb-12">
                        <h2 class="font-serif text-5xl mb-3">{{ sectionTitle || 'Our Services' }}</h2>
                        <div class="d-flex align-items-center gap-3">
                            <span class="tax-tag">5% VAT Applicable</span>
                            <div class="flex-grow-1 border-bottom-dotted"></div>
                        </div>
                    </div>

                    <div class="row g-5">
                        <div v-for="item in services" :key="item.id" class="col-md-6">
                            <div class="editorial-treatment-item h-100">
                                <div class="d-flex justify-content-between align-items-baseline mb-2">
                                    <h3 class="item-title font-serif m-0">
                                        {{ item.title }}
                                    </h3>
                                    <span class="dotted-spacer"></span>
                                    <span class="item-price">AED {{ item.price }}</span>
                                </div>
                                
                                <div class="item-meta mb-2" v-if="item.duration">
                                    <span class="duration-badge">{{ item.duration }}</span>
                                </div>

                                <p class="item-desc">
                                    {{ item.description }}
                                </p>

                                <div v-if="item.advance_booking" class="booking-tag mt-3">
                                    <i class="ri-information-line"></i> Advance Booking Required
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    themeColor: {
        type: String,
        default: 'theme-white'
    },
    sideTitle: String,
    sectionTitle: String,
    services: Array
});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display:ital,wght@0,700;1,400&family=Inter:wght@300;400;700&display=swap');

/* Dynamic Themes */
.theme-white { background-color: #fff; }
.theme-default, .theme-brown, .theme-orange { background-color: #fffaf8; }

.spa-experience {
    font-family: 'Inter', sans-serif;
    color: #1a1a1a;
}

/* Typography */
.script-title {
    font-family: 'Dancing Script', cursive;
    font-size: 3rem;
    line-height: 1;
}

.font-serif {
    font-family: 'Playfair Display', serif;
}

.eyebrow-lux {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 4px;
    font-weight: 700;
    color: #e1b39d;
}

.manifesto-p {
    font-size: 1.1rem;
    font-weight: 600;
    font-style: italic;
    color: #1a1a1a;
}

/* Layout Decor */
.lux-line {
    width: 40px;
    height: 1px;
    background: #e1b39d;
}

.section-watermark {
    position: absolute;
    top: 50%;
    left: -5%;
    width: 30%;
    pointer-events: none;
    z-index: 1;
}

/* Service Item Styling */
.item-title {
    font-size: 1.3rem;
    color: #1a1a1a;
}

.dotted-spacer {
    flex-grow: 1;
    border-bottom: 1px dotted #ccc;
    margin: 0 10px;
    position: relative;
    top: -5px;
}

.item-price {
    font-weight: 700;
    font-size: 1.1rem;
    white-space: nowrap;
}

.duration-badge {
    font-size: 0.65rem;
    text-transform: uppercase;
    font-weight: 700;
    color: #e1b39d;
    letter-spacing: 1px;
}

.item-desc {
    font-size: 0.85rem;
    line-height: 1.7;
    color: #666;
    font-weight: 300;
}

.booking-tag {
    font-size: 0.7rem;
    text-transform: uppercase;
    font-weight: 700;
    color: #e1b39d;
    display: flex;
    align-items: center;
    gap: 5px;
}

.tax-tag {
    font-size: 0.6rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #999;
}

.border-bottom-dotted {
    border-bottom: 1px dotted rgba(0,0,0,0.1);
}

.z-index-10 { z-index: 10; }

@media (max-width: 991px) {
    .sidebar-sticky { position: static; margin-bottom: 60px; }
    .text-5xl { font-size: 2.5rem; }
    .script-title { font-size: 2.5rem; }
}
</style>

