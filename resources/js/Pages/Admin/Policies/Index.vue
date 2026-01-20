<script setup>
import { useForm, Head } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { ref } from 'vue';

const props = defineProps({ policies: Array });

const isEditing = ref(false);
const editId = ref(null);

const form = useForm({
    title: '',
    content: '',
    sort_order: 0,
});

const submit = () => {
    if (isEditing.value) {
        form.put(route('admin.policies.update', editId.value), {
            onSuccess: () => resetForm(),
        });
    } else {
        form.post(route('admin.policies.store'), {
            onSuccess: () => resetForm(),
        });
    }
};

const editPolicy = (policy) => {
    isEditing.value = true;
    editId.value = policy.id;
    form.title = policy.title;
    form.content = policy.content;
    form.sort_order = policy.sort_order;
    window.scrollTo({ top: 0, behavior: 'smooth' });
};

const resetForm = () => {
    form.reset();
    isEditing.value = false;
    editId.value = null;
};

const deletePolicy = (id) => {
    if (confirm('Are you sure you want to delete this policy?')) {
        form.delete(route('admin.policies.destroy', id));
    }
};
</script>

<template>
    <Head title="Manage Policies & Information" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Policies & Salon Information</h2>
        </template>

        <div class="py-12 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="md:col-span-1">
                    <div class="bg-white p-6 rounded-lg shadow border-t-4 border-[#8b735b]">
                        <h3 class="text-lg font-bold mb-4 text-gray-700">
                            {{ isEditing ? 'Edit' : 'Add New' }} Information Block
                        </h3>
                        
                        <form @submit.prevent="submit" class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Title</label>
                                <input 
                                    v-model="form.title" 
                                    type="text" 
                                    placeholder="e.g. Cancellation Policy"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8b735b] focus:ring-[#8b735b]" 
                                    required 
                                />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Content</label>
                                <textarea 
                                    v-model="form.content" 
                                    rows="6" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8b735b] focus:ring-[#8b735b]" 
                                    required
                                ></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700">Display Order</label>
                                <input 
                                    v-model="form.sort_order" 
                                    type="number" 
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#8b735b] focus:ring-[#8b735b]" 
                                />
                            </div>

                            <div class="flex items-center gap-3 pt-2">
                                <button 
                                    type="submit" 
                                    :disabled="form.processing"
                                    class="flex-1 bg-[#8b735b] text-white py-2 px-4 rounded-md hover:bg-[#6d5a47] transition disabled:opacity-50"
                                >
                                    {{ isEditing ? 'Update' : 'Save' }} Policy
                                </button>
                                <button 
                                    v-if="isEditing" 
                                    @click="resetForm" 
                                    type="button"
                                    class="bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 transition"
                                >
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="md:col-span-2">
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Policy Title</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Snippet</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="policy in policies" :key="policy.id" class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ policy.sort_order }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">{{ policy.title }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500 truncate max-w-xs">{{ policy.content }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-3">
                                        <button @click="editPolicy(policy)" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                        <button @click="deletePolicy(policy.id)" class="text-red-600 hover:text-red-900">Delete</button>
                                    </td>
                                </tr>
                                <tr v-if="policies.length === 0">
                                    <td colspan="4" class="px-6 py-10 text-center text-gray-400 italic">
                                        No policies found. Add the salon rules using the form.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </AdminLayout>
</template>