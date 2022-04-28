<template>
    <admin-layout title="School" isActive="school">
        <template #header>
            <div>
                <header-banner v-show="$page.props.flash.success != null" :message="$page.props.flash.success"/>
            </div>
        </template>
        <template #content>
            <div v-if="records.length">
                <banner>
                    <template #header>
                        Last in 30 days
                    </template>
                    <template #main>
                        <stats-banner title="Total Salary" value="0" previous-stat="0" change="1"/>
                        <stats-banner title="School Branches" value="1" previous-stat="0" change="100"/>
                        <stats-banner title="Stuff Manager" value="54" previous-stat="53" change="5" />
                    </template>
                </banner>
                <form-description
                    title="School Information"
                    sub-title="School details and application."
                    :items="records" class="mt-4">
                    <template v-for="record in records" :key="record" #footer>
                        <link-button :links="linkEdit(record.id)" text="Update"/>
                    </template>
                </form-description>
                <div class="pt-4">
                    <custom-button text="Edit Schedules" :url="`schedules/${records[0].id}/edit`"/>
                </div>
            </div>
            <div v-else>
                <landing-section
                    images="https://images.pexels.com/photos/207691/pexels-photo-207691.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    title="Create A Professional School"
                    paragraph="My name is Professor Heltor Patrius, submarine biologist and the foremost authority on deep-sea excavation. Six months ago, I developed a blueprint for what could potentially be the next generation of submarines. Capable of plunging to depths of approximately twenty-one hundred feet in six seconds, without disturbing the equilibrium of anybody aboard, this was to be the future of underwater transportation. I called her Trident. "
                    link="school/create"
                    name-link="Create School"
                />
                <faq-section :items="faqs"/>
            </div>
        </template>
    </admin-layout>
</template>
<script setup>
import CustomButton from '@/Shared/CustomButtons/CustomButton'
import AdminLayout from "@/Layouts/AdminLayout"
import LoadingComponents from "../../LoadingComponents";
import LinkButton from "@/Shared/Form/LinkButton";
import StatsBanner from '@/Shared/Stats/StatsBanner'
import Banner from "@/Shared/Stats/Banner";
import LandingSection from "@/Shared/Sections/CTA/LandingSection"
import FaqSection from "@/Shared/Sections/CTA/FaqSection"
import HeaderBanner from "@/Shared/Banner/HeaderBanner"
import {defineAsyncComponent} from "vue";
const FormDescription = defineAsyncComponent({
    loader:() => import("@/Shared/Form/DescriptionList"),
    loadingComponent: LoadingComponents,
    delay: 200,
    errorComponent: 'somethings wrong...',
    timeout: 3000
})
const props = defineProps({
    records: Object,
})
const linkEdit = (link) => {
    return `/school/${link}/edit`
}
const faqs = [
    {
        question: 'How do you make holy water?',
        answer:
            'You boil the hell out of it. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.',
    },
]

</script>
