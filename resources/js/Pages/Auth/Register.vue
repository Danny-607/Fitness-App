<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    height: '',
    weight: '',
    date_of_birth: '',
    gender: '',
    activity_level: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <label for="first_name">Enter your first name</label>
            <input type="text" id="first_name" v-model="form.first_name">
            <label for="last_name">Enter your last name</label>
            <input type="text" id="last_name" v-model="form.last_name">
            <label for="email">Enter your email</label>
            <input type="email" id="email" v-model="form.email">
            <label for="password">Enter your password</label>
            <input type="password" id="password" v-model="form.password">
            <label for="password_confirmation">Confirm your password</label>
            <input type="password" id="password_confirmation" v-model="form.password_confirmation">
            <label for="height">Enter your height</label>
            <input type="number" id="height" v-model="form.height">
            <label for="weight">Enter your weight</label>
            <input type="number" id="weight" v-model="form.weight">
            <label for="date_of_birth">Enter your date of birth</label>
            <input type="date" id="date_of_birth" v-model="form.date_of_birth">
            <label for="activity_level">Enter your activity level</label>
            <select id="activity_level" v-model="form.activity_level">
                <option value="sedentary">Sedentary: Little to no exercise.</option>
                <option value="light">Light: Exercise 1-3 times per week</option>
                <option value="moderate">Moderate: Exercise 4-5 times per week</option>
                <option value="active">Active: Daily exercise or intense exercise 3-4 times per week</option>
                <option value="very_active">Very active: Intense exercise 6-7 times per week</option>
            </select>

            <label for="gender">Enter your gender</label>
            <select id="gender" v-model="form.gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <button type="submit">Register</button>
        </form>
    </GuestLayout>
</template>
