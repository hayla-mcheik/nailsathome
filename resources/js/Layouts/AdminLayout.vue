<script setup>
import Sidebar from '@/Components/Admin/Sidebar.vue'
</script>

<template>
  <div class="min-h-screen bg-gray-100 flex">
    <!-- Sidebar -->
    <Sidebar />

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Top Bar -->
      <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-semibold text-gray-800">
          Admin Dashboard
        </h1>

        <div class="flex items-center gap-4">
          <span class="text-gray-600 text-sm">
            {{ $page.props.auth.user.name }}
          </span>

          <form method="post" :action="route('logout')">
            <button
              type="submit"
              class="text-red-600 text-sm hover:underline"
            >
              Logout
            </button>
          </form>
        </div>
      </header>

      <!-- Page Content -->
      <main class="p-6 flex-1 overflow-y-auto">
        <slot />
      </main>
    </div>
  </div>
</template>
