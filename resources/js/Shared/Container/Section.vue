<template>
    <section aria-labelledby="applicant-information-title">
        <div class="bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 id="applicant-information-title" class="text-lg leading-6 font-medium text-gray-900">{{title}}</h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">{{subTitle}}</p>
            </div>
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                <slot name="main"/>
            </div>
            <div>
                <a href="#" class="block bg-gray-50 text-sm font-medium text-gray-500 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">Read full application</a>
            </div>
        </div>
    </section>
</template>
<script setup>
defineProps({
    title: String,
    subTitle: String,
})
</script>
