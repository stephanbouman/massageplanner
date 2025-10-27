<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { onMounted, ref } from "vue";

defineProps({
    modelValue: String,
    placeholder: {
        type: String,
        required: false,
        default: "",
    },
    label: {
        required: true,
    },
    required: {
        required: false,
        type: Boolean,
        default: false,
    },
    id: {
        required: true,
    },
    errorMessage: {
        type: String,
        default: null,
    },
    rows: {
        type: Number,
        default: 3,
    },
});

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <div>
        <InputLabel :for="id" :value="label" />

        <textarea
            :id="id"
            ref="input"
            :rows="rows"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-xs rounded-md mt-1 pl-3 block w-full"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :placeholder="placeholder"
            :class="{
                'border-red-500': errorMessage,
            }"
        >
        </textarea>
        <InputError class="mt-2" :message="errorMessage" />
    </div>
</template>
