<script setup>
import CommentShow from "@/Components/Comment/CommentShow.vue";
import FormTextarea from "@/Components/Form/FormTextarea.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const form = useForm({
    body: "",
});

const props = defineProps({
    client: {
        type: Object,
        required: true,
    },
    comments: {
        type: Object,
        required: true,
    },
});

function submit() {
    form.post(route("clients.comment.store", props.client.data), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            form.reset();
            showNewReportForm.value = false;
        },
    });
}

const showNewReportForm = ref(false);
</script>

<template>
    <div class="grid gap-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Rapportages
            </h2>
            <button
                @click="showNewReportForm = true"
                class="bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-500 hover:to-pink-600 text-pink-50 font-bold rounded-lg shadow-sm px-2 py-1"
            >
                aanmaken
            </button>
        </div>

        <div class="card divide-y divide-gray-200">
            <div class="px-4 md:px-16 py-6" v-if="showNewReportForm">
                <form @submit.prevent="submit">
                    <FormTextarea
                        id=""
                        v-model="form.body"
                        :errorMessage="form.errors.body"
                        label="Nieuwe rapportage"
                    ></FormTextarea>
                    <div class="flex justify-end pt-3 space-x-3">
                        <button @click="showNewReportForm = false">
                            annuleren
                        </button>

                        <button
                            type="submit"
                            class="bg-gradient-to-r from-pink-600 to-pink-700 hover:from-pink-500 hover:to-pink-600 text-pink-50 font-bold rounded-lg shadow-sm px-2 py-1"
                        >
                            aanmaken
                        </button>
                    </div>
                </form>
            </div>

            <div class="px-4 md:px-16 py-6" v-if="comments.length === 0">
                Er zijn geen rapportages toegevoegd aan deze client
            </div>

            <CommentShow
                :comment="comment"
                :client
                v-if="comments.length > 0"
                v-for="comment in comments"
            />
        </div>
    </div>
</template>

<style scoped></style>
