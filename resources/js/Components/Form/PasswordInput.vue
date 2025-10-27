<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import { EyeIcon, EyeSlashIcon } from "@heroicons/vue/24/solid";
import { ref } from "vue";

defineProps({
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

defineEmits(["update:modelValue"]);

const input = ref(null);
const showPassword = ref(false);
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
                label=""
                v-bind="$attrs"
                ref="input"
                class="mt-1 pl-3 block w-full"
                :type="showPassword ? 'text' : 'password'"
                :model-value="modelValue"
                :autocomplete="autocomplete"
                @input="$emit('update:modelValue', $event.target.value)"
            />
            <button
                @click.prevent="showPassword = !showPassword"
                type="button"
                class="absolute right-0 h-full w-12 flex justify-center items-center top-0"
            >
                <EyeIcon class="w-6 h-6 text-gray-300" v-if="!showPassword" />
                <EyeSlashIcon
                    class="w-6 h-6 text-red-400"
                    v-if="showPassword"
                />
            </button>
        </div>
        <InputError class="mt-2" :message="errorMessage" />
    </div>
</template>
