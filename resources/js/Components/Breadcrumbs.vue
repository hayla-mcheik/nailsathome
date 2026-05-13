<template>
  <nav class="breadcrumbs flex px-4 text-sm relative overflow-hidden" :style="{ height: props.height }" aria-label="Breadcrumb">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat z-0" :style="backgroundStyle"></div>
    <div class="absolute inset-0 bg-black/40 z-0"></div>
    
    <div class="relative z-10 w-full container mx-auto text-center flex flex-col items-center justify-center">
      <div class="flex items-center justify-center space-x-2 text-white/80 uppercase tracking-widest text-[10px] mb-4">
        <Link href="/" class="text-white hover:opacity-70 transition-opacity">Home</Link>
        
        <span v-for="(crumb, index) in breadcrumbs" :key="index" class="flex items-center space-x-2">
          <span class="opacity-50">/</span>
          <Link 
            :href="crumb.path" 
            :class="{
              'text-white font-bold pointer-events-none': index === breadcrumbs.length - 1, 
              'text-white/80 hover:text-white transition-colors': index !== breadcrumbs.length - 1
            }"
          >
            {{ crumb.label }}
          </Link>
        </span>
      </div>

      <div>
        <h1 class="display-title text-white uppercase tracking-wider" v-if="breadcrumbs.length > 0">
          {{ title || breadcrumbs[breadcrumbs.length - 1].label }}
        </h1>
        <div class="lux-line mx-auto mt-3"></div>
      </div>
    </div>
  </nav>
</template>

<script setup>
import { computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const props = defineProps({
  backgroundImage: { type: String, default: '/assets/images/breadcrumbsimage.jpg' },
  height: { type: String, default: '50vh' },
  title: { type: String, default: null }
});

const breadcrumbs = computed(() => {
  // Extract path segments (e.g., /services/nails -> ['services', 'nails'])
  const pathSegments = page.url.split('?')[0].split('/').filter(Boolean);
  
  return pathSegments.map((segment, index) => {
    let label = segment;
    let path = '/' + pathSegments.slice(0, index + 1).join('/');

    // 1. Logic to force "Services" link:
    // If the URL is /category/nails, we change the first segment's label and path
    if (index === 0) {
        label = 'Services';
        path = '/services'; // Forces the link to the main services page
    }

    // 2. Logic for the last segment (The specific service/category name)
    if (index === pathSegments.length - 1) {
      if (props.title) {
        label = props.title;
      } else {
        label = label.replace(/-/g, ' ');
      }
    } else {
      label = label.replace(/-/g, ' ');
    }

    return {
      label: label,
      path: path,
    };
  });
});

const backgroundStyle = computed(() => ({
  backgroundImage: `url('${props.backgroundImage}')`,
}));
</script>

<style scoped>
.breadcrumbs {
    display: flex;
    align-items: center;
    justify-content: center;
}

.display-title {
    font-family: 'Playfair Display', serif;
    font-size: 32px;
    font-weight: 700;
    letter-spacing: 2px;
}

.lux-line {
    width: 40px;
    height: 2px;
    background-color: #b95c19; /* Brand Gold */
}

/* Luxury Touch: Disable pointer events on the current page crumb */
.pointer-events-none {
    cursor: default;
}

@media (max-width: 768px) {
    .display-title {
        font-size: 24px;
    }
    .breadcrumbs {
        height: 40vh !important;
    }
}
</style>