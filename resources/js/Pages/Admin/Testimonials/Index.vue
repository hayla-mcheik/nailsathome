<script setup>
import { Head, useForm, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ testimonials: Array });

const form = useForm({
    client_name: '',
    feedback: '',
    rating: 5,
    image: null,
});

const submit = () => {
    form.post(route('admin.testimonials.store'), {
        onSuccess: () => form.reset(),
    });
};

const deleteTestimonial = (id) => {
    if (confirm('Delete this testimonial?')) {
        router.delete(route('admin.testimonials.destroy', id));
    }
};
</script>

<template>
    <Head title="Testimonials" />
    <AdminLayout>
        <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-lg shadow border sticky top-24">
                        <h3 class="text-lg font-bold mb-4">Add Feedback</h3>
                        <form @submit.prevent="submit" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium">Client Name</label>
                                <input v-model="form.client_name" type="text" class="w-full mt-1 rounded-md border-gray-300" required />
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Rating (1-5)</label>
                                <select v-model="form.rating" class="w-full mt-1 rounded-md border-gray-300">
                                    <option v-for="n in 5" :key="n" :value="n">{{ n }} Stars</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Feedback</label>
                                <textarea v-model="form.feedback" rows="4" class="w-full mt-1 rounded-md border-gray-300" required></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Client Photo (Optional)</label>
                                <input type="file" @input="form.image = $event.target.files[0]" class="mt-1 block w-full text-sm" />
                            </div>
                            <button type="submit" :disabled="form.processing" class="w-full bg-indigo-600 text-white py-2 rounded-md font-bold">
                                Save Testimonial
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div v-for="item in testimonials" :key="item.id" class="bg-white p-6 rounded-lg shadow border relative group">
                            <div class="flex items-center mb-4">
                                <img v-if="item.image" :src="'/storage/' + item.image" class="h-12 w-12 rounded-full object-cover mr-4 border" />
                                <div v-else class="h-12 w-12 rounded-full bg-gray-200 mr-4 flex items-center justify-center text-gray-500 font-bold">
                                    {{ item.client_name.charAt(0) }}
                                </div>
                                <div>
                                    <h4 class="font-bold">{{ item.client_name }}</h4>
                                    <div class="text-yellow-500 text-xs">
                                        <span v-for="n in item.rating" :key="n">★</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm italic">"{{ item.feedback }}"</p>
                            
                            <div class="mt-4 flex justify-end space-x-3 opacity-0 group-hover:opacity-100 transition">
                                <Link :href="route('admin.testimonials.edit', item.id)" class="text-indigo-600 text-sm">Edit</Link>
                                <button @click="deleteTestimonial(item.id)" class="text-red-600 text-sm">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AdminLayout>
</template>