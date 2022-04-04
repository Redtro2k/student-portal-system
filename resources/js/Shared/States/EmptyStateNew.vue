<template>
    <div class="text-center">
        <UserAddIcon class="mx-auto h-12 w-12 text-gray-400"/>
        <h3 class="mt-2 text-sm font-medium text-gray-900">{{title}}</h3>
        <p class="mt-1 text-sm text-gray-500">{{subTitle}}</p>
        <div class="mt-6">
            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <PlusIcon class="-ml-1 mr-2 h-5 w-5" aria-hidden="true" />
                {{buttonTitle}}
            </button>
        </div>
    </div>
</template>
<script setup>
import { PlusIcon, UserAddIcon } from '@heroicons/vue/outline'
defineProps({
    title: String,
    subTitle: String,
    buttonTitle: String
})
</script>
