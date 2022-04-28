<template>
    <admin-layout title="Admin" isActive="admin">
        <template #header>
            <h1 class="text-2xl font-sans font-semibold text-gray-900">School Records Database Statistic</h1>
        </template>
        <template #content>
            <div>
                <!--            Banner-->
                <banner>
                    <template #header>
                        Last 30 days
                    </template>
                    <template #main>
                        <stats-banner title="Total Teachers" value="0" previousStat="0" change="1"/>
                        <stats-banner title="Total Students" value="0" previousStat="0" change="0"/>
                        <stats-banner title="Total Subjects" value="0" previousStat="0" change="0"/>
                        <stats-banner title="Total Course" value="0" previousStat="0" change="0"/>
                        <stats-banner title="Total Salary" value="0" previousStat="0" change="0"/>
                        <stats-banner title="Total Branch" value="0" previousStat="0" change="0"/>
                    </template>
                </banner>
                <simple-table title="Recently Activity" :columns="columns">
                    <template #tbody>
                        <tr>
                            <table-row title="Jane Cooper"/>
                            <table-row title="Regional Paradigm Technician" />
                            <table-row is-badge title="new"/>
                            <table-row is-link a-href="#" title="Edit"/>
                        </tr>
                    </template>
                </simple-table>
            </div>
        </template>
    </admin-layout>
</template>
<script setup>
import AdminLayout from "@/Layouts/AdminLayout";
import Banner from "@/Shared/Stats/Banner";
import StatsBanner from "@/Shared/Stats/StatsBanner";
import SimpleTable from "@/Shared/Table/SimpleTable";
import TableRow from "@/Shared/Table/TableRow"

const columns = ['title', 'content', 'status']
</script>
