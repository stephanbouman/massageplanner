<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    errorMessage: {},
    id: {
        required: true,
    },
    label: {
        required: true,
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
        <TextInput
            :id="id"
            :model-value="modelValue"
            :type="type"
            @input="$emit('update:modelValue', $event.target.value)"
            class="pl-3 block w-full"
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
        <InputError class="mt-2" :message="errorMessage" />
    </div>
</template>
