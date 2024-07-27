<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps} from 'vue';
const props = defineProps({
    workout: Object,
    user: Object,
});


</script>

<template>
    <AuthenticatedLayout :user="user">
        <div class="container mt-5">
            <div>
                <h1>{{ workout.name }}</h1>
                <table class="table table-striped mt-4">
                    <thead>
                        <tr>
                            <th scope="col">Exercise</th>
                            <th scope="col">Sets</th>
                            <th scope="col">Reps</th>
                            <th scope="col">Rest (seconds)</th>
                            <th scope="col">Weight (kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="exercise in workout.exercises" :key="exercise.id">
                            <td>{{ exercise.name }}</td>
                            <td>{{ exercise.pivot.sets }}</td>
                            <td>{{ exercise.pivot.reps }}</td>
                            <td>{{ exercise.pivot.rest }}</td>
                            <td>{{ exercise.pivot.weight }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Your component styles go here */
</style>
