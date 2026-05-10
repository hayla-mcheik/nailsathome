<script setup>
import { ref } from 'vue';
import { Head, useForm, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ testimonials: Array });

const form = useForm({
    client_name: '',
    feedback: '',
    rating: 5,
    image: null,
});

const fileInput = ref(null);

const submit = () => {
    form.post(route('admin.testimonials.store'), {
        onSuccess: () => {
            form.reset();
            if (fileInput.value) fileInput.value.value = null;
        },
    });
};

const deleteTestimonial = (id) => {
    if (confirm('Are you sure you want to delete this review?')) {
        router.delete(route('admin.testimonials.destroy', id));
    }
};
</script>

<template>
    <Head title="Manage Testimonials" />
    <AdminLayout>
        <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 text-left">
                <h2 class="text-2xl font-bold text-gray-800">Client Reviews</h2>
                <p class="text-gray-500 text-sm">Manage and display what your clients are saying.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 sticky top-24">
                        <h3 class="text-lg font-bold mb-4 text-gray-700 border-b pb-2">Add New Feedback</h3>
                        
                        <form @submit.prevent="submit" class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Client Name</label>
                                <input v-model="form.client_name" type="text" class="w-full mt-1 rounded-md border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter name..." required />
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Rating</label>
                                <select v-model="form.rating" class="w-full mt-1 rounded-md border-gray-300">
                                    <option v-for="n in 5" :key="n" :value="n">{{ n }} Stars</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Feedback Content</label>
                                <textarea v-model="form.feedback" rows="4" class="w-full mt-1 rounded-md border-gray-300" placeholder="Type review content here..." required></textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Client Photo</label>
                                <input 
                                    type="file" 
                                    ref="fileInput"
                                    @input="form.image = $event.target.files[0]" 
                                    class="mt-1 block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200" 
                                />
                            </div>

                            <button 
                                type="submit" 
                                :disabled="form.processing" 
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-md font-bold transition duration-200 shadow-sm"
                            >
                                {{ form.processing ? 'Saving...' : 'Save Testimonial' }}
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div v-if="testimonials.length === 0" class="bg-gray-50 border-2 border-dashed rounded-xl p-12 text-center text-gray-400">
                        No reviews found.
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div v-for="item in testimonials" :key="item.id" class="bg-white flex flex-col rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                            
                            <div class="p-5 flex-grow">
                                <div class="flex items-center mb-4">
                                    <img v-if="item.image" :src="'/storage/' + item.image" class="h-10 w-10 rounded-full object-cover mr-3 border shadow-sm" />
                                    <div v-else class="h-10 w-10 rounded-full bg-indigo-50 mr-3 flex items-center justify-center text-indigo-600 font-bold border border-indigo-100">
                                        {{ item.client_name.charAt(0) }}
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800 text-sm leading-tight">{{ item.client_name }}</h4>
                                        <div class="text-yellow-400 text-[10px] flex mt-1">
                                            <span v-for="n in 5" :key="n">{{ n <= item.rating ? '★' : '☆' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-gray-600 text-sm italic leading-relaxed">
                                    "{{ item.feedback }}"
                                </p>
                            </div>

                            <div class="bg-gray-50 border-t flex divide-x text-center">
                                <Link 
                                    :href="route('admin.testimonials.edit', item.id)" 
                                    class="flex-1 py-3 text-xs font-bold text-indigo-600 hover:bg-indigo-50 transition uppercase tracking-wider"
                                >
                                    Edit
                                </Link>
                                <button 
                                    @click="deleteTestimonial(item.id)" 
                                    class="flex-1 py-3 text-xs font-bold text-red-600 hover:bg-red-50 transition uppercase tracking-wider"
                                >
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AdminLayout>
</template>