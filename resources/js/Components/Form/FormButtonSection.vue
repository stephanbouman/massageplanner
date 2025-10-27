<script setup>
import FormSection from "@/Components/Form/FormSection.vue";
</script>

<template>
    <FormSection section-style="small">
        <div class="flex justify-end gap-4 col-span-full items-center">
            <slot />
        </div>
    </FormSection>
</template>
