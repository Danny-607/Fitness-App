<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
const props = defineProps({
    exercises: Array,
    user: Object,
});

const form = useForm({
    name: null,
    exercise_ids: ['']
});

const addSelect = () => {
    form.exercise_ids.push('');
};

const submit = () => {
    form.post(route('workouts.store'), {
        onFinish: () => {
            form.reset('name');
            form.exercise_ids = [''];
        }
    });
};
</script>

<template>
    <AuthenticatedLayout :user="user">
        <form @submit.prevent="submit">
            <label for="name">Enter the name of the workout:</label>
            <input type="text" name="name" id="name" v-model="form.name">

            <div v-for="(exercise_id, index) in form.exercise_ids" :key="index">
                <select v-model="form.exercise_ids[index]">
                    <option value="" disabled>Select an exercise</option>
                    <option v-for="exercise in exercises" :key="exercise.id" :value="exercise.id">{{ exercise.name }}</option>
                </select>
            </div>

            <button type="button" @click="addSelect">Add Exercise</button>
            <button type="submit">Submit</button>
        </form>
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
