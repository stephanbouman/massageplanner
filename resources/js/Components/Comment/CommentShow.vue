<script setup>
import FormTextarea from "@/Components/Form/FormTextarea.vue";
import { router, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    client: {
        required: true,
        type: Object,
    },
    comment: {
        required: true,
        type: Object,
    },
});
const form = useForm({
    body: props.comment.body,
});

const isEditing = ref(false);

function reset() {
    form.reset();
    isEditing.value = false;
}

function deleteComment() {
    router.delete(
        route("clients.comment.delete", {
            client: props.client.data,
            comment: props.comment,
        }),
        {
            preserveState: true,
            preserveScroll: true,
        },
    );
}

function update() {
    form.patch(
        route("clients.comment.update", {
            client: props.client.data,
            comment: props.comment.id,
        }),
        {
            preserveScroll: true,
            preserveState: true,
            onSuccess: () => {
                form.body = props.comment.body;
                isEditing.value = false;
            },
        },
    );
}
</script>

<template>
    <div class="px-4 md:px-16 py-6 grid-cols-3 grid">
        <div>
            <dl class="flex space-x-1 text-xs text-slate-400 mb-1">
                <dt class="sr-only">Datum</dt>
                <dd>{{ comment.created_at_friendly }}</dd>
            </dl>
            <button
                @click="deleteComment"
                class="text-xs text-red-600 hover:text-red-800 hover:underline"
            >
                verwijderen
            </button>
        </div>
        <div
            v-if="!isEditing"
            class="col-span-2 markdown hover:bg-slate-100 cursor-text"
            v-html="comment.body_markdown"
            @click="isEditing = true"
        ></div>
        <form
            @submit.prevent="update"
            v-if="isEditing"
            class="col-span-2 grid gap-4"
        >
            <FormTextarea
                id="body"
                label=""
                :errorMessage="form.errors.body"
                v-model="form.body"
            />
            <div class="flex justify-end items-center space-x-2">
                <button @click="reset">annuleren</button>

                <button
                    type="submit"
                    class="bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-500 hover:to-pink-600 text-pink-50 font-bold rounded-lg shadow-sm px-2 py-1"
                >
                    opslaan
                </button>
            </div>
        </form>
    </div>
</template>

<style scoped></style>
