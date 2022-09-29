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
            <label class="block mb-4 text-lg text-center text-primary font-bold" for="overallSymptoms"> Overall Symptoms</label>

            <input class="w-full bg-transparent" type="range" min="0" max="2" step="1" name="overallSymptoms" id="overallSymptoms" v-model="form.overall_symptom">
            <div class="flex justify-between mb-2">
                <font-awesome-icon class="text-primary" icon="fa-regular fa-face-frown" size="2x"/>
                <font-awesome-icon class="text-primary" icon="fa-regular fa-face-meh" size="2x"/>
                <font-awesome-icon class="text-primary" icon="fa-regular fa-face-smile" size="2x"/>
            </div>
            <div v-if="form.errors.overall_symptom">{{ form.errors.overall_symptom }}</div>
        </div>

        <div>
            <label class="block mt-12 text-center text-primary text-lg font-bold" for="abdominalSymptoms"> Overall Abdominal Symptoms</label>
            <p class="text-secondary font-bold">{{form.abdominal_symptom}}/10</p>
            <input class="w-full bg-transparent" type="range" min="0" max="10" name="abdominalSymptoms" id="abdominalSymptoms" v-model="form.abdominal_symptom">
            <div class="flex justify-between text-primary">
                <p>Excellent, none at all</p>
                <p>The worst, it has been awful</p>
            </div>
            <div v-if="form.errors.abdominal_symptom">{{ form.errors.abdominal_symptom }}</div>
        </div>

        <div>
            <label class="block mt-12 mb-1 text-lg text-center text-primary font-bold" for="bloatingSymptoms"> Abdominal Bloating</label>
            <p class="text-secondary font-bold">{{form.bloating_symptom}}/10</p>
            <input class="w-full bg-transparent" type="range" min="0" max="10" name="bloatingSymptoms" id="bloatingSymptoms" v-model="form.bloating_symptom">
            <div class="flex justify-between text-primary">
                <p>Excellent, none at all</p>
                <p>The worst, it has been awful</p>
            </div>
            <div v-if="form.errors.bloating_symptom">{{ form.errors.bloating_symptom }}</div>

        </div>

        <div>
            <label class="block mt-12 mb-1 text-lg text-center text-primary font-bold" for="discomfortSymptoms"> Abdominal Pain & Discomfort</label>
            <p class="text-secondary font-bold">{{form.discomfort_symptom}}/10</p>
            <input class="w-full bg-transparent" type="range" min="0" max="10" name="discomfortSymptoms" id="discomfortSymptoms" v-model="form.discomfort_symptom">
            <div class="flex justify-between text-primary">
                <p>Excellent, none at all</p>
                <p>The worst, it has been awful</p>
            </div>
            <div v-if="form.errors.discomfort_symptom">{{ form.errors.discomfort_symptom }}</div>
        </div>

        <div>
            <label class="block mt-12 mb-1 text-lg text-center text-primary font-bold" for="fatigueSymptoms"> Fatigue</label>
            <p class="text-secondary font-bold">{{form.fatigue_symptom}}/10</p>
            <input class="w-full bg-transparent" type="range" min="0" max="10" name="fatigueSymptoms" id="fatigueSymptoms" v-model="form.fatigue_symptom">
            <div class="flex justify-between text-primary">
                <p>Excellent, none at all</p>
                <p>The worst, it has been awful</p>
            </div>
            <div v-if="form.errors.fatigue_symptom">{{ form.errors.fatigue_symptom }}</div>
        </div>

        <div class="mb-12">
            <label class="block mt-12 mb-1 text-lg text-center text-primary font-bold" for="brainSymptoms"> Brain Fog</label>
            <p class="text-secondary font-bold">{{form.brain_symptom}}/10</p>
            <input class="w-full bg-transparent" type="range" min="0" max="10" name="fatigueSymptoms" id="brainSymptoms" v-model="form.brain_symptom">
            <div class="flex justify-between text-primary">
                <p>Excellent, none at all</p>
                <p>The worst, it has been awful</p>
            </div>
            <div v-if="form.errors.brain_symptom">{{ form.errors.brain_symptom }}</div>
        </div>

        <div class="flex justify-between">
            <button class="block gt-btn-back">Back</button>
            <button class="block gt-btn" type="submit">Submit</button>
        </div>

    </form>
</template>



