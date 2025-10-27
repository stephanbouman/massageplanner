<script setup>
import FormSection from "@/Components/Form/FormSection.vue";

const props = defineProps({
    form: {
        type: Object,
        required: false,
    },
});
</script>
<template>
    <form class="card">
        <div class="flex flex-col divide-y divide-gray-200">
            <FormSection v-if="form && form.hasErrors" section-style="small">
                <div
                    class="bg-red-50 px-4 py-2 col-span-full text-red-800 rounded-md"
                >
                    <p class="font-bold">
                        Verbeter de volgende fouten en probeer het opnieuw
                    </p>
                    <ul class="text-sm list-disc pl-4">
                        <li v-for="error in form.errors">{{ error }}</li>
                    </ul>
                </div>
            </FormSection>

            <slot />
        </div>
    </form>
</template>
