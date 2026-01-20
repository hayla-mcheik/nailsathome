<script setup>
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { computed } from 'vue';

const props = defineProps({
    categories: Array,
});

const page = usePage();
const flashSuccess = computed(() => page.props.flash?.success);

const deleteCategory = (id) => {
    if (confirm('Are you sure you want to delete this category?')) {
        router.delete(route('admin.categories.destroy', id));
    }
};
</script>

<template>
    <Head title="Categories" />

    <AdminLayout>
   
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h2>
                <Link
                    :href="route('admin.categories.create')"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition"
                >
                    + Add Category
                </Link>
            </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-if="flashSuccess" class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ flashSuccess }}
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b bg-gray-50">
                                    <th class="px-6 py-3 text-sm font-medium text-gray-500 uppercase">Image</th>
                                    <th class="px-6 py-3 text-sm font-medium text-gray-500 uppercase">Name</th>
                                    <th class="px-6 py-3 text-sm font-medium text-gray-500 uppercase text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr v-for="category in categories" :key="category.id">
                                    <td class="px-6 py-4">
                                        <img v-if="category.image" :src="'/storage/' + category.image" class="h-10 w-10 rounded object-cover">
                                        <div v-else class="h-10 w-10 bg-gray-200 rounded flex items-center justify-center text-[10px] text-gray-500">No Image</div>
                                    </td>
                                    <td class="px-6 py-4 font-medium">{{ category.name }}</td>
                                    <td class="px-6 py-4 text-right space-x-4">
                                        <Link :href="route('admin.categories.edit', category.id)" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                                        <button @click="deleteCategory(category.id)" class="text-red-600 hover:text-red-900">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>