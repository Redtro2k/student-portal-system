<template>
    <div v-if="type === 'blue'">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
            <svg v-show="isClickedBadge" class="-ml-0.5 mr-1.5 h-2 w-2 text-indigo-400" fill="currentColor" viewBox="0 0 8 8">
                <circle cx="4" cy="4" r="3" />
            </svg>
                {{title}}
        </span>
    </div>
    <div v-else-if="type === 'red'">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
            <svg v-show="isClickedBadge" class="-ml-0.5 mr-1.5 h-2 w-2 text-red-400" fill="currentColor" viewBox="0 0 8 8">
                <circle cx="4" cy="4" r="3" />
            </svg>
            {{title}}
        </span>
    </div>
    <div v-else-if="type === 'green'">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
            <svg v-show="isClickedBadge" class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                <circle cx="4" cy="4" r="3" />
            </svg>
            {{title}}
        </span>
    </div>
    <div v-else-if="type === 'indigo'">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
            <svg v-show="isClickedBadge" class="-ml-0.5 mr-1.5 h-2 w-2 text-indigo-400" fill="currentColor" viewBox="0 0 8 8">
                <circle cx="4" cy="4" r="3" />
            </svg>
            {{title}}
        </span>
    </div>
</template>
<script setup>
defineProps({
    title: String,
    type: {
        type: String,
        default: () => 'green'
    },
    isClickedBadge: {
        type: Boolean,
        default: () => true
    }
})
</script>
