<script setup>
import { ref, reactive } from 'vue'
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import listPlugin from '@fullcalendar/list'
import interactionPlugin from '@fullcalendar/interaction'
import SymptomForm from "./SymptomForm";

let props = defineProps({
    meals: Object,
    stools: Object,
    symptoms: Object,
});

const id = ref(10);

let modalToggle = ref(false)

let formType = ref('')
let symptomFormType = ref('')

let toggleOptions = ref(true)


let dateClickedOn = ref('');

let setDateClickedOn = (val) => {
    dateClickedOn.value = val;

    console.log(val);
}

let closeModal = () => {
    modalToggle.value = false;
    toggleOptions.value = true;
    formType.value = '';
}

let toggleVisibility = () => {
    toggleOptions.value = true;
    formType.value = '';
}

let chosenFormType = (val) => {
    formType.value = val;
    toggleOptions.value = false;
}

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
        setDateClickedOn(info.dateStr);
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

<template>
    <div>
        <FullCalendar v-bind:options="options"/>
        <div class="modal fixed z-10 left-0 top-0 w-full h-full light-bg pt-3.5 overflow-scroll" v-if="modalToggle">
            <div class="flex min-h-full items-end justify-center">
                <div class="modal-content bg-slate-50 m-auto w-4/5 rounded-md">
                    <span @click="closeModal" class="close float-right text-5xl font-bold text-primary cursor-pointer pr-4">&times;</span>
                    <div class="py-12 px-8 flex flex-col items-center">
                        <h1 class="text-2xl mb-5 font-bold text-primary">What would you like to add?</h1>
                        <div class="flex justify-center w-full text-center mt-8" v-if="toggleOptions">
                            <div class="w-1/3 cursor-pointer" @click="chosenFormType('symptoms')">
                                <div class="flex justify-center">
                                    <font-awesome-icon class="text-primary" icon="fa-regular fa-face-smile" size="4x"/>
                                    <font-awesome-icon class="text-primary" icon="fa-regular fa-face-frown" size="4x"/>
                                </div>
                                <p class="text-lg mt-2 text-primary">Add Symptoms</p>
                            </div>
                            <div class="w-1/3 cursor-pointer" @click="chosenFormType('meal')">
                                <font-awesome-icon class="text-primary" icon="fa-solid fa-utensils" size="4x"/>
                                <p class="text-lg mt-2 text-primary">Add Meal</p>
                            </div>
                            <div class="w-1/3 justify-center cursor-pointer" @click="chosenFormType('stool')">
                                <font-awesome-icon class="text-primary" icon="fa-solid fa-poop" size="4x"/>
                                <p class="text-lg mt-2 text-primary">Add Stool</p>
                            </div>

                        </div>

                        <div v-if="formType === 'symptoms'" class="max-w-lg w-full">
                            <SymptomForm :symptoms="symptoms" @toggle-visiblity="toggleVisibility" :toggleOptions="toggleOptions" @close-modal="closeModal" :modalToggle="modalToggle"/>
                        </div>
                        <div v-else-if="formType === 'meal'">Meals</div>
                        <div v-else-if="formType === 'stool'">Stool</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

