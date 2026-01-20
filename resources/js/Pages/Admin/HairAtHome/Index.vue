<script setup>
import { useForm, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { ref } from 'vue';

const props = defineProps({ services: Array });

// --- CREATE FORM ---
const form = useForm({
    category_group: 'Blow Dry', // Default category
    service_name: '',
    duration: '',
    price_standard: '',
    price_majirel: '',
    price_inoa: '',
    description: '',
});

// --- EDIT STATE ---
const editingId = ref(null);
const editForm = useForm({
    category_group: '',
    service_name: '',
    duration: '',
    price_standard: '',
    price_majirel: '',
    price_inoa: '',
    description: '',
});

const submit = () => {
    form.post(route('admin.hair-at-home.store'), {
        onSuccess: () => form.reset(),
    });
};

const startEdit = (item) => {
    editingId.value = item.id;
    editForm.category_group = item.category_group;
    editForm.service_name = item.service_name;
    editForm.duration = item.duration;
    editForm.price_standard = item.price_standard;
    editForm.price_majirel = item.price_majirel;
    editForm.price_inoa = item.price_inoa;
    editForm.description = item.description;
};

const cancelEdit = () => {
    editingId.value = null;
    editForm.reset();
};

const updateService = (id) => {
    editForm.put(route('admin.hair-at-home.update', id), {
        onSuccess: () => editingId.value = null,
    });
};

const deleteService = (id) => {
    if (confirm('Are you sure you want to remove this hair service?')) {
        router.delete(route('admin.hair-at-home.destroy', id));
    }
};
</script>

<template>
    <AdminLayout title="Manage Hair At Home">
        <div class="py-12 max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded shadow-lg sticky top-20 border-t-4 border-orange-500">
                        <h3 class="font-bold text-lg mb-4 flex items-center">
                            <i class="ri-scissors-fill mr-2 text-orange-500"></i> Add Hair Service
                        </h3>
                        <form @submit.prevent="submit" class="space-y-4">
                            <div>
                                <label class="text-xs font-bold uppercase text-gray-500">Section Group</label>
                                <select v-model="form.category_group" class="w-full mt-1 rounded border-gray-300 text-sm">
                                    <option>Blow Dry</option>
                                    <option>Hair Cut</option>
                                    <option>Hair Colour</option>
                                    <option>Hair Style</option>
                                    <option>Magic Hair Treatments</option>
                                    <option>Organic Hair Treatments</option>
                                </select>
                            </div>

                            <input v-model="form.service_name" placeholder="Service Name (e.g. Short Hair)" class="w-full rounded border-gray-300" required />
                            <input v-model="form.duration" placeholder="Duration (e.g. 60 mins)" class="w-full rounded border-gray-300" />
                            
                            <div class="bg-gray-50 p-3 rounded space-y-2">
                                <p class="text-[10px] font-bold text-gray-400 uppercase">Pricing Options</p>
                                <input v-model="form.price_standard" placeholder="Standard Price" class="w-full rounded border-gray-300 text-sm" />
                                <div class="grid grid-cols-2 gap-2">
                                    <input v-model="form.price_majirel" placeholder="Majirel" class="rounded border-gray-300 text-xs" />
                                    <input v-model="form.price_inoa" placeholder="Inoa" class="rounded border-gray-300 text-xs" />
                                </div>
                            </div>

                            <textarea v-model="form.description" placeholder="Description (Optional)" class="w-full rounded border-gray-300 text-sm" rows="3"></textarea>
                            
                            <button type="submit" :disabled="form.processing" class="w-full bg-orange-600 text-white py-2 rounded font-bold hover:bg-orange-700 transition">
                                Save to Menu
                            </button>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-3">
                    <div class="bg-white rounded shadow-lg overflow-hidden">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-gray-900 text-white text-xs uppercase tracking-wider">
                                <tr>
                                    <th class="p-4">Service Details</th>
                                    <th class="p-4">Group</th>
                                    <th class="p-4">Pricing</th>
                                    <th class="p-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr v-for="item in services" :key="item.id" class="hover:bg-gray-50 transition">
                                    
                                    <template v-if="editingId !== item.id">
                                        <td class="p-4">
                                            <div class="font-bold text-gray-800">{{ item.service_name }}</div>
                                            <div class="text-xs text-gray-400 italic" v-if="item.duration">{{ item.duration }}</div>
                                        </td>
                                        <td class="p-4">
                                            <span class="px-2 py-1 bg-orange-100 text-orange-700 rounded text-[10px] font-bold uppercase">
                                                {{ item.category_group }}
                                            </span>
                                        </td>
                                        <td class="p-4 text-sm">
                                            <div v-if="item.price_standard" class="font-bold">AED {{ item.price_standard }}</div>
                                            <div v-if="item.price_majirel || item.price_inoa" class="text-[10px] space-x-2">
                                                <span v-if="item.price_majirel">M: <b>{{ item.price_majirel }}</b></span>
                                                <span v-if="item.price_inoa">I: <b>{{ item.price_inoa }}</b></span>
                                            </div>
                                        </td>
                                        <td class="p-4 text-right space-x-3">
                                            <button @click="startEdit(item)" class="text-blue-600 hover:text-blue-800 text-sm font-medium">Edit</button>
                                            <button @click="deleteService(item.id)" class="text-red-500 hover:text-red-700 text-sm font-medium">Delete</button>
                                        </td>
                                    </template>

                                    <template v-else>
                                        <td colspan="3" class="p-4 bg-orange-50">
                                            <div class="grid grid-cols-2 gap-3 mb-2">
                                                <input v-model="editForm.service_name" class="rounded border-gray-300 text-sm" placeholder="Service Name">
                                                <select v-model="editForm.category_group" class="rounded border-gray-300 text-sm">
                                                    <option>Blow Dry</option>
                                                    <option>Hair Cut</option>
                                                    <option>Hair Colour</option>
                                                    <option>Hair Style</option>
                                                </select>
                                                <input v-model="editForm.price_standard" class="rounded border-gray-300 text-sm" placeholder="Standard Price">
                                                <div class="flex gap-2">
                                                    <input v-model="editForm.price_majirel" class="w-1/2 rounded border-gray-300 text-xs" placeholder="Majirel">
                                                    <input v-model="editForm.price_inoa" class="w-1/2 rounded border-gray-300 text-xs" placeholder="Inoa">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4 bg-orange-50 text-right">
                                            <div class="flex flex-col gap-2">
                                                <button @click="updateService(item.id)" class="bg-green-600 text-white px-3 py-1 rounded text-xs">Update</button>
                                                <button @click="cancelEdit" class="bg-gray-400 text-white px-3 py-1 rounded text-xs">Cancel</button>
                                            </div>
                                        </td>
                                    </template>
                                    
                                </tr>
                            </tbody>
                        </table>
                        <div v-if="services.length === 0" class="p-10 text-center text-gray-400 italic">
                            No hair services found. Add your first one using the sidebar.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AdminLayout>
</template>