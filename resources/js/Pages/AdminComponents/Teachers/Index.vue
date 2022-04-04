<template>
    <admin-layout title="Teachers" isActive="teachers">
        <template #header>
            <h1 class="text-2xl font-sans font-semibold text-gray-900">Teachers</h1>
        </template>
        <list-data :Records="peoples"/>
    </admin-layout>
</template>
<script setup>
import AdminLayout from '@/Layouts/AdminLayout'
import ListData from '@/Shared/List/ListData'


const peoples = [
    {
        name: 'Jane Cooper',
        title: 'Paradigm Representative',
        role: 'Instructor',
        email: 'janecooper@example.com',
        telephone: '+1-202-555-0170',
        imageUrl:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
    },
    // More people...
    {
        name: 'Jane Cooper',
        title: 'Paradigm Representative',
        role: 'Instructor',
        email: 'janecooper@example.com',
        telephone: '+1-202-555-0170',
        imageUrl:
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
    },
]

</script>
