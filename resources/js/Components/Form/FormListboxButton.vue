<script setup>
import { ListboxButton } from "@headlessui/vue";
import { XMarkIcon } from "@heroicons/vue/16/solid/index.js";

const emit = defineEmits(["setToNull"]);

const props = defineProps({
    deletable: {
        type: Boolean,
        required: false,
        default: false,
    },
});
</script>

<template>
    <ListboxButton
        class="w-full border-gray-300 text-left rounded-md shadow-xs form-select flex justify-between items-center"
    >
        <span class="block truncate hover:cursor-pointer">
            <slot />
        </span>
        <button
            v-if="deletable"
            @click.prevent="emit('setToNull')"
            class="size-6 flex items-center justify-center hover:cursor-pointer"
        >
            <XMarkIcon class="size-4 text-red-300" />
        </button>
    </ListboxButton>
</template>
