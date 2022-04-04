<template>
        <div class="space-y-6">
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <header>
                    <slot name="header"></slot>
                </header>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <main>
                    <slot name="main"></slot>
                </main>
            </div>
        </div>
    </div>
        <div class="flex justify-end">
            <footer>
                <slot name="footer"></slot>
            </footer>
    </div>
    </div>
</template>
