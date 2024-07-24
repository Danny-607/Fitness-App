<script setup>
import {Head, useForm} from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
const props = defineProps({
    user: Object,
});
const form = useForm({
    name: null,
    reps: null,
    sets: null,
    rest: null,
    weight: null,

});
const submit = () => {
    form.post(route('exercises.store'), {
        onFinish: () => form.reset('name', 'reps', 'sets', 'rest', 'weight')
    });
};

</script>

<template>
    <AuthenticatedLayout :user="user">
        <form @submit.prevent="submit">

            <label for="">Enter the name of the exercise.</label>
            <input type="text" name="name" id="name" v-model="form.name">
            <label for="">How many reps for each set?</label>
            <input type="number" name="reps" id="reps" v-model="form.reps">
            <label for="">How many sets for the exercise?</label>
            <input type="number" name="sets" id="sets" v-model="form.sets">
            <label for="">How long of a rest between sets?</label>
            <input type="number" name="rest" id="rest" v-model="form.rest">
            <label for="">What weight should be used for the exercise?</label>
            <input type="number" name="weight" id="weight" v-model="form.weight">
            <button type="submit">Submit</button>
        </form>
    </AuthenticatedLayout>
</template>



<style scoped>

</style>
