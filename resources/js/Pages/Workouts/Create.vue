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
        <form @submit.prevent="submit" class="container mt-5 p-4 border rounded bg-light">
            <div class="mb-3">
                <label for="name" class="form-label">Enter the name of the workout:</label>
                <input type="text" name="name" id="name" v-model="form.name" class="form-control">
            </div>

            <div v-for="(exercise_id, index) in form.exercise_ids" :key="index" class="mb-3">
                <select v-model="form.exercise_ids[index]" class="form-select">
                    <option value="" disabled>Select an exercise</option>
                    <option v-for="exercise in exercises" :key="exercise.id" :value="exercise.id">{{ exercise.name }}</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" @click="addSelect" class="btn btn-success">Add Exercise</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>

<style scoped>
.container {
    max-width: 600px;
}
</style>
