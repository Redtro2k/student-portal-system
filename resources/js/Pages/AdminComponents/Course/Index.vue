<template>
<admin-layout title="Course" isActive="course">
    <template #header>
        <h1 class="text-2xl font-sans font-semibold text-gray-900">Course</h1>
    </template>
    <form @submit.prevent="submit">
        <container-form>
                <template #header>
                    <form-header  title="Add Course" sub-title="add a course to our School..."/>
                </template>
                <template #container>
                        <div class="grid grid-cols-6 gap-6">
                            <input-form label-title="Course Name" v-model:title="form.course_name"/>
                            <input-form label-title="Course Semester" v-model:title="form.semester" small-description="Insert a range of semester for Ex. 4 means 1st - 4th grading/sem"/>

                            <div class="col-span-6 sm:col-span-3">
                                <label-form title="Year Level"/>
                                <v-select label="year_level" :options="year_level" v-model="form.year_level"/>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label-form title="Teacher/Instrutor"/>
                                <v-select label="teacher" :options="teachers" v-model="form.teacher"/>
                            </div>
                        </div>
                </template>
                <template #footer>
                    <button-form isSubmit="button" text="Cancel" />
                    <button-form isSubmit="submit" text="Save" />
                </template>
        </container-form>
    </form>
<!--    <simple-table />-->
</admin-layout>

</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout"
import SimpleTable from "@/Shared/Table/SimpleTable"
import ContainerForm from "@/Shared/Form/Container"
import InputForm from "@/Shared/Form/Input"
import LabelForm from '@/Shared/Form/Label'
import ButtonForm from '@/Shared/Form/Button'
import FormHeader from '@/Shared/Form/FormHeader'
import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";

const year_level = ['kinder', 'Grade 1', 'Grade 2', 'Grade 3']
const teachers = ['Kristine mae', 'John doe', 'Tommy shelby']

const form = reactive({
    course_name: '',
    semester: '',
    year_level: '',
    teacher: ''
})

let submit = () => {
   alert('check')
}

</script>
<style scoped>
.style-chooser .vs__search::placeholder,
.style-chooser .vs__dropdown-toggle,
.style-chooser .vs__dropdown-menu {
    background: #dfe5fb;
    border: none;
    color: #394066;
    text-transform: lowercase;
    font-variant: small-caps;
}

.style-chooser .vs__clear,
.style-chooser .vs__open-indicator {
    fill: #394066;
}
</style>
