<template>
    <GuestLayout>
        <div class="inner-banner-minimal pt-100 mt-3 pb-50">     
            <Breadcrumbs title="FAQs" height="50vh" />      
        </div>

        <div class="faq-area pb-100 mt-5 bg-white">
            <div class="container max-w-3xl">
                <div class="text-center mb-5">
                    <h2 class="faq-main-heading">Frequently Asked Questions</h2>
                </div>

                <div class="faq-list mt-5">
                    <div v-for="item in faq" :key="item.id" class="faq-item border-bottom">
                        <details class="group">
                            <summary class="d-flex justify-content-between align-items-center py-4 list-none cursor-pointer">
                                <span class="faq-question-text">{{ item.title }}</span>
                                <span class="faq-icon transition-transform group-open:rotate-45">
                                    <i class="ri-add-line"></i>
                                </span>
                            </summary>
                            <div class="faq-answer-box pb-4">
                                <p class="faq-answer-text">{{ item.description }}</p>
                            </div>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import Breadcrumbs from '@/Components/Breadcrumbs.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
defineProps({ faq: Array });
</script>

<style scoped>
.faq-main-heading {
    font-size: 26px;
    color: #51555A;
        font-weight: 700;
    text-transform: capitalize;
}

.faq-question-text {
    font-size: 14px; /* Refined header size */
    font-weight: 700;
    color: #51555A;
}

.faq-answer-text {
    font-size: 0.7rem; /* Small text scale */
    color: #51555A;
}

.faq-icon {
    font-size: 16px;
    color: #51555A;
}

/* Horizontal separators from reference */
.faq-item {
    border-color: #f0f0f0 !important;
}

summary::-webkit-details-marker {
    display: none;
}

@media (max-width: 991px) {
.faq-main-heading {
    font-size: 1.1rem;
    color: #51555A;
    font-weight: 700;
    text-transform: capitalize;
}
.faq-question-text {
    font-size: 0.8rem; /* Refined header size */
    font-weight: 700;
    color: #51555A;
}

}
</style>