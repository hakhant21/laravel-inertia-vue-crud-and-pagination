<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link, router } from '@inertiajs/vue3';
    import Pagination from '@/Components/Pagination.vue'
    import DangerButton from '@/Components/DangerButton.vue'

    const props = defineProps({
        projects: {
            type: Object,
            default: () => ({})
        },
        image: {
            type: String,
            default: () => ({})
        }
    })

    function deleteProject(project) {
        if (confirm("Are you sure you want to Delete")) {
            router.post(route('projects.delete', project), {
                _method: 'delete'
            })
        }
    }
</script>
<template>
    <Head title="Projects List Page" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Projects</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    v-if="$page.props.flash.message"
                    class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert"
                >
                    <span class="font-medium">
                        {{ $page.props.flash.message }}
                    </span>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between">
                        <div class="p-6 text-gray-500 text-center text-xl font-bold">Projects Page</div>
                        <div class="p-6">
                            <Link :href="route('projects.create')" class="px-4 py-1 bg-gray-600 hover:bg-gray-500 text-gray-50 hover:text-gray-100 rounded-lg">Create</Link>
                        </div>
                    </div>

                    <div class="max-w-full mx-auto py-7 overflow-hidden p-2">
                        <table class="min-w-full mx-4">
                            <thead class="border-b-2">
                                <tr>
                                    <th class="text-left py-2">Name</th>
                                    <th class="text-left py-2">Slug</th>
                                    <th class="text-left py-2">Username</th>
                                    <th class="text-left py-2">Image</th>
                                    <th class="text-left py-2">Edit</th>
                                    <th class="text-left py-2">Delete</th>

                                </tr>
                            </thead>
                            <tbody class="border-b-2">
                                <tr v-for="project in props.projects.data" :key="project.id">
                                    <td class="text-left py-2">{{ project.name }}</td>
                                    <td class="text-left py-2">{{ project.slug }}</td>
                                    <td class="text-left py-2">{{ project.user.name }}</td>
                                    <td class="text-left py-2 overflow-hidden">
                                        <img :src="`storage/${project.image}`" alt="product.name" class="w-10 h-10 rounded-lg">
                                    </td>
                                    <td class="text-left py-2">
                                        <Link :href="route('projects.edit', project)" class="px-4 py-1 bg-gray-600 hover:bg-gray-500 text-gray-50 hover:text-gray-100 rounded-lg">Edit</Link>

                                    </td>
                                    <td class="text-left py-2">
                                        <DangerButton @click="deleteProject(project)">
                                            Delete
                                        </DangerButton>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination :links="props.projects.links"/>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


