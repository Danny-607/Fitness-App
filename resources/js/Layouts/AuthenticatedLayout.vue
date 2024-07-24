<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { defineProps, provide } from 'vue';

const props = defineProps({
    user: Object,
});
const form = useForm({});
const logout = () => {
    form.post(route('logout'));
};
</script>

<template>
        <nav>
        <div class="nav-left">
            <Link :href="route('dashboard')">Dashboard</Link>
            <Link :href="route('meals.create')">Create meal</Link>
            <Link :href="route('workouts.create')">Create workout</Link>
            <Link :href="route('exercises.create')">Create exercise</Link>
        </div>
        <div class="nav-right">
            <span class="user-name">{{ props.user.first_name }} {{ props.user.last_name }}</span>
            <button @click="logout" class="logout-button">Logout</button>
        </div>
    </nav>
    <slot />

</template>

<style scoped>
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f8f9fa;
    padding: 10px 20px;
}

.nav-left {
    display: flex;
    gap: 15px;
}

nav a {
    text-decoration: none;
    color: #333;
    padding: 5px 10px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

nav a:hover {
    background-color: #007bff;
    color: white;
    border-radius: 4px;
}

.nav-right {
    display: flex;
    align-items: center;
}

.user-name {
    font-weight: bold;
    color: #333;
}
.logout-button {
    background-color: #ff4d4d;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 5px 10px;
    cursor: pointer;
    margin-left: 10px;
    transition: background-color 0.3s ease;
}

.logout-button:hover {
    background-color: #cc0000;
}

</style>
