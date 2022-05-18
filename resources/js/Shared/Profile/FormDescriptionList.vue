<template>
    <div class="sm:col-span-1">
        <dt class="text-sm font-medium text-gray-500">{{fields}}</dt>
        <dd class="mt-1 text-sm text-gray-900">
            <span v-if="!isBadge">
                {{value}}
            </span>
            <span v-else>
                {{value}}
                <span v-if="value === null">
                    <Badge type="red" title="not-verified" :is-clicked-badge="false" />
                </span>
                <span v-else>
                    <Badge type="green" title="verified" :is-clicked-badge="false"/>
                </span>
            </span>
        </dd>
    </div>
</template>
<script setup>
import Badge from '@/Shared/Badge'

defineProps({
    fields: String,
    value: String,
    isBadge: Boolean
})
</script>
