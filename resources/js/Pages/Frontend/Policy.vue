<template>
    <GuestLayout>
        <div class="policy-area py-24 bg-[#fffaf8] position-relative overflow-hidden">
            
            <div class="policy-bg-watermark">
                <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#e1b39d" stroke-width="0.1" opacity="0.4" />
                </svg>
            </div>

            <div class="container position-relative z-2">
                <div class="row mb-12">
                    <div class="col-12 border-bottom-lux pb-4">
                        <span class="eyebrow-lux">Service Guidelines</span>
                        <h1 class="font-serif text-6xl mt-2 text-[#1a1a1a]">Nails At Home Policies</h1>
                    </div>
                </div>

                <div class="row g-5">
                    <div v-for="(policy, index) in policies" :key="policy.id" class="col-lg-6">
                        <div class="policy-card">
                            <div class="d-flex align-items-baseline gap-3 mb-3">
                                <span class="policy-index">0{{ index + 1 }}</span>
                                <h2 class="font-serif text-3xl text-[#1a1a1a]">{{ policy.title }}</h2>
                            </div>
                            
                            <div class="policy-content-lux">
                                {{ policy.content }}
                            </div>
                            
                            <div class="policy-accent-line mt-4"></div>
                        </div>
                    </div>
                </div>
                
          
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
defineProps({ policies: Array });
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Inter:wght@300;400;700&display=swap');

.policy-area {
    font-family: 'Inter', sans-serif;
    min-height: 80vh;
}

.font-serif {
    font-family: 'Playfair Display', serif;
}

/* Header Styling */
.eyebrow-lux {
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 5px;
    font-weight: 700;
    color: #e1b39d;
}

.border-bottom-lux {
    border-bottom: 1px solid rgba(225, 179, 157, 0.3);
}

.border-top-lux {
    border-top: 1px solid rgba(225, 179, 157, 0.3);
}

/* Policy Card Styling */
.policy-index {
    font-size: 0.8rem;
    font-weight: 700;
    color: #e1b39d;
    font-family: 'Inter', sans-serif;
}

.policy-content-lux {
    font-size: 1rem;
    line-height: 1.8;
    color: #555;
    font-weight: 300;
    white-space: pre-line; /* Keeps line breaks if content is long */
}

.policy-accent-line {
    width: 30px;
    height: 1px;
    background-color: #e1b39d;
    opacity: 0.5;
}

/* Footer Styling */
.vat-disclaimer {
    font-size: 0.75rem;
    color: #999;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.brand-signature-small {
    font-family: 'Playfair Display', serif;
    font-style: italic;
    color: #1a1a1a;
    font-size: 0.9rem;
}

/* Background Watermark */
.policy-bg-watermark {
    position: absolute;
    bottom: -5%;
    right: -5%;
    width: 35%;
    pointer-events: none;
    z-index: 1;
}

.z-2 { z-index: 2; }

@media (max-width: 991px) {
    .text-6xl { font-size: 3rem; }
    .text-3xl { font-size: 1.8rem; }
}
</style>