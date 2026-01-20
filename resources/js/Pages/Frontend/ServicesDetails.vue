<template>
        <GuestLayout>

    <div>
                <!-- Inner Banner -->
        <div class="inner-banner">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <div class="inner-title">
                            <h3>Service Details</h3>
                            <ul>
                                <li>
                                 <Link href="/">Home</Link>
                                </li>
                                <li>Services</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Inner Banner End -->
<ServicesDetails :service="service" />
    </div>
     </GuestLayout>
</template>

<script setup>
import Services from '@/Components/Services.vue';
import ServicesDetails from '@/Components/ServicesDetails.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    service: Object
});

</script>

<style scoped>

</style>