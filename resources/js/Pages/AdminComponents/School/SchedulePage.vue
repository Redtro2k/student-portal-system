<template>
    <admin-layout title="Set up Schedule" is-active="school">
        <template #header>
            <h1 class="text-2xl font-sans font-semibold text-gray-900">
                Schedule Settings
            </h1>
        </template>
        <template #content>
            <form @submit.prevent="submit">
                <form-containter>
                    <template #header>
                        <form-header title="setup Schedule" sub-title="changing the set of schedule will be applied to our Information of School"/>
                    </template>
                    <template #main>
                        <div v-for="(sched, index) in get_schedule" :key="index">
                            <form-label :title="sched.day" />
                            <div class="flex items-center space-x-2">
                                <DatePicker v-model="sched.start" timePicker :is24="false"/>
                                to
                                <DatePicker v-model="sched.end" timePicker :is24="false"/>
                            </div>
                        </div>
                    </template>
                    <template #footer>
                        <form-button is-submit="submit" text="Update" :enabled="processing"/>
                    </template>
                </form-containter>
            </form>
        </template>
    </admin-layout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout'
import LoadingComponents from "../../LoadingComponents";
import FormLabel from "@/Shared/Form/Label"
import FormHeader from "@/Shared/Form/FormHeader"
import FormButton from "@/Shared/Form/Button"
import {computed, defineAsyncComponent, ref} from "vue";
import {useForm} from "@inertiajs/inertia-vue3";

const props = defineProps({
    schedules: Object,
    schoolToken: Object
})

const get_schedule = computed(() => {
    return props.schedules[0].schedule
})

let processing = ref(false)
let FormContainter = defineAsyncComponent({
    loader: () => import('@/Shared/Form/Container'),
    loadingComponent: LoadingComponents,
    delay: 300


});
let form = useForm({
    schedules: get_schedule
})
let submit = () => {
    form.post(`/schedules/update/${props.schoolToken[0].school_id}`,{
        preserveScroll: true
    })
}

</script>
