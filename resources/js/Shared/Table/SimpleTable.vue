<template>
    <h1 class="text-md font-sans text-gray-600 py-2">{{title}}</h1>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th v-for="column in columns" :key="column" scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{column}}</th>
                            <th scope="col" v-if="isEmptyTable" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="sr-only">
                                    View
                                </span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <slot name="tbody">
                            </slot>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</template>
<script setup>
defineProps({
        title: {
            type: String,
            required: true
        },
        columns: Array,
        isEmptyTable: {
            type: Boolean,
            default: () => true
        }
    })
</script>
