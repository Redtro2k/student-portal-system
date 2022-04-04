<template>
    <SwitchGroup as="div" class="flex items-center justify-between col-span-6 mt-2 :col-span-3">
        <span class="flex-grow flex flex-col">
            <SwitchLabel as="span" class="text-lg font-medium text-gray-900" passive>
               {{title}} <div><slot name="banner"></slot></div>
            </SwitchLabel>
            <SwitchDescription as="span" class="text-sm text-gray-500">
                {{description}}
            </SwitchDescription>
        </span>
        <Switch :class="[enabled ? 'bg-indigo-600' : 'bg-gray-200', 'relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500']">
            <span aria-hidden="true" :class="[enabled ? 'translate-x-5' : 'translate-x-0', 'pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200']" />
        </Switch>
    </SwitchGroup>
</template>
<script setup>
import { Switch, SwitchDescription, SwitchGroup, SwitchLabel } from '@headlessui/vue'
defineProps({
    enabled: Boolean,
    title: {
        type: String,
        default: () => 'no title'
    },
    description: {
        type: String,
        default: () => 'no Description'
    }
})
</script>
