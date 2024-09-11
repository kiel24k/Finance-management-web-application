<script setup>
import Header from '@/components/Client_Header.vue'
</script>

<template>
    <Header />
    <main>
        <section id="home-section">
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

                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, dolore pariatur adipisci, placeat
                        consectetur neque maiores exercitationem repudiandae quibusdam non commodi voluptatem, aperiam
                        ipsa error
                    </p>
                </figcaption>
            </article>

            <article>
                <figcaption>
                    <span>
                        Keep your information track!
                    </span>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, dolore pariatur adipisci, placeat
                        consectetur neque maiores exercitationem repudiandae quibusdam non commodi voluptatem, aperiam
                        ipsa error
                    </p>
                </figcaption>
                <figure>
                    <img src="/public/image/vektor2.png" height="250" width="450" alt="">
                </figure>
            </article>
        </section>

        <section id="section-two">
            <div class="title">
                <span>Everything you need to manage </span>
                <span>and control global spend</span>
            </div>
            <div class="content">
                <article>
                    <figure>
                        <img src="/public/image/pie-chart.webp" alt="">
                    </figure>
                    <figcaption>
                        <span>Accounts payable & purchase orders</span>
                        <p>end to end accounts payable software including ourchase orders, invoise
                        </p>
                        <b>
                            <a href="">Learn more</a>
                        </b>
                    </figcaption>
                </article>
                <article>
                    <figure>
                        <img src="/public/image/bar-graph.png" alt="">
                    </figure>
                    <figcaption>
                        <span>all your spend platform</span>
                        <p> Automate your most tedious tasks like manual data entry, connecting mistakes</p>
                        <b>
                            <a href="">Learn more</a>
                        </b>
                    </figcaption>
                </article>
                <article>
                    <figure>
                        <img src="/public/image/shopping.png" alt="">
                    </figure>
                    <figcaption>
                        <span>dedicated in multiple currencies</span>
                        <p>Dedicated in multiple currencies safeguarding of funds in line with PSD2</p>
                        <b>
                            <a href="">Learn more </a>
                        </b>
                    </figcaption>
                </article>
            </div>
        </section>

        <section id="section-three">
            <article>
                <figcaption>
                    <h2 class="mb-5">Here to help you 24/7</h2>
                    <span>
                        <img src="/public/image/check-mark.png" alt="">
                        <p>Access expert support whenever you need it via live chat and email</p>
                    </span>
                    <span>
                        <img src="/public/image/check-mark.png" alt="">
                        <p>Access expert support whenever you need it via live chat and email</p>
                    </span>
                    <span>
                        <img src="/public/image/check-mark.png" alt="">
                        <p>Access expert support whenever you need it via live chat and email</p>
                    </span>
                    <span>
                        <img src="/public/image/check-mark.png" alt="">
                        <p>Access expert support whenever you need it via live chat and email</p>
                    </span>
                    <span>
                        <img src="/public/image/check-mark.png" alt="">
                        <p>Access expert support whenever you need it via live chat and email</p>
                    </span>
                    <span>
                        <img src="/public/image/check-mark.png" alt="">
                        <p>Access expert support whenever you need it via live chat and email</p>
                    </span>
                </figcaption>
                <figure>
                    <img src="/public/image/contact-us-vektor.png" alt="">
                </figure>
            </article>
        </section>
    </main>
</template>

<style scoped>
#home-section {
    background-image: url('/public/image/building-bg.jpg');
    width: 100%;
    min-height: var(--section-min-height);
    display: grid;
    justify-content: center;
    align-items: center;
    align-content: center;
    gap: 20px;
}

#home-section h1 {
    color: white;
    font-weight: 700;
    text-transform: uppercase;

}

#home-section h2 {
    color: White;
    font-weight: 600;
    font-size: smaller;
    text-align: center;
}

#home-section .get-started button {
    background-color: black;
    color: white;
    border: none;
    border-radius: 10px;
    padding: 10px;
    font-weight: 600;
}

#section-one {
    width: 100%;
    min-height: var(--section-min-height);
    display: grid;
    justify-content: center;
    align-content: center;
    gap: 4rem;
    align-items: center;
}

#section-one article {
    min-width: 80%;
    display: flex;
    gap: 5rem;
    align-content: center;
    justify-content: center;
}

#section-one figcaption {
    width: 20rem;

}

#section-one figcaption span {
    font-size: 25px;
    color: var(--bold-font-color);
    font-weight: 700;
}

#section-one figure img {
    border-radius: 25px;

}

#section-two {
    height: var(--section-min-height);
    width: 100%;
    display: grid;
    justify-content: center;
    align-content: center;
    gap: 50px;
}

#section-two .title {
    text-align: center;
    font-weight: 700;
    font-size: 40px;
    color: var(--bold-font-color);
    display: grid;
}

#section-two article {
    max-width: 20.6rem;
    box-shadow: 0px 0px 3px 0px gray;
    padding: 20px;
    border-radius: 15px;
}

#section-two figure {
    height: 12rem;
    display: grid;
    justify-content: center;
    align-items: center;
}

#section-two figure img {
    width: 250px;
}

#section-two .content {
    min-width: 10rem;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

#section-two figcaption {
    display: grid;
    gap: 20px;

}

#section-two figcaption span {
    color: var(--bold-font-color);
    font-weight: 600;
    font-size: 20px;
    text-transform: capitalize;
}

#section-two figcaption p {
    color: gray;
}

#section-three {
    height: var(--section-min-height);
    display: grid;
    justify-content: center;
}

#section-three article {
    display: flex;
    flex-wrap: wrap;
    gap:10px;
    justify-content: center;
    align-items: center;
    align-content: center;
}

#section-three figcaption {
    width: 30rem;
    display: grid;
    align-items: center;
    font-size: 30px;
    color: var(--bold-font-color);
}
#section-three figcaption span{
    display: flex;
    align-items: start;
    font-size: 15px;
    justify-content: center;
    gap:10px;
}
#section-three figcaption h2{
color:var(--bold-font-color);
font-weight: bold;
font-size: 30px;
}

#section-three figcaption img{
    width: 20px;
}

#section-three figure{
  
   
}
</style>
