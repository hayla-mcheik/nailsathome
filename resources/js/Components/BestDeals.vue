<template>
    <div class="pricing-area section-bg pt-100 pb-70">
        <div class="container">
            <div class="section-title mb-45 text-center">
                <span>Best Deals</span>
                <h2>Our Best Price Packages</h2>
            </div>
            <div class="row">
                <div class="col-lg-6" v-for="(group, index) in chunkedPackages" :key="index">
                    <div class="pricing-card">
                        <ul>
                            <li v-for="pkg in group" :key="pkg.id">
                                <img :src="pkg.image ? '/storage/' + pkg.image : '/assets/images/pricing/pricing-img1.jpg'" alt="Pricing" />
                                <div class="content">
                                    <h3>{{ pkg.name }} <span>${{ pkg.price }}</span></h3>
                                    <p>{{ pkg.description }}</p>
                                    <div class="included-services text-xs text-muted" v-if="pkg.services?.length">
                                        Includes: {{ pkg.services.map(s => s.name).join(', ') }}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue';

const props = defineProps({
    packages: Array
});

// Logic to split the packages array into two columns
const chunkedPackages = computed(() => {
    const size = Math.ceil(props.packages.length / 2);
    return [
        props.packages.slice(0, size),
        props.packages.slice(size)
    ];
});
</script>