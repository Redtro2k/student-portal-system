<template>
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        <li v-for="Record in Records" :key="Record" class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
            <div class="flex-1 flex flex-col p-8">
                <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" :src="Record.imageUrl" alt=""/>
                <h3 class="mt-6 text-gray-900 text-sm font-medium">{{ Record.name }}</h3>
                <dl class="mt-1 flex-grow flex flex-col justify-between">
                    <dt class="sr-only">Title</dt>
                    <dd class="text-gray-500 text-sm">{{Record.title}}</dd>
                    <dt class="sr-only">Role</dt>
                    <dt>
                        <badge class="pt-2" :title="Record.role" />
                    </dt>
                </dl>
            </div>
            <div>
            <div class="-mt-px flex divide-x divide-gray-200">
                    <div class="w-0 flex-1 flex">
                        <Link :href="Record.email" class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                            <UserIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
                            <span class="ml-3">See Profile</span>
                        </Link>
                        <Link :href="Record.telephone" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                            <ChatIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
                            <span class="ml-3">Message</span>
                        </Link>
                    </div>
                </div>
            </div>
        </li>
        <li class="col-span-1 flex flex-col justify-center text-center bg-white rounded-lg shadow divide-y divide-gray-200">
            <empty-state-new
                title="Hire Teacher"
                sub-title="Get started by Hire a new Teacher."
                button-title="New Teacher"/>
        </li>
    </ul>
    <paginate class="mt-6" />
</template>
<script setup>
    import { ChatIcon } from '@heroicons/vue/solid'
    import { UserIcon } from '@heroicons/vue/outline'
    import { Link } from '@inertiajs/inertia-vue3'
    import Badge from '@/Shared/Badge'
    import Paginate from '@/Shared/Paginate'
    import EmptyStateNew from '@/Shared/States/EmptyStateNew'


    defineProps({
        Records: Object
    })
</script>
