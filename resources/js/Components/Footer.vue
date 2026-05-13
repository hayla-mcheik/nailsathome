<template>
    <footer id="note" class="footer-main">
        <div class="container py-5">
            <div class="row justify-center">
                
                <div class="col-lg-8 text-center">
                    <div class="card-content-wrapper">
                             <div class="brand-stack flex justify-center">

                        <img src="/assets/images/logo.png" alt="Nails At Home Logo" class="brand-logo-white">
                    </div>
                        <h4 class="info-heading mb-3">Where do we go?</h4>
                        <p class="info-paragraph mb-4">
                            The Nails At Home service covers all areas within Dubai. To book your exclusive at home appointment, please call 
                            <a href="tel:042828385" class="card-link">04 282 8385</a> / 
                            <a href="tel:042980707" class="card-link">04 298 0707</a> 
                            <span class="d-block mt-1">(10 am - 10 pm / Operating Daily)</span>
                        </p>

                        <div class="card-meta">
                            <div class="meta-item">TRN NO: 100359655600003</div>
                            <div class="meta-item">
                                <a href="https://www.nailsathome.ae" target="_blank" class="card-link">www.nailsathome.ae</a>
                            </div>
                            <div class="meta-item d-flex align-items-center gap-2">
                                <i class="ri-instagram-line"></i>
                                <a href="https://instagram.com/nailsathomedubai" target="_blank" class="card-link">Nailsathomedubai</a>
                            </div>
                        </div>
                    </div>
                </div>

              
            </div>

            <div class="footer-bottom mt-5 pt-4">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                    <div class="copy-text">© 2026 NAILS AT HOME. All Rights Reserved.</div>
                    <ul class="policy-links d-flex gap-4 list-unstyled mb-0">
                        <li><Link :href="route('transportationfees')" class="policy-item">Transportation Fees</Link></li>
                        <li><Link :href="route('policy')" class="policy-item">Privacy Policy</Link></li>
                    </ul>
                </div>
            </div>
        </div>

        <button @click="scrollToTop" class="totop-btn-fixed" aria-label="Back to top">
            <i class="ri-arrow-up-s-line"></i>
        </button>
    </footer>

    <div class="fixed-action-bar d-lg-none">
        <div class="action-grid">
            <a href="tel:042980707" class="action-item">
                <i class="ri-phone-fill"></i> CALL NOW
            </a>
            <a href="https://wa.me/971504552366" target="_blank" class="action-item highlight">
                <i class="ri-whatsapp-line"></i> WHATSAPP
            </a>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400&family=Montserrat:wght@300;400;600&display=swap');

.footer-main {
    background-color: #bc9374; /* Warm tan matching the card */
    color: #ffffff;
    font-family: 'Montserrat', sans-serif;
    position: relative;
    overflow: hidden;
}

/* Brand Identity Styling */
.hotel-title-elegant {
    font-family: 'Playfair Display', serif;
    font-size: 2.4rem;
    letter-spacing: 6px;
    text-transform: uppercase;
    line-height: 1.2;
}

.brand-logo-white {
    max-width: 160px;
    height: auto;
    filter: brightness(0) invert(1); /* Ensures logo is white */
}

/* Info Styling */
.info-heading {
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    font-size: 1.15rem;
    letter-spacing: 0.5px;
}

.info-paragraph {
    font-size: 0.95rem;
    line-height: 1.8;
    font-weight: 300;
}

.card-meta {
    font-size: 0.85rem;
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: center;
}

.card-link {
    text-decoration: none;
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    transition: 0.3s;
}

.card-link:hover {
    border-bottom-color: #ffffff;
}

/* Bottom Bar Styling */
.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.15);
    font-size: 0.75rem;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.policy-item {
    text-decoration: none;
    opacity: 0.8;
}

.policy-item:hover {
    opacity: 1;
}

/* Floating Elements */
.totop-btn-fixed {
    position: fixed;
    right: 25px;
    bottom: 25px;
    width: 48px;
    height: 48px;
    background: #ffffff;
    color: #bc9374;
    border: none;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    z-index: 1050;
    cursor: pointer;
    transition: transform 0.3s ease;
}

.totop-btn-fixed:hover {
    transform: translateY(-5px);
}

/* Mobile Bar Styling */
.fixed-action-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    background: #ffffff;
    box-shadow: 0 -5px 15px rgba(0,0,0,0.05);
}

.action-grid {
    display: flex;
    height: 65px;
}

.action-item {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.8rem;
    color: #bc9374;
    letter-spacing: 1px;
}

.highlight {
    background-color: #bc9374;
}
.meta-item{
    color: #51555A;
}
@media (max-width: 991px) {
    .footer-main { padding-bottom: 90px; }
    .totop-btn-fixed { bottom: 85px; right: 20px; width: 40px; height: 40px; }
    .hotel-title-elegant { font-size: 1.8rem; }
}
</style>