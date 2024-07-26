<script setup>
import PieChart from '@/Components/PieChart.vue';
import { Head, useForm } from '@inertiajs/vue3';
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

const caloriesData = [];
const proteinData = [];
const carbsData = [];
const fatsData = [];
const sugarsData = [];

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
        <div class="container mt-5">
            <section class="macro-nutrients mb-4">
                <h2 class="text-center">Calorie budget</h2>
                <PieChart title="Calories" :labels="labels" :chartData="caloriesData" :size="400" />
                <p id="calories-stats"></p>
                <div class="d-flex justify-content-center">
                    <button @click="openModal" class="btn btn-primary mt-3">Add a new meal</button>
                </div>
            </section>

            <section class="macro-nutrients row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <PieChart title="Protein" :labels="labels" :chartData="proteinData" :size="300" />
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <PieChart title="Carbohydrates" :labels="labels" :chartData="carbsData" :size="300" />
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <PieChart title="Fats" :labels="labels" :chartData="fatsData" :size="300" />
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <PieChart title="Sugars" :labels="labels" :chartData="sugarsData" :size="300" />
                </div>
            </section>

            <div v-if="showModal" class="modal fade show d-block " tabindex="-1" role="dialog" style="background-color: rgba(0,0,0,0.5);">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <label for="meal" class="modal-title">Add a new meal</label>
                            <button type="button" class="btn-close" @click="closeModal"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit="submit">
                                <div class="mb-3">
                                    <select name="meal" id="meal" v-model="form.meal_id" class="form-select">
                                        <option v-for="meal in meals" :key="meal.id" :value="meal.id">{{ meal.name }}</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.modal.fade.show.d-block {
    display: flex !important;
    align-items: center;
    justify-content: center;
}
</style>
