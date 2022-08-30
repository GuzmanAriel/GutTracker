<template>
    <Head title="Calendar" />

    <h1 class="text-3xl">
        Calendar
    </h1>
    <EventCalendar/>
    <div class="ariel">
        <div class="mt-8" v-for="meal in meals" :key="meal.id">
            <p>{{ meal.description }}</p>
            <p>{{ meal.meal_time }}</p>
        </div>

        <div class="mt-8" v-for="stool in stools" :key="stool.id">
            <p>{{ stool.stool_symptom }}</p>
            <p>{{ stool.stool_time }}</p>
        </div>

        <div class="mt-8" v-for="overallSymptom in overallSymptoms" :key="overallSymptom.id">
            <p>{{ overallSymptom.overall_symptom }}</p>
            <p>{{ overallSymptom.overall_symptom_time }}</p>
        </div>
    </div>
</template>


<script setup>
import { ref, watch } from "vue";
import {Inertia} from "@inertiajs/inertia";
import EventCalendar from "../Components/EventCalendar";



let props = defineProps({
    meals: Object,
    stools: Object,
    overallSymptoms: Object
});

</script>


