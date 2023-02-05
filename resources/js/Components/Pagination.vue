<template>
   <div v-if="props.links.length > 3" class="flex justify-center mt-4 space-x-4">
        <Link
            v-for="(link, key) in props.links"
            :key="key"
            class="px-4 py-3 text-sm leading-4 bg-white rounded hover:bg-white focus:text-indigo-500 hover:shadow"
            :class="{'bg-indigo-400 text-white': link.active}"
            :href="link.url"
            v-html="link.label"
        />
   </div>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        links: {
            type: Array,
            default: () => ({})
        }
    })
</script>
