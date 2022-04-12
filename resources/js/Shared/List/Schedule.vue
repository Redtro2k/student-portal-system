<template>
    <ul role="list" class="divide-y divide-gray-200">
        <li v-for="item in items" :key="item" class="flex">
            <div class="mt-3">
                <p class="text-sm font-bold text-gray-900">{{item.day}}</p>
                <p class="text-sm text-indigo-500 flex space-x-4">
                    <badge :title="getDate(item.start.hours, item.start.minutes, item.start.seconds)"/>
                    <badge :title="getDate(item.end.hours, item.end.minutes, item.end.seconds)" />
                </p>
            </div>
        </li>


    </ul>
</template>
<script setup>
import moment from "moment"
import Badge from "@/Shared/Badge"
import {computed} from "vue";

function getDate(hours, minutes, seconds){
    return moment({hour: hours, minute: minutes, second: seconds}).format('h:mm:ss a')
}

defineProps({
    items: Object
})
</script>
