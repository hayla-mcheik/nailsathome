<template>
    <GuestLayout>
        <section class="transportation-wrap py-24 bg-[#fffaf8] text-[#1a1a1a] overflow-hidden">
            <div class="transport-watermark">
                <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#e1b39d" stroke-width="0.1" opacity="0.3" />
                </svg>
            </div>

            <div class="container-fluid px-lg-5 position-relative z-2">
                <div class="row g-5">
                    <div class="col-lg-4">
                        <div class="sidebar-sticky sticky-top" style="top: 120px;">
                            <span class="eyebrow-lux">Logistics & Service Area</span>
                            <h2 class="script-font mt-2 mb-1">Transportation</h2>
                            <h3 class="font-serif text-4xl mb-4">Network & Charges</h3>
                            <div class="lux-line-gold mb-4"></div>
                            
                            <p class="instruction-text mb-6">
                                The following list indicates our primary service areas and the 
                                travel fees associated with each. If your location is not listed, 
                                please request a custom quote when booking.
                            </p>

                            <div class="contact-hint">
                                <i class="ri-customer-service-2-line"></i>
                                <span>Contact our concierge for distant locations.</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="ledger-container">
                            <div class="row g-4">
                                <div v-for="colIndex in 3" :key="colIndex" class="col-md-4">
                                    <div class="ledger-column">
                                        <div v-for="(item, index) in getChunk(colIndex)" :key="item.id" class="fee-entry">
                                            <div class="d-flex justify-content-between align-items-baseline">
                                                <span class="entry-index">{{ calculateIndex(colIndex, index) }}</span>
                                                <span class="entry-name">{{ item.name }}</span>
                                                <span class="entry-dots"></span>
                                                <span class="entry-val">{{ item.fee ? item.fee.fee : '0' }}</span>
                                            </div>
                                        </div>
                                    </div>
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
import GuestLayout from '@/Layouts/GuestLayout.vue';

const props = defineProps({
    transportation: Array 
});

const itemsPerCol = 18;

const getChunk = (colIndex) => {
    const start = (colIndex - 1) * itemsPerCol;
    const end = colIndex * itemsPerCol;
    return props.transportation ? props.transportation.slice(start, end) : [];
};

const calculateIndex = (colIndex, index) => {
    return (colIndex - 1) * itemsPerCol + index + 1;
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display:ital,wght@0,700;1,400&family=Inter:wght@300;400;700&display=swap');

.font-serif { font-family: 'Playfair Display', serif; }

.eyebrow-lux {
    font-family: 'Inter', sans-serif;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 4px;
    font-weight: 700;
    color: #e1b39d;
}

.script-font {
    font-family: 'Dancing Script', cursive;
    font-size: 3rem;
    color: #1a1a1a;
}

.lux-line-gold {
    width: 40px;
    height: 1px;
    background-color: #e1b39d;
}

.instruction-text {
    font-family: 'Inter', sans-serif;
    font-size: 0.95rem;
    line-height: 1.8;
    color: #555;
    font-weight: 300;
}

.contact-hint {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #999;
    font-weight: 700;
}

/* Ledger Styling */
.ledger-column {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.fee-entry {
    font-family: 'Inter', sans-serif;
    padding-bottom: 2px;
}

.entry-index {
    font-size: 9px;
    color: #e1b39d;
    font-weight: 700;
    width: 15px;
}

.entry-name {
    font-size: 11px;
    color: #1a1a1a;
    font-weight: 400;
    text-transform: capitalize;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 110px;
}

.entry-dots {
    flex-grow: 1;
    border-bottom: 1px dotted rgba(225, 179, 157, 0.4);
    margin: 0 5px;
    position: relative;
    top: -4px;
}

.entry-val {
    font-size: 11px;
    font-weight: 700;
    color: #1a1a1a;
}

.ledger-footer {
    border-top: 1px solid rgba(225, 179, 157, 0.2);
}

.footer-disclaimer {
    font-size: 0.65rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #999;
    text-align: center;
}

.transport-watermark {
    position: absolute;
    top: 50%;
    right: -10%;
    width: 40%;
    pointer-events: none;
    z-index: 1;
}

.z-2 { z-index: 2; }

@media (max-width: 991px) {
    .sidebar-sticky { position: static; margin-bottom: 60px; }
    .text-4xl { font-size: 2rem; }
}
</style>