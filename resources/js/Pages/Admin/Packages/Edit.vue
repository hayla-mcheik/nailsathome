<script setup>
import { Head, useForm, Link, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    package: Object,
    services: Array,
});

// Extract existing service IDs to pre-fill the checkboxes
const existingServiceIds = props.package.services.map(s => s.id);

const form = useForm({
    name: props.package.name,
    price: props.package.price,
    description: props.package.description,
    services: existingServiceIds, 
    image: null,
    _method: 'put',
});

const submit = () => {
    router.post(route('admin.packages.update', props.package.id), {
        ...form.data(),
    });
};
</script>

<template>
    <Head title="Edit Package" />
    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Package: {{ package.name }}</h2>
        </template>

        <div class="py-12 max-w-4xl mx-auto px-4">
            <div class="bg-white p-8 rounded-lg shadow">
                <form @submit.prevent="submit" class="grid grid-cols-2 gap-6">
                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Package Name</label>
                        <input v-model="form.name" type="text" class="mt-1 w-full rounded-md border-gray-300" required />
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-sm font-medium text-gray-700">Price</label>
                        <input v-model="form.price" type="number" step="0.01" class="mt-1 w-full rounded-md border-gray-300" required />
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Include Services</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 border p-4 rounded-md bg-gray-50">
                            <label v-for="service in services" :key="service.id" class="flex items-center p-2 hover:bg-white rounded border border-transparent hover:border-gray-200 cursor-pointer">
                                <input 
                                    type="checkbox" 
                                    :value="service.id" 
                                    v-model="form.services" 
                                    class="rounded text-indigo-600 mr-2" 
                                />
                                <span class="text-sm text-gray-700">{{ service.name }}</span>
                            </label>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Update Image</label>
                        <input type="file" @input="form.image = $event.target.files[0]" class="mt-1" />
                        <img v-if="package.image" :src="'/storage/'+package.image" class="mt-2 h-24 w-40 object-cover rounded border">
                    </div>

                    <div class="col-span-2 flex justify-end space-x-3 pt-6 border-t">
                        <Link :href="route('admin.packages.index')" class="px-4 py-2 text-gray-700 border rounded-md">Cancel</Link>
                        <button type="submit" :disabled="form.processing" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">
                            Update Package
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>