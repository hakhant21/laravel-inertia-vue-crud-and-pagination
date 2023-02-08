<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    links: {
        type: Array,
        default: () => ({})
    }
})
</script>
<template>
    <div v-if="links.length > 3" class="flex justify-center mt-4 space-x-4">
        <div class="flex flex-wrap -mb-1">
            <template v-for="link in links" :key="link.label">
                <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded" v-html="link.label"></div>
                <Link v-else
                    class="px-4 py-3 text-sm leading-4 bg-white rounded hover:bg-white focus:text-indigo-500 hover:shadow"
                    :class="{ 'bg-indigo-400 text-white': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>

