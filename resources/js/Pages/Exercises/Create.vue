<script setup>
import {useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


const props = defineProps({
    user: Object,
    workouts: Array,
});

const form = useForm({
    workout_id: null,
    name: null,
    reps: null,
    sets: null,
    rest: null,
    weight: null,
});

const submit = () => {
    form.post(route('exercises.store'), {
        onFinish: () => form.reset('workout_id', 'name', 'reps', 'sets', 'rest', 'weight')
    });
};
</script>

<template>
    <AuthenticatedLayout :user="user">
        <form @submit.prevent="submit" class="container mt-5 p-4 border rounded bg-light">
            <div class="mb-3">
                <label for="workout_id" class="form-label">Select a workout:</label>
                <select name="workout_id" id="workout_id" v-model="form.workout_id" class="form-select">
                    <option v-for="workout in props.workouts" :key="workout.id" :value="workout.id">{{ workout.name }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Enter the name of the exercise:</label>
                <input type="text" name="name" id="name" v-model="form.name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="reps" class="form-label">How many reps for each set?</label>
                <input type="number" name="reps" id="reps" v-model="form.reps" class="form-control">
            </div>

            <div class="mb-3">
                <label for="sets" class="form-label">How many sets for the exercise?</label>
                <input type="number" name="sets" id="sets" v-model="form.sets" class="form-control">
            </div>

            <div class="mb-3">
                <label for="rest" class="form-label">How long of a rest between sets?</label>
                <input type="number" name="rest" id="rest" v-model="form.rest" class="form-control">
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">What weight should be used for the exercise?</label>
                <input type="number" name="weight" id="weight" v-model="form.weight" class="form-control">
            </div>

            <div class="d-flex justify-content-end">
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
