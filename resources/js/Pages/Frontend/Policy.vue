<template>
    <GuestLayout>
   <div class="inner-banner-minimal pt-100 mt-3 pb-50">  
            <Breadcrumbs title="Policy" height="50vh" />   
        </div>

        <div class="policy-area pb-5 pt-5 bg-[#ffffff] position-relative overflow-hidden">
            <div class="policy-bg-watermark">
                <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#b95c19" stroke-width="0.1" opacity="0.2" />
                </svg>
            </div>

            <div class="container position-relative z-2">
                <div class="row mb-5">
                    <div class="col-12 border-bottom-lux pb-4">
                        <h1 class="display-title-lux mt-2">Nails At Home Policies</h1>
                    </div>
                </div>

                <div class="row g-5">
                    <div v-for="(policy, index) in policies" :key="policy.id" class="col-lg-6">
                        <div class="policy-card">
                            <div class="d-flex align-items-baseline gap-2 mb-2">
                                <span class="policy-index">{{ String(index + 1).padStart(2, '0') }}</span>
                                <h2 class="policy-title-lux">{{ policy.title }}</h2>
                            </div>
                            
                            <div class="policy-content-lux">
                                {{ policy.content }}
                            </div>
                            
                            <div class="policy-accent-line mt-3"></div>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="row mt-5 pt-4 border-top-lux">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <span class="vat-disclaimer">5% VAT Applicable</span>
                        <span class="brand-signature-small">Your Sanctuary, Our Service</span>
                    </div>
                </div> -->
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
defineProps({ policies: Array });
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Montserrat:wght@300;400;600;700&display=swap');

.policy-area {
    background-color: #fff;
    color: #51555A;
}

/* Header Styling - Reduced Scales */
.eyebrow-lux {
    font-size: 0.7rem;
    font-weight: 700;
    color: #51555A;
}

.display-title-lux {
    font-size: 26px;
    color: #51555A;
    font-weight: 700;
}

.border-bottom-lux {
    border-bottom: 1px solid #f2f2f2;
}

.border-top-lux {
    border-top: 1px solid #f2f2f2;
}

/* Policy Card Styling - Small Font */
.policy-index {
    font-size: 0.8rem;
    font-weight: 700;
    color: #b95c19;
}

.policy-title-lux {
     font-size: 0.8rem;
    font-weight: 700;
    color: #51555A;
}

.policy-content-lux {
   font-size: 0.8rem; /* Small scale matches brochure */
    color: #666;
    font-weight: 400;
    max-width: 90%;
}

.policy-accent-line {
    width: 25px;
    height: 1px;
    background-color: #b95c19;
    opacity: 0.6;
}

/* Footer Styling */
.vat-disclaimer {
     font-size: 0.8rem;
    color: #999;
    text-transform: uppercase;
    font-weight: 700;
}

.brand-signature-small {
    color: #999;
    font-size: 0.7rem;
}

/* Background Watermark */
.policy-bg-watermark {
    position: absolute;
    bottom: -2%;
    right: -2%;
    width: 25%;
    pointer-events: none;
    z-index: 1;
}

.z-2 { z-index: 2; }

@media (max-width: 768px) {
    .display-title-lux { font-size: 1.1rem; }
    .policy-content-lux { font-size: 0.7rem; max-width: 100%; }
}
</style>