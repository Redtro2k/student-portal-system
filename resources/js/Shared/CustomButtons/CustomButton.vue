<template>
        <Link :href="url" class="ml-3 font-bold inline-flex justify-center rounded-md border border-transparent bg-indigo-600 pt-5 pb-2 pl-2 pr-7 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
           {{text}}
        </Link>
</template>
<script setup>
import {Link} from '@inertiajs/inertia-vue3'
defineProps({
    text: String,
    url: String
})
</script>
