<template>
    <div class="px-4 py-5 sm:p-6">
        <dt class="text-base text-gray-900">{{title}}</dt>
        <div class="mt-1 flex justify-between items-baseline md:block lg:flex">
            <div class="flex items-baseline text-2xl font-semibold text-indigo-600">
                {{value}}
                <span class="ml-2 text-sm font-medium text-gray-500">{{subTitle}}</span>
            </div>
            <div v-show="checkPercentage" :class="[isIncreased ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800', 'inline-flex items-baseline px-2.5 py-0.5 rounded-full text-sm font-medium  md:mt-2 lg:mt-0']">
                <arrow-sm-up-icon v-if="isIncreased" class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500"/>
                <arrow-sm-down-icon v-else class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-red-500" />
                {{change}}%
            </div>
        </div>
    </div>
</template>
<script setup>
import { ArrowSmDownIcon, ArrowSmUpIcon } from '@heroicons/vue/solid'
import {computed} from "vue";

const props = defineProps({
    title: String,
    value: String,
    previousStat: String,
    change: String,
    isIncreased: {
        type: Boolean,
        default: () => true
    }
})
let subTitle = `from ${props.previousStat}`

const checkPercentage = computed(() => {
    return props.change !== '0'
})
</script>
