<template>
    <div class="about-editorial-root py-5 position-relative overflow-hidden">
        
        <div class="art-background-layer">
            <div class="large-bg-text">prepare to be pampred</div>
            <svg class="botanical-svg" viewBox="0 0 100 100" fill="none">
                <path d="M10 80C30 80 80 60 90 10M10 80C40 70 80 40 90 10" stroke="#b95c19" stroke-width="0.2" opacity="0.2"/>
            </svg>
        </div>

        <div class="wide-content-wrapper px-4 px-md-5 position-relative z-2">
            
            <div class="header-minimal mb-4">
                <span class="eyebrow">Established 2005 / Dubai’s Premier Mobile Spa</span>
                <h2 class="display-title mt-2">{{ about?.title }}</h2>
 
            </div>

            <div class="description-full-width">
                <p class="editorial-text" v-html="about?.description"></p>
            </div>

            <div class="footer-compact mt-5 d-flex align-items-center gap-4">
                <div class="signature-wrap">
                    <img src="/assets/images/logo.png" alt="Signature" class="about-sig-logo">
            
                </div>
            
                <span class="motto mt-4">Nails At Home</span>
            </div>
            
        </div>
    </div>
</template>

<script setup>
defineProps({ about: Object });
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,900;1,400&family=Montserrat:wght@300;400;600;700&display=swap');

.about-editorial-root {
    background-color: #ffffff;
    color: #51555A;
    font-family: 'Montserrat', sans-serif;
    width: 100%;
    min-height: 60vh;
    display: flex;
    align-items: center;
}

/* Background "Polish It" Text Styling */
.art-background-layer {
    position: absolute;
    inset: 0;
    pointer-events: none;
    z-index: 1;
}

.large-bg-text {
    position: absolute;
    top: 50%;
    left: 0%;
    transform: translateY(-50%);
    font-family: 'Playfair Display', serif;
    font-size: 10vw;
    font-weight: 900;
    color: #e1b29d14; /* Extremely subtle grey-white */
    letter-spacing: -5px;
    line-height: 0.8;
    white-space: nowrap;
    z-index: 1;
}

.botanical-svg {
    position: absolute;
    width: 25%;
    top: 10%;
    right: -2%;
    z-index: 1;
    transform: rotate(-15deg);
}

/* Content Layout */
.wide-content-wrapper {
    width: 100%;
    z-index: 2;
}

/* Typography - Small & Refined */
.eyebrow {
    font-size: 0.6rem;
    text-transform: uppercase;
    letter-spacing: 4px;
    color: #e1b39d;
    font-weight: 700;
}

.display-title {
    font-size: 26px; /* Reduced for elegance */
    font-weight: 700;
    color: #51555A;
    text-transform: capitalize;
}

.accent-line {
    width: 40px;
    height: 1px;
    background-color: #e1b39d;
}

.editorial-text {
    /* Small font size matching footer (approx 13px) */
    font-size: 0.75rem; 
    line-height: 2.2;
    color: #51555A;
    font-weight: 400;

    letter-spacing: 0.4px;
}

/* Signature & Logo Styling */
.about-sig-logo {
    width: 55px;
    height: auto;
    opacity: 0.9;
}

.sig-font {
    font-family: 'Playfair Display', serif;
    font-size: 1.1rem;
    font-style: italic;
    color: #1a1a1a;
}

.dot-divider {
    width: 4px;
    height: 4px;
    background-color: #e1b39d;
    border-radius: 50%;
}

.motto {
    font-size: 9px;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #999;
}

@media (max-width: 768px) {
    .large-bg-text { font-size: 10vw; left: -10%; }
    .display-title { font-size: 1.1rem; margin-top: 20px !important; }
    .editorial-text { font-size: 0.7rem; max-width: 100%; }
    .footer-compact { flex-direction: column; align-items: flex-start; gap: 15px; }
    .dot-divider { display: none; }
}
</style>