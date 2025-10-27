<script setup>
import FormInputFile from "@/Components/Form/FormInputFile.vue";

import InputError from "@/Components/InputError.vue";
import { TrashIcon } from "@heroicons/vue/16/solid/index.js";
import axios from "axios";
import { ref } from "vue";

const emit = defineEmits(["update:modelValue"]);
const props = defineProps({
    id: {
        type: String,
        required: true,
    },
    modelValue: {
        type: Array,
        required: true,
    },
    errorMessage: {},
});

const temporaryFile = ref();
const temporaryFileErrors = ref();

function uploadFile() {
    axios
        .post(
            route("temporary-file.store"),
            {
                file: temporaryFile.value,
            },
            {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
                validateStatus: function (status) {
                    return status < 500;
                },
            },
        )
        .then(function (response) {
            if (response.status !== 200) {
                temporaryFileErrors.value = response.data.message;
                return;
            }

            console.log(temporaryFile.value);

            const newValue = [
                ...props.modelValue,
                {
                    uuid: response.data.uuid,
                    filename: temporaryFile.value.name,
                },
            ];
            emit("update:modelValue", newValue);

            temporaryFile.value = null;
            temporaryFileErrors.value = null;
        });
}

function removeFile(fileToRemove) {
    const updatedFiles = props.modelValue.filter(
        (file) => file !== fileToRemove,
    );
    emit("update:modelValue", updatedFiles);
}
</script>

<template>
    <div>
        <FormInputFile
            :id="id"
            v-model="temporaryFile"
            :error-message="temporaryFileErrors"
            @update:modelValue="uploadFile()"
        />
        <InputError v-if="errorMessage" class="mt-2" :message="errorMessage" />
        <ul class="mt-2 grid gap-2">
            <li
                class="border rounded-md px-2 py-2 bg-white text-gray-500 flex justify-between items-center"
                v-for="file in modelValue"
            >
                {{ file.filename }}
                <button
                    @click.prevent="removeFile(file)"
                    class="size-7 bg-red-500 rounded-md flex items-center justify-center text-white cursor-pointer hover:bg-red-700 duration-300"
                >
                    <TrashIcon class="size-4" />
                </button>
            </li>
        </ul>
    </div>
</template>

<style scoped></style>
