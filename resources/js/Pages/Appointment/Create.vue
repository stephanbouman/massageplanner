<script setup>
import FormButtonSection from "@/Components/Form/FormButtonSection.vue";
import FormInput from "@/Components/Form/FormInput.vue";
import FormSection from "@/Components/Form/FormSection.vue";
import FormTextarea from "@/Components/Form/FormTextarea.vue";
import FormWrapper from "@/Components/Form/FormWrapper.vue";
import InputLabel from "@/Components/InputLabel.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
const props = defineProps({
    client: {
        type: Object,
        required: true,
    },
    types: {
        type: Object,
        required: true,
    },
});

function submit() {
    form.post(
        route("appointment.store", {
            client: props.client.data,
        }),
    );
}
const form = useForm({
    type: "",
    duration: 60,
    date: "",
    additional_info: "",
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ client.data.name }} /
                    <span class="text-gray-500">Nieuwe afspraak</span>
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <FormWrapper
                    :form="form"
                    class="max-w-3xl mx-auto"
                    @submit.prevent="submit"
                >
                    <FormSection title="Afspraak">
                        <FormInput
                            class="col-span-2"
                            id="datetime"
                            type="datetime-local"
                            v-model="form.date"
                            label="Datum en tijd"
                        />
                        <FormInput
                            class="col-span-2"
                            id="duration"
                            type="number"
                            v-model="form.duration"
                            label="Verwachtte duur (min)"
                        />
                        <div class="col-span-2">
                            <InputLabel class="mb-1">Massagetype</InputLabel>
                            <select
                                class="w-full rounded-md border-gray-300 shadow-xs focus:border-indigo-500 focus:ring-indigo-500 col-span-2"
                                id="type"
                                v-model="form.type"
                            >
                                <option
                                    v-for="(label, type) in types"
                                    :value="type"
                                >
                                    {{ label }}
                                </option>
                            </select>
                        </div>
                        <FormTextarea
                            class="col-span-full"
                            id=""
                            v-model="form.additional_info"
                            label="Extra informatie"
                        />
                    </FormSection>
                    <FormButtonSection>
                        <button
                            class="bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-500 hover:to-pink-600 text-pink-50 font-bold rounded-lg shadow-sm px-2 py-1"
                        >
                            aanmaken
                        </button>
                    </FormButtonSection>
                </FormWrapper>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
