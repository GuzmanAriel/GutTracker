<template>
    <FullCalendar v-bind:options="options"/>
    <div class="modal fixed z-10 left-0 top-0 w-full h-full light-bg pt-3.5" v-if="modalToggle">
        <div class="flex min-h-full items-end justify-center">
            <div class="modal-content bg-slate-50 m-auto w-4/5 rounded-md">
                <div class="py-12 px-8 flex flex-col items-center">
                    <h1 class="text-2xl mb-5">What would you like to add?</h1>
                    <div class="flex justify-center w-full text-center">
                        <div class="w-1/3">
                            <div class="flex justify-center">
                                <font-awesome-icon icon="fa-regular fa-face-smile" size="4x"/>
                                <font-awesome-icon icon="fa-regular fa-face-frown" size="4x"/>
                            </div>

                            <p class="text-lg mt-2">Add Symptoms</p>
                        </div>
                        <div class="w-1/3">
                            <font-awesome-icon icon="fa-solid fa-utensils" size="4x" />
                            <p class="text-lg mt-2">Add Meal</p>
                        </div>
                        <div class="w-1/3 justify-center">
                            <font-awesome-icon icon="fa-solid fa-poop" size="4x"/>
                            <p class="text-lg mt-2">Add Stool</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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

let modalToggle = ref(false);

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
        modalToggle.value = true;
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
