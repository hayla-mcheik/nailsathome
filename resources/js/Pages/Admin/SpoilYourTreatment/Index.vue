<script setup>
import { Head, useForm, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { ref } from 'vue';

const props = defineProps({ treatments: Array });
const isEditing = ref(false);
const editId = ref(null);

const form = useForm({
    title: '',
    subtitle: '',
    description: '',
    duration: '',
    price: '',
    advance_booking: false,
    image: null,
});

const submit = () => {
    if (isEditing.value) {
        // Use POST with _method PUT for file uploads in updates
        form.post(route('admin.spa-treatments.update', editId.value), {
            _method: 'put',
            onSuccess: () => resetForm(),
        });
    } else {
        form.post(route('admin.spa-treatments.store'), {
            onSuccess: () => resetForm(),
        });
    }
};

const editTreatment = (item) => {
    isEditing.value = true;
    editId.value = item.id;
    form.title = item.title;
    form.subtitle = item.subtitle;
    form.description = item.description;
    form.duration = item.duration;
    form.price = item.price;
    form.advance_booking = item.advance_booking;
};

const resetForm = () => {
    form.reset();
    isEditing.value = false;
    editId.value = null;
};

const deleteItem = (id) => {
    if (confirm('Delete this luxury treatment?')) {
        router.delete(route('admin.spa-treatments.destroy', id));
    }
};
</script>

<template>
    <Head title="Manage Spa Experiences" />
    <AdminLayout>
        <div class="py-12 max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-lg shadow border sticky top-24">
                        <h3 class="text-lg font-bold mb-4">{{ isEditing ? 'Edit' : 'Add' }} Spa Experience</h3>
                        <form @submit.prevent="submit" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium">Subtitle (e.g. Pamper Your Hands)</label>
                                <input v-model="form.subtitle" type="text" class="w-full mt-1 rounded-md border-gray-300" required />
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Title (e.g. The Classic Scrub)</label>
                                <input v-model="form.title" type="text" class="w-full mt-1 rounded-md border-gray-300" required />
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Description</label>
                                <textarea v-model="form.description" rows="5" class="w-full mt-1 rounded-md border-gray-300" required></textarea>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium">Duration</label>
                                    <input v-model="form.duration" type="text" placeholder="45 mins" class="w-full mt-1 rounded-md border-gray-300" required />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium">Price ($)</label>
                                    <input v-model="form.price" type="number" step="0.01" class="w-full mt-1 rounded-md border-gray-300" required />
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <input v-model="form.advance_booking" type="checkbox" id="advance" />
                                <label for="advance" class="text-sm">Requires Advance Booking</label>
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Image</label>
                                <input type="file" @input="form.image = $event.target.files[0]" class="mt-1 block w-full text-sm" />
                            </div>
                            
                            <div class="flex gap-2">
                                <button type="submit" class="flex-1 bg-pink-600 text-white py-2 rounded-md hover:bg-pink-700">
                                    {{ isEditing ? 'Update' : 'Save' }} Experience
                                </button>
                                <button v-if="isEditing" @click="resetForm" type="button" class="bg-gray-200 px-4 py-2 rounded-md">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="space-y-4">
                        <div v-for="item in treatments" :key="item.id" class="bg-white p-4 rounded-lg shadow border flex gap-4">
                            <img :src="'/storage/' + item.image" class="w-32 h-32 object-cover rounded shadow-inner" v-if="item.image" />
                            <div class="flex-1">
                                <span class="text-xs font-bold text-pink-500 uppercase">{{ item.subtitle }}</span>
                                <h4 class="text-xl font-bold">{{ item.title }}</h4>
                                <p class="text-gray-500 text-sm line-clamp-2 mt-1">{{ item.description }}</p>
                                <div class="mt-3 flex gap-4 text-sm font-medium">
                                    <button @click="editTreatment(item)" class="text-indigo-600">Edit</button>
                                    <button @click="deleteItem(item.id)" class="text-red-600">Delete</button>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="font-bold text-lg">${{ item.price }}</div>
                                <div class="text-gray-400 text-xs">{{ item.duration }}</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AdminLayout>
</template>