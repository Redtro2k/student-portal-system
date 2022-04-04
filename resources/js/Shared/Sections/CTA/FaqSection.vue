<template>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
            <div class="lg:grid lg:grid-cols-3 lg:gap-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Frequently asked questions</h2>
                    <p class="mt-4 text-lg font-semibold text-gray-500">Can’t find the answer you’re looking for? Reach out to our <p-text-link paragraph="customer support"/> team.</p>
                </div>
                <div class="mt-12 lg:mt-0 lg:col-span-2">
                    <dl class="space-y-12">
                        <div v-for="faq in items" :key="faq">
                            <dt class="text-lg leading-6 font-bold text-gray-900">
                                {{ faq.question }}
                            </dt>
                            <dd class="mt-2 text-base text-gray-500">
                                {{ faq.answer }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import PTextLink from '@/Shared/PTextLink'
    defineProps({
        items: Object
    })
</script>
