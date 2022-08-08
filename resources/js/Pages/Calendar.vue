<template>
    <Head title="Calendar" />

    <h1 class="text-3xl">
        Calendar
    </h1>

    <div class="ariel">
        hello
        <div class="mt-8" v-for="meal in meals" :key="meal.id">
            <p>{{ meal.description }}</p>
            <p>{{ meal.meal_time }}</p>
        </div>
    </div>
</template>

<script setup>
import { ref, watch } from "vue";
import {Inertia} from "@inertiajs/inertia";

let props = defineProps({
    meals: Object,
});




</script>
