<script setup>
import { Switch } from "@headlessui/vue";

const props = defineProps({
    modelValue: {
        type: Boolean,
    },
    disabled: {
        type: Boolean,
    },
});

const emit = defineEmits(["update:modelValue"]);
function toggleValue() {
    if (props.disabled) {
        return;
    }

    emit("update:modelValue", !props.modelValue);
}
</script>

<template>
    <div class="flex gap-4 items-center" @click.prevent="toggleValue">
        <Switch
            class="w-12 h-6 rounded-full flex-shrink-0 px-0 flex items-center duration-200"
            :class="{
                'pl-6 border-2 border-green-400 bg-green-400': modelValue,
                'pl-0 border-2 border-gray-200 bg-gray-200 ': !modelValue,
                'opacity-30 hover:cursor-not-allowed': disabled,
                'hover:cursor-pointer': !disabled,
            }"
        >
            <span class="sr-only"><slot /></span>
            <span class="h-5 w-5 rounded-full bg-white"></span>
        </Switch>
        <label
            :class="{
                'hover:cursor-not-allowed opacity-60': disabled,
                'hover:cursor-pointer': !disabled,
            }"
            class="text-stone-600 w-full select-none font-medium"
            ><slot
        /></label>
    </div>
</template>
