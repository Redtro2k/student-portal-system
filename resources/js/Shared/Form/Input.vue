<template>
    <div class="col-span-6 px-2 sm:col-span-3">
        <label-form :title="labelTitle"/>
        <input
            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            :type="textType"
            :placeholder="description"
            :value="title"
            @input="$emit('update:title', $event.target.value)" required
        />
        <p class="text-sm text-gray-400 leading-normal" v-show="smallDescription != null">{{ smallDescription }}</p>
        <p class="text-red-400 text-sm pb-2" v-if="error">{{error}}</p>
    </div>
</template>
<script>
import LabelForm from '@/Shared/Form/Label'
export default {
    props: {
        textType: {
            type: String,
            default: () => 'text'
        },
        title: String,
        labelTitle: String,
        description: {
            default: () => null
        },
        smallDescription: {
            default: () => null
        },
        error: String
    },
    emits: ['update:title'],
    components: {
        LabelForm
    },
}
</script>
