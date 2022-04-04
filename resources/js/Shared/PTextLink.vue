<template>
    <Link :href="links" class="font-bold text-indigo-600 hover:text-indigo-500">{{paragraph}}</Link>
</template>
<script setup>
import { Link } from '@inertiajs/inertia-vue3'
defineProps({
    paragraph: String,
    links: String
})
</script>
