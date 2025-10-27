<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link as InertiaLink, useForm } from "@inertiajs/vue3";
import FormWrapper from "@/Components/Form/FormWrapper.vue";
import FormSection from "@/Components/Form/FormSection.vue";
import FormInput from "@/Components/Form/FormInput.vue";
import FormButtonSection from "@/Components/Form/FormButtonSection.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DataList from "@/Components/Show/DataList.vue";
import DisplaySection from "@/Components/Show/DisplaySection.vue";
import DisplayHeader from "@/Components/Show/DisplayHeader.vue";
defineProps({
  client: {
    type: Object,
    required: true,
  }
})

</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
          {{  client.data.name }}
        </h2>
        <InertiaLink :href="route('clients.edit', client.data)" class="bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-500 hover:to-pink-600  text-pink-50 font-bold rounded-lg shadow-sm px-2 py-1">bewerken</InertiaLink>
      </div>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="card max-w-3xl mx-auto divide-y divide-gray-200">

          <DisplaySection>
            <DisplayHeader>Basisgegevens</DisplayHeader>
            <DataList class="col-span-2" term="Voornaam">{{ client.data.first_name}}</DataList>
            <DataList class="col-span-2" term="Achternaam">{{ client.data.last_name}}</DataList>
            <DataList class="col-span-2 col-start-1" term="Geboortedatum">{{ client.data.birth_date_friendly }}</DataList>
            <DataList class="col-span-2" term="Geslacht">{{ client.data.gender }}</DataList>
          </DisplaySection>
          <DisplaySection>
            <DisplayHeader>Contactgegevens</DisplayHeader>
            <DataList class="col-span-2" term="Emailadres">{{ client.data.email ?? '-' }}</DataList>
            <DataList class="col-span-2" term="Telefoon">{{ client.data.phone ?? '-' }}</DataList>
            <DataList class="col-span-2 col-start-1" term="Adres">{{ client.data.address ?? '-'}}</DataList>
            <DataList class="col-span-1" term="Postcode">{{ client.data.postal_code ?? '-'}}</DataList>
            <DataList class="col-span-2" term="Plaats">{{ client.data.city ?? '-' }}</DataList>
          </DisplaySection>
          <DisplaySection>
            <DisplayHeader>Bezigheden</DisplayHeader>
            <DataList class="col-span-2" term="Beroep">{{  client.data.occupation  ?? 'Niet ingevuld' }}</DataList>
            <DataList class="col-span-2" term="Hoofdsport">{{  client.data.main_sport  ?? 'Niet ingevuld' }}</DataList>
          </DisplaySection>
          <DisplaySection>
            <DisplayHeader>Anamnese</DisplayHeader>
            <DataList class="col-span-full" term="Sociale anamnese">
              {{ client.data.social_anamnesis  ?? 'Niet ingevuld' }}
            </DataList>
            <DataList class="col-span-full" term="Gezondheidssituatie">
              {{ client.data.health_conditions  ?? 'Niet ingevuld' }}
            </DataList>
            <DataList class="col-span-full" term="Sportbelasting">
              {{ client.data.sports_quantity  ?? 'Niet ingevuld' }}
            </DataList>
            <DataList class="col-span-full" term="Oude blessures">
              {{ client.data.old_injuries  ?? 'Niet ingevuld' }}
            </DataList>
            <DataList class="col-span-full" term="Huidige blessures">
              {{ client.data.current_injuries ?? 'Niet ingevuld' }}
            </DataList>
          </DisplaySection>

        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
