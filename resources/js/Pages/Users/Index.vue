<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue'
import DangerButton from '@/Components/DangerButton.vue'


const props = defineProps({
        users: {
            type: Object,
            default: () => ({})
        }
    })

</script>

<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
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
                        <div class="p-6 text-gray-500 text-center text-xl font-bold">Users Page</div>
                        <div class="p-6">
                            <Link :href="route('users.create')" class="px-4 py-1 bg-gray-600 hover:bg-gray-500 text-gray-50 hover:text-gray-100 rounded-lg">Create</Link>
                        </div>
                    </div>

                    <div class="max-w-full mx-auto py-7 overflow-hidden p-2">
                        <table class="min-w-full mx-4">
                            <thead class="border-b-2">
                                <tr>
                                    <th class="text-left py-2">Name</th>
                                    <th class="text-left py-2">Email</th>
                                    <th class="text-left py-2">Edit</th>
                                </tr>
                            </thead>
                            <tbody class="border-b-2">
                                <tr v-for="user in props.users.data" :key="user.id">
                                    <td class="text-left py-2">{{ user.name }}</td>
                                    <td class="text-left py-2">{{ user.email }}</td>
                                    <td class="text-left py-2">
                                        <Link :href="route('users.edit', user)" class="px-4 py-1 bg-gray-600 hover:bg-gray-500 text-gray-50 hover:text-gray-100 rounded-lg">Edit</Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <Pagination :links="props.users.links"/>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
