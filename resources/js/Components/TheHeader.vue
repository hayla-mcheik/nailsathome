<template>
    <div class="navbar-area" :class="{ 'sticky': isSticky, 'at-top': !isSticky }">
        <div class="container-fluid px-lg-5">
            <nav class="navbar navbar-expand-lg p-2 bg-white d-flex align-items-center justify-content-between">
                
                <div class="header-left flex-1">
                    <button class="menu-btn-desktop" @click="isMenuOpen = true">
                        <div class="burger-icon">
                            <span class="line line-1"></span>
                            <span class="line line-2"></span>
                            <span class="line line-3"></span>
                        </div>
                        <span class="menu-text">MENU</span>
                    </button>
                </div>

                <div class="header-center flex-1 text-center">
                    <Link :href="route('home')">
                        <img src="/assets/images/logo.png" alt="Logo" class="main-logo" :class="{ 'logo-white': !isSticky }">
                    </Link>
                </div>

                <div class="header-right flex-1 d-flex justify-content-end">
                    <a href="https://wa.me/97142828385" target="_blank" class="whatsapp-nav-link">
                        <i class="ri-whatsapp-line"></i>
                        <span class="wa-text">CHAT VIA WHATSAPP</span>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    <transition name="menu-anim">
        <div v-if="isMenuOpen" class="full-menu-overlay">
            <div class="menu-container row g-0">
                
                <div class="col-lg-7 menu-left-panel p-4 p-lg-5">
                    <div class="menu-header d-flex justify-content-between align-items-center">
                        <button class="close-btn" @click="isMenuOpen = false">
                            <i class="ri-close-line"></i> CLOSE
                        </button>
                    </div>

                    <div class="menu-content-wrapper mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <nav class="primary-nav">
                                    <Link :href="route('home')" class="m-link" @click="isMenuOpen = false">Home</Link>
                                    <Link :href="route('about')" class="m-link" @click="isMenuOpen = false">About Us</Link>
                                    <Link :href="route('transportationfees')" class="m-link" @click="isMenuOpen = false">Transport</Link>
                     
                                                         <Link :href="route('policy')" class="m-link" @click="isMenuOpen = false">Policy</Link>
                                                                                             <Link :href="route('contact')" class="m-link" @click="isMenuOpen = false">Contact</Link>
                                </nav>
                            </div>
                            <div class="col-md-6 mt-md-0">
                                     <nav class="primary-nav">
                 <Link :href="route('services')" class="m-link" @click="isMenuOpen = false">Services</Link>
                 <Link :href="route('faq')" class="m-link" @click="isMenuOpen = false">FAQ</Link>
                 <Link :href="route('brands')" class="m-link" @click="isMenuOpen = false">Brands We Use</Link>

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 menu-right-panel bg-white p-4 p-lg-5 d-none d-lg-flex flex-column justify-content-center">
                    <div class="info-box">
              
                        <a href="tel:+97142828385" class="info-link">Chat Via Whatsapp</a>
                    </div>
                    <div class="info-box mt-5">
                        <span class="info-label">OUR HOURS</span>
                        <div class="hours-row"><span>Spa</span> <span>10am - 10pm</span></div>
                        <div class="hours-row"><span>Home Service</span> <span>9am - 9pm</span></div>
                    </div>
   
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link } from '@inertiajs/vue3';

const isMenuOpen = ref(false);
const isSticky = ref(false);

const handleScroll = () => { isSticky.value = window.scrollY > 50; };
onMounted(() => { window.addEventListener('scroll', handleScroll); });
onUnmounted(() => { window.removeEventListener('scroll', handleScroll); });
</script>

<style scoped>
/* NAVBAR & BURGER STYLE */
.navbar-area { position: fixed; width: 100%; top: 0; z-index: 1000; transition: 0.4s; padding: 25px 0; }
.sticky { background: #fff; padding: 12px 0; box-shadow: 0 4px 20px rgba(0,0,0,0.08); }
.at-top { background: transparent; }


.flex-1 { flex: 1; }
.main-logo { width: 60px; transition: 0.4s; }

.menu-btn-desktop { 
    border: none; 
    display: flex; 
    align-items: center; 
    gap: 12px; 
    color: #51555A;; /* Default for transparent state */
    cursor: pointer; 
    padding: 0;
}
.sticky .menu-btn-desktop { color: #51555A; }

/* 3-Line Burger Menu icon Styling */
.burger-icon { display: flex; flex-direction: column; gap: 4px; }
.line { height: 3px; background: currentColor; transition: 0.3s; }
.line-1 { width: 22px; }
.line-2 { width: 16px; }
.line-3 { width: 22px; }

.menu-text { font-size: 11px; font-weight: 800; letter-spacing: 2px; }

.nav-cta-btn { 
    background: #b95c19; color: #fff !important; padding: 10px 22px; 
    font-size: 11px; font-weight: 800; letter-spacing: 1px; text-decoration: none;
}

/* COMPACT OVERLAY */
.full-menu-overlay { position: fixed; inset: 0; z-index: 2000; background: #fff; }
.menu-container { height: 100vh; }

.menu-left-panel {
    /* Use your Monstera leaf image here */
    background: linear-gradient(rgba(0, 0, 0, 0.225), rgba(0, 0, 0, 0.142)), url('/assets/images/megamenu-bg.jpg');
    background-size: cover; background-position: center; color: #fff;
}

.m-link { 
    display: block; font-family: 'Playfair Display', serif; font-size: 2rem; 
    color: #fff; text-decoration: none; margin-bottom: 20px; transition: 0.3s;
}
.m-link:hover { padding-left: 10px; color: #b95c19; text-decoration: none; }

.sub-title { 
    display: block; color: #b95c19; font-size: 11px; font-weight: 800; 
    letter-spacing: 3px; margin-bottom: 20px; text-transform: uppercase;
}
.s-link { 
    display: block; color: #fff; font-size: 1.4rem; font-family: 'Playfair Display', serif; 
    text-decoration: none; margin-bottom: 12px; 
}

/* RIGHT SIDE INFO */
.info-label { display: block; font-size: 10px; font-weight: 800; color: #b95c19; letter-spacing: 2px; margin-bottom: 10px; }
.info-link { font-family: 'Playfair Display', serif; font-size: 22px; color: #333; text-decoration: none; }
.hours-row { display: flex; justify-content: space-between; font-size: 13px; padding: 8px 0; border-bottom: 1px solid #eee; color: #666; }
.menu-cta { 
    background: #333; color: #fff; padding: 15px; text-align: center; 
    font-size: 12px; font-weight: 800; letter-spacing: 2px; text-decoration: none;
}
.close-btn { background: transparent; border: none; color: #fff; font-size: 12px; font-weight: 800; letter-spacing: 2px; cursor: pointer; }

/* ANIMATION */
.menu-anim-enter-active, .menu-anim-leave-active { transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1); }
.menu-anim-enter-from, .menu-anim-leave-to { transform: translateY(-100%); }

@media (max-width: 991px) {
    .m-link { font-size: 1.1rem; margin-bottom: 20px;}
    .main-logo { width: 40px; }
  
     /* Hide text on mobile for cleaner look */
     .navbar-area{
        padding: 0px !important;
        background-color: white !important;
     }
}
/* NEW WHATSAPP NAV LINK STYLING */
.whatsapp-nav-link {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none !important;
    transition: 0.3s;
    color: #51555A; /* White for top over slider */
}

.sticky .whatsapp-nav-link {
    color: #51555A; /* Dark for sticky navbar */
}

.whatsapp-nav-link i {
    font-size: 22px;
    margin-bottom: 2px;
}

.wa-text {
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 1px;
    white-space: nowrap;
}

.whatsapp-nav-link:hover {
    color: #25D366 !important; /* WhatsApp Green on hover */
    transform: translateY(-2px);
}

/* MOBILE RESPONSIVE */
@media (max-width: 991px) {
    .navbar-area { padding: 12px 0; }
    .main-logo { width: 50px; }
    
    .whatsapp-nav-link i { font-size: 18px; }
    .wa-text { font-size: 8px; letter-spacing: 0.5px; }
}
</style>