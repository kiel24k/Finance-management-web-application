<script setup>
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';


const emit = defineEmits(['closeModal'])
const input = ref({})
const date = new Date().toLocaleDateString()
const props = defineProps(['userInfo'])
const balanceData = ref({})
const router = useRouter()

const closeModal = () => {
    emit('closeModal')
}

const currentBalance  = () => {
    axios({
        method: 'GET',
        url: 'api/current-balance',
        params: {
            id: props.userInfo.id
        }
    }).then(response => {
       balanceData.value = response.data[0]
    })
}

const saveBtn = () => {
   axios({
    method: 'POST',
    url: 'api/client-update-balance',
    data: {
        amount: input.value.amount,
        date: date
    }
   }).then(response => {
    if(response.status == 200){
       emit('closeModal')
        
    }
    
   })
}

onMounted(() => {
 currentBalance()
})

</script>

<template>
    <div id="modal">
        <div class="modal-main">
            <div class="row modal-title">
                <div class="col">
                    <span>
                        <b>Balance Details</b>, Be honest!</span>
                </div>
                <div class="col text-end closeModal">
                    <img src="/public/image/exit_icon.png"  width="30"  @click="closeModal">
                </div>
            </div>
            <div class="row ">
                <div class="col amount">
                    <span>Amount</span>
                    <div class="amount-action p-4">
                        <div class="balance">
                            <span>{{ balanceData.amount }} </span>
                        </div>
                        <div class="action-btn">
                            <button class="btn btn-danger">Cancel</button>
                            <button class="btn btn-primary" @click="saveBtn">Save Changes</button>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="details">
                    <div class="">
                        <span>SUBMITTED BY</span>
                        <p>:{{ userInfo.username }}</p>
                    </div>
                    <div class="">
                        <span>DATE</span>
                        <p>:{{ date }}</p>
                    </div>
                </div>
                <div class="note">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque similique quaerat quod amet ab
                        delectus sit officiis, aliquid velit sint mollitia fuga suscipit, dolorum ea nostrum nihil
                        dolorem molestias id.</p>
                </div>
                <div class="enter-amount">
                    <fieldset>
                        <form action="" @submit.prevent>
                            <label for="">Enter Amount</label>
                            <input type="text" v-model="input.amount">
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
    #modal {
        width: 100%;
        position: fixed;
        height: 100%;
        background: rgba(196, 196, 196, 0.5);
        backdrop-filter: blur(5px);
        display: grid;
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    .modal-main {
        max-width: 30rem;
        background: rgb(254, 255, 254);
        padding: 10px;
        border-radius: 15px;
        margin:10px;
    }
    .closeModal {
        cursor: pointer;
    }

    .modal-title {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .amount-action {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        background-color: rgb(231, 184, 243);
        border-radius: 15px;
    }
    .action-btn{
        display: flex;
        gap:10px;
    }
    .balance span{
        font-weight: 500;
        font-size: 25px;
    }

    .details>div:not(span) {
        width: 60%;
        display: flex;
        justify-content: space-between;

    }

    .details span {
        color: gray;
    }

    .enter-amount form {
        display: grid;
    }

    .enter-amount input {
        padding: 5px;
        border-radius: 10px;
        border: solid 1px rgb(226, 221, 221);
    }

    .enter-amount input:focus {
        outline: rgb(226, 221, 221);;
        color:gray;

    }
</style>