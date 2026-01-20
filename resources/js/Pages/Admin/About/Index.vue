<script setup>
import { Head, useForm, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    about: Object,
    images: Array
});

// Form for Text content
const textForm = useForm({
    title: props.about.title || '',
    description: props.about.description || '',
});

// Form for Image upload
const imageForm = useForm({
    image: null
});

const updateText = () => {
    textForm.post(route('admin.about.update'), {
        preserveScroll: true,
        onSuccess: () => alert('Text updated!')
    });
};

const uploadImage = () => {
    imageForm.post(route('admin.about-images.store'), {
        preserveScroll: true,
        onSuccess: () => imageForm.reset(),
    });
};

const deleteImage = (id) => {
    if (confirm('Remove this image?')) {
        router.delete(route('admin.about-images.destroy', id), { preserveScroll: true });
    }
};
</script>

<template>
    <Head title="About Us Management" />
    <AdminLayout>
        <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <div class="bg-white p-6 rounded-lg shadow border">
                    <h3 class="text-lg font-bold mb-4">About Text Content</h3>
                    <form @submit.prevent="updateText" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium">Section Title</label>
                            <input v-model="textForm.title" type="text" class="w-full mt-1 rounded-md border-gray-300" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Description</label>
                            <textarea v-model="textForm.description" rows="6" class="w-full mt-1 rounded-md border-gray-300"></textarea>
                        </div>
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">
                            Update Content
                        </button>
                    </form>
                </div>

                <div class="bg-white p-6 rounded-lg shadow border">
                    <h3 class="text-lg font-bold mb-4">About Slider Images</h3>
                    
                    <form @submit.prevent="uploadImage" class="mb-6 pb-6 border-b">
                        <label class="block text-sm font-medium mb-2">Upload New Image</label>
                        <div class="flex items-center gap-4">
                            <input type="file" @input="imageForm.image = $event.target.files[0]" class="text-sm" />
                            <button type="submit" class="bg-green-600 text-white px-4 py-1 rounded text-sm">Upload</button>
                        </div>
                    </form>

                    <div class="grid grid-cols-3 gap-4">
                        <div v-for="img in images" :key="img.id" class="relative group">
                            <img :src="'/storage/' + img.image" class="h-24 w-full object-cover rounded border" />
                            <button 
                                @click="deleteImage(img.id)"
                                class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 opacity-0 group-hover:opacity-100 transition"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AdminLayout>
</template>