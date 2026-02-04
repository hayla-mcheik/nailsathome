<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const form = useForm({
    title: '',
    description: '',
    image: null,
});

const submit = () => {
    form.post(route('admin.brands.store'));
};
</script>

<template>
    <Head title="Create Brand" />
    <AdminLayout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">Create Brand</h2>
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-sm">
            <form @submit.prevent="submit" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Brand Title</label>
                    <input v-model="form.title" type="text" class="mt-1 block w-full border-gray-300 rounded-md" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea v-model="form.description" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Logo/Image</label>
                    <input type="file" @input="form.image = $event.target.files[0]" class="mt-1 block w-full" />
                </div>
                <div class="flex justify-end items-center">
                    <Link :href="route('admin.brands.index')" class="mr-4 underline text-gray-600">Cancel</Link>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Save Brand</button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>