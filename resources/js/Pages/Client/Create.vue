<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link as InertiaLink, useForm } from "@inertiajs/vue3";
import FormWrapper from "@/Components/Form/FormWrapper.vue";
import FormSection from "@/Components/Form/FormSection.vue";
import FormInput from "@/Components/Form/FormInput.vue";
import FormButtonSection from "@/Components/Form/FormButtonSection.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
defineProps({
  clients: {
    type: Object,
    required: true,
  }
})

function submit() {
  form.post(route('clients.store'));
}
const form = useForm({
  first_name: "",
  last_name: "",
  email: "",
  phone: "",
  birth_date: "",
});
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
          Client aanmaken
        </h2>
      </div>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <FormWrapper :form="form" class="max-w-3xl mx-auto" @submit.prevent="submit">
          <FormSection title="Algemeen" description="De basisgegevens van de client">
            <FormInput class="col-span-2 " id="first_name" v-model="form.first_name"  label="Voornaam"/>
            <FormInput class="col-span-2 " id="last_name"  v-model="form.last_name" label="Achternaam"/>
            <FormInput class="col-span-2 " id="birtday"  v-model="form.birth_date" type="date" label="Geboortedatum"/>
            <FormInput class="col-span-2 col-start-1" id="phone" v-model="form.phone" label="Telefoon"/>
            <FormInput class="col-span-3 " id="email" v-model="form.email" label="Emailadres"/>
          </FormSection>
          <FormButtonSection>
            <button class="bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-500 hover:to-pink-600  text-pink-50 font-bold rounded-lg shadow-sm px-2 py-1">aanmaken</button>
          </FormButtonSection>
        </FormWrapper>

      </div>
    </div>
  </AuthenticatedLayout>
</template>
