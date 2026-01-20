<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ services: Array });

const deleteService = (id) => {
    if (confirm('Delete this service?')) {
        router.delete(route('admin.services.destroy', id));
    }
};
</script>

<template>
    <Head title="Services" />
    <AdminLayout>
    
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Services</h2>
                <Link :href="route('admin.services.create')" class="px-4 py-2 bg-indigo-600 text-white rounded-md">+ Add Service</Link>
            </div>
      

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden border">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 border-b text-xs font-semibold uppercase text-gray-500">
                            <tr>
                                <th class="px-6 py-3">Service</th>
                                <th class="px-6 py-3">Category</th>
                                <th class="px-6 py-3">Settings</th>
                                <th class="px-6 py-3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <tr v-for="service in services" :key="service.id" class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img v-if="service.image" :src="'/storage/'+service.image" class="h-10 w-10 rounded mr-3 object-cover border">
                                        <span class="font-medium">{{ service.name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ service.category?.name }}</td>
                                <td class="px-6 py-4 space-x-1">
                                    <span v-if="service.vat_applicable" class="bg-blue-50 text-blue-600 px-2 py-1 rounded text-[10px] font-bold border border-blue-100">VAT</span>
                                    <span v-if="service.advance_booking" class="bg-purple-50 text-purple-600 px-2 py-1 rounded text-[10px] font-bold border border-purple-100">ADVANCE</span>
                                </td>
                                <td class="px-6 py-4 text-right space-x-3 text-sm">
                                    <Link :href="route('admin.services.variants.index', service.id)" class="text-green-600 font-bold">Variants</Link>
                                    <Link :href="route('admin.services.edit', service.id)" class="text-indigo-600">Edit</Link>
                                    <button @click="deleteService(service.id)" class="text-red-600">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>