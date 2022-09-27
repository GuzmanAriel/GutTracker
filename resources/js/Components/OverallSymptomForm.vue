<script setup>
let props = defineProps({
    overallSymptoms: Object
});

let form = useForm(props.overallSymptoms);
let submitForm = () => {
    form.post(route("save.overallSymptoms"), {
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
    <form id="overall-symptoms" name="overall-symptoms" @submit.prevent="submitForm" class="flex flex-wrap">

    </form>
</template>



