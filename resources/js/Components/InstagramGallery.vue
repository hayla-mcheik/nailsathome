<template>
    <div class="gallery-area pt-100">
        <div class="container-fluid p-0">
            <div class="gallery-width">
                <div class="follow-area text-center mb-4">
                    <a href="https://www.instagram.com/nailsathomedubai" target="_blank" class="follow-btn">
                        <i class="ri-instagram-line"></i>
                    </a>
                    <h3>Follow Our Instagram</h3>
                </div>
                <div class="row g-2"> <div v-for="photo in gallery" :key="photo.id" class="col-lg-3 col-6">
                        <div class="gallery-img">
                            <img 
                                :src="'/storage/' + photo.image" 
                                :alt="photo.caption || 'Gallery Image'" 
                                class="uniform-gallery-image"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({ gallery: Array });
</script>

<style scoped>
.uniform-gallery-image {
    width: 100%;
    /* This forces a square shape. Change to 4/3 or 16/9 if you prefer rectangles */
    aspect-ratio: 1 / 1; 
    /* This ensures the image fills the area without stretching */
    object-fit: cover;
    display: block;
    border-radius: 8px; /* Optional: adds rounded corners */
}

.gallery-img {
    overflow: hidden;
    margin-bottom: 15px;
}
</style>