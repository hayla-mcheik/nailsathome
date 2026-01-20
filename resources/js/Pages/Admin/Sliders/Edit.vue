<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({ slider: Object });

const form = useForm({
    _method: 'put', // Required for file uploads on update
    title: props.slider.title || '',
    description: props.slider.description || '',
    image: null,
});

const submit = () => {
    // We use .post even for updates when files are involved
    form.post(route('admin.sliders.update', props.slider.id), {
        forceFormData: true,
        preserveScroll: true,
    });
};
</script>

<template>
    <Head title="Edit Slider" />
    <AdminLayout>
        <div class="py-12 max-w-2xl mx-auto px-4">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-bold mb-4">Edit Slider</h3>
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label class="block text-sm">Title</label>
                        <input v-model="form.title" type="text" class="w-full rounded border-gray-300" />
                    </div>
                    <div>
                        <label class="block text-sm">Description</label>
                        <textarea v-model="form.description" class="w-full rounded border-gray-300"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm">Update Image (Optional)</label>
                        <input type="file" @input="form.image = $event.target.files[0]" class="mt-1" />
                        <div class="mt-2 text-xs text-gray-500 italic">Current image: {{ slider.image }}</div>
                    </div>
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded">Update Slider</button>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>