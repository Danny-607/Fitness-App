<script setup>
import {Head, useForm} from '@inertiajs/vue3';
const form = useForm({
    name: null,
    calories: null,
    protein: null,
    carbohydrates: null,
    fat: null,
    sugar: null

});
const submit = () => {
    form.post(route('meals.store'), {
        onFinish: () => form.reset('name', 'calories', 'protein', 'carbohydrates', 'sugar', 'fat')
    });
};

</script>

<template>
    <form @submit.prevent="submit">

        <label for="">Enter the name of the meal.</label>
        <input type="text" name="name" id="name" v-model="form.name">
        <label for="">How many calories are in the meal?</label>
        <input type="number" name="calories" id="calories" v-model="form.calories">
        <label for="">How much protein is in the meal?</label>
        <input type="number" name="protein" id="protein" v-model="form.protein">
        <label for="">How many carbohydrates are in the meal?</label>
        <input type="number" name="carbohydrates" id="carbohydrates" v-model="form.carbohydrates">
        <label for="">How much sugar is in the meal?</label>
        <input type="number" name="sugar" id="sugar" v-model="form.sugar">
        <label for="">How much fat is in the meal?</label>
        <input type="number" name="fat" id="fat" v-model="form.fat">
        <button type="submit">Submit</button>
    </form>
</template>



<style scoped>

</style>
