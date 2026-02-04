<script setup>
import { Head, useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';

const props = defineProps({
    faq: Object
});

const form = useForm({
    title: props.faq.title,
    description: props.faq.description,
});

const submit = () => {
    form.put(route('admin.faq.update', props.faq.id));
};
</script>

<template>
    <Head title="Edit FAQ" />
    <AdminLayout>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-6">Edit FAQ</h2>
        <div class="max-w-3xl mx-auto">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form @submit.prevent="submit" class="space-y-6">
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Question</label>
                        <input v-model="form.title" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                    </div>
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Answer (Description)</label>
                        <textarea v-model="form.description" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                    <div class="flex items-center justify-end">
                        <Link :href="route('admin.faq.index')" class="text-sm text-gray-600 underline mr-4">Cancel</Link>
                        <button type="submit" :disabled="form.processing" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Update FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>