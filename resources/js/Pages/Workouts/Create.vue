<script setup>
import {Head, useForm} from '@inertiajs/vue3';
const props = defineProps({
    exercises: Array
});
const form = useForm({
    name: null,
    exercise_id: ''

});
const submit = () => {
    form.post(route('workouts.store'), {
        onFinish: () => form.reset('name', 'exercise_id')
    });
};

</script>

<template>
    <form @submit.prevent="submit">

        <label for="">Enter the name of the meal.</label>
        <input type="text" name="name" id="name" v-model="form.name">
        <select name="exercises" id="exercises" v-model="form.exercise_id">
            <option v-for="exercise in exercises" :key="exercise.id" :value="exercise.id">{{ exercise.name }}</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</template>



<style scoped>

</style>
