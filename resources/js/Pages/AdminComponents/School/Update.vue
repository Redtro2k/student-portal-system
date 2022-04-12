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
                        :error="$page.props.errors.schoo_name"
                    />
                    <form-input
                        v-model:title="form.location"
                        label-title="Location"
                        description="Manila, Quezon City"
                        small-description="please fill up the specific location, Sorry for manual fill up we're still developing maps API"
                        :error="$page.props.errors.location"
                    />
                    <form-input
                        v-model:title="form.address"
                        label-title="Street Address"
                        description="Gen. Villamor St. "
                        small-description="please fill up the specific Address or live with a full adress, Sorry for manual fill up we're still developing maps API"
                        :error="$page.props.errors.address"
                    />
                    <div class="col-span-6 px-2 sm:col-span-3">
                        <label-form title="Phone Number" />
                        <vue-tel-input v-model="form.telephone"></vue-tel-input>
                        <p class="text-red-400 text-sm pb-2" v-if="$page.props.errors.telephone">{{$page.props.errors.telephone}}</p>
                    </div>
                    <form-text-area
                        size="4"
                        name="About/Brief School"
                        v-model:title="form.about"
                        :error="$page.props.errors.about"
                    />
                </template>
                <template #footer>
                    <form-button is-submit text="Reset" />
                    <form-button is-submit="submit" text="Update" :enabled="processing"/>
                </template>
            </form-container>
        </form>
    </admin-layout>
</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout";
import FormButton from "@/Shared/Form/Button";
import FormHeader from "@/Shared/Form/FormHeader";
import FormInput from "@/Shared/Form/Input";
import LabelForm from "@/Shared/Form/Label";
import FormTextArea from "@/Shared/Form/InputTextArea";
import { VueTelInput } from "vue-tel-input";
import "vue-tel-input/dist/vue-tel-input.css";
import {useForm} from "@inertiajs/inertia-vue3";

import {computed, defineAsyncComponent, reactive, ref} from "vue";

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
    return !form.social[index].email
})

const props = defineProps({
    records: Object
});
const toggle_schedule = ref(false);
const toggle_media = ref(false);

let processing = ref(false)

const form = useForm({
    school_name: props.records[0].school_name,
    location: props.records[0].location,
    address: props.records[0].address,
    schedules: props.records[0].schedules,
    about: props.records[0].about,
    telephone: `${props.records[0].telephone}`,
});

let submit = () => {
    form.post(`/school/update/${props.records[0].school_id}`,{
        preserveScroll: true
    })
}

</script>
