<script setup>
import Sidebar from '@/components/Client_Sidebar.vue'
import Header from '@/components/Client_Header.vue'
import Bargraph from '@/components/Chart_Bargraph.vue'
import Linegraph from '@/components/Chart_Line.vue'
import { ref } from 'vue';



</script>

<template>
    <Header @userID="userID" />
    <section id="section-one">
        <div class="row mt-2 overview">
            <div class="col">
                <h1>Overview</h1>
            </div>
            <div class="col text-end">
                <div class="balance">
                    <h1>$5,343</h1>
                </div>
            </div>
        </div>
    </section>

    <section id="section-two">
        <div class="row">
            <div class="col">
                <Bargraph />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <Linegraph />
            </div>
        </div>
    </section>
</template>

<style scoped>
section {
    width: 90%;
    margin: auto;
}

#section-one h1 {
    color: var(--bold-font-color);
    font-weight: 600;
    font-size: 20;
}

.overview {
    background-color: rgb(250, 249, 249);
    height: 5rem;
    display: flex;
    align-items: center;
}

.balance {}
</style>