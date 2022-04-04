<template>
    <nav class="mt-5 px-2 space-y-1">
        <Link v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
            <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-4 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
            {{ item.name }}
        </Link>
    </nav>
</template>
<script setup>


import {Link} from "@inertiajs/inertia-vue3";

let props = defineProps({
    navigation:Array
})

</script>
