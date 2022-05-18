<template>
    <admin-layout title="Manage Users" isActive="users">
        <template #header>
            <h1 class="text-2xl font-sans font-semibold text-gray-900">Manage Users</h1>
        </template>
        <template #content>
            <div class="w-full sm:w-64">
                <label for="company-website" class="block text-sm font-medium text-gray-700"> Search User </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm"> Find </span>
                    <input type="text" v-model="search" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300" placeholder="John" />
                </div>
            </div>
            <simple-table title="List of Users" :columns="columns">
                <template #tbody>
                    <tr v-for="user in users.data" :key="user.id">
                        <table-row :title="user.name === $page.props.user.name ? `${user.name} (You)` : `${user.name}`"/>
                        <table-row v-show="!!`${user.role}`" is-badge :title="`${user.role}`" />
                        <table-row v-show="!`${user.role}`" title="Empty"/>
                        <table-row is-link :link="`users/show/${user.id}`" title="View" />
                    </tr>
                </template>
            </simple-table>
            <div class="pt-4">
                <paginate :links="users.links" :from="users.from" :to="users.to" :result="users.total" :responsiveNext="users.next_page_url" :responsivePrevious="users.first_page_url"/>
            </div>
        </template>
        {{props.filter}}
    </admin-layout>
</template>

<script setup>
import Paginate from "@/Shared/Paginate"
import AdminLayout from "@/Layouts/AdminLayout"
import TableRow from "@/Shared/Table/TableRow"
import {defineAsyncComponent, ref, watch} from "vue";
import {Inertia} from '@inertiajs/inertia'
import {debounce} from "lodash";


const columns= ['Names', 'Status']
const props = defineProps({
    users: Object,
    filter: Object
})

const SimpleTable = defineAsyncComponent({
    loader: () => import('@/Shared/Table/SimpleTable'),
    loadingComponent: 'Loading',
    delay: 200,
    errorCompoment: 'error',
    timeout: 300
})

let search = ref(props.filter.search)
watch(search, debounce(function(value){
    Inertia.get('/users', {search: value}, {preserveState: true, replace: true});
    }, 300));
</script>
