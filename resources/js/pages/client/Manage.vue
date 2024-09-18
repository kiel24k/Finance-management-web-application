<script setup>
import Header from '@/components/Client_Header.vue'
import AddBalanceModal from '@/components/Client_Add_Balance.vue'
import { onMounted, ref } from 'vue';
import PlanBudget from '@/components/Client_Plan_Budget.vue'
import axios from 'axios';

const balanceModal = ref(false)
const userInfo = ref()
const userBalanceValue = ref({})
const planModal = ref(false)
const planListData = ref({})


const userBalance = () => {
    axios({
        method: 'GET',
        url: 'api/get-user-balance'
    }).then(response => {
        userBalanceValue.value = response.data[0]

    })
}


const user = (info) => {
    userInfo.value = info
}
const addBalanceBtn = () => {
    console.log(userBalanceValue.value);
    balanceModal.value = true
}
const closeModal = () => {
    balanceModal.value = false
    userBalance()
}

const addPlanBtn = () => {
    planModal.value = true

}

const PlanBudgetCloseModal = () => {
    planModal.value = false
    userBalance()
}

const planList = () => {
    axios({
        method: 'GET',
        url: 'api/plan-list'
    }).then(response => {
        planListData.value = response.data

    })
}

const sort = (val) => {
    alert(val)

}
onMounted(() => {
    userBalance()
    planList()
})

</script>
<template>
    <AddBalanceModal v-if="balanceModal" @closeModal="closeModal" :userInfo="userInfo" />
    <PlanBudget v-if="planModal" @closeModal="PlanBudgetCloseModal" :userBalanceValue="userBalanceValue" />
    <Header @user="user" />
    <section id="section-one">
        <div class="row balance">
            <div class="col text-success">
                <span>your balance is:</span>
                <h1 v-if="userBalanceValue">₱{{ userBalanceValue.amount }}</h1>
            </div>
            <div class="col text-end">
                <button @click="addBalanceBtn">
                    <span>
                        <img src="/public/image/add-icon.png" width="30px" alt="">
                        Edit Balance
                    </span>
                </button>
                <button @click="addPlanBtn">
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

    <section id="section-three" class="mt-4">
        <div class="row">
            <div class="col">
                <span>Products</span>
                <span>Store</span>
            </div>
            <div class="col">
                <div class="table-action text-end">
                    <button>
                        <img src="/public/image/search-glassess.png" width="25" alt="">
                    </button>
                    <button>
                        <span>
                            <img src="/public/image/burder-menu1.png" width="25" alt="">
                            Columns
                        </span>
                    </button>
                    <button>
                        <span>
                            <img src="/public/image/filter-icon.png" width="25px" alt="">
                            filters
                        </span>
                    </button>
                    |
                    <button class="btn btn-info text-white export">
                        <img src="/public/image/download-icon.png" width="20px" alt="">
                        Export
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section id="section-four" class="mt-2">
        <table class="table table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th @click="sort('plan_name')">Plan Name
                        <span>{{ sortOrder == 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('category')">Category
                        <span>{{ sortOrder == 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('amount')">Amount
                        <span>{{ sortOrder == 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('description')">description
                        <span>{{ sortOrder == 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('date')">category
                        <span>{{ sortOrder == 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('target_date')">Target Date
                        <span>{{ sortOrder == 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th>action</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="(data, index) in planListData.data" :key="index">
                    <td>1</td>
                    <td>{{ data.plan_name }}</td>
                    <td>{{ data.category }}</td>
                    <td>{{ data.amount }}</td>
                    <td>{{ data.description }}</td>
                    <td>{{ data.category }}</td>
                    <td>sds</td>
                    <td class="action">
                        <span>
                            <button>
                                <img src="/public/image/update-pencil-icon.svg" width="20px" alt="">
                            </button>
                            <button>
                                <img src="/public/image/delete-icon.png" width="20px" alt="">
                            </button>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col text-center ">
                <button>prev</button>
                <span>1 2 3 4 5 6 7 8 9</span>
                <button>next</button>
            </div>
        </div>
    </section>
</template>

<style scoped>
section {
    width: 90%;
    margin: auto;
}

.balance {
    display: flex;
    align-items: center;
    height: 5rem;
}

#section-one {
    background-color: rgb(255, 255, 255);
}

#section-one button {
    background-color: transparent;
    border: 0;

}

#section-two {
    background-color: rgb(255, 255, 255);
}


.select-option {
    display: flex;
    align-items: center;
    gap: 10px;
}

.select {
    width: 13rem;
    background-color: white;
    border: 1px solid rgb(206, 206, 206);
    border-radius: 7px;
    padding: 5px;
}

#section-two button {
    background-color: transparent;
    border: 0;
}


@media screen and (min-width: 769px) {
    section {
        width: 90%;
        margin: auto;
    }

    #section-four {
        overflow-x: auto;
    }

    #section-four table th {
        background: rgb(231, 239, 243);
        color: rgb(0, 0, 0);
        font-weight: 400;
        font-size: 400;
        text-transform: capitalize;
    }

    .table-action button:not(.export) {
        border: 1px solid rgb(163, 161, 161);
        border-radius: 7px;
        padding: 4px;
        background: transparent;
    }

    .action button {
        background: transparent;
        border: 0;

    }

}

@media screen and (max-width: 1116px) {
    section {
        width: 90%;
        margin: auto;
    }

    #section-four {
        overflow: auto;
    }

    #section-four table th {
        background: rgb(231, 239, 243);
        color: rgb(0, 0, 0);
        font-weight: 400;
        font-size: 400;
        text-transform: capitalize;
    }

    .table-action button:not(.export) {
        border: 1px solid rgb(163, 161, 161);
        border-radius: 7px;
        padding: 4px;
        background: transparent;
    }

    .action button {
        background: transparent;
        border: 0;

    }
}

@media screen and (min-width: 601px) {}
</style>