<script setup>
const props = defineProps({
    title: {
        required: false,
        type: String,
    },
    description: {
        required: false,
        type: String,
    },
    sectionStyle: {
        required: false,
        type: String,
        default: "normal",
    },
});
</script>

<template>
    <section
        class="col-span-full px-4 md:px-16 grid grid-cols-3 md:grid-cols-6 gap-4 md:gap-5 relative"
        :class="sectionStyle === 'small' ? 'py-6' : 'py-6 md:py-12'"
    >
        <div class="col-span-full" v-if="title || description">
            <h3 v-if="title" class="font-bold text-stone-700">
                {{ title }}
            </h3>
            <p v-if="description" class="text-stone-400">
                {{ description }}
            </p>
        </div>
        <slot></slot>
    </section>
</template>
