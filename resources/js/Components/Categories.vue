<template>
    <div class="couture-root py-5 position-relative overflow-hidden">
        
        <div class="art-background pt-5">
            <svg class="botanical-svg leaf-1" viewBox="0 0 100 100" fill="none">
                <path d="M10 80C30 80 80 60 90 10M10 80C40 70 80 40 90 10" stroke="#e1b39d" stroke-width="0.3" opacity="0.4"/>
            </svg>
        </div>

        <div class="container-fluid position-relative z-index-10">
            
            <!-- ✅ HEADER WITH BUTTON -->
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="hero-title">Beauty & Wellness Collection</h2>
                </div>

                <div class="col-lg-6 text-lg-end mt-3 mt-lg-0">
                    <Link :href="route('services')" class="view-all-btn">
                        View All 
                    </Link>
                </div>
            </div>

            <!-- ✅ CATEGORIES -->
            <div class="row g-4 g-lg-5">
                <div v-for="(category, index) in categories" :key="category.id" class="col-md-6">
                    <Link :href="route('category.services', category.id)" class="category-card-link">
                        <div class="category-card">
                            
                            <div class="category-image-box">
                                <img 
                                    :src="category.image ? `/storage/${category.image}` : '/assets/images/placeholder-cat.jpg'" 
                                    :alt="category.name" 
                                    class="category-img"
                                >

                                <div class="category-overlay"></div>
                            </div>
                            
                            <div class="category-info mt-4">
                                <h3 class="category-title-font">{{ category.name }}</h3>
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
    background-color: #fbfbfb; 
    color: #b95c19;
    min-height: 100vh;
}

.hero-title{
    color: #b95c19;
    font-size: 26px;
    font-weight: 700;
    text-transform: capitalize;
}

/* ✅ NEW BUTTON STYLE */
.view-all-btn {
    border: 1px solid #b95c19;
    padding: 10px 20px;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #b95c19;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
}

.view-all-btn:hover {
    background: #e1b39d;
    color: #fff;
}

.art-background {
    position: absolute;
    inset: 0;
    pointer-events: none;
}

.botanical-svg {
    position: absolute;
    width: 30%;
    z-index: 1;
}

.leaf-1 { 
    top: 10%; 
    right: -5%; 
    transform: rotate(-10deg); 
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

.category-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4);
    opacity: 0;
    transition: opacity 0.4s ease;
}

.category-title-font {
    font-family: 'Playfair Display', serif;
    font-size: 0.75rem;
    font-weight: 700;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #b95c19;
}

.category-card-link:hover .category-img {
    transform: scale(1.08);
}

.category-card-link:hover .category-overlay {
    opacity: 1;
}

@media (max-width: 991px) {
    .hero-title { font-size: 1.1rem; }
    .category-title-font { font-size: 0.7rem; }
    .category-image-box { aspect-ratio: 1 / 1; }
}
</style>