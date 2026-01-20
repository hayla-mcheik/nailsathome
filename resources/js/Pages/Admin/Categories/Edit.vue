<script setup>
import { Head, useForm, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    category: Object
});

const form = useForm({
    name: props.category.name,
    description: props.category.description,
    image: null,
    _method: 'put', // Required for Laravel to handle file uploads in an update
});

const submit = () => {
    // We post to the update route, and Laravel will treat it as PUT because of _method
    router.post(route('admin.categories.update', props.category.id), {
        ...form.data(),
    });
};
</script>

<template>
    <Head title="Edit Category" />
    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Category</h2>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="space-y-6">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Name</label>
                            <input v-model="form.name" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Description</label>
                            <textarea v-model="form.description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">New Image (Optional)</label>
                            <input type="file" @input="form.image = $event.target.files[0]" class="mt-1 block w-full" />
                            <div v-if="category.image" class="mt-2">
                                <p class="text-xs text-gray-500">Current Image:</p>
                                <img :src="'/storage/' + category.image" class="h-20 w-20 object-cover rounded mt-1">
                            </div>
                        </div>

                        <div class="flex items-center justify-end">
                            <Link :href="route('admin.categories.index')" class="text-sm text-gray-600 underline mr-4">Cancel</Link>
                            <button type="submit" :disabled="form.processing" class="px-4 py-2 bg-indigo-600 text-white rounded-md">
                                Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>