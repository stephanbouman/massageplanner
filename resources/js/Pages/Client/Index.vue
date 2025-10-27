<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link as InertiaLink } from "@inertiajs/vue3";
defineProps({
  clients: {
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
          Clienten
        </h2>
        <InertiaLink :href="route('clients.create')" class="bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-500 hover:to-pink-600  text-pink-50 font-bold rounded-lg shadow-sm px-2 py-1">aanmaken</InertiaLink>
      </div>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-xl divide-y divide-gray-200">
          <div v-for="client in clients.data" class="py-3 px-4">
            <InertiaLink :href="route('clients.show', client)"  class="font-bold">{{ client.name }}</InertiaLink>
          </div>
        </div>

      </div>
    </div>
  </AuthenticatedLayout>
</template>
