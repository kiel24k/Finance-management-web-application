<script setup>
import Header from '@/components/Client_Header.vue'
</script>
<template>
    <Header />
    <section id="section-one">
        <div class="row balance">
            <div class="col text-success">
                <span>your balance is:</span>
                <h1>$405</h1>
            </div>
            <div class="col text-end">
                <button>
                    <span>
                        <img src="/public/image/add-icon.png" width="30px" alt="">
                        Add balance
                    </span>
                </button>
                <button>
                    <img src="/public/image/add-icon.png" width="30px" alt="">
                    Plan Budget
                </button>
            </div>
        </div>
    </section>
    <section id="section-two">
        <div class="select-option">
            <img src="/public/image/select-icon.png" width="30" alt="">
            <select name="" id="" class="select">
                <option value="" select>Monthly</option>
                <option value="">Yearly</option>
            </select>
            <div class="plan-budget">
               
            </div>
        </div>
        
    </section>
</template>

<style scoped>
section {
    width: 90%;
    margin: auto;
}
.balance{
    display: flex;
    align-items: center;
    height: 5rem;
}
#section-one{
    background-color: rgb(255, 255, 255);
}
#section-one button{
    background-color: transparent;
    border:0;

}
#section-two{
    background-color: rgb(255, 255, 255);
}

.select-option{
    display: flex;
    align-items: center;
    gap:10px;
}
.select{
    width: 13rem;
    background-color: white;
    border:1px solid rgb(206, 206, 206);
    border-radius: 7px;
    padding:5px;
}
#section-two button{
    background-color: transparent;
    border:0;
}



</style>