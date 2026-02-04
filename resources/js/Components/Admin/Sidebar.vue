<script setup>
import NavLink from './NavLink.vue'
</script>

<template>
  <aside class="w-64 bg-[#1f2937] text-white flex flex-col h-screen sticky top-0 shadow-xl">
    <div class="px-6 py-5 text-xl font-bold border-b border-gray-700 tracking-wide">
      Nails At Home
    </div>

    <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto custom-scrollbar">
      
      <NavLink
        :href="route('dashboard')"
        icon="🏠"
        :active="route().current('dashboard')"
      >
        Dashboard
      </NavLink>

      <div class="pt-5 pb-2 px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">
        Website Content
      </div>

      <NavLink
        :href="route('admin.sliders.index')"
        icon="🖼️"
        :active="route().current('admin.sliders.*')"
      >
        Hero Sliders
      </NavLink>

      <NavLink
        :href="route('admin.about.index')"
        icon="ℹ️"
        :active="route().current('admin.about.*')"
      >
        About Us
      </NavLink>

      <NavLink
        :href="route('admin.gallery.index')"
        icon="📷"
        :active="route().current('admin.gallery.*')"
      >
        Gallery
      </NavLink>

      <NavLink
        :href="route('admin.testimonials.index')"
        icon="💬"
        :active="route().current('admin.testimonials.*')"
      >
        Testimonials
      </NavLink>
            <NavLink
        :href="route('admin.brands.index')"
        icon="💬"
        :active="route().current('admin.brands.*')"
      >
        Brands
      </NavLink>
            <NavLink
        :href="route('admin.faq.index')"
        icon="💬"
        :active="route().current('admin.faq.*')"
      >
        FAQ
      </NavLink>

      <div class="pt-5 pb-2 px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">
        Business Management
      </div>

      <NavLink
        :href="route('admin.categories.index')"
        icon="📂"
        :active="route().current('admin.categories.*')"
      >
        Categories
      </NavLink>

      <NavLink
        :href="route('admin.services.index')"
        icon="💅"
        :active="route().current('admin.services.*') || route().current('admin.services.variants.*')"
      >
        Services
      </NavLink>

      <NavLink
        :href="route('admin.packages.index')"
        icon="🎁"
        :active="route().current('admin.packages.*')"
      >
        Packages
      </NavLink>

      <NavLink
        :href="route('admin.transportation.index')"
        icon="🚗"
        :active="route().current('admin.transportation.*')"
      >
        Transportation
      </NavLink>
 

     <NavLink
    :href="route('admin.special-occasions.index')"
    icon="✨"
    :active="route().current('admin.special-occasions.*')"
>
Special Occasion
</NavLink>


<NavLink
    :href="route('admin.policies.index')"
    icon="⚖️"
    :active="route().current('admin.policies.*')"
>
    Policies & Info
</NavLink>


     <NavLink
    :href="route('admin.brochure.index')"
    icon="✨"
    :active="route().current('admin.brochure.*')"
>
  Brochure
</NavLink>
    </nav>

    <div class="px-6 py-4 text-[10px] text-gray-500 border-t border-gray-700 bg-[#1a222f]">
      © {{ new Date().getFullYear() }} Nails At Home Admin
    </div>
  </aside>
</template>

<style scoped>
.custom-scrollbar::-webkit-scrollbar {
  width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-track {
  background: #1f2937;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
  background: #374151;
  border-radius: 10px;
}
</style>