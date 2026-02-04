<script setup>
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { computed } from 'vue';

const props = defineProps({
    faq: Array,
});

const page = usePage();
const flashSuccess = computed(() => page.props.flash?.success);

const deleteFAQ = (id) => {
    if (confirm('Are you sure you want to delete this FAQ?')) {
        router.delete(route('admin.faq.destroy', id));
    }
};
</script>

<template>
    <Head title="FAQs" />
    <AdminLayout>
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">FAQs</h2>
            <Link :href="route('admin.faq.create')" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                + Add FAQ
            </Link>
        </div>

        <div class="py-4">
            <div v-if="flashSuccess" class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ flashSuccess }}
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b bg-gray-50">
                                <th class="px-6 py-3 text-sm font-medium text-gray-500 uppercase">Question</th>
                                <th class="px-6 py-3 text-sm font-medium text-gray-500 uppercase text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr v-for="item in faq" :key="item.id">
                                <td class="px-6 py-4 font-medium">{{ item.title }}</td>
                                <td class="px-6 py-4 text-right space-x-4">
                                    <Link :href="route('admin.faq.edit', item.id)" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                                    <button @click="deleteFAQ(item.id)" class="text-red-600 hover:text-red-900">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>