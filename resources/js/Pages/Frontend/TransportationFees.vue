<template>
    <GuestLayout>
        <div class="inner-banner-minimal pt-100 mt-3 pb-50">   
            <Breadcrumbs title="Transportation Fees" height="50vh" />   
        </div>

        <section class="transportation-wrap pb-24 pt-5 text-[#1a1a1a]">
            <div class="container-fluid px-lg-5">
                <div class="row g-5">
                    
                    <div class="col-lg-4">
                        <div class="sticky-top" style="top: 120px;">
                            <h2 class="script-font mb-1">Areas Transportation Fees</h2>
                            <div class="lux-line-gold mb-4" style="width:40px; height:1px; background:#e1b39d;"></div>
                            
                            <p class="instruction-text mb-4" style="font-size:0.8rem; color:#666;">
                                The following list indicates our primary service areas and fees.
                            </p>
                            
                            <div class="area-counter" style="color:#e1b39d; font-weight:700; font-size:0.7rem; text-transform:uppercase; letter-spacing:1px;">
                                Showing {{ transportation.length }} Service Locations
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div style="column-count: 2; column-gap: 40px;">
                            <div v-for="(item, index) in transportation" :key="item.id" class="mb-3" style="break-inside: avoid;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span style="font-size:0.65rem; color:#e1b39d; width:25px;">{{ index + 1 }}</span>
                                    <span style="font-size:0.8rem; color:#51555A; flex-grow:1;">{{ item.name }}</span>
                                    <span style="border-bottom: 1px dotted #e1b39d; flex-grow:1; margin: 0 10px; opacity:0.3;"></span>
                                    <span style="font-size:0.85rem; font-weight:700;">
                                        {{ item.fee ? item.fee.fee : '0' }} <small style="font-size:0.6rem; color:#999;">AED</small>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    transportation: Array
});
</script>

<style scoped>
.script-font { font-size: 26px; color: #51555A; font-weight: 700; text-transform: uppercase; }
@media (max-width: 991px) {
    .sticky-top { position: static !important; text-align: center; margin-bottom: 30px; }
    .lux-line-gold { margin: 0 auto; }
}
@media (max-width: 768px) {
    div[style*="column-count: 2"] { column-count: 1 !important; }
}
</style>