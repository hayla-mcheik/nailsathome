<template>
    <div class="navbar-area" :class="{ 'sticky': isSticky }">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0 d-flex justify-content-between align-items-center">
                <Link class="navbar-brand" :href="route('home')">
                    <img src="/assets/images/logo.png" alt="Logo" class="main-logo">
                </Link>

                <div class="mobile-toggle-wrapper d-lg-none">
                    <button class="menu-toggler" @click="isMobileMenuOpen = true">
                        <span class="bar"></span>
                        <span class="bar shadow-bar"></span>
                        <span class="bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse d-none d-lg-block">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <Link :href="route('home')" class="nav-link nav-link-grow" :class="{active: $page.url === '/'}">Home</Link>
                        </li>
                        <li class="nav-item">
                            <Link :href="route('about')" class="nav-link nav-link-grow" :class="{active: $page.url.startsWith('/about')}">About Us</Link>
                        </li>

                        <li class="nav-item">
                            <Link :href="route('transportationfees')" class="nav-link nav-link-grow" :class="{active: $page.url === '/transportationfees'}">Transportation</Link>
                        </li>
                        
                        <li class="nav-item custom-dropdown">
                            <a href="javascript:void(0)" class="nav-link nav-link-grow" :class="{active: isServiceActive}">
                                Services <i class="ri-arrow-down-s-line"></i>
                            </a>
                            
                            <div class="mega-menu-container shadow-lg">
                                <div class="row g-0">
                                    <div class="col-6 border-end p-4">
                                        <div class="dropdown-header-text">Hand & Feet</div>
                                        <Link :href="route('treatyourself')" class="dropdown-item"><i class="ri-hand-heart-line"></i> Treat Yourself</Link>
                                        <Link :href="route('spoilyourfeet')" class="dropdown-item"><i class="ri-footprint-line"></i> Spoil Your Feet</Link>
                                        <Link :href="route('gorgeousnails')" class="dropdown-item"><i class="ri-focus-3-line"></i> Gorgeous Nails</Link>
                                        <Link :href="route('whatyouknead')" class="dropdown-item"><i class="ri-rest-time-line"></i> What You Knead</Link>
                                    </div>
                                    <div class="col-6 p-4">
                                        <div class="dropdown-header-text">Body & Care</div>
                                        <Link :href="route('leavemesoft')" class="dropdown-item"><i class="ri-magic-line"></i> Leave Me Soft</Link>
                                        <Link :href="route('turnbacktime')" class="dropdown-item"><i class="ri-hourglass-2-fill"></i> Turn Back Time</Link>
                                        <Link :href="route('hairathome')" class="dropdown-item"><i class="ri-scissors-2-fill"></i> Hair At Home</Link>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <Link :href="route('policy')" class="nav-link nav-link-grow" :class="{active: $page.url === '/policy'}">Policy</Link>
                        </li>
                        <li class="nav-item">
                            <Link :href="route('contact')" class="nav-link nav-link-grow" :class="{active: $page.url === '/contact'}">Contact Us</Link>
                        </li>
                    </ul>
                    
                    <div class="others-options">
                        <a href="https://wa.me/97142828385" target="_blank" class="nav-cta-btn">Book Now</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="mobile-sidebar-wrapper d-lg-none" :class="{ 'active': isMobileMenuOpen }">
        <div class="sidebar-overlay" @click="isMobileMenuOpen = false"></div>
        <div class="sidebar-content">
            <div class="sidebar-header d-flex align-items-center justify-content-between p-4">
                <Link :href="route('home')" @click="isMobileMenuOpen = false">
                    <img src="/assets/images/logo.png" alt="Logo" class="sidebar-logo">
                </Link>
                <button class="close-sidebar-btn" @click="isMobileMenuOpen = false">
                    <i class="ri-close-line"></i>
                </button>
            </div>

            <div class="sidebar-body px-4 pb-5">
                <nav class="mobile-nav-list">
                    <Link :href="route('home')" class="m-nav-link" @click="isMobileMenuOpen = false">Home</Link>
                    <Link :href="route('about')" class="m-nav-link" @click="isMobileMenuOpen = false">About Us</Link>
                    
                    <Link :href="route('transportationfees')" class="m-nav-link" @click="isMobileMenuOpen = false">Transportation</Link>
                    
                    <div class="mobile-dropdown-section">
                        <div class="m-dropdown-trigger d-flex justify-content-between align-items-center" @click="toggleDropdown">
                            <span>Our Services</span>
                            <i class="ri-arrow-down-s-line arrow-icon" :class="{ 'rotate': isDropdownOpen }"></i>
                        </div>
                        <transition name="slide-fade">
                            <div class="m-dropdown-items" v-show="isDropdownOpen">
                                <Link :href="route('treatyourself')" class="m-sub-link" @click="isMobileMenuOpen = false">Treat Yourself</Link>
                                <Link :href="route('spoilyourfeet')" class="m-sub-link" @click="isMobileMenuOpen = false">Spoil Your Feet</Link>
                                <Link :href="route('gorgeousnails')" class="m-sub-link" @click="isMobileMenuOpen = false">Gorgeous Nails</Link>
                                <Link :href="route('leavemesoft')" class="m-sub-link" @click="isMobileMenuOpen = false">Leave Me Soft</Link>
                                <Link :href="route('whatyouknead')" class="m-sub-link" @click="isMobileMenuOpen = false">What You Knead</Link>
                                <Link :href="route('turnbacktime')" class="m-sub-link" @click="isMobileMenuOpen = false">Turn Back Time</Link>
                                <Link :href="route('hairathome')" class="m-sub-link" @click="isMobileMenuOpen = false">Hair At Home</Link>
                            </div>
                        </transition>
                    </div>

                    <Link :href="route('policy')" class="m-nav-link" @click="isMobileMenuOpen = false">Policy</Link>
                    <Link :href="route('contact')" class="m-nav-link" @click="isMobileMenuOpen = false">Contact Us</Link>
                </nav>

                <div class="mobile-sidebar-footer mt-5">
                    <a href="https://wa.me/97142828385" target="_blank" class="mobile-book-btn w-100 text-center">
                        <i class="ri-whatsapp-line me-2"></i> Book Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, watch, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const isMobileMenuOpen = ref(false);
const isDropdownOpen = ref(false);
const isSticky = ref(false);

const toggleDropdown = () => { isDropdownOpen.value = !isDropdownOpen.value; };
const handleScroll = () => { isSticky.value = window.scrollY > 50; };

const page = usePage();
const isServiceActive = computed(() => {
    const urls = ['/treatyourself', '/spoilyourfeet', '/gorgeousnails', '/leavemesoft', '/whatyouknead', '/turnbacktime', '/hairathome'];
    return urls.some(url => page.url.startsWith(url));
});

onMounted(() => { window.addEventListener('scroll', handleScroll); });
onUnmounted(() => { window.removeEventListener('scroll', handleScroll); });

watch(() => page.url, () => {
    isMobileMenuOpen.value = false;
    isDropdownOpen.value = false;
});
</script>

<style scoped>
/* DESKTOP STYLES */
.navbar-area { position: relative; z-index: 9999; transition: 0.4s; padding: 15px 0; }
.sticky { position: fixed; top: 0; left: 0; width: 100%; background: #fff; box-shadow: 0 10px 30px rgba(0,0,0,0.05); padding: 5px 0; }
.main-logo { width: 90px; }
.nav-link-grow { font-weight: 600; color: #333 !important; padding: 25px 15px !important; position: relative; display: block; }
.nav-link-grow::after { content: ''; position: absolute; width: 0; height: 2px; bottom: 15px; left: 15px; background: #b95c19; transition: 0.3s; }
.nav-link-grow.active::after, .nav-link-grow:hover::after { width: calc(100% - 30px); }
.others-options{
    visibility: visible;
}
/* MEGA MENU */
.custom-dropdown { position: relative; }
.mega-menu-container { position: absolute; top: 100%; left: 50%; transform: translateX(-50%) translateY(20px); width: 550px; background: #fff; border-radius: 15px; opacity: 0; visibility: hidden; transition: all 0.3s ease; z-index: 10000; pointer-events: none; padding: 10px; }
.custom-dropdown:hover .mega-menu-container { opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0); pointer-events: auto; }
.dropdown-header-text { font-size: 11px; text-transform: uppercase; color: #b95c19; font-weight: 800; letter-spacing: 1px; margin-bottom: 15px; }
.dropdown-item { display: flex; align-items: center; gap: 10px; padding: 10px 15px; color: #444; font-weight: 500; border-radius: 8px; transition: 0.3s; }
.dropdown-item:hover { background: #fff5f0; color: #b95c19; padding-left: 20px; }
.nav-cta-btn { background: #b95c19; color: #fff !important; padding: 12px 25px; border-radius: 50px; font-weight: 700; transition: 0.3s; text-decoration: none; }

/* MODERN MOBILE SIDEBAR */
.menu-toggler { background: none; border: none; display: flex; flex-direction: column; gap: 6px; }
.menu-toggler .bar { width: 28px; height: 2px; background: #333; transition: 0.3s; }

.mobile-sidebar-wrapper { position: fixed; inset: 0; z-index: 9999; visibility: hidden; transition: 0.4s; }
.mobile-sidebar-wrapper.active { visibility: visible; }
.sidebar-overlay { position: absolute; inset: 0; background: rgba(0,0,0,0.6); backdrop-filter: blur(4px); transition: 0.4s; opacity: 0; }
.mobile-sidebar-wrapper.active .sidebar-overlay { opacity: 1; }

.sidebar-content { position: absolute; right: -100%; width: 85%; max-width: 350px; height: 100%; background: #fff; transition: 0.5s cubic-bezier(0.4, 0, 0.2, 1); display: flex; flex-direction: column; }
.mobile-sidebar-wrapper.active .sidebar-content { right: 0; }

.sidebar-logo { width: 110px; }
.close-sidebar-btn { background: #f5f5f5; border: none; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 24px; color: #333; }

.m-nav-link { display: block; padding: 16px 0; font-size: 18px; font-weight: 600; color: #222; border-bottom: 1px solid #f0f0f0; text-decoration: none; }
.m-dropdown-trigger { padding: 16px 0; font-size: 18px; font-weight: 600; color: #222; border-bottom: 1px solid #f0f0f0; cursor: pointer; }
.arrow-icon { transition: 0.3s; font-size: 22px; color: #b95c19; }
.arrow-icon.rotate { transform: rotate(180deg); }

.m-dropdown-items { padding: 10px 0 10px 15px; background: #fafafa; border-radius: 10px; margin-top: 5px; }
.m-sub-link { display: block; padding: 12px 0; font-size: 16px; color: #555; text-decoration: none; border-bottom: 1px solid #eee; }
.m-sub-link:last-child { border-bottom: none; }

.mobile-book-btn { display: block; background: #b95c19; color: #fff; padding: 16px; border-radius: 12px; font-weight: 700; text-decoration: none; font-size: 16px; box-shadow: 0 4px 15px rgba(185, 92, 25, 0.3); }
.social-links a { width: 45px; height: 45px; border-radius: 50%; background: #f9f9f9; display: flex; align-items: center; justify-content: center; font-size: 20px; color: #333; text-decoration: none; }

/* ANIMATION */
.slide-fade-enter-active, .slide-fade-leave-active { transition: all 0.3s ease; max-height: 500px; overflow: hidden; }
.slide-fade-enter-from, .slide-fade-leave-to { max-height: 0; opacity: 0; }
.mobile-sidebar-wrapper.active .sidebar-content{
    overflow: scroll;
}
</style>