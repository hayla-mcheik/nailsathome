<template>
    <div class="services-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="side-bar-area pr-20">
                        <div class="services-catagory">
                            <h3 class="mb-3">Quick Links</h3>
                            <ul>
                                <li>
                                    <Link :href="route('services')">
                                        View All Services
                                        <i class="ri-arrow-right-s-line"></i>
                                    </Link>
                                </li>
                                <li>
                                    <Link :href="route('contact')">
                                        Contact Us
                                        <i class="ri-arrow-right-s-line"></i>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="services-details-content">
                        <div class="services-preview-img">
                            <img 
                                :src="service.image ? '/storage/' + service.image : '/assets/images/services/services-details.jpg'" 
                                :alt="service.name" 
                            />
                        </div>
                        <h2 class="title">{{ service.name }}</h2>
                        <p class="description">{{ service.description }}</p>
                        
                        <div v-if="service.variants && service.variants.length > 0" class="mt-5">
                            <h3>Pricing & Duration Options</h3>
                            <div class="table-responsive">
                                <table class="table border mt-3">
                                    <thead>
                                        <tr class="bg-light">
                                            <th>Treatment Option</th>
                                            <th>Duration</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="variant in service.variants" :key="variant.id">
                                            <td>{{ variant.title }}</td>
                                            <td>{{ variant.duration }} {{ variant.unit || 'mins' }}</td>
                                            <td class="font-weight-bold text-primary">
                                                AED {{ variant.price }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="mt-4">
                             <a href="https://wa.me/97142828385" target="_blank" class="default-btn active">
                                Book This Service via WhatsApp
                             </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    service: Object
});
</script>