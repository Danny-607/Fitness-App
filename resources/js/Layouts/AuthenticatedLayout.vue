<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
    user: Object,
});
const form = useForm({});
const logout = () => {
    form.post(route('logout'));
};
</script>

<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="navbar-nav">
                <Link class="nav-link" :href="route('dashboard')">Dashboard</Link>
                <Link class="nav-link" :href="route('meals.create')">Create meal</Link>
                <Link class="nav-link" :href="route('workouts.create')">Create workout</Link>
                <Link class="nav-link" :href="route('exercises.create')">Create exercise</Link>
            </div>
            <div class="ml-auto d-flex align-items-center">
                <span class="mr-3 font-weight-bold">{{ props.user.first_name }} {{ props.user.last_name }}</span>
                <button @click="logout" class="btn btn-danger">Logout</button>
            </div>
        </div>
    </nav>
    <slot />
</template>

<style scoped>
/* Custom styles can be added here if needed */
</style>
