<template>
    <Link class="bg-gray-800 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900" :href="links">
    {{text}}
    </Link>
</template>
<script setup>
import {Link} from '@inertiajs/inertia-vue3'
defineProps({
    links: String,
    text: String
})
</script>
