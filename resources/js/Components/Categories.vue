<template>
    <div class="couture-root pt-24  pb-2 position-relative overflow-hidden">
        
        <div class="art-background pt-5">
            <div class="floating-text-bg">Polish It</div>
            <svg class="botanical-svg leaf-1" viewBox="0 0 100 100" fill="none">
                <path d="M10 80C30 80 80 60 90 10M10 80C40 70 80 40 90 10" stroke="#e1b39d" stroke-width="0.3" opacity="0.4"/>
                <path d="M15 75L30 65M25 65L40 55M35 55L50 45" stroke="#e1b39d" stroke-width="0.2"/>
            </svg>
            <svg class="botanical-svg lotus-2" viewBox="0 0 100 100" fill="none">
                <path d="M50 10C55 40 90 50 90 50C70 55 55 60 50 90C45 60 30 55 10 50C30 50 45 40 50 10Z" stroke="#e1b39d" stroke-width="0.3" opacity="0.3"/>
            </svg>
        </div>

        <div class="container position-relative z-index-10">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="hero-title">Signature <br><span class="italic-text">Collection</span></h2>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="header-manifesto">
                    
                        <p>We can’t wait to reach you, and give you the 
treatment you deserve. So give us a call, settle into a 
comfortable couch, and prepare to be pampered!
.</p>
                        <div class="horizontal-bar"></div>
                    </div>
                </div>
            </div>

            <div v-for="(category, index) in categories" :key="category.id" class="editorial-category mb-1">
                <div class="row">
                    <div class="col-md-1 d-none d-md-block">
                        <span class="vertical-num">{{ String(index + 1).padStart(2, '0') }}</span>
                    </div>

                    <div class="col-md-4">
                        <div class="sticky-top" style="top: 100px;">
                            <h3 class="category-display-title">{{ category.name }}</h3>
                            <p class="category-subtitle" v-if="category.description">{{ category.description }}</p>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="menu-grid">
                            <div v-for="service in category.services" :key="service.id" class="menu-entry">
                                <Link :href="route('serviceshow', service.id)" class="menu-link">
                                    <div class="menu-main">
                                        <div class="menu-left">
                                            <h4 class="service-name-font">{{ service.name }}</h4>
                                            <div class="service-details-row">
                                                <span class="s-time">{{ service.variants?.[0]?.duration }} MINS</span>
                                                <span class="s-line"></span>
                                                <span class="s-type">Premium Treatment</span>
                                            </div>
                                        </div>
                                        <div class="menu-right">
                                            <span class="price-val"><small>AED</small> {{ service.variants?.[0]?.price }}</span>
                                            <i class="ri-arrow-right-up-line"></i>
                                        </div>
                                    </div>
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,400&family=Outfit:wght@200;400;700&display=swap');

.couture-root {
    background-color: #fffaf8; /* Soft paper texture color */
    color: #1a1a1a;
    font-family: 'Outfit', sans-serif;
}

/* Background Art */
.art-background {
    position: absolute;
    inset: 0;
    pointer-events: none;
}

.floating-text-bg {
    position: absolute;
    top: 5%;
    left: -2%;
    font-family: 'Playfair Display', serif;
    font-size: 15vw;
    font-weight: 900;
    color: #f5eeea;
    letter-spacing: -5px;
    line-height: 0.8;
}

.botanical-svg {
    position: absolute;
    width: 30%;
    z-index: 1;
}

.leaf-1 { top: 10%; right: -5%; transform: rotate(-10deg); }
.lotus-2 { bottom: 5%; left: -5%; width: 25%; }

/* Typography */
.hero-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(3.5rem, 8vw, 6rem);
    line-height: 0.9;
    font-weight: 900;
    color: #1a1a1a;
}

.italic-text {
    font-style: italic;
    font-weight: 400;
    color: #e1b39d;
    margin-left: 20px;
}

.manifesto-label {
    text-transform: uppercase;
    font-size: 0.7rem;
    letter-spacing: 4px;
    font-weight: 700;
    color: #e1b39d;
    display: block;
    margin-bottom: 10px;
}

/* Category Sections */
.vertical-num {
    font-family: 'Playfair Display', serif;
    font-size: 1rem;
    font-weight: 700;
    color: #e1b39d;
    transform: rotate(-90deg);
    display: block;
    margin-top: 20px;
}

.category-display-title {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.category-subtitle {
    font-weight: 200;
    color: #666;
    line-height: 1.8;
    max-width: 300px;
}

/* Menu Items */
.menu-entry {
    margin-bottom: 3rem;
}

.menu-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.menu-main {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid rgba(225, 179, 157, 0.2);
    transition: all 0.4s ease;
}

.service-name-font {
    font-family: 'Playfair Display', serif;
    font-size: 1.6rem;
    font-weight: 700;
    margin: 0 0 8px 0;
}

.service-details-row {
    display: flex;
    align-items: center;
    gap: 15px;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #999;
}

.s-line {
    width: 30px;
    height: 1px;
    background: #e1b39d;
}

.price-val {
    font-size: 1.4rem;
    font-weight: 700;
}

.price-val small {
    font-size: 0.65rem;
    color: #e1b39d;
    margin-right: 4px;
}

.menu-right i {
    font-size: 1.2rem;
    color: #e1b39d;
    margin-left: 15px;
    opacity: 0;
    transform: translate(-10px, 10px);
    transition: all 0.3s ease;
}

/* Hover States */
.menu-link:hover .menu-main {
    border-bottom-color: #1a1a1a;
    padding-left: 10px;
}

.menu-link:hover .menu-right i {
    opacity: 1;
    transform: translate(0, 0);
}

.menu-link:hover .service-name-font {
    color: #e1b39d;
}

@media (max-width: 991px) {
    .hero-title { font-size: 3rem; }
    .category-display-title { font-size: 2.2rem; }
    .floating-text-bg { display: none; }
}
</style>
<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ categories: Array });

const truncate = (text, length) => {
    return text.length > length ? text.substring(0, length) + '...' : text;
};
</script>

