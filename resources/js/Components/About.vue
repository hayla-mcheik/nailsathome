<template>
    <div class="about-full-width-root py-5 position-relative overflow-hidden">
        
        <div class="watermark-layer">
            <svg viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#e1b39d" stroke-width="0.1" opacity="0.3" />
                <circle cx="50" cy="50" r="1.5" fill="#e1b39d" opacity="0.2" />
            </svg>
        </div>

        <div class="wide-content-wrapper px-4 px-md-5 position-relative z-2">
            
            <div class="header-minimal mb-4">
                <span class="eyebrow">Established 2005 / Dubai’s Premier Mobile Spa</span>
                <h2 class="display-title mt-2">{{ about?.title }}</h2>
                <div class="accent-line my-3"></div>
            </div>

            <div class="description-full-width">
                <p class="editorial-text" v-html="about?.description"></p>
            </div>

            <div class="footer-compact mt-5 d-flex align-items-center gap-3">
                <span class="sig-font">Nails At Home Salon</span>
                <span class="dot-divider"></span>
                <span class="motto">Professional Care At Your Doorstep</span>
            </div>
            
        </div>
    </div>
</template>

<script setup>
defineProps({ about: Object });


</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Inter:wght@300;400;600&display=swap');

.about-full-width-root {
    background-color: #fff;
    color: #1a1a1a;
    font-family: 'Inter', sans-serif;
    width: 100%;
}

/* Watermark centered behind the content */
.watermark-layer {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 800px;
    pointer-events: none;
    z-index: 1;
}

.wide-content-wrapper {
    width: 100%;
    max-width: 100%; /* Overrides Bootstrap container limits */
}

/* Typography */
.eyebrow {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 4px;
    color: #e1b39d;
    font-weight: 700;
}

.display-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    font-weight: 700;
    line-height: 1.1;
    margin: 0;
}

.accent-line {
    width: 80px;
    height: 1px;
    background-color: #e1b39d;
}

/* THE FIX: Full width text styling */
.editorial-text {
    font-size: 1.25rem;
    line-height: 1.8;
    color: #333;
    font-weight: 300;
    width: 100%; /* Forces the text to take all available horizontal space */
    margin: 0;
    text-align: left; /* Keep left aligned for editorial look, or use 'justify' for a block look */
}

.sig-font {
    font-family: 'Playfair Display', serif;
    font-size: 1.3rem;
    font-style: italic;
    color: #1a1a1a;
}

.dot-divider {
    width: 6px;
    height: 6px;
    background-color: #e1b39d;
    border-radius: 50%;
}

.motto {
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #999;
}

.z-2 { z-index: 2; }

@media (max-width: 768px) {
    .display-title { font-size: 2.2rem; }
    .footer-compact { flex-direction: column; align-items: flex-start; gap: 10px; }
    .dot-divider { display: none; }
}
</style>