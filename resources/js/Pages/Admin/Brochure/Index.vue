<script setup>
import { useForm, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { ref } from 'vue';

const props = defineProps({ services: Array });

// --- CREATE FORM ---
const form = useForm({
    category_type: '',
    theme_color: 'dark',
    side_title: '',
    section_title: '',
    title: '',
    price: '',
    duration: '',
    description: '',
});

// --- EDIT FORM STATE ---
const editingId = ref(null);
const editForm = useForm({
    category_type: '',
    theme_color: 'dark',
    side_title: '',
    section_title: '',
    title: '',
    price: '',
    duration: '',
    description: '',
});

const submit = () => {
    form.post(route('admin.brochure.store'), {
        onSuccess: () => form.reset(),
    });
};

const startEdit = (item) => {
    editingId.value = item.id;
    editForm.category_type = item.category_type;
    editForm.theme_color = item.theme_color;
    editForm.side_title = item.side_title;
    editForm.section_title = item.section_title;
    editForm.title = item.title;
    editForm.price = item.price;
    editForm.duration = item.duration;
    editForm.description = item.description;
};

const cancelEdit = () => {
    editingId.value = null;
    editForm.reset();
};

const updateService = (id) => {
    editForm.put(route('admin.brochure.update', id), {
        onSuccess: () => editingId.value = null,
    });
};

const deleteService = (id) => {
    if (confirm('Delete this service?')) {
        router.delete(route('admin.brochure.destroy', id));
    }
};
</script>

<template>
    <AdminLayout title="Manage Brochure">
        <div class="py-12 max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded shadow sticky top-20">
                        <h3 class="font-bold text-lg mb-4 text-indigo-600">Add New Item</h3>
                        <form @submit.prevent="submit" class="space-y-3">
                            <div>
                                <label class="text-xs font-bold uppercase text-gray-500">Theme</label>
                                <select v-model="form.theme_color" class="w-full mt-1 rounded border-gray-300">
                                    <option value="dark">Dark (Nails)</option>
                                    <option value="orange">Orange (Waxing)</option>
                                    <option value="grey">Grey (Massage)</option>
                                    <option value="gold">Gold (Hair)</option>
                                </select>
                            </div>
                            <input v-model="form.category_type" placeholder="Category (e.g. nails)" class="w-full rounded border-gray-300" />
                            <input v-model="form.side_title" placeholder="Side Title (Brochure Header)" class="w-full rounded border-gray-300" />
                            <input v-model="form.section_title" placeholder="Section (Sub-Header)" class="w-full rounded border-gray-300" />
                            <hr>
                            <input v-model="form.title" placeholder="Service Name" class="w-full rounded border-gray-300 font-bold" />
                            <div class="grid grid-cols-2 gap-2">
                                <input v-model="form.price" type="number" placeholder="Price" class="rounded border-gray-300" />
                                <input v-model="form.duration" placeholder="e.g. 45 mins" class="rounded border-gray-300" />
                            </div>
                            <textarea v-model="form.description" placeholder="Service details..." class="w-full rounded border-gray-300 text-sm"></textarea>
                            <button type="submit" :disabled="form.processing" class="w-full bg-indigo-600 text-white py-2 rounded font-bold hover:bg-indigo-700">
                                Add to Brochure
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="bg-white rounded shadow overflow-hidden">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-800 text-white uppercase text-xs">
                                <tr>
                                    <th class="p-4">Service Details</th>
                                    <th class="p-4">Category/Theme</th>
                                    <th class="p-4">Price</th>
                                    <th class="p-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in services" :key="item.id" class="border-t">
                                    
                                    <template v-if="editingId !== item.id">
                                        <td class="p-4">
                                            <div class="font-bold text-gray-800">{{ item.title }}</div>
                                            <div class="text-xs text-gray-500">{{ item.duration }}</div>
                                            <div class="text-xs italic text-gray-400 mt-1 line-clamp-1">{{ item.description }}</div>
                                        </td>
                                        <td class="p-4">
                                            <div class="text-sm font-medium">{{ item.side_title }}</div>
                                            <span :class="['px-2 py-0.5 rounded text-[10px] text-white uppercase font-bold', item.theme_color]">
                                                {{ item.theme_color }}
                                            </span>
                                        </td>
                                        <td class="p-4 font-bold text-indigo-600">${{ item.price }}</td>
                                        <td class="p-4 text-right space-x-2">
                                            <button @click="startEdit(item)" class="text-blue-600 hover:underline text-sm">Edit</button>
                                            <button @click="deleteService(item.id)" class="text-red-600 hover:underline text-sm">Delete</button>
                                        </td>
                                    </template>

                                    <template v-else>
                                        <td colspan="3" class="p-4 bg-indigo-50">
                                            <div class="grid grid-cols-2 gap-4 mb-2">
                                                <input v-model="editForm.title" class="rounded border-gray-300 text-sm" placeholder="Title">
                                                <input v-model="editForm.side_title" class="rounded border-gray-300 text-sm" placeholder="Side Title">
                                                <input v-model="editForm.price" type="number" class="rounded border-gray-300 text-sm" placeholder="Price">
                                                <input v-model="editForm.duration" class="rounded border-gray-300 text-sm" placeholder="Duration">
                                                <select v-model="editForm.theme_color" class="rounded border-gray-300 text-sm">
                                                    <option value="dark">Dark</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="grey">Grey</option>
                                                    <option value="gold">Gold</option>
                                                </select>
                                                <input v-model="editForm.category_type" class="rounded border-gray-300 text-sm" placeholder="Category">
                                            </div>
                                            <textarea v-model="editForm.description" class="w-full rounded border-gray-300 text-sm" rows="2"></textarea>
                                        </td>
                                        <td class="p-4 bg-indigo-50 text-right">
                                            <div class="flex flex-col space-y-2">
                                                <button @click="updateService(item.id)" class="bg-green-600 text-white px-3 py-1 rounded text-xs">Update</button>
                                                <button @click="cancelEdit" class="bg-gray-500 text-white px-3 py-1 rounded text-xs">Cancel</button>
                                            </div>
                                        </td>
                                    </template>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </AdminLayout>
</template>

<style scoped>
.dark { background-color: #232323 !important; }
.orange { background-color: #d17a3a !important; }
.grey { background-color: #5c5552 !important; }
.gold { background-color: #c5a059 !important; }
</style>