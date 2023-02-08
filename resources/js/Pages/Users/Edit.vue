<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link, router, useForm } from '@inertiajs/vue3'
    import InputLabel from '@/Components/InputLabel.vue';
    import TextInput from '@/Components/TextInput.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import InputError from '@/Components/InputError.vue';

    const props = defineProps({
        user: {
            type: Object,
            default: () => ({})
        }
    })

    const form = useForm({
        name: props.user.name,
        email: props.user.email,
        password: null,
        password_confirmation: null,
    })

    function updateUser() {
        form.put(route('users.update', props.user), {
            onFinish: () => form.reset('password', 'password_confirmation'),
        });
    }

</script>

<template>

    <Head title="Update User" />

    <AuthenticatedLayout>
          <template #header>
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Update Form</h2>
          </template>
          <div class="py-12">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg py-6">
                      <div class="flex justify-between">
                          <div class="p-4 text-gray-500 text-center text-xl font-bold">Update User</div>
                          <div class="p-4">
                              <Link :href="route('users.index')" class="px-4 py-1 bg-gray-600 hover:bg-gray-500 text-gray-50 hover:text-gray-100 rounded-lg">Go Back</Link>
                          </div>
                      </div>
                      <div class="max-w-full mx-4">
                          <form @submit.prevent="updateUser">
                              <div class="mb-3">
                                  <InputLabel for="name" value="User Name" />

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
                                  <InputLabel for="email" value="User Email" />

                                  <TextInput
                                      id="email"
                                      type="email"
                                      class="mt-1 block w-full"
                                      v-model="form.email"
                                      required
                                      autofocus
                                      autocomplete="email"
                                      />
                                  <InputError class="mt-2" :message="form.errors.email" />
                              </div>

                              <div class="mb-3">
                                <InputLabel for="password" value="Password" />

                                <TextInput
                                    id="password"
                                    type="password"
                                    class="mt-1 block w-full"
                                    v-model="form.password"
                                    required
                                    autocomplete="new-password"
                                />

                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>

                            <div class="mb-3">
                                <InputLabel for="password_confirmation" value="Confirm Password" />

                                <TextInput
                                    id="password_confirmation"
                                    type="password"
                                    class="mt-1 block w-full"
                                    v-model="form.password_confirmation"
                                    required
                                    autocomplete="new-password"
                                />

                                <InputError class="mt-2" :message="form.errors.password_confirmation" />
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

