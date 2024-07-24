<template>
    <Pie class="pie-chart" :data="computedChartData" :options="chartOptions" :width="size" :height="size"/>
</template>

<script>
import { Pie } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, ArcElement } from 'chart.js'

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
        size: {
            type: Number,
            default: 400,
        },
    },
    computed: {
        computedChartData() {
            return {
                labels: this.labels,
                datasets: [{
                    data: this.chartData,
                    backgroundColor: ['#E7823A', '#546E7A', '#F9A825', '#F9A825']
                }]
            };
        },
    },
    data() {
        return {
            chartOptions: {
                responsive: false,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
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
    max-width: 100%;
    margin: 0 auto;
}
</style>
