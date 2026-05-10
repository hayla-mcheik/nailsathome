<template>
  <nav class="breadcrumbs flex px-4 text-sm relative overflow-hidden" aria-label="Breadcrumb">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat z-0" :style="backgroundStyle"></div>
    <div class="absolute inset-0 bg-black/30 z-0"></div>
    
    <div class="relative z-10 w-full container mx-auto text-center flex flex-col items-center justify-center">
      <div class="flex items-center justify-center space-x-2 text-white/80 uppercase tracking-widest text-[10px] mb-4">
        <Link href="/" class=" text-white hover:text-white transition-colors">Home</Link>
        <span v-for="(crumb, index) in breadcrumbs" :key="index" class="flex items-center space-x-2">
          <span>/</span>
          <Link :href="crumb.path" :class="{'text-white font-bold': index === breadcrumbs.length - 1, 'text-white hover:text-white': index !== breadcrumbs.length - 1}">
            {{ crumb.label }}
          </Link>
        </span>
      </div>

      <div>
        <h1 class="display-title text-white" v-if="breadcrumbs.length > 0">
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
  // Get segments and remove empty strings
  const pathSegments = page.url.split('?')[0].split('/').filter(Boolean);
  
  return pathSegments.map((segment, index) => {
    const path = '/' + pathSegments.slice(0, index + 1).join('/');
    
    let label = segment;

    // Logic: If it's the last segment and we passed a title prop (like category name), use it.
    // Otherwise, clean the URL string.
    if (index === pathSegments.length - 1 && props.title) {
      label = props.title;
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
  height: props.height
}));
</script>

<style scoped>
/* Keep your existing styles here */
.breadcrumb-link-active {
    font-family: 'Montserrat', sans-serif;
    font-size: 9px;
    font-weight: 700;
    letter-spacing: 2px;
    color: #b95c19; /* Use your brand gold for the active page */
    text-transform: uppercase;
}
.breadcrumbs{
    height: 50vh;
}
.display-title{
    font-size: 28px;
    font-weight: 700;
}
</style>