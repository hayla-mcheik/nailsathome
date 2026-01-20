<script setup>
import { Head, useForm, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ images: Array });

const form = useForm({ image: null, caption: '' });

const submit = () => {
    form.post(route('admin.gallery.store'), {
        onSuccess: () => form.reset()
    });
};

const deleteImg = (id) => {
    if(confirm('Delete this photo?')) router.delete(route('admin.gallery.destroy', id));
}
</script>

<template>
    <Head title="Portfolio Gallery" />
    <AdminLayout>
        <div class="py-12 max-w-7xl mx-auto px-4">
            <div class="bg-white p-6 rounded-lg shadow mb-8">
                <h3 class="font-bold mb-4">Add Photo to Gallery</h3>
                <form @submit.prevent="submit" class="flex flex-wrap items-end gap-4">
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-xs uppercase text-gray-500 font-bold mb-1">Image</label>
                        <input type="file" @input="form.image = $event.target.files[0]" required />
                    </div>
                    <div class="flex-1 min-w-[200px]">
                        <label class="block text-xs uppercase text-gray-500 font-bold mb-1">Caption (Optional)</label>
                        <input v-model="form.caption" type="text" class="w-full rounded border-gray-300" />
                    </div>
                    <button class="bg-indigo-600 text-white px-6 py-2 rounded">Upload</button>
                </form>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                <div v-for="img in images" :key="img.id" class="bg-white p-2 rounded shadow-sm border relative group">
                    <img :src="'/storage/'+img.image" class="aspect-square object-cover rounded">
                    <p class="text-[10px] mt-1 text-gray-500 truncate">{{ img.caption }}</p>
                    <button @click="deleteImg(img.id)" class="absolute top-3 right-3 bg-red-600 text-white p-1 rounded-md opacity-0 group-hover:opacity-100 transition">Delete</button>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>