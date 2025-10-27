<template>
    <div>
        <InputLabel v-if="label">{{ label }}</InputLabel>
        <div
            class="flex items-center justify-center w-full"
            @dragover.prevent
            @drop.prevent="handleDrop"
        >
            <label
                :for="id"
                :class="
                    errorMessage
                        ? 'border-red-500 bg-red-50'
                        : 'border-gray-200 bg-gray-50'
                "
                class="flex flex-col items-center justify-center w-full h-64 border rounded-lg cursor-pointer hover:bg-gray-100 transition-colors"
            >
                <ArrowUpTrayIcon class="size-12 text-gray-500 mb-3" />

                <p class="mb-2 text-sm text-gray-500">
                    <template v-if="!modelValue">
                        <span class="font-semibold">Klik om te uploaden</span>
                        of sleep een bestand hierheen
                    </template>
                    <template v-if="modelValue">
                        <span class="font-bold">
                            {{ modelValue.name }}
                        </span>
                    </template>
                </p>

                <p class="text-xs text-gray-500" v-if="!modelValue">
                    Max: {{ maxFileSize }}MB
                </p>

                <input
                    :id="id"
                    type="file"
                    class="hidden"
                    @change="handleFileChange"
                />
            </label>
        </div>

        <InputError v-if="errorMessage" class="mt-2" :message="errorMessage" />

        <InputError v-if="error" class="mt-2" :message="errorMessage" />
    </div>
</template>

<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { ArrowUpTrayIcon } from "@heroicons/vue/24/outline/index.js";
import { ref } from "vue";

const maxFileSize = 10;

const props = defineProps({
    id: {
        type: String,
        required: false,
    },
    modelValue: File,
    errorMessage: {
        type: String,
        required: false,
    },
    label: {
        type: String,
        required: false,
    },
    accept: {
        required: false,
        default: "image",
    },
});

const emit = defineEmits(["update:modelValue"]);

const error = ref();

const isValidFile = (file) => {
    return true;
};

const handleFile = (file) => {
    if (!file) return;

    if (!isValidFile(file)) {
        error.value = `Ongeldig bestandstype: ${file.name}`;
        updateModelValue(null);
        return;
    }

    if ((file.size / (1024 * 1024)).toFixed(2) > maxFileSize) {
        error.value = `Bestand te groot: ${file.name}`;
        updateModelValue(null);
        return;
    }

    updateModelValue(file);
    error.value = null;
};

function updateModelValue(value) {
    emit("update:modelValue", value);
}

const handleFileChange = (event) => {
    const file = event.target.files[0];

    if (file) {
        handleFile(file);
    }
};

const handleDrop = (event) => {
    const file = event.dataTransfer.files[0];

    if (file) {
        handleFile(file);
    }
};
</script>
