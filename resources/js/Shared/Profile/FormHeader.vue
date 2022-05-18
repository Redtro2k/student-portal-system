<template>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
        <div class="flex items-center space-x-5">
            <div class="flex-shrink-0">
                <div class="relative">
                    <img class="h-16 w-16 rounded-full" :src="images" alt="" />
                    <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true" />
                </div>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{name}}</h1>
                <p class="text-sm font-medium text-gray-500">Created on <time :datetime="moment(dateCreated).format('LL')">{{moment(dateCreated).format('ll')}}</time></p>
            </div>
        </div>
        <div v-show="withControls" class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3">
            <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">Disqualify</button>
            <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500">Advance to offer</button>
        </div>
    </div>
</template>
<script setup>
import moment from 'moment'

    defineProps({
        withControls: Boolean,
        name:String,
        dateCreated: String,
        images: String
    })
</script>
