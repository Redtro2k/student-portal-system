<template>
    <admin-layout title="View User" isActive="users">
        <template #content>
            <div class="min-h-full">
                <main class="py-10" v-for="(user, index) in users" :key="index">
                    <!-- Page header -->
                    <form-header :images="user.user_profile_photo" :name="user.user_name" :date-created="user.user_created" :with-controls="false"/>
                    <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
                        <div class="space-y-6 lg:col-start-1 lg:col-span-2">
                            <!-- Description list-->
                            <section aria-labelledby="applicant-information-title">
                                <div class="bg-white shadow sm:rounded-lg">
                                    <div class="px-4 py-5 sm:px-6">
                                        <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">Person Information</h2>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application.</p>
                                    </div>
                                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                            <form-description-list fields="Email Address" :value="user.user_email"/>
                                            <form-description-list :is-badge="true" fields="Account Verified" :value="user.email_verified" />
                                            <form-description-list fields="Roles" :value="user.user_roles" />
                                            <form-attachments :attachments="attachments" />
                                        </dl>
                                    </div>
                                    <div>
                                        <a href="#" class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">Read full application</a>
                                    </div>
                                </div>
                            </section>
                            <form-section title="Title" sub-title="subtitle">
                                <template #main>
                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="w-1/2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div>
                                            <label for="change Roles">Change Roles</label>

                                        </div>
                                    </dl>
                                </template>
                            </form-section>
                        </div>

                        <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
                            <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:px-6">
                                <h2 id="timeline-title" class="text-lg font-medium text-gray-900">Timeline</h2>

                                <!-- Activity Feed -->
                                <div class="mt-6 flow-root">
                                    <ul role="list" class="-mb-8">
                                        <li v-for="(item, itemIdx) in timeline" :key="item.id">
                                            <div class="relative pb-8">
                                                <span v-if="itemIdx !== timeline.length - 1" class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true" />
                                                <div class="relative flex space-x-3">
                                                    <div>
                                                <span :class="[item.type.bgColorClass, 'h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white']">
                                                  <component :is="item.type.icon" class="w-5 h-5 text-white" aria-hidden="true" />
                                                </span>
                                                    </div>
                                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                        <div>
                                                            <p class="text-sm text-gray-500">
                                                                {{ item.content }} <a href="#" class="font-medium text-gray-900">{{ item.target }}</a>
                                                            </p>
                                                        </div>
                                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                            <time :datetime="item.datetime">{{ item.date }}</time>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-6 flex flex-col justify-stretch">
                                    <button type="button" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Advance to offer</button>
                                </div>
                            </div>
                        </section>
                    </div>

                </main>
            </div>
        </template>
    </admin-layout>
</template>

<script setup>
import {
    CheckIcon,
    ThumbUpIcon,
    UserIcon,
} from '@heroicons/vue/solid'
import AdminLayout from "@/Layouts/AdminLayout";
import FormHeader from "@/Shared/Profile/FormHeader";
import FormDescriptionList from "@/Shared/Profile/FormDescriptionList";
import FormAttachments from "@/Shared/Profile/FormAttachments"
import FormSection from "@/Shared/Container/Section"

const props = defineProps({
    users: Object
})

const user = {
    name: 'Whitney Francis',
    email: 'whitney@example.com',
    imageUrl:
        'https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80',
}
const navigation = [
    { name: 'Dashboard', href: '#' },
    { name: 'Jobs', href: '#' },
    { name: 'Applicants', href: '#' },
    { name: 'Company', href: '#' },
]
const breadcrumbs = [
    { name: 'Jobs', href: '#', current: false },
    { name: 'Front End Developer', href: '#', current: false },
    { name: 'Applicants', href: '#', current: true },
]
const userNavigation = [
    { name: 'Your Profile', href: '#' },
    { name: 'Settings', href: '#' },
    { name: 'Sign out', href: '#' },
]
const attachments = [
    { name: 'resume_front_end_developer.pdf', href: '#' },
    { name: 'coverletter_front_end_developer.pdf', href: '#' },
]
const eventTypes = {
    applied: { icon: UserIcon, bgColorClass: 'bg-gray-400' },
    advanced: { icon: ThumbUpIcon, bgColorClass: 'bg-blue-500' },
    completed: { icon: CheckIcon, bgColorClass: 'bg-green-500' },
}
const timeline = [
    {
        id: 1,
        type: eventTypes.applied,
        content: 'Applied to',
        target: 'Front End Developer',
        date: 'Sep 20',
        datetime: '2020-09-20',
    },
    {
        id: 2,
        type: eventTypes.advanced,
        content: 'Advanced to phone screening by',
        target: 'Bethany Blake',
        date: 'Sep 22',
        datetime: '2020-09-22',
    },
    {
        id: 3,
        type: eventTypes.completed,
        content: 'Completed phone screening with',
        target: 'Martha Gardner',
        date: 'Sep 28',
        datetime: '2020-09-28',
    },
    {
        id: 4,
        type: eventTypes.advanced,
        content: 'Advanced to interview by',
        target: 'Bethany Blake',
        date: 'Sep 30',
        datetime: '2020-09-30',
    },
    {
        id: 5,
        type: eventTypes.completed,
        content: 'Completed interview with',
        target: 'Katherine Snyder',
        date: 'Oct 4',
        datetime: '2020-10-04',
    },
]
const comments = [
    {
        id: 1,
        name: 'Leslie Alexander',
        date: '4d ago',
        imageId: '1494790108377-be9c29b29330',
        body: 'Ducimus quas delectus ad maxime totam doloribus reiciendis ex. Tempore dolorem maiores. Similique voluptatibus tempore non ut.',
    },
    {
        id: 2,
        name: 'Michael Foster',
        date: '4d ago',
        imageId: '1519244703995-f4e0f30006d5',
        body: 'Et ut autem. Voluptatem eum dolores sint necessitatibus quos. Quis eum qui dolorem accusantium voluptas voluptatem ipsum. Quo facere iusto quia accusamus veniam id explicabo et aut.',
    },
    {
        id: 3,
        name: 'Dries Vincent',
        date: '4d ago',
        imageId: '1506794778202-cad84cf45f1d',
        body: 'Expedita consequatur sit ea voluptas quo ipsam recusandae. Ab sint et voluptatem repudiandae voluptatem et eveniet. Nihil quas consequatur autem. Perferendis rerum et.',
    },
]
</script>
