<template>
    <div class="max-w-4xl mx-auto p-6 bg-gray-50 min-h-screen">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 tracking-tight">My Notes</h1>
        <a href="/notes/create" class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded hover:bg-blue-200 transition-colors mb-6">Add New Note</a>
        <ul class="space-y-4">
            <li v-for="note in notes" :key="note.id" class="p-6 border border-gray-200 rounded-lg bg-white shadow-sm hover:shadow-lg transition-shadow">
                <strong class="text-lg font-semibold text-gray-800">{{ note.title }}</strong>: <span class="text-gray-600">{{ note.content }}</span>
                <div class="mt-3 flex gap-3">
                    <a :href="`/notes/${note.id}/edit`" class="text-blue-600 px-3 py-1 rounded hover:bg-blue-100 hover:text-blue-800 transition-colors">Edit</a>
                    <form @submit.prevent="deleteNote(note.id)" class="inline">
                        <button type="submit" class="text-red-600 px-3 py-1 rounded hover:bg-red-100 hover:text-red-800 transition-colors">Delete</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    props: ['notes'],
    methods: {
        deleteNote(id) {
            this.$inertia.delete(`/notes/${id}`);
        }
    }
};
</script>