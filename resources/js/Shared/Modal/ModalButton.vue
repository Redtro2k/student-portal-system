<template>
    <button type="button"
            :class="
            typeButton === 'isCancel'
            ? 'mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm'
            : 'w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm'
            "
            ref="cancelButtonRef">{{text}}</button>
</template>
<script setup>
defineProps({
    typeButton: {
        type: String,
        required: true,
        default: () => 'isCancel'
    },
    text: {
        type: String,
        required: true
    }
})
</script>
