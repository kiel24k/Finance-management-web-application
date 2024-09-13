<script setup>
import Chart from 'chart.js/auto'
import { onMounted } from 'vue';

function lineChart() {
    const ctx = document.getElementById('linechart')
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Monday', 'dsdasdsa', 'dasdsad', 'dasdas', 'dasd'],
            datasets: [{
                label: 'haha',
                data: [32, 323, 232, 32, 32],
                fill: true
            }],
        }
    })
}

onMounted(() => {
  lineChart()
})
</script>

<template>
    <canvas id="linechart"></canvas>
</template>

<style scoped>
#linechart{
    max-height: 30rem;
}
    
</style>