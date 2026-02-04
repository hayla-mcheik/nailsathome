<template>
  <nav class="breadcrumbs flex px-4 text-sm relative overflow-hidden" aria-label="Breadcrumb">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat z-0" :style="backgroundStyle"></div>
    <div class="absolute inset-0 bg-black/30 z-0"></div>
    
    <div class="relative d-flex items-center justify-center z-10 w-full container mx-auto text-center">

      <div class="mt-2">
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
  backgroundImage: {
    type: String,
    default: '/assets/images/breadcrumbsimage.jpg' 
  },
  height: {
    type: String,
    default: '50vh'
  },
  // ADD THIS PROP to accept the category name from the parent
  title: {
    type: String,
    default: null
  }
});

const getMenuName = (path) => {
  const menuMap = {
    '/about': 'Who We Are',
    '/treatments': 'The Collection',
    '/policy': 'Spa Policy',
    '/transportationfees': 'Transportation',
  };

  // If we are on the current page and a title prop exists, use it
  if (props.title && page.url.startsWith(path) && page.url === path) {
    return props.title;
  }

  return menuMap[path] || toStartCase(path.replace('/', ''));
};

const toStartCase = (str) => {
  if (!str) return '';
  // Clean up IDs from the label (e.g., 'category/4' becomes 'Category')
  const cleanStr = str.split('/')[0]; 
  return cleanStr.replace(/-/g, ' ').replace(/\b\w/g, (char) => char.toUpperCase());
};

const breadcrumbs = computed(() => {
  const pathSegments = page.url.split('?')[0].split('/').filter(Boolean);
  return pathSegments.reduce((acc, segment, index) => {
    const path = '/' + pathSegments.slice(0, index + 1).join('/');
    
    // Logic to replace the ID segment with the actual title
    let label = getMenuName(path);
    if (index === pathSegments.length - 1 && props.title) {
        label = props.title;
    }

    acc.push({
      label: label,
      path: path,
    });
    return acc;
  }, []);
});

const backgroundStyle = computed(() => {
  return {
    backgroundImage: `url('${props.backgroundImage}')`,
    height: props.height
  };
});
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