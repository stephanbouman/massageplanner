<script setup>
import { ListboxOption } from "@headlessui/vue";
import { CheckIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    value: {
        type: [Object, String, Number, Boolean],
        required: true,
    },
    disabled: {
        type: [Boolean],
        required: false,
        default: false,
    },
});
</script>

<template>
    <ListboxOption
        v-slot="{ active, selected }"
        :value="value"
        as="template"
        :disabled="disabled"
    >
        <li
            :class="[
                { 'opacity-40': disabled },
                active ? 'bg-green-200 text-stone-900' : 'text-stone-900',
                'relative cursor-pointer select-none py-2 pl-10 pr-4',
            ]"
        >
            <span
                :class="[
                    selected ? 'font-medium' : 'font-normal',
                    'block truncate',
                ]"
            >
                <slot />
            </span>
            <span
                v-if="selected"
                class="absolute inset-y-0 left-0 flex items-center pl-3 text-stone-900"
            >
                <CheckIcon class="h-5 w-5" aria-hidden="true" />
            </span>
        </li>
    </ListboxOption>
</template>
