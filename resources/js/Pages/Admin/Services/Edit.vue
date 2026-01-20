<script setup>
import { Head, useForm, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    service: Object,
    categories: Array,
});

const form = useForm({
    name: props.service.name,
    category_id: props.service.category_id,
    description: props.service.description,
    image: null,
    vat_applicable: Boolean(props.service.vat_applicable),
    advance_booking: Boolean(props.service.advance_booking),
    _method: 'put', 
});

const submit = () => {
    // Using router.post with _method: put to support image uploads
    router.post(route('admin.services.update', props.service.id), {
        ...form.data(),
    });
};
</script>

<template>
    <Head title="Edit Service" />
    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Service: {{ service.name }}</h2>
        </template>

        <div class="py-12 max-w-3xl mx-auto">
            <div class="bg-white p-6 rounded-lg shadow">
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Service Name</label>
                        <input v-model="form.name" type="text" class="mt-1 w-full rounded-md border-gray-300 shadow-sm" required />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Category</label>
                        <select v-model="form.category_id" class="mt-1 w-full rounded-md border-gray-300 shadow-sm" required>
                            <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea v-model="form.description" class="mt-1 w-full rounded-md border-gray-300 shadow-sm" rows="3"></textarea>
                    </div>

                    <div class="flex space-x-6">
                        <label class="flex items-center text-sm">
                            <input type="checkbox" v-model="form.vat_applicable" class="rounded text-indigo-600 mr-2" /> VAT Applicable
                        </label>
                        <label class="flex items-center text-sm">
                            <input type="checkbox" v-model="form.advance_booking" class="rounded text-indigo-600 mr-2" /> Advance Booking
                        </label>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Update Image (Leave blank to keep current)</label>
                        <input type="file" @input="form.image = $event.target.files[0]" class="mt-1 block w-full text-sm" />
                        
                        <div v-if="service.image" class="mt-3">
                            <p class="text-xs text-gray-500 mb-1">Current Image:</p>
                            <img :src="'/storage/' + service.image" class="h-20 w-20 object-cover rounded border" />
                        </div>
                    </div>

                    <div class="flex items-center justify-end space-x-4 pt-4 border-t">
                        <Link :href="route('admin.services.index')" class="text-sm text-gray-600 underline">Cancel</Link>
                        <button type="submit" :disabled="form.processing" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                            Update Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>