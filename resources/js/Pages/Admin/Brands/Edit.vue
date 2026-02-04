<script setup>
import { Head, useForm, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    brand: Object
});

const form = useForm({
    title: props.brand.title,
    description: props.brand.description,
    image: null,
    _method: 'put', 
});

const submit = () => {
    // Note: When uploading files in an update, we often use router.post with _method: 'put'
    router.post(route('admin.brands.update', props.brand.id), {
        ...form.data(),
    });
};
</script>

<template>
    <Head title="Edit Brand" />
    <AdminLayout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">Edit Brand</h2>
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-sm">
            <form @submit.prevent="submit" class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input v-model="form.title" type="text" class="mt-1 block w-full border-gray-300 rounded-md" required />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea v-model="form.description" class="mt-1 block w-full border-gray-300 rounded-md"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">New Logo (Optional)</label>
                    <input type="file" @input="form.image = $event.target.files[0]" class="mt-1 block w-full" />
                    <img v-if="brand.image" :src="'/storage/' + brand.image" class="mt-2 h-16 w-32 object-contain bg-gray-50 rounded">
                </div>
                <div class="flex justify-end items-center">
                    <Link :href="route('admin.brands.index')" class="mr-4 underline text-gray-600">Cancel</Link>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Update Brand</button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>