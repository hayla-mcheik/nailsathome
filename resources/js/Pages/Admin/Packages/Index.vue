<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ packages: Array });

const deletePackage = (id) => {
    if (confirm('Delete this package?')) {
        router.delete(route('admin.packages.destroy', id));
    }
};
</script>

<template>
    <Head title="Packages" />
    <AdminLayout>
 
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Packages</h2>
                <Link :href="route('admin.packages.create')" class="px-4 py-2 bg-indigo-600 text-white rounded-md font-medium">+ Add Package</Link>
            </div>
     

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="pkg in packages" :key="pkg.id" class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden flex flex-col">
                        <img v-if="pkg.image" :src="'/storage/'+pkg.image" class="w-full h-48 object-cover">
                        <div v-else class="w-full h-48 bg-gray-100 flex items-center justify-center text-gray-400">No Image</div>
                        <div class="p-5 flex-1">
                            <h3 class="font-bold text-lg text-gray-900">{{ pkg.name }}</h3>
                            <p class="text-indigo-600 font-bold text-xl mt-1">${{ pkg.price }}</p>
                            <p class="text-sm text-gray-500 mt-2">{{ pkg.services_count }} Services included</p>
                        </div>
                        <div class="px-5 py-4 bg-gray-50 border-t flex justify-between">
                            <Link :href="route('admin.packages.edit', pkg.id)" class="text-indigo-600 font-medium hover:underline">Edit</Link>
                            <button @click="deletePackage(pkg.id)" class="text-red-600 font-medium hover:underline">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>