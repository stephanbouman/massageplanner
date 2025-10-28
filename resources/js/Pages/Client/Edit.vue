<script setup>
import FormButtonSection from "@/Components/Form/FormButtonSection.vue";
import FormInput from "@/Components/Form/FormInput.vue";
import FormSection from "@/Components/Form/FormSection.vue";
import FormTextarea from "@/Components/Form/FormTextarea.vue";
import FormWrapper from "@/Components/Form/FormWrapper.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link as InertiaLink, useForm } from "@inertiajs/vue3";
const props = defineProps({
    client: {
        type: Object,
        required: true,
    },
});

function submit() {
    form.patch(route("clients.update", props.client.data));
}
const form = useForm({
    first_name: props.client.data.first_name,
    last_name: props.client.data.last_name,
    email: props.client.data.email,
    phone: props.client.data.phone,
    birth_date: props.client.data.birth_date_formatted,
    gender: props.client.data.gender,
    address: props.client.data.address,
    postal_code: props.client.data.postal_code,
    city: props.client.data.city,
    main_sport: props.client.data.main_sport,
    occupation: props.client.data.occupation,
    social_anamnesis: props.client.data.social_anamnesis,
    health_conditions: props.client.data.health_conditions,
    sports_quantity: props.client.data.sports_quantity,
    old_injuries: props.client.data.old_injuries,
    current_injuries: props.client.data.current_injuries,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    {{ client.data.name }}
                </h2>
                <div class="flex items-center space-x-3">
                    <InertiaLink :href="route('clients.show', client.data)"
                        >annuleren</InertiaLink
                    >
                    <button
                        type="submit"
                        @click.prevent="submit"
                        class="bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-500 hover:to-pink-600 text-pink-50 font-bold rounded-lg shadow-sm px-2 py-1"
                    >
                        opslaan
                    </button>
                </div>
            </div>
        </template>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <FormWrapper
                    :form="form"
                    class="max-w-3xl mx-auto"
                    @submit.prevent="submit"
                >
                    <FormSection sectionStyle="small" title="Basisgegevens">
                        <FormInput
                            class="col-span-2"
                            id="first_name"
                            v-model="form.first_name"
                            label="Voornaam"
                        />
                        <FormInput
                            class="col-span-2"
                            id="last_name"
                            v-model="form.last_name"
                            label="Achternaam"
                        />
                        <FormInput
                            class="col-span-2 col-start-1"
                            id="birth_date"
                            v-model="form.birth_date"
                            type="date"
                            label="Geboortedatum"
                        />
                    </FormSection>
                    <FormSection sectionStyle="small" title="Contactgegevens">
                        <FormInput
                            class="col-span-2"
                            id="email"
                            v-model="form.email"
                            label="Emailadres"
                        />
                        <FormInput
                            class="col-span-2"
                            id="phone"
                            v-model="form.phone"
                            label="Telefoon"
                        />
                        <FormInput
                            class="col-span-2"
                            id="address"
                            v-model="form.address"
                            label="Adres"
                        />
                        <FormInput
                            class="col-span-1"
                            id="postal_code"
                            v-model="form.postal_code"
                            label="Postcode"
                        />
                        <FormInput
                            class="col-span-3"
                            id="city"
                            v-model="form.city"
                            label="Plaats"
                        />
                    </FormSection>

                    <FormSection sectionStyle="small" title="Bezigheden">
                        <FormInput
                            class="col-span-3"
                            id="occupation"
                            v-model="form.occupation"
                            label="Beroep"
                        />
                        <FormInput
                            class="col-span-3"
                            id="sport"
                            v-model="form.main_sport"
                            label="Hoofdsport"
                        />
                    </FormSection>
                    <FormSection sectionStyle="small" title="Anamnese">
                        <FormTextarea
                            class="col-span-full"
                            id="occupation"
                            v-model="form.social_anamnesis"
                            label="Sociale anamnese"
                        />
                        <FormTextarea
                            class="col-span-full"
                            id="occupation"
                            v-model="form.health_conditions"
                            label="Gezondheidssituatie"
                        />
                        <FormTextarea
                            class="col-span-full"
                            id="occupation"
                            v-model="form.sports_quantity"
                            label="Sportbelasting"
                        />
                        <FormTextarea
                            class="col-span-full"
                            id="occupation"
                            v-model="form.old_injuries"
                            label="Oude blessures"
                        />
                        <FormTextarea
                            class="col-span-full"
                            id="occupation"
                            v-model="form.current_injuries"
                            label="Huidige blessures"
                        />
                    </FormSection>

                    <FormButtonSection>
                        <InertiaLink :href="route('clients.show', client.data)"
                            >annuleren</InertiaLink
                        >
                        <button
                            type="submit"
                            class="bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-500 hover:to-pink-600 text-pink-50 font-bold rounded-lg shadow-sm px-2 py-1"
                        >
                            opslaan
                        </button>
                    </FormButtonSection>
                </FormWrapper>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
