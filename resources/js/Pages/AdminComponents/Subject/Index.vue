<template>
    <admin-layout title="Subjects" isActive="subject">
        <template #header>
            <h1 class="text-2xl font-sans font-semibold text-gray-900">Subjects</h1>
        </template>
       <template #content>
           <list-portraits :items="subjects"/>
       </template>
    </admin-layout>
</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout"
import ListPortraits from "@/Shared/List/ListPortraits"
    const subjects = [
        {
            code: 'QP1st',
            name: 'Quantum Physics',
            status: '6 modules',
            image:
                'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60',
        },
    ]
</script>
