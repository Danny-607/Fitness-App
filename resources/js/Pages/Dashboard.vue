<script setup>
import PieChart from '@/Components/PieChart.vue';
import { Head, useForm } from '@inertiajs/vue3';
import NavBar from '@/Components/NavBar.vue';
import { defineProps, ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

let labels = [];
const props = defineProps({
    dailyMeals: Object,
    meals: Array,
    user: Object,
});
let mealData = [];

for (let i = 0; i < props.dailyMeals.length; i++) {
    mealData.push(props.dailyMeals[i].meal);
}

const caloriesData = []
const proteinData = []
const carbsData = []
const fatsData = []
const sugarsData = []

for (let i = 0; i < mealData.length; i++) {
    caloriesData.push(mealData[i].calories);
    proteinData.push(mealData[i].protein);
    carbsData.push(mealData[i].carbohydrates);
    fatsData.push(mealData[i].fat);
    sugarsData.push(mealData[i].sugar);
    labels.push(mealData[i].name);
}

const form = useForm({
    meal_id: '',
});

const submit = () => {
    form.post(route('dailymeals.store'), {
        onFinish: () => form.reset('meal')
    });
};

const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout :user="user">
    <div>

        <h1>Dashboard</h1>

        <section class="macro-nutrients">
            <h2>Calorie budget</h2>
            <PieChart title="Calories" :labels="labels" :chartData="caloriesData" :size="400" />
            <p id="calories-stats"></p>
        <button @click="openModal" class="open-modal-button">Add a new meal</button>

        </section>

        <section class="macro-nutrients smaller-charts">
            <PieChart title="Protein" :labels="labels" :chartData="proteinData" :size="300" />
            <PieChart title="Carbohydrates" :labels="labels" :chartData="carbsData" :size="300" />
            <PieChart title="Fats" :labels="labels" :chartData="fatsData" :size="300" />
            <PieChart title="Sugars" :labels="labels" :chartData="sugarsData" :size="300" />
        </section>


        <div v-if="showModal" class="modal-overlay">
            <div class="modal">
                <span class="close-button" @click="closeModal">&times;</span>
                <form @submit="submit">
                    <label for="meal">Add a new meal</label>
                    <select name="meal" id="meal" v-model="form.meal_id">
                        <option v-for="meal in meals" :key="meal.id" :value="meal.id">{{ meal.name }}</option>
                    </select>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</AuthenticatedLayout>
</template>

<style scoped>
.macro-nutrients {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;

}

.macro-nutrients.smaller-charts {
    flex-direction: row;
    justify-content: space-around;
    width: 100%;
    max-width: 100vw;
}

.open-modal-button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.open-modal-button:hover {
    background-color: #0056b3;
}

.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 300px;
    position: relative;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 24px;
    color: #aaa;
}

.close-button:hover {
    color: #000;
}
</style>
