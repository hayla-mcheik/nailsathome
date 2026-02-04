<template>
    <section class="vip-discretion-divider bg-[#ffffff] py-20 overflow-hidden">
        <div class="container position-relative">
            <div class="discretion-watermark">DISCRETION</div>

            <div class="row justify-content-center">
                <div class="col-lg-8 text-center position-relative z-2">
                    <span class="eyebrow-small">Client Privacy Policy</span>
                    
                    <h2 class="discretion-text mt-4">
                        In our commitment to the absolute privacy and exclusivity our VIP clientele deserves, 
                        we maintain a strictly editorial, text-based experience focused on service excellence 
                        rather than public imagery.
                    </h2>

                    <div class="lux-accent-line mx-auto mt-5"></div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,400&family=Montserrat:wght@300;400;600&display=swap');

.vip-discretion-divider {
    border-top: 1px solid #f9f9f9;
    border-bottom: 1px solid #f9f9f9;
}

.eyebrow-small {
    font-size: 9px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 5px;
    color: #b95c19; /* Brand Gold */
}

.discretion-text {
    font-size: 0.8rem; /* Small scale for luxury feel */
    line-height: 1.8;
    color: #51555A;
    font-weight: 400;
    max-width: 80%;
    margin: 0 auto;
}

.lux-accent-line {
    width: 40px;
    height: 1px;
    background-color: #b95c19;
    opacity: 0.4;
}

.discretion-watermark {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-family: 'Montserrat', sans-serif;
    font-size: 12vw;
    font-weight: 900;
    color: #fcfcfc; /* Barely visible */
    letter-spacing: 20px;
    z-index: 1;
    pointer-events: none;
    text-transform: uppercase;
}

.z-2 { z-index: 2; }

@media (max-width: 768px) {
    .discretion-text {
        font-size: 0.7rem;
        max-width: 100%;
    }
}
</style>