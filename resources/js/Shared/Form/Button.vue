<template>
    <button
        :type="
            isSubmit === 'submit'
                ? 'submit'
                : isSubmit === 'button'
                ? 'button'
                : 'reset'
        "
        :class="
            isSubmit === 'submit'
                ? 'ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
                : isSubmit === 'button'
                ? 'bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
                : 'bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
        "
        :disabled="enabled"
        >
        {{ text }}
    </button>
</template>
<script setup>

const props = defineProps({
    isSubmit: {
        type: String,
        required: true,
        default: () => "button",
    },
    text: String,
    enabled: {
        type: Boolean,
    }
});

</script>
