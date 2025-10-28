<script setup>
import DataList from "@/Components/Show/DataList.vue";
import DisplayHeader from "@/Components/Show/DisplayHeader.vue";
import DisplaySection from "@/Components/Show/DisplaySection.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link as InertiaLink } from "@inertiajs/vue3";

defineProps({
    client: {
        type: Object,
        required: true,
    },
    appointment: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    <InertiaLink :href="route('clients.show', client.data)">{{
                        client.data.name
                    }}</InertiaLink>
                </h2>
                <!--        <InertiaLink :href="route('clients.edit', client.data)" class="bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-500 hover:to-pink-600  text-pink-50 font-bold rounded-lg shadow-sm px-2 py-1">bewerken</InertiaLink>-->
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
                <div class="card divide-y divide-gray-200 col-span-5">
                    <DisplaySection>
                        <DisplayHeader>Clientgegevens</DisplayHeader>
                        <DataList class="col-span-2" term="Client">{{
                            client.data.name
                        }}</DataList>
                        <DataList class="col-span-2" term="Geslacht">{{
                            client.data.gender
                        }}</DataList>
                        <DataList class="col-span-2" term="Geboortedatum">{{
                            client.data.birth_date_friendly
                        }}</DataList>
                    </DisplaySection>
                    <DisplaySection>
                        <DisplayHeader>Afspraakgegevens</DisplayHeader>
                        <DataList class="col-span-2" term="Datum en tijd">{{
                            appointment.data.date_friendly
                        }}</DataList>
                        <DataList class="col-span-2" term="Type">{{
                            appointment.data.type_friendly
                        }}</DataList>
                        <DataList class="col-span-2" term="Gewenste duur"
                            >{{ appointment.data.duration }} minuten</DataList
                        >
                        <DataList
                            class="col-span-full"
                            term="Extra informatie"
                            >{{
                                appointment.data.additional_info ??
                                "Niet ingevuld"
                            }}</DataList
                        >
                    </DisplaySection>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
