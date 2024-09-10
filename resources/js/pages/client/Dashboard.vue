<script setup>
import Header from '@/components/Client_Header.vue'
</script>

<template>
   <Header/>
   <main>
    <section id="home-section" >
        <h1>K-Personal finance manager</h1>
        <h2>from@kielbermudez200104@gmail.com</h2>
        <div class="get-started text-center">
            <button>Get Started</button>
        </div>
    </section>
   </main>
</template>

<style scoped>

:root{
    --background-color: #F6E8DF;
    --bold-font-color: #013237;
    --button-color: #FE979C;
}

#home-section {
    background-image: url('/public/image/building-bg.jpg');
    width: 100%;
    height: 55.4rem;
    display: grid;
    justify-content: center;
    align-items: center;
    align-content: center;
    gap:20px;
}
#home-section h1 {
    color: white;
    font-weight: 700;
    text-transform:uppercase;
    
}
#home-section h2{
    color:White;
    font-weight: 600;
    font-size: smaller;
    text-align: center;
}
#home-section .get-started button{
    background-color: black;
    color: white;
    border:none;
    border-radius: 10px;
    padding:10px;
    font-weight: 600;
}
</style>
