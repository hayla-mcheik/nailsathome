<template>
    <div class="intro-video-area pb-100 mt-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="video-wrapper">
                        <video 
                            autoplay 
                            muted 
                            loop 
                            playsinline 
                            class="main-video-player"
                        >
                            <source src="/assets/images/videohome.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <div class="video-overlay">
                            </div>
                    </div>
                </div>

                <div class="col-lg-6 pt-5">
                    <div class="section-title ps-lg-5 mt-4 mt-lg-0 pt-5">

                                       <span class="color1 uppercase tracking-widest text-sm font-bold d-block mb-2">You're Welcomed!</span>
        
                        <div class="divider mt-4 mb-4"></div>
                                       <p class="text-white">Loreum ipsum loreum ipsum loreum ipsum</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&display=swap');

.font-serif {
    font-family: 'Playfair Display', serif;
}

.video-wrapper {
    position: relative;
    width: 100%; /* Changed from 50% to 100% because the column handles width now */
    height: 600px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.main-video-player {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.1); 
}

.divider {
    width: 60px;
    height: 2px;
    background: #a3836b;
}

.tracking-widest {
    letter-spacing: 0.2em;
}

/* Adjustments for specific layout feel */
@media (min-width: 992px) {
    .ps-lg-5 {
        padding-left: 3rem !important;
    }
}
</style>