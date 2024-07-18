<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PieChart from '@/Components/PieChart.vue';

const props = defineProps({
    dailyMeals: Object,
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
console.log(sugarsData);
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

        </section>
    </div>
    </AuthenticatedLayout>
</template>
