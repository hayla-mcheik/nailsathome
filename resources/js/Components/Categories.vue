<template>
    <div class="couture-root pt-24 pb-5 position-relative overflow-hidden">
        
        <div class="art-background pt-5">
            <div class="floating-text-bg">Polish It</div>
            <svg class="botanical-svg leaf-1" viewBox="0 0 100 100" fill="none">
                <path d="M10 80C30 80 80 60 90 10M10 80C40 70 80 40 90 10" stroke="#e1b39d" stroke-width="0.3" opacity="0.4"/>
            </svg>
        </div>

        <div class="container position-relative z-index-10">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="hero-title">Signature <br><span class="italic-text">Collections</span></h2>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="header-manifesto">
                        <p>Explore our curated collections of beauty and wellness. Select a category to discover our full range of premium services delivered to your door.</p>
                        <div class="horizontal-bar"></div>
                    </div>
                </div>
            </div>

            <div class="row g-4 g-lg-5">
                <div v-for="(category, index) in categories" :key="category.id" class="col-md-6">
                    <Link  :href="route('category.services', category.id)" class="category-card-link">
                        <div class="category-card">
                            <div class="category-image-box">
                                <span class="cat-num">{{ String(index + 1).padStart(2, '0') }}</span>
                                
                                <img :src="category.image ? `/storage/${category.image}` : '/assets/images/placeholder-cat.jpg'" 
                                     :alt="category.name" 
                                     class="category-img">
                                
                                <div class="category-overlay">
                                    <div class="overlay-content">
                                        <span>View Menu</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="category-info mt-4">
                                <h3 class="category-title-font">{{ category.name }}</h3>
                                <div class="explore-row">
                                    <span class="service-count">{{ category.services?.length || 0 }} Services</span>
                                    <span class="explore-btn">Discover <i class="ri-add-line"></i></span>
                                </div>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({ categories: Array });
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,400&family=Outfit:wght@200;400;700&display=swap');

.couture-root {
    background-color: #fffaf8; 
    color: #1a1a1a;
    font-family: 'Outfit', sans-serif;
    min-height: 100vh;
}

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

.hero-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(3rem, 6vw, 5rem);
    line-height: 1;
    font-weight: 900;
}
.italic-text {
    font-style: italic;
    font-weight: 400;
    color: #e1b39d;
    margin-left: 10px;
}

.category-card-link {
    text-decoration: none;
    color: inherit;
    display: block;
}

.category-image-box {
    position: relative;
    aspect-ratio: 16 / 10;
    overflow: hidden;
    border-radius: 4px;
    background: #f0f0f0;
}

.category-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s cubic-bezier(0.2, 1, 0.3, 1);
}

.cat-num {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 5;
    font-family: 'Playfair Display', serif;
    font-weight: 700;
    color: #fff;
    font-size: 1.1rem;
    letter-spacing: 2px;
}

.category-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.4s ease;
    backdrop-filter: blur(2px);
}

.overlay-content {
    color: #fff;
    text-transform: uppercase;
    font-weight: 700;
    letter-spacing: 3px;
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 15px;
    border: 1px solid rgba(255,255,255,0.5);
    padding: 12px 25px;
}

.category-title-font {
    font-family: 'Playfair Display', serif;
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.explore-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid rgba(0,0,0,0.05);
    padding-top: 15px;
}

.service-count {
    font-size: 0.8rem;
    color: #888;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.explore-btn {
    color: #e1b39d;
    font-weight: 700;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.category-card-link:hover .category-img {
    transform: scale(1.08);
}
.category-card-link:hover .category-overlay {
    opacity: 1;
}
.category-card-link:hover .category-title-font {
    color: #e1b39d;
}

.horizontal-bar {
    width: 60px;
    height: 3px;
    background: #e1b39d;
    margin-top: 20px;
}

@media (max-width: 991px) {
    .hero-title { font-size: 2.5rem; }
    .category-title-font { font-size: 1.5rem; }
    .category-image-box { aspect-ratio: 1 / 1; }
}
</style>