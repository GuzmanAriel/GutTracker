<template>
    <FullCalendar v-bind:options="options"/>
</template>

<script setup>
import { ref, reactive } from 'vue'
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import listPlugin from '@fullcalendar/list'
import interactionPlugin from '@fullcalendar/interaction'

const id = ref(10);

const options = reactive({
    plugins: [
        dayGridPlugin,
        timeGridPlugin,
        listPlugin,
        interactionPlugin
    ],
    initialView: 'timeGridDay',
    headerToolbar: {
        left: 'dayGridMonth, dayGridWeek, dayGridDay',
        center: 'title',
        right: 'today prev,next'
    },
    editable: true,
    selectable: true,
    dateClick: function(info) {
        console.log(info);
    }
   /* select: (arg) => {
        id.value = id.value + 1;
        const cal = arg.view.calendar;

        cal.unselect()

        cal.addEvent({
            id: `${id.value}`,
            title: `New Event ${id.value}`,
            start: arg.start,
            end: arg.end,
            allDay: true
        })
    },
    eventClick: (arg) => {
        console.log(arg.event.title);
    }*/
})

</script>
