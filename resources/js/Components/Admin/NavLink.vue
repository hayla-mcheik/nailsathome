<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const props = defineProps({
  href: String,
  icon: String,
})

const page = usePage()

const isActive = computed(() =>
  page.url.startsWith(new URL(props.href).pathname)
)
</script>

<template>
  <Link
    :href="href"
    class="flex items-center gap-3 px-4 py-2 rounded-lg text-sm transition"
    :class="isActive
      ? 'bg-gray-800 text-white'
      : 'text-gray-300 hover:bg-gray-800 hover:text-white'"
  >
    <span>{{ icon }}</span>
    <span>
      <slot />
    </span>
  </Link>
</template>
