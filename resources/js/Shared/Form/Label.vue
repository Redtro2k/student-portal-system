<template>
    <label class="block text-sm font-medium text-gray-700">{{title}}</label>
</template>
<script setup>
defineProps({
    title: {
        type:String,
        default: () => 'no label'
    }
})

</script>
