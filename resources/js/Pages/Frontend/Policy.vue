<template>
    <GuestLayout>
        <div class="policy-area ptb-100 bg-[#faefed] text-dark">
            <div class="container">
                <div class="row g-5">
                    <div v-for="policy in policies" :key="policy.id" class="col-lg-6">
                        <div class="policy-item mb-5">
                            <h2 class="font-serif text-4xl mb-3 text-dark">{{ policy.title }}</h2>
                            <div class="policy-content leading-relaxed opacity-90">
                                {{ policy.content }}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="footer-info mt-5 pt-5 border-top border-white/20 text-sm opacity-70">
                    <p>(All prices are in UAE dirham / VAT not included)</p>
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
.font-serif { font-family: 'Cormorant Garamond', serif; }
</style>