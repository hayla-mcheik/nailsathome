<script setup>
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { computed } from 'vue';

const props = defineProps({
    brands: Array,
});

const page = usePage();
const flashSuccess = computed(() => page.props.flash?.success);

const deleteBrand = (id) => {
    if (confirm('Are you sure?')) {
        router.delete(route('admin.brands.destroy', id));
    }
};
</script>

<template>
    <Head title="Brands" />
    <AdminLayout>
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Brands</h2>
            <Link :href="route('admin.brands.create')" class="px-4 py-2 bg-indigo-600 text-white rounded-md">
                + Add Brand
            </Link>
        </div>

        <div v-if="flashSuccess" class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ flashSuccess }}
        </div>

        <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="px-6 py-3 text-xs font-bold uppercase text-gray-500">Logo</th>
                        <th class="px-6 py-3 text-xs font-bold uppercase text-gray-500">Title</th>
                        <th class="px-6 py-3 text-xs font-bold uppercase text-gray-500 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr v-for="brand in brands" :key="brand.id">
                        <td class="px-6 py-4">
                            <img v-if="brand.image" :src="'/storage/' + brand.image" class="h-12 w-20 object-contain bg-gray-50 rounded">
                        </td>
                        <td class="px-6 py-4 font-medium">{{ brand.title }}</td>
                        <td class="px-6 py-4 text-right space-x-4">
                            <Link :href="route('admin.brands.edit', brand.id)" class="text-indigo-600">Edit</Link>
                            <button @click="deleteBrand(brand.id)" class="text-red-600">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AdminLayout>
</template>