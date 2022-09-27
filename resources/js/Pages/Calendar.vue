<script setup>
import { ref, watch } from "vue";
import {Inertia} from "@inertiajs/inertia";
import EventCalendar from "../Components/EventCalendar";



let props = defineProps({
    meals: Object,
    stools: Object,
    overallSymptoms: Object,
    abdominalSymptoms: Object,
    bloatingSymptoms: Object,
    brainSymptoms: Object,
    discomfortSymptoms: Object,
    fatigueSymptoms: Object,
});

</script>
<template>
    <Head title="Calendar" />

    <h1 class="text-3xl">
        Calendar
    </h1>
    <EventCalendar :overallSymptoms="overallSymptoms"/>
    <div>
        <h3 class="mt-8 font-bold">Meals</h3>
        <div v-for="meal in meals" :key="meal.id">
            <p>{{ meal.description }}</p>
            <p>{{ meal.meal_time }}</p>
        </div>

        <h3 class="mt-8 font-bold">Stool</h3>
        <div v-for="stool in stools" :key="stool.id">
            <p>{{ stool.stool_symptom }}</p>
            <p>{{ stool.stool_time }}</p>
        </div>

        <h3 class="mt-8 font-bold">Overall Symptoms</h3>
        <div v-for="overallSymptom in overallSymptoms" :key="overallSymptom.id">
            <p>{{ overallSymptom.overall_symptom }}</p>
            <p>{{ overallSymptom.overall_symptom_time }}</p>
        </div>
        <h3 class="mt-8 font-bold">Abdominal Symptoms</h3>
        <div v-for="abdominalSymptom in abdominalSymptoms" :key="abdominalSymptom.id">
            <p>{{ abdominalSymptom.abdominal_symptom }}/10</p>
            <p>{{ abdominalSymptom.abdominal_symptom_time }}</p>
        </div>

        <h3 class="mt-8 font-bold">Bloating Symptoms</h3>
        <div v-for="bloatingSymptom in bloatingSymptoms" :key="bloatingSymptom.id">
            <p>{{ bloatingSymptom.bloating_symptom }}/10</p>
            <p>{{ bloatingSymptom.bloating_symptom_time }}</p>
        </div>

        <h3 class="mt-8 font-bold">Brain Fog</h3>
        <div v-for="brainSymptom in brainSymptoms" :key="brainSymptom.id">
            <p>{{ brainSymptom.brain_symptom }}/10</p>
            <p>{{ brainSymptom.brain_symptom_time }}</p>
        </div>

        <h3 class="mt-8 font-bold">Discomfort Symptoms</h3>
        <div v-for="discomfortSymptom in discomfortSymptoms" :key="discomfortSymptom.id">
            <p>{{ discomfortSymptom.discomfort_symptom }}/10</p>
            <p>{{ discomfortSymptom.discomfort_symptom_time }}</p>
        </div>

        <h3 class="mt-8 font-bold">Fatigue Symptoms</h3>
        <div v-for="fatigueSymptom in fatigueSymptoms" :key="fatigueSymptom.id">
            <p>{{ fatigueSymptom.fatigue_symptom }}/10</p>
            <p>{{ fatigueSymptom.fatigue_symptom_time }}</p>
        </div>
    </div>
</template>


