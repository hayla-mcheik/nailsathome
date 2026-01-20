<template>
    <section class="spa-experience ptb-100 bg-[#faefed] text-[#000]">
        <div class="container-fluid">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="philosophy-box">
                        <h2 class="script-title text-[#000] mb-4">Treat Yourself</h2>
                        <p class="text-sm leading-relaxed opacity-90 mb-4 text-dark">
                            Your hands and feet are in for a treat with Nails At Home’s vast and creative selection 
                            of deluxe treatments. For us, hygiene is more than a concern, it’s a philosophy, 
                            and the products we use are of the highest quality. 
                        </p>
                        <p class="font-bold text-dark">After all, you deserve only the best!</p>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="section-header mb-5 border-bottom border-[#e59e6d]/30 pb-3">
                        <h2 class="font-serif text-3xl text-dark">Pamper Your Hands</h2>
                    </div>

                    <div class="row g-5">
                        <div v-for="item in spaTreatments" :key="item.id" class="col-md-6">
                            <div class="treatment-item mb-4">
                                <div class="d-flex justify-content-between align-items-baseline mb-2">
                                    <h3 class="text-xl font-bold text-dark m-0">
                                        {{ item.title }} <small class="fw-normal text-dark opacity-75">({{ item.duration }})</small>
                                    </h3>
                                    <span class="text-xl font-bold text-dark">{{ item.price }}</span>
                                </div>
                                <p class="text-sm text-dark opacity-90 leading-relaxed mb-2">
                                    {{ item.description }}
                                </p>
                                <p v-if="item.advance_booking" class="text-xs text-dark italic opacity-75">
                                    (Please book in advance if you require this treatment)
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 opacity-50 text-xs italic">
                        5% VAT Applicable
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({ spaTreatments: Array });
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display:wght@700&display=swap');

.script-title {
    font-family: 'Dancing Script', cursive;
    font-size: 2rem;
}

.font-serif {
    font-family: 'Playfair Display', serif;
}

.treatment-item {
    border-left: 1px solid rgba(229, 158, 109, 0.2);
    padding-left: 1.5rem;
}
</style>