<script setup>
import { ref, watch } from "vue";
import {Inertia} from "@inertiajs/inertia";
import EventCalendar from "../Components/EventCalendar";



let props = defineProps({
    meals: Object,
    stools: Object,
    symptoms: Object,
});

</script>
<template>
    <Head title="Calendar" />

    <h1 class="text-3xl">
        Calendar
    </h1>
    <EventCalendar :symptoms="symptoms"/>
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

        <div v-for="symptom in symptoms" :key="symptom.id">
            <h3 class="mt-8 font-bold">Overall Symptoms</h3>
            <p>{{ symptom.overall_symptom }}</p>
            <p>{{ symptom.symptom_time }}</p>

            <h3 class="mt-8 font-bold">Overall Abdominal Symptoms</h3>
            <p>{{ symptom.abdominal_symptom }}/10</p>

            <h3 class="mt-8 font-bold">Abdominal Pain and Discomfort Symptoms</h3>
            <p>{{ symptom.discomfort_symptom }}/10</p>

            <h3 class="mt-8 font-bold">Abdominal Bloating Symptoms</h3>
            <p>{{ symptom.bloating_symptom }}/10</p>

            <h3 class="mt-8 font-bold">Brain Fog</h3>
            <p>{{ symptom.brain_symptom }}/10</p>

            <h3 class="mt-8 font-bold">Fatigue Symptoms</h3>
            <p>{{ symptom.fatigue_symptom }}/10</p>
        </div>
    </div>
</template>


