<template>
    <ul role="list" class="divide-y divide-gray-200">
        <li v-for="item in items" :key="item" class="flex">
            <div class="mt-3">
                <p class="text-sm font-bold text-gray-900">{{item.day}}</p>
                <p class="text-sm text-indigo-500">{{item.start}} - {{item.end}}</p>
            </div>
        </li>
    </ul>
</template>
<script setup>
defineProps({
    items: Object
})
</script>
