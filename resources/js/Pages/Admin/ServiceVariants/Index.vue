<script setup>
import { Head, useForm, router, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({ service: Object, variants: Array });

const form = useForm({
    title: '',
    duration: '',
    price: '',
    price_secondary: '',
    unit: 'min',
});

const submit = () => {
    form.post(route('admin.services.variants.store', props.service.id), {
        onSuccess: () => form.reset(),
    });
};

const deleteVariant = (id) => {
    if (confirm('Delete variant?')) router.delete(route('admin.variants.destroy', id));
};
</script>

<template>
    <Head :title="`Variants - ${service.name}`" />
    <AdminLayout>

            <div class="flex items-center space-x-4">
                <Link :href="route('admin.services.index')" class="text-indigo-600">&larr; Back</Link>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Variants: {{ service.name }}</h2>
            </div>
       

        <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border h-fit">
                <h3 class="font-bold mb-4">Add Variant</h3>
                <form @submit.prevent="submit" class="space-y-4">
                    <input v-model="form.title" type="text" placeholder="Title" class="w-full rounded-md border-gray-300" required />
                    <div class="flex">
                        <input v-model="form.duration" type="number" placeholder="Duration" class="flex-1 rounded-l-md border-gray-300" required />
                        <select v-model="form.unit" class="rounded-r-md border-gray-300 bg-gray-50 border-l-0">
                            <option value="min">min</option>
                            <option value="hr">hr</option>
                        </select>
                    </div>
                    <input v-model="form.price" type="number" step="0.01" placeholder="Primary Price" class="w-full rounded-md border-gray-300" required />
                    <input v-model="form.price_secondary" type="number" step="0.01" placeholder="Secondary Price (Opt)" class="w-full rounded-md border-gray-300" />
                    <button type="submit" class="w-full py-2 bg-indigo-600 text-white rounded-md font-bold">Add</button>
                </form>
            </div>

            <div class="md:col-span-2 bg-white rounded-lg shadow-sm border overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b text-xs uppercase text-gray-500 font-semibold">
                        <tr>
                            <th class="px-6 py-3">Title</th>
                            <th class="px-6 py-3">Duration</th>
                            <th class="px-6 py-3">Price</th>
                            <th class="px-6 py-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr v-for="v in variants" :key="v.id">
                            <td class="px-6 py-4 font-medium">{{ v.title }}</td>
                            <td class="px-6 py-4 text-sm">{{ v.duration }} {{ v.unit }}</td>
                            <td class="px-6 py-4 font-bold text-gray-900">${{ v.price }}</td>
                            <td class="px-6 py-4 text-right">
                                <button @click="deleteVariant(v.id)" class="text-red-600">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>