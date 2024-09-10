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

    <section id="section-one">
        <article>
            <figure>
                <img src="/public/image/vektor1.png" width="500" alt="">
            </figure>
            <figcaption>
                <span>
                    Expand your spendings in a proper way
                </span>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, dolore pariatur adipisci, placeat consectetur neque maiores exercitationem repudiandae quibusdam non commodi voluptatem, aperiam ipsa error

                    h1dasdasd
                </p>
            </figcaption>
        </article>

        <article>
            <figcaption>
                <span>
                    Keep your information track!
                </span>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, dolore pariatur adipisci, placeat consectetur neque maiores exercitationem repudiandae quibusdam non commodi voluptatem, aperiam ipsa error
                </p>
            </figcaption>
            <figure>
                <img src="/public/image/vektor2.png" height="250" width="450" alt="">
            </figure>
        </article>
        
      
    </section>
   </main>
</template>

<style scoped>



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
#section-one{
    width: 100%;
    height: 55.5rem;
    background-color:var(--background-color);
}
#section-one {
   display: grid;
   justify-content: center;
   align-content: center;
   gap:4rem;
   align-items: center;
}
#section-one article{
    min-width: 80%;
    display: flex;
    gap:5rem;
    align-content: center;
    justify-content: center;
}

#section-one figcaption{
    width: 20rem;
    
}
#section-one figcaption span{
    font-size: 25px;
    color:var(--bold-font-color);
    font-weight: 700;
}
#section-one figure img{
    border-radius: 25px;
   
}
</style>
