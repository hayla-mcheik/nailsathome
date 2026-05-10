<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    testimonial: Object
});

const form = useForm({
    _method: 'PUT', // Important for Laravel to handle file uploads in updates
    client_name: props.testimonial.client_name,
    feedback: props.testimonial.feedback,
    rating: props.testimonial.rating,
    image: null,
});

const submit = () => {
    // We use .post with _method: 'PUT' because standard PUT requests 
    // often fail to send multipart/form-data (files) in PHP
    form.post(route('admin.testimonials.update', props.testimonial.id));
};
</script>

<template>
    <Head title="Edit Testimonial" />
    <AdminLayout>
        <div class="py-12 max-w-2xl mx-auto px-4">
            <div class="bg-white p-8 rounded-xl shadow-sm border border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-bold text-gray-800">Edit Review</h2>
                    <button @click="window.history.back()" class="text-sm text-gray-500 hover:text-gray-700">Cancel</button>
                </div>

                <form @submit.prevent="submit" class="space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase">Client Name</label>
                        <input v-model="form.client_name" type="text" class="w-full mt-1 rounded-md border-gray-300" required />
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase">Rating</label>
                        <select v-model="form.rating" class="w-full mt-1 rounded-md border-gray-300">
                            <option v-for="n in 5" :key="n" :value="n">{{ n }} Stars</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase">Feedback Content</label>
                        <textarea v-model="form.feedback" rows="5" class="w-full mt-1 rounded-md border-gray-300" required></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-500 uppercase">Update Photo (Optional)</label>
                        <div v-if="testimonial.image" class="mb-2 mt-2">
                            <p class="text-[10px] text-gray-400 mb-1">Current Image:</p>
                            <img :src="'/storage/' + testimonial.image" class="h-16 w-16 rounded-lg object-cover border" />
                        </div>
                        <input type="file" @input="form.image = $event.target.files[0]" class="mt-1 block w-full text-xs text-gray-500" />
                    </div>

                    <div class="pt-4">
                        <button 
                            type="submit" 
                            :disabled="form.processing" 
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-md font-bold transition shadow-md"
                        >
                            {{ form.processing ? 'Updating...' : 'Update Testimonial' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>