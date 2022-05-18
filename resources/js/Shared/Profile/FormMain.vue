<template>
    <div class="min-h-full">
        <main class="py-10">
                <slot class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8" name="page_header"></slot>
                <slot class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3" name="page_content"></slot>
        </main>
    </div>
</template>
<script>
</script>
