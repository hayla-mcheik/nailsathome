<script setup>
import { Head, useForm, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({ areas: Array });

const newAreaForm = useForm({ name: '', fee: 0 });

const storeArea = () => {
    newAreaForm.post(route('admin.transportation.store'), {
        onSuccess: () => newAreaForm.reset(),
    });
};

const updateFee = (area) => {
    router.put(route('admin.transportation-fee.update', area.id), {
        fee: area.fee.fee
    }, { preserveScroll: true });
};

const deleteArea = (id) => {
    if (confirm('Delete area?')) router.delete(route('admin.transportation.destroy', id));
};
</script>

<template>
    <Head title="Transportation" />
    <AdminLayout>
        <div class="py-12 max-w-4xl mx-auto px-4">
            <div class="bg-white p-6 rounded-lg shadow-sm mb-6 border">
                <h3 class="font-bold mb-4">Add Area</h3>
                <form @submit.prevent="storeArea" class="flex gap-4">
                    <input v-model="newAreaForm.name" type="text" placeholder="Area Name" class="flex-1 rounded-md border-gray-300" required />
                    <input v-model="newAreaForm.fee" type="number" step="0.01" class="w-32 rounded-md border-gray-300" required />
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Add</button>
                </form>
            </div>

            <div class="bg-white shadow-sm rounded-lg border">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b">
                        <tr class="text-xs uppercase text-gray-500 font-semibold">
                            <th class="px-6 py-3">Area</th>
                            <th class="px-6 py-3 w-40">Fee</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr v-for="area in areas" :key="area.id">
                            <td class="px-6 py-4 font-medium">{{ area.name }}</td>
                            <td class="px-6 py-4">
                                <input v-model="area.fee.fee" type="number" step="0.01" class="w-full rounded border-gray-300 text-sm" />
                            </td>
                            <td class="px-6 py-4 text-right space-x-2">
                                <button @click="updateFee(area)" class="text-green-600 text-sm font-bold">Update</button>
                                <button @click="deleteArea(area.id)" class="text-red-600 text-sm">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>