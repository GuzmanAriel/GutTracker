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
    </div>
</template>


<script setup>
import { ref, watch } from "vue";
import {Inertia} from "@inertiajs/inertia";
import EventCalendar from "../Components/EventCalendar";



let props = defineProps({
    meals: Object,
});

</script>


