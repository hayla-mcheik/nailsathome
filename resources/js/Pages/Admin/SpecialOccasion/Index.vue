<script setup>
import { Head, useForm, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { ref } from 'vue';

// Updated to match the key sent from the Controller
const props = defineProps({ 
    specialoccasion: Array 
});

const isEditing = ref(false);
const editId = ref(null);

const form = useForm({
    title: '',
    description: '',
    image: null,
});

const submit = () => {
    if (isEditing.value) {
        // Use the new route name that points to the POST method
        form.post(route('admin.special-occasions.update-post', editId.value), {
            forceFormData: true,
            onSuccess: () => resetForm(),
        });
    } else {
        form.post(route('admin.special-occasions.store'), {
            onSuccess: () => resetForm(),
        });
    }
};

const editTreatment = (item) => {
    isEditing.value = true;
    editId.value = item.id;
    form.title = item.title;
    form.description = item.description;
    // We leave image null unless a new file is chosen
    form.image = null; 
};

const resetForm = () => {
    form.reset();
    isEditing.value = false;
    editId.value = null;
};

const deleteItem = (id) => {
    if (confirm('Delete this special occasion?')) {
        router.delete(route('admin.special-occasions.destroy', id));
    }
};
</script>

<template>
    <Head title="Manage Special Occasions" />
    <AdminLayout>
        <div class="py-12 max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-lg shadow border sticky top-24">
                        <h3 class="text-lg font-bold mb-4">{{ isEditing ? 'Edit' : 'Add' }} Special Occasion</h3>
                        <form @submit.prevent="submit" class="space-y-4">
                            
                            <input v-if="isEditing" type="hidden" name="_method" value="PUT">

                            <div>
                                <label class="block text-sm font-medium">Title</label>
                                <input v-model="form.title" type="text" class="w-full mt-1 rounded-md border-gray-300 focus:ring-pink-500" required />
                                <div v-if="form.errors.title" class="text-red-500 text-xs mt-1">{{ form.errors.title }}</div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Description</label>
                                <textarea v-model="form.description" rows="5" class="w-full mt-1 rounded-md border-gray-300 focus:ring-pink-500" required></textarea>
                                <div v-if="form.errors.description" class="text-red-500 text-xs mt-1">{{ form.errors.description }}</div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium">Image</label>
                                <input type="file" @input="form.image = $event.target.files[0]" class="mt-1 block w-full text-sm" />
                                <div v-if="form.errors.image" class="text-red-500 text-xs mt-1">{{ form.errors.image }}</div>
                            </div>
                            
                            <div class="flex gap-2">
                                <button type="submit" :disabled="form.processing" class="flex-1 bg-pink-600 text-white py-2 rounded-md hover:bg-pink-700 disabled:opacity-50">
                                    {{ isEditing ? 'Update' : 'Save' }} Occasion
                                </button>
                                <button v-if="isEditing" @click="resetForm" type="button" class="bg-gray-200 px-4 py-2 rounded-md">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="space-y-4">
                        <div v-for="item in specialoccasion" :key="item.id" class="bg-white p-4 rounded-lg shadow border flex gap-4">
                            <img :src="'/storage/' + item.image" class="w-32 h-32 object-cover rounded shadow-inner" v-if="item.image" />
                            <div v-else class="w-32 h-32 bg-gray-100 rounded flex items-center justify-center text-gray-400">No Image</div>
                            
                            <div class="flex-1">
                                <h4 class="text-xl font-bold">{{ item.title }}</h4>
                                <p class="text-gray-500 text-sm line-clamp-2 mt-1">{{ item.description }}</p>
                                <div class="mt-3 flex gap-4 text-sm font-medium">
                                    <button @click="editTreatment(item)" class="text-indigo-600 hover:underline">Edit</button>
                                    <button @click="deleteItem(item.id)" class="text-red-600 hover:underline">Delete</button>
                                </div>
                            </div>
                        </div>

                        <div v-if="specialoccasion.length === 0" class="text-center py-10 bg-white rounded-lg border border-dashed border-gray-300">
                            No special occasions found.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </AdminLayout>
</template>