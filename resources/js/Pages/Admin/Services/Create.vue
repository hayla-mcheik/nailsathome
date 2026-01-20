<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ categories: Array });

const form = useForm({
    name: '',
    category_id: '',
    description: '',
    image: null,
    vat_applicable: false,
    advance_booking: false,
});

const submit = () => form.post(route('admin.services.store'));
</script>

<template>
    <Head title="Create Service" />
    <AdminLayout>
        <div class="py-12 max-w-3xl mx-auto">
            <div class="bg-white p-6 rounded-lg shadow">
                <form @submit.prevent="submit" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium">Service Name</label>
                        <input v-model="form.name" type="text" class="w-full rounded-md border-gray-300" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Category</label>
                        <select v-model="form.category_id" class="w-full rounded-md border-gray-300" required>
                            <option value="">Select Category</option>
                            <option v-for="cat in categories" :key="cat.id" :value="cat.id">{{ cat.name }}</option>
                        </select>
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
                        <label class="block text-sm font-medium">Image</label>
                        <input type="file" @input="form.image = $event.target.files[0]" />
                    </div>
                    <div class="flex justify-end pt-4">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Save Service</button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>