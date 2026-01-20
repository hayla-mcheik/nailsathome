<template>
        <GuestLayout>

            <!-- Inner Banner -->
        <div class="inner-banner">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <div class="inner-title">
                            <h3>Contact Us</h3>
                            <ul>
                                <li>
                                 <Link href="/">Home</Link>
                                </li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>

            
                </div>
            </div>
        </div>
        <!-- Inner Banner End -->
         <Contact />
     </GuestLayout>
</template>

<script setup>
import Contact from '@/Components/Contact.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';


</script>

<style scoped>

</style>