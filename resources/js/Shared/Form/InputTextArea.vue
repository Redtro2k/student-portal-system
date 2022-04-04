<template>
    <div class="col-span-6 px-2 :col-span-3">
        <form-label :title="name"/>
        <div class="mt-1">
        <textarea
            :value="title"
            :rows="size"
            @input="$emit('update:title', $event.target.value)"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
            required
        ></textarea>
        </div>
    </div>
</template>
<script>
import FormLabel from '@/Shared/Form/Label'

export default {
    props: {
        title: String,
        name: String,
        size: String
    },
    components: {
        FormLabel
    },
    emits: ['update:title']
}
</script>
