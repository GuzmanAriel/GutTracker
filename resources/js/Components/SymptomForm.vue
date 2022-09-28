<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let props = defineProps({
    overallSymptoms: Object
});

let form = useForm({
    overall_symptom: 1,
    abdominal_symptom: 5,
    bloating_symptom: 5,
    discomfort_symptom: 5,
    fatigue_symptom: 5,
    brain_symptom: 5
});
let submitForm = () => {
    form.post('/save/symptoms', {
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
        <div>
            <label class="block mb-4 text-lg text-center" for="overallSymptoms"> Overall Symptoms</label>
            <div class="flex justify-between mb-2">
                <font-awesome-icon class="text-primary" icon="fa-regular fa-face-frown" size="4x"/>
                <font-awesome-icon class="text-primary" icon="fa-regular fa-face-meh" size="4x"/>
                <font-awesome-icon class="text-primary" icon="fa-regular fa-face-smile" size="4x"/>
            </div>
            <input class="w-full" type="range" min="0" max="2" step="1" name="overallSymptoms" id="overallSymptoms" v-model="form.overall_symptom">
            <div v-if="form.errors.overall_symptom">{{ form.errors.overall_symptom }}</div>
        </div>

        <div>
            <label class="block mt-8 mb-1 text-lg text-center" for="abdominalSymptoms"> Overall Abdominal Symptoms</label>
            <div class="flex justify-between">
                <p>Sucks</p>
                <p>Really good</p>
            </div>
            <input class="w-full" type="range" min="0" max="10" step="5" name="abdominalSymptoms" id="abdominalSymptoms" v-model="form.abdominal_symptom">
            <div v-if="form.errors.abdominal_symptom">{{ form.errors.abdominal_symptom }}</div>
        </div>

        <div>
            <label class="block mt-8 mb-1 text-lg text-center" for="bloatingSymptoms"> Abdominal Bloating Symptoms</label>
            <div class="flex justify-between">
                <p>Sucks</p>
                <p>Really good</p>
            </div>
            <input class="w-full" type="range" min="0" max="10" step="5" name="bloatingSymptoms" id="bloatingSymptoms" v-model="form.bloating_symptom">
            <div v-if="form.errors.bloating_symptom">{{ form.errors.bloating_symptom }}</div>
        </div>

        <div>
            <label class="block mt-8 mb-1 text-lg text-center" for="discomfortSymptoms"> Abdominal Discomfort Symptoms</label>
            <div class="flex justify-between">
                <p>Sucks</p>
                <p>Really good</p>
            </div>
            <input class="w-full" type="range" min="0" max="10" step="5" name="discomfortSymptoms" id="discomfortSymptoms" v-model="form.discomfort_symptom">
            <div v-if="form.errors.discomfort_symptom">{{ form.errors.discomfort_symptom }}</div>
        </div>

        <div>
            <label class="block mt-8 mb-1 text-lg text-center" for="fatigueSymptoms"> Fatigue Symptoms</label>
            <div class="flex justify-between">
                <p>Sucks</p>
                <p>Really good</p>
            </div>
            <input class="w-full" type="range" min="0" max="10" step="5" name="fatigueSymptoms" id="fatigueSymptoms" v-model="form.fatigue_symptom">
            <div v-if="form.errors.fatigue_symptom">{{ form.errors.fatigue_symptom }}</div>
        </div>

        <button class="block gt-btn" type="submit">Save</button>
    </form>
</template>



