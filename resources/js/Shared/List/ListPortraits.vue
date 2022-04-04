<template>
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <li v-for="item in items" :key="item" class="col-span-1 bg-white rounded-lg shadow divide-y divide-gray-200">
            <div class="w-full flex items-center justify-between p-6 space-x-6">
                <div class="flex-1 truncate">
                    <div class="flex items-center space-x-3">
                        <h3 class="text-gray-900 text-sm font-medium truncate">{{ item.code }}</h3>
                        <badge :title="item.status" />
                    </div>
                    <p class="mt-1 text-gray-500 text-sm truncate">{{ item.name }}</p>
                </div>
                <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" :src="item.image" alt="" />
            </div>
            <div>
                <div class="-mt-px flex divide-x divide-gray-200">
                    <div class="w-0 flex-1 flex">
                        <a :href="item.code" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                            <ArrowRightIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
                            <span class="ml-3">View</span>
                        </a>
                    </div>
                </div>
            </div>
        </li>
        <li class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <empty-states title="Subject"/>
        </li>
    </ul>
    <paginate class="mt-6" />
</template>
<script setup>
    import EmptyStates from "@/Shared/States/EmptyState"
    import Badge from "@/Shared/Badge"
    import Paginate from "@/Shared/Paginate"
    import {ArrowRightIcon} from "@heroicons/vue/outline"

    defineProps({
        items: Object
    })
</script>
