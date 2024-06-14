<template>
    <div class="container mx-auto p-6">
      <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
      <h2 class="text-xl font-bold mb-6">Test {{ user.name }}</h2>
      <div v-for="dailyMeal in dailyMeals" :key="dailyMeal.id">
      <h3>{{ dailyMeal.meal.name }}</h3>
    </div>
    <div v-for="exercise in exercises" :key="exercise.id">
      <h3>{{ exercise.name }}</h3>
    </div>
    <div v-for="workout in workouts" :key="workout.id">
      <h3>{{ workout.name }}</h3>
    </div>

    </div>


  </template>

  <script>
  export default {
    props: {
      user: Object,
      dailyMeals: Array,
      exercises: Array,
      workouts: Array,
    },
    mounted() {
      console.log(this.user);
      console.log(this.dailyMeals);
      console.log(this.exercises);
      console.log(this.workouts);
    },
  };
  </script>

  <style scoped>
  .container {
    max-width: 1200px;
    margin: 0 auto;
  }

  .grid {
    gap: 20px;
  }

  .shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .rounded {
    border-radius: 8px;
  }

  .p-4 {
    padding: 16px;
  }
  </style>
