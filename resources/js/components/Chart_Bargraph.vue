<script setup>
import Chart from 'chart.js/auto'
import { onMounted } from 'vue';

function bargraph() {
    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [{
                label: '1 week Activity',
                data: [300, 190, 300, 500, 200, 300, 23],
                backgroundColor: [
                    'rgba(139,0,0)',
                    'rgba(165,42,42)',
                    'rgba(178,34,34)',
                    'rgba(220,20,60)',
                    'rgba(255,0,0)',
                    'rgba(255,99,71)',
                    'rgba(255,127,80)'
                ],
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

onMounted(() => {
    bargraph()
})
</script>

<template>
    <div>
        <canvas id="myChart"></canvas>
    </div>
</template>
<style scoped>
#myChart {
    max-height: 20rem;
}
</style>
