<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link, router, useForm } from '@inertiajs/vue3'
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import InputError from '@/Components/InputError.vue';

    const props = defineProps({
        project: {
            type: Object,
            default: () => ({})
        }
    })

    const form = useForm({
        'name': props.project.name,
        'description': props.project.description,
        'content': props.project.content,
        'image': null
    })

    function updateProduct() {
        router.post(route('projects.update', props.project), {
            _method: 'put',
            name: form.name,
            description: form.description,
            content: form.content,
            image: form.image
        })
    }
</script>
<template>
    <Head title="Edit Project" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Project Edit Form</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-6">
                    <div class="flex justify-between">
                        <div class="p-4 text-gray-500 text-center text-xl font-bold">Edit Project</div>
                        <div class="p-4">
                            <Link :href="route('projects.index')" class="px-4 py-1 bg-gray-600 hover:bg-gray-500 text-gray-50 hover:text-gray-100 rounded-lg">Go Back</Link>
                        </div>
                    </div>
                    <div class="max-w-md mx-auto">
                        <form  @submit.prevent="updateProduct">
                            <div class="mb-3">
                                <InputLabel for="name" value="Project Name" />

                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                    />
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div class="mb-3">
                                <InputLabel for="description" value="Project Description" />

                                <TextInput
                                    id="description"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.description"
                                    required
                                    autofocus
                                    autocomplete="description"
                                    />
                                <InputError class="mt-2" :message="form.errors.description" />
                            </div>
                            <div class="mb-3">
                                <InputLabel for="content" value="Project Content" />

                                <TextInput
                                    id="content"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.content"
                                    required
                                    autofocus
                                    autocomplete="content"
                                    />
                                <InputError class="mt-2" :message="form.errors.content" />
                            </div>
                            <div class="mb-3">
                                <InputLabel for="image" value="Choose Image" />

                                <TextInput
                                    id="image"
                                    type="file"
                                    class="mt-1 block w-full"
                                    @input="form.image = $event.target.files[0]"
                                    required
                                    autofocus
                                    autocomplete="image"
                                    />
                                <InputError class="mt-2" :message="form.errors.image" />

                                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                    {{ form.progress.percentage }}%
                                </progress>
                            </div>

                            <div class="mb-4">
                                <PrimaryButton class="float-right" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Update
                                </PrimaryButton>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>


