<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const props = defineProps({
    user: Object,
});
const form = useForm({
    name: null,
    calories: null,
    protein: null,
    carbohydrates: null,
    fat: null,
    sugar: null,
});
const submit = () => {
    form.post(route('meals.store'), {
        onFinish: () => form.reset('name', 'calories', 'protein', 'carbohydrates', 'sugar', 'fat')
    });
};
</script>

<template>
    <AuthenticatedLayout :user="user">
        <form @submit.prevent="submit" class="container mt-5 p-4 border rounded bg-light">

            <div class="mb-3">
                <label for="name" class="form-label">Enter the name of the meal</label>
                <input type="text" name="name" id="name" v-model="form.name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="calories" class="form-label">How many calories are in the meal?</label>
                <input type="number" name="calories" id="calories" v-model="form.calories" class="form-control">
            </div>

            <div class="mb-3">
                <label for="protein" class="form-label">How much protein is in the meal?</label>
                <input type="number" name="protein" id="protein" v-model="form.protein" class="form-control">
            </div>

            <div class="mb-3">
                <label for="carbohydrates" class="form-label">How many carbohydrates are in the meal?</label>
                <input type="number" name="carbohydrates" id="carbohydrates" v-model="form.carbohydrates" class="form-control">
            </div>

            <div class="mb-3">
                <label for="sugar" class="form-label">How much sugar is in the meal?</label>
                <input type="number" name="sugar" id="sugar" v-model="form.sugar" class="form-control">
            </div>

            <div class="mb-3">
                <label for="fat" class="form-label">How much fat is in the meal?</label>
                <input type="number" name="fat" id="fat" v-model="form.fat" class="form-control">
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
