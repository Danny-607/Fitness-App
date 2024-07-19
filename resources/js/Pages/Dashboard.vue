<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PieChart from '@/Components/PieChart.vue';
import {Head, useForm} from '@inertiajs/vue3';

const props = defineProps({
    dailyMeals: Object,
    meals: Array,
});

let mealData = [];

for(let i = 0; i < props.dailyMeals.length; i++) {
    mealData.push(props.dailyMeals[i].meal);
}

const caloriesData = []
const proteinData = []
const carbsData = []
const fatsData = []
const sugarsData = []

for(let i = 0; i < mealData.length; i++) {
    caloriesData.push(mealData[i].calories);
    proteinData.push(mealData[i].protein);
    carbsData.push(mealData[i].carbohydrates);
    fatsData.push(mealData[i].fat);
    sugarsData.push(mealData[i].sugar);
}
const form = useForm({

    meal_id: '',


});
const submit = () => {
    form.post(route('dailymeals.store'), {
        onFinish: () => form.reset('meal')
    });
};

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div>
        <h1>Dashboard</h1>

        <section class="macro-nutrients">

        <h2>Calorie budget</h2>
        <PieChart title="Calories" :labels="labels" :chartData="caloriesData"/>
        </section>
        <section>
            <div>
                <h2>Protein</h2>
                <PieChart title="Protein" :labels="labels" :chartData="proteinData"/>
            </div>
            <div>
                <h2>Carbohydrates</h2>
                <PieChart title="Carbohydrates" :labels="labels" :chartData="carbsData"/>
            </div>
            <div>
                <h2>Fats</h2>
                <PieChart title="Fats" :labels="labels" :chartData="fatsData"/>
            </div>
            <div>
                <h2>Sugars</h2>
                <PieChart title="Sugars" :labels="labels" :chartData="sugarsData"/>
            </div>

            <form @submit="submit">

            <label for="">Add a new meal</label>
            <select name="meal" id="meal" v-model="form.meal_id">
                <option v-for="meal in meals" :key="meal.id" :value="meal.id">{{ meal.name }}</option>
            </select>


            <button type="submit">Submit</button>
            </form>
        </section>
    </div>
    </AuthenticatedLayout>
</template>
