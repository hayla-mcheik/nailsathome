<template>
    <section :class="['spa-experience ptb-100', themeColor]">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4 sidebar-panel">
                    <div class="sticky-top" style="top: 100px;">
                        <h2 class="script-title mb-4">{{ sideTitle }}</h2>
                        <div class="philosophy-text">
                  
                            <p class="font-bold text-dark">After all, you deserve only the best!</p>
                        </div>
                        <div class="lux-line"></div>
                    </div>
                </div>

                <div class="col-lg-8 content-panel pt-4">
           

                    <div class="row g-5">
                        <div v-for="item in services" :key="item.id" class="col-md-6">
                            <div class="treatment-item mb-4">
                                <div class="d-flex justify-content-between align-items-baseline mb-2">
                                    <h3 class="text-xl font-bold text-dark m-0">
                                        {{ item.title }} 
                                        <small v-if="item.duration" class="fw-normal text-dark opacity-75">
                                            ({{ item.duration }})
                                        </small>
                                    </h3>
                                    <span class="price-tag text-xl font-bold text-dark">
                                        ${{ item.price }}
                                    </span>
                                </div>
                                <p class="text-sm text-dark opacity-90 leading-relaxed mb-2">
                                    {{ item.description }}
                                </p>
                                <p v-if="item.advance_booking" class="text-xs text-dark italic opacity-75">
                                    (Please book in advance if you require this treatment)
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 opacity-50 text-xs italic">
                        5% VAT Applicable
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    themeColor: {
        type: String,
        default: 'theme-default'
    },
    sideTitle: String,
    sectionTitle: String,
    services: Array
});
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Playfair+Display:wght@700&display=swap');

/* Base Theme */
.theme-default, .theme-brown, .theme-orange {
    background-color: #faefed !important;
    color: #000;
}

.spa-experience {
    min-height: 100vh;
}

/* Typography */
.script-title {
    font-family: 'Dancing Script', cursive;
    font-size: 2rem;
    color: #000;
}

.font-serif {
    font-family: 'Playfair Display', serif;
}

/* Layout Elements */
.sidebar-panel {
    border-right: 1px solid rgba(0, 0, 0, 0.05);
}

.lux-line {
    width: 60px;
    height: 1px;
    background: #e59e6d;
    margin-top: 30px;
}

.treatment-item {
    border-left: 1px solid rgba(229, 158, 109, 0.4);
    padding-left: 1.5rem;
    transition: border-color 0.3s ease;
}

.treatment-item:hover {
    border-left-color: #e59e6d;
}

.price-tag {
    white-space: nowrap;
    margin-left: 10px;
}

@media (max-width: 991px) {
    .sidebar-panel {
        border-right: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
}
</style>