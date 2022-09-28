<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let props = defineProps({
    overallSymptoms: Object
});

let form = useForm({
    overall_symptom: 1
});
let submitForm = () => {
    form.post("save/overall-symptoms", {
        preserveScroll: true,
        onSuccess: (page) => {
            console.log('saved');
        },
        onError: () => {
            console.log('error');
        },
    });
};
</script>

<template>
    <form class="mt-4" id="overall-symptoms" name="overall-symptoms" @submit.prevent="submitForm">
        <label class="block mb-4 text-lg font-bold text-center" for="overallSymptoms"> Overall Symptoms</label>
        <div class="flex justify-between mb-2">
            <font-awesome-icon class="text-primary" icon="fa-regular fa-face-frown" size="4x"/>
            <font-awesome-icon class="text-primary" icon="fa-regular fa-face-meh" size="4x"/>
            <font-awesome-icon class="text-primary" icon="fa-regular fa-face-smile" size="4x"/>
        </div>
        <input class="w-full" type="range" min="0" max="2" step="1" name="overallSymptoms" id="overallSymptoms" v-model="form.overall_symptom">
        <div v-if="form.errors.overall_symptom">{{ form.errors.overall_symptom }}</div>
        <button class="block gt-btn" type="submit">Save</button>
    </form>
</template>



