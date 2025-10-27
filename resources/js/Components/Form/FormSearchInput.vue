<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { MagnifyingGlassIcon } from "@heroicons/vue/16/solid/index.js";

const props = defineProps({
    errorMessage: {},
    id: {
        required: true,
    },
    label: {
        required: false,
    },
    required: {
        required: false,
        type: Boolean,
        default: false,
    },
    placeholder: {
        type: String,
        required: false,
        default: "",
    },
    modelValue: {
        type: [String, Number],
        required: false,
        default: "",
    },
    type: {
        type: String,
        default: "text",
    },
    accept: {
        type: String,
        default: "",
    },
    maxlength: {
        type: Number,
        default: 255,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    forceLowercase: {
        type: Boolean,
        default: true,
    },
    autocomplete: {
        type: String,
        required: false,
    },
});

defineEmits(["update:modelValue", "blur"]);
</script>
<template>
    <div>
        <InputLabel
            v-if="label"
            :for="id"
            :value="label"
            class="mb-1"
            :force-lowercase
        />
        <div class="relative">
            <TextInput
                :id="id"
                :model-value="modelValue"
                :type="type"
                @input="$emit('update:modelValue', $event.target.value)"
                class="pl-8 block w-full"
                :class="{
                    'border-red-500': errorMessage,
                    'bg-stone-100 border-stone-200 text-stone-500 cursor-not-allowed':
                        disabled,
                }"
                :autocomplete="autocomplete"
                :accept="accept"
                :required="required"
                :disabled="disabled"
                :placeholder="placeholder"
                :maxlength="maxlength"
                @blur="$emit('blur', $event)"
            />
            <MagnifyingGlassIcon
                class="size-5 absolute top-3 left-2 text-stone-500"
            />
        </div>
        <InputError class="mt-2" :message="errorMessage" />
    </div>
</template>
