<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link} from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
    user: Object,
    workouts: Array,
});

console.log(props.user);
</script>

<template>
    <AuthenticatedLayout :user="user">
        <div class="container mt-5">
            <div class="row">
                <div v-for="(workout, index) in props.workouts" :key="index" class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ workout.name }}</h5>
                            <p class="card-text">Exercises:</p>
                            <ul class="list-group list-group-flush">
                                <li v-for="exercise in workout.exercises" :key="exercise.id" class="list-group-item">{{ exercise.name }}</li>
                            </ul>
                            <Link :href="route('workouts.show', workout.id)" class="btn btn-primary mt-3">Dashboard</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
/* Your component styles go here */
</style>
