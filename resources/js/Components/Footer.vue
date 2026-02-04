
<template>
    <footer id="note" class="footer-main">
        <div class="container-fluid py-5">
            <div class="footer-wrap">
                <div class="hotel_name text-center mb-5" tabindex="0">
                    NAILS AT HOME
                </div>

                <div class="row g-4 justify-content-between">
                    <div class="col-lg-7">
                        <div class="row g-4">
                            <div class="col-md-6 footer-con-information">
                                <h4 class="hotel-info-sub-title mb-3" tabindex="0">Contact Us</h4>
                                <div class="hotel-address mb-3" tabindex="0">
                           
                                    <span class="locality">Dubai, United Arab Emirates</span>
                                </div>
                                <div class="hotel-info-content mb-2">
                                    <span class="label">Inquiries:</span>
                                    <a href="tel:+97145117901" class="footer-link">+971 4 511 7901</a>
                                </div>
                                <div class="hotel-info-content">
                                    <span class="label">Email:</span>
                                    <a href="mailto:heavenlyspa.dubai@westin.com" class="footer-link">heavenlyspa.dubai@westin.com</a>
                                </div>
                            </div>

                            <div class="col-md-6 footer-hours-information">
                                <h4 class="hotel-info-sub-title mb-3" tabindex="0">Hours</h4>
                                <div class="hour-wrp-info">
                                    <p class="mb-1">Spa: 10 AM - 10 PM</p>
                       
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 text-lg-end">
                        <ul class="footer-nav-links list-unstyled mb-4">
                            <li class="mb-2"><Link :href="route('home')" class="nav-link-item">Services</Link></li>
                            <li class="mb-2"><Link :href="route('about')" class="nav-link-item">About</Link></li>
                            <li><Link :href="route('contact')" class="nav-link-item">Contact</Link></li>
                        </ul>

                        <div class="social-media d-flex justify-content-lg-end gap-3">
                            <a href="https://facebook.com/westindubai" target="_blank" class="social-icon">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="https://instagram.com/westindubai" target="_blank" class="social-icon">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="footer-bottom mt-5 pt-4 border-top d-flex flex-wrap justify-content-between align-items-center">
                    <div class="copy-rights" tabindex="0">© 2026 NAILS AT HOME. All Rights Reserved.</div>
                    <ul class="pop-link-list d-flex gap-3 list-unstyled mb-0">
                        <li><Link :href="route('transportationfees')" class="pop-nav">Transportation Fees</Link></li>
                        <li><Link :href="route('policy')" class="pop-nav">Privacy Policy</Link></li>
                    </ul>
                    <button @click="scrollToTop" class="totop-btn" aria-label="Back to top">
                        <i class="ri-arrow-up-s-line"></i>
                    </button>
                </div>
            </div>
        </div>
    </footer>

    <div class="fixed-mobile-bar d-lg-none">
        <div class="mobile-bar-container">
            <Link :href="route('home')" class="mobile-bar-item">
                <span>Services</span>
            </Link>
            <Link :href="route('home')" class="mobile-bar-item">
                <span>FAQS</span>
            </Link>
            <a href="https://wa.me/97142828385" target="_blank" class="mobile-bar-item book-now-item">
                <span>Chat Via Whatsapp</span>
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
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;600&display=swap');

.footer-main {
    background-color: #fbfbfb;
    color: #51555A;
    font-family: 'Montserrat', sans-serif;
    border-top: 1px solid #eee;
}

.hotel_name {
    font-family: 'Playfair Display', serif;
    font-size: 1.4rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #51555A;
    font-weight: 700;
}
.hotel-address span , .hour-wrp-info p{
       font-size: 0.8rem;
}
.hotel-info-sub-title {
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #51555A; /* Brand Accent */
}

.label {
    font-weight: 600;
    margin-right: 5px;
    font-size: 0.8rem;
}

.footer-link, .nav-link-item, .pop-nav {
    color: #51555A;
    text-decoration: none;
  font-size: 0.7rem;
    transition: 0.3s;
}

.footer-link:hover, .nav-link-item:hover, .pop-nav:hover {
    color: #b95c19;
}

.social-icon {
    font-size: 20px;
    color: #51555A;
    transition: 0.3s;
}

.social-icon:hover {
    color: #b95c19;
    transform: translateY(-3px);
}

.footer-bottom {
    border-top: 1px solid #ececec;
    font-size: 11px;
    color: #999;
}

.totop-btn {
    background: none;
    border: 1px solid #ddd;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.3s;
}

.totop-btn:hover {
    background: #51555A;
    color: #fff;
    border-color: #51555A;
}

.dev-link {
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #ccc;
    text-decoration: none;
}
/* FIXED MOBILE BAR STYLING */
.fixed-mobile-bar {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #ffffff;
    z-index: 9999;
}

.mobile-bar-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 60px; /* Standard height for mobile bars */
}

.mobile-bar-item {
    flex: 1;
    text-align: center;
    text-decoration: none;
    color: #51555A;
    font-family: 'Montserrat', sans-serif;
  font-size: 0.7rem;
    font-weight: 700;
    letter-spacing: 1px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;

}

.mobile-bar-item:last-child {
    border-right: none;
}

/* Highlighting the "Book Now" equivalent to match the 'CALL' aesthetic in images */
.book-now-item {
    background-color: #fbfbfb;
    color: #b95c19; /* Use brand accent color */
}

/* Add padding to footer so content isn't hidden behind the fixed bar */
@media (max-width: 991px) {
    .footer-main {
        padding-bottom: 70px; /* More than the bar height */
    }
}
</style>