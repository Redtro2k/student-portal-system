<template>
    <ul role="list" class="divide-y divide-gray-200">
        <li v-for="stack in stacks" :key="stack" class="flex">
            <div class="mt-3">
                <p class="text-sm font-bold text-gray-900">{{stack.name}}</p>
                <p class="text-sm text-indigo-500">{{stack.email}}</p>
            </div>
        </li>
    </ul>
</template>
<script setup>
defineProps({
    stacks: Object
})
</script>
