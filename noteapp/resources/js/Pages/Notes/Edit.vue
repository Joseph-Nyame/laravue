<template>
    <div class="max-w-4xl mx-auto p-6 bg-gray-50 min-h-screen">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 tracking-tight">Edit Note</h1>
        <form @submit.prevent="submit" class="flex flex-col gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Title:</label>
                <input v-model="form.title" type="text" class="border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Content:</label>
                <textarea v-model="form.content" class="border border-gray-300 p-2 rounded w-full h-32 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">Update</button>
        </form>
        <a href="/notes" class="text-blue-500 hover:underline mt-4 block">Back to Notes</a>
    </div>
</template>
<script>
export default {
    props: ['note'],
    data() {
        return {
            form: {
                title: this.note.title,
                content: this.note.content
            }
        };
    },
    methods: {
        submit() {
            this.$inertia.put(`/notes/${this.note.id}`, this.form);
        }
    }
};
</script>