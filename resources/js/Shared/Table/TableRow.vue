<template>
    <td class="px-6 py-4 whitespace-nowrap text-sm" :class="!isPrimary ? 'text-gray-500' : 'font-medium text-gray-900'">
        <span v-if="isBadge">
            <badge :title="title" />
        </span>
        <span v-else-if="isLink">
            <Link :href="link" class="text-indigo-600 hover:text-indigo-900">{{title}}</link>
        </span>
        <span v-else>
            {{title}}
        </span>
    </td>
</template>
<script setup>
import Badge from '@/Shared/Badge'
import {Link} from '@inertiajs/inertia-vue3'
defineProps({
    title: String,
    isPrimary: {
        type: Boolean,
        default: () => false
    },
    isBadge: {
        type: Boolean,
        default: () => false
    },
    isLink: {
        type: Boolean,
        default: () => false
    },
    link: {
        type: String,
        default: () => null
    }
})
</script>
