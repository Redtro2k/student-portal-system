<template>
    <admin-layout title="Create New School" isActive="school">
        <template #header>
            <h1 class="text-2xl font-sans font-semibold text-gray-900">
                New School
            </h1>
        </template>
        <form @submit.prevent="submit">
            <form-container>
                <template #header>
                    <form-header
                        title="School Information"
                        sub-title="Established a School Information be Sure that all of the information is formal and legit, It will display on our Web Application."
                    />
                </template>
                <template #main>
                    <form-input
                        v-model:title="form.school_name"
                        label-title="Create a School Name"
                        small-description="please create a school name and be sure its good or interactive and formalize name"
                    />
                    <form-input
                        v-model:title="form.location"
                        label-title="Location"
                        description="Manila, Quezon City"
                        small-description="please fill up the specific location, Sorry for manual fill up we're still developing maps API"
                    />
                    <form-input
                        v-model:title="form.address"
                        label-title="Street Address"
                        description="Gen. Villamor St. "
                        small-description="please fill up the specific Address or live with a full adress, Sorry for manual fill up we're still developing maps API"
                    />
                    <div class="col-span-6 px-2 sm:col-span-3">
                        <label-form title="Phone Number" />
                        <vue-tel-input v-model="form.telephone"></vue-tel-input>
                    </div>
                    <form-text-area
                        size="4"
                        name="About/Brief School"
                        v-model:title="form.about"
                    />
                    <div class="col-span-6 px-2 sm:col-span-3">
                        <form-toggle
                            @click="toggle_schedule = !toggle_schedule"
                            :enabled="toggle_schedule"
                            description="set a Schedules when school are available or not. Not if skip fill up will default as a current time in your computer. but i can edit anytime."
                            title="Set Schedules"
                        >
                            <template #banner>
                                <form-badge
                                    title="Temporary Optional"
                                    is-clicked-badge
                                    type="blue"
                                />
                            </template>
                        </form-toggle>
                        <div
                            v-show="toggle_schedule"
                            class="ml-4"
                            v-for="(schedule, index) in form.schedules"
                            :key="index"
                        >
                            <form-label :title="schedule.day" />
                            <div class="flex items-center space-x-2">
                                &nbsp;
                                <DatePicker
                                    v-model="schedule.start"
                                    timePicker
                                    :is24="false"
                                />
                                <span>to</span>
                                <DatePicker
                                    v-model="schedule.end"
                                    timePicker
                                    :is24="false"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="col-span-6 px-2 sm:col-span-3">
                        <form-toggle
                            @click="toggle_media = !toggle_media"
                            :enabled="toggle_media"
                            description="add social media to make a thrid party social media to our school."
                            title="Add Social Media"
                        >
                        </form-toggle>
                        <div v-show="toggle_media">
                            <div
                                class="flex items-center space-x-8 pb-2"
                                v-for="(media, index) in form.social"
                                :key="index"
                            >
                                <div class="flex-auto w-46">
                                    <div
                                        class="mt-1 border-b border-gray-300 focus-within:border-indigo-600"
                                    >
                                        <input
                                            type="email"
                                            v-model="media.email"
                                            class="block w-full border-0 border-b border-transparent bg-gray-50 focus:border-indigo-600 focus:ring-0 sm:text-sm"
                                            placeholder="Enter URL Mail"
                                        />
                                    </div>
                                </div>
                   
                                <div class="flex-auto w-32 pt-1">
                                    <form-button
                                        text="Delete"
                                        is-submit="button"
                                        @click="removeMedia(index)"
                                    />
                                </div>
                            </div>
       
                            <button
                                :disabled="checking(increment.count)"
                                @click="newMedia"
                                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                :enabled="processing"
                                >
                                Add more
                                </button>
                        </div>
                    </div>
                </template>
                <template #footer>
                    <form-button is-submit text="Reset" />
                    <form-button is-submit="submit" text="Create" />
                </template>
            </form-container>
        </form>
    </admin-layout>
</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout";
import FormButton from "@/Shared/Form/Button";
// import FormContainer from "@/Shared/Form/Container";
import FormHeader from "@/Shared/Form/FormHeader";
import FormInput from "@/Shared/Form/Input";
import FormLabel from "@/Shared/Form/Label";
import LabelForm from "@/Shared/Form/Label";
import FormBadge from "@/Shared/Badge";
import FormTextArea from "@/Shared/Form/InputTextArea";
import FormToggle from "@/Shared/Form/ToggleWithDescription";
import { VueTelInput } from "vue-tel-input";
import "vue-tel-input/dist/vue-tel-input.css";

import { defineAsyncComponent, reactive, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

let FormContainer = defineAsyncComponent({
    loader: () => import('@/Shared/Form/Container'),
    loadingComponent: 'Loading...',
    delay: 3000
});

let increment = reactive({
    count: 0
});

function newMedia() {
    form.social.push({ email: "" });
    increment.count++;
    console.log(increment);
}
function removeMedia(index){
    if(index === 0) newMedia()
    form.social.splice(index, 1)
    increment.count--
}

const checking = ((index) => {
    return form.social[index].email ? false : true
})

const props = defineProps({
    SchoolID: String,
});
const toggle_schedule = ref(false);
const toggle_media = ref(false);

const months = [
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
    "Sunday",
];

const form = reactive({
    school_id: props.SchoolID,
    school_name: "",
    location: "",
    address: "",
    schedules: [
        {
            day: "Monday",
            start: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
            end: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
        },
        {
            day: "Tuesday",
            start: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
            end: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
        },
        {
            day: "Tuesday",
            start: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
            end: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
        },
        {
            day: "Wednesday",
            start: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
            end: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
        },
        {
            day: "Thursday",
            start: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
            end: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
        },
        {
            day: "Friday",
            start: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
            end: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
        },
        {
            day: "Saturday",
            start: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
            end: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
        },
        {
            day: "Sunday",
            start: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
            end: {
                hours: new Date().getHours(),
                minutes: new Date().getMinutes(),
                seconds: new Date().getSeconds(),
            },
        },
    ],
    about: "",
    telephone: null,
    social: [{ email: "" }],
});

let processing = ref(false)

const submit = () => {
    Inertia.post('/school', form, {
        onStart: () => {processing.value = true},
        onFinish: () => {processing.value = false}
    })
}
</script>
