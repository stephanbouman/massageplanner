<script setup>
import FormListboxButton from "@/Components/Form/FormListboxButton.vue";
import FormListboxOption from "@/Components/Form/FormListboxOption.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { Listbox, ListboxOptions } from "@headlessui/vue";
import { computed } from "vue";

const props = defineProps({
    options: {
        type: Object,
        required: false,
    },
    modelValue: {
        type: [Object, String, Number, Boolean],
        default: null,
    },
    label: {
        type: String,
        required: false,
    },
    id: {
        type: String,
        required: false,
    },
    errorMessage: {
        type: String,
        required: false,
    },
    placeholder: {
        type: String,
        required: false,
    },
    deletable: {
        type: Boolean,
        required: false,
        default: false,
    },
});

const emit = defineEmits(["update:modelValue", "change"]);

const value = computed({
    get: () => {
        return props.modelValue;
    },
    set: (newValue) => {
        emit("update:modelValue", newValue);
        emit("change");
    },
});

const selectedValue = computed({
    get: () => {
        return props.options.find(
            (option) => option.value === props.modelValue,
        );
    },
});
</script>

<template>
    <div>
        <InputLabel class="mb-1" v-if="label" :for="id" :value="label" />
        <Listbox :id="id" v-model="value">
            <div class="relative w-full">
                <FormListboxButton
                    :class="{
                        'border-red-500': errorMessage,
                    }"
                    :deletable="value !== null && deletable"
                    @set-to-null="value = null"
                >
                    <span v-if="selectedValue?.label">
                        {{ selectedValue?.label }}
                    </span>
                    <span v-else class="text-gray-500">
                        {{ placeholder ?? "---" }}
                    </span>
                </FormListboxButton>

                <transition
                    leave-active-class="transition duration-100 ease-in"
                    leave-from-class="opacity-100"
                    leave-to-class="opacity-0"
                >
                    <ListboxOptions
                        class="absolute w-full mt-1 max-h-60 overflow-auto rounded-md bg-white z-10 py-1 text-base shadow-xs ring-1 ring-gray-300 ring-opacity-5 focus:outline-none sm:text-sm"
                    >
                        <FormListboxOption
                            v-for="option in options"
                            :key="option.value"
                            :value="option.value"
                            :disabled="option.disabled"
                        >
                            {{ option.label }}
                        </FormListboxOption>
                    </ListboxOptions>
                </transition>
            </div>
        </Listbox>
        <InputError class="mt-2" :message="errorMessage" />
    </div>
</template>
