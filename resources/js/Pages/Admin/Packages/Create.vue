<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ services: Array });

const form = useForm({
    name: '',
    price: '',
    description: '',
    image: null,
    services: [], // IDs of selected services
});

const submit = () => form.post(route('admin.packages.store'));
</script>

<template>
    <Head title="Create Package" />
    <AdminLayout>
        <div class="py-12 max-w-4xl mx-auto">
            <div class="bg-white p-8 rounded-lg shadow">
                <form @submit.prevent="submit" class="grid grid-cols-2 gap-6">
                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-sm font-medium">Package Name</label>
                        <input v-model="form.name" type="text" class="w-full rounded-md border-gray-300" required />
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-sm font-medium">Price</label>
                        <input v-model="form.price" type="number" step="0.01" class="w-full rounded-md border-gray-300" required />
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium">Select Services Included</label>
                        <div class="mt-2 grid grid-cols-2 md:grid-cols-3 gap-2 border p-4 rounded-md">
                            <label v-for="service in services" :key="service.id" class="flex items-center text-sm">
                                <input type="checkbox" :value="service.id" v-model="form.services" class="rounded text-indigo-600 mr-2" />
                                {{ service.name }}
                            </label>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium">Image</label>
                        <input type="file" @input="form.image = $event.target.files[0]" />
                    </div>
                    <div class="col-span-2 flex justify-end">
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded">Create Package</button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>