<template>
    <Pie class="pie-chart" :data="chartData" :options="chartOptions" :labels="labels" />
</template>

<script>
import { Pie } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, ArcElement } from 'chart.js'

// Register Chart.js components
ChartJS.register(Title, Tooltip, Legend, ArcElement);

export default {
    name: 'PieChart',
    components: {
        Pie,
    },
    props: {
        title: {
            type: String,
            required: true,
        },
        labels: {
            type: Array,
            required: true,
        },
        chartData: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            chartData: {
                labels: this.labels,
                datasets: [{
                    data: this.chartData,
                    backgroundColor: ['#E7823A', '#546E7A', '#F9A825', '#F9A825']
                }]
            },
            chartOptions: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: this.title,
                    },
                },
            },
        };

    },
};
</script>

<style scoped>
.pie-chart {
    max-width: 400px;
    margin: 0 auto;
}
</style>
