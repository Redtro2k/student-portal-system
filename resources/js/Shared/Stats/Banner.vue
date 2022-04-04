<template>
    <header>
        <h1 class="text-md font-sans text-gray-600 py-2">
            <slot name="header"></slot>
        </h1>
    </header>
    <main>
        <dl class="mt-5 grid grid-cols-1 rounded-lg bg-white overflow-hidden shadow divide-y divide-gray-200 md:grid-cols-3 md:divide-y-0 md:divide-x">
            <slot name="main"></slot>
        </dl>
    </main>
</template>
