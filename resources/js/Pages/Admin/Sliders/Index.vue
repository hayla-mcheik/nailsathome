<script setup>
import { Head, useForm, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ sliders: Array });

const form = useForm({
    title: '',
    description: '',
    image: null,
});

const submit = () => {
    form.post(route('admin.sliders.store'), {
        onSuccess: () => form.reset(),
    });
};

const deleteSlider = (id) => {
    if (confirm('Are you sure you want to delete this slider?')) {
        router.delete(route('admin.sliders.destroy', id));
    }
};
</script>

<template>
    <Head title="Hero Sliders" />
    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Hero Sliders</h2>
        </template>

        <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-lg shadow border sticky top-24">
                        <h3 class="text-lg font-bold mb-4">Add New Slider</h3>
                        <form @submit.prevent="submit" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium">Title</label>
                                <input v-model="form.title" type="text" class="w-full mt-1 rounded-md border-gray-300 shadow-sm" />
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Description</label>
                                <textarea v-model="form.description" rows="3" class="w-full mt-1 rounded-md border-gray-300 shadow-sm"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Image (1920x1080 recommended)</label>
                                <input type="file" @input="form.image = $event.target.files[0]" class="mt-1 block w-full text-sm" required />
                            </div>
                            <button type="submit" :disabled="form.processing" class="w-full bg-indigo-600 text-white py-2 rounded-md hover:bg-indigo-700 transition">
                                Create Slider
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="grid grid-cols-1 gap-6">
                        <div v-for="slider in sliders" :key="slider.id" class="bg-white rounded-lg shadow border overflow-hidden flex flex-col md:flex-row">
                            <div class="md:w-48 h-32 md:h-auto shrink-0">
                                <img :src="'/storage/' + slider.image" class="w-full h-full object-cover" />
                            </div>
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h4 class="font-bold text-lg">{{ slider.title || 'No Title' }}</h4>
                                    <p class="text-gray-600 text-sm line-clamp-2">{{ slider.description || 'No description' }}</p>
                                </div>
                                <div class="mt-4 flex space-x-4">
                                    <Link :href="route('admin.sliders.edit', slider.id)" class="text-indigo-600 text-sm font-medium">Edit Slider</Link>
                                    <button @click="deleteSlider(slider.id)" class="text-red-600 text-sm font-medium">Delete</button>
                                </div>
                            </div>
                        </div>
                        <div v-if="sliders.length === 0" class="bg-gray-50 text-center py-20 rounded-lg border-2 border-dashed">
                            No sliders found.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AdminLayout>
</template>