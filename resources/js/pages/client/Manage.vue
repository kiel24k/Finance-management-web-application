<script setup>
import Header from '@/components/Client_Header.vue'
import AddBalanceModal from '@/components/Client_Add_Balance.vue'
import { onMounted, ref, watch } from 'vue';
import PlanBudget from '@/components/Client_Plan_Budget.vue'
import axios from 'axios';
import html2pdf from 'html2pdf.js';

const balanceModal = ref(false)
const userInfo = ref()
const userBalanceValue = ref({})
const planModal = ref(false)
const planListData = ref({})
const sortByValue = ref('plan_name')
const sortOrder = ref('asc')
const tableDataExport = ref(null)
const pagination = ref({
    current_page: '',
    last_page: '',
    next_page_url: '',
    prev_page_url: '',
    from: '',
})


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
    planList()
}

const planList = (page) => {
    axios({
        method: 'GET',
        url: `/api/plan-list?page=${page}`,
        params: {
            sort_by: sortByValue.value,
            sort_order: sortOrder.value,
        }
    }).then(response => {
        pagination.value = {
            current_page: response.data.current_page,
            last_page: response.data.last_page,
            next_page_url: response.data.next_page_url,
            prev_page_url: response.data.prev_page_url,
            from: response.data.from,
        }
        planListData.value = response.data
    })
}

const sort = (val) => {
    if (sortByValue.value === val) {
        sortOrder.value = sortOrder.value === 'asc' ? 'desc' : 'asc'
    } else {
        sortByValue.value = val
        sortOrder.value = 'asc'
    }
    planList()
}


const nextBtn = () => {
    if (pagination.value.next_page_url) {
        planList(pagination.value.current_page + 1)
    }


}
const prevBtn = () => {
    if (pagination.value.prev_page_url) {
        planList(pagination.value.current_page - 1)
    }

}

const exportPdf = () => {
    const element = tableDataExport.value;
    const options = {
        margin: 1,
        filename: 'plan-table.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    html2pdf().from(element).set(options).save();
}

const deletePlanBtn = (id) => {
    axios({
        url: 'api/delete-plan',
        method: 'POST',
        data: {
            id: id
        }
    }).then(response => {
        console.log(response);
        planList()
    })
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
                    <button class="btn btn-info text-white export" @click="exportPdf">
                        <img src="/public/image/download-icon.png" width="20px" alt="">
                        Export
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section id="section-four" class="mt-2">
        <table class="table table-hover" ref="tableDataExport">
            <thead>
                <tr>
                    <th>#</th>
                    <th @click="sort('plan_name')">Plan Name
                        <span>{{ sortOrder === 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('category')">Category
                        <span>{{ sortOrder === 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('amount')">Amount
                        <span>{{ sortOrder === 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('description')">description
                        <span>{{ sortOrder === 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('date')">Date
                        <span>{{ sortOrder === 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th @click="sort('target_date')">Target Date
                        <span>{{ sortOrder === 'asc' ? '▲' : '▼' }}</span>
                    </th>
                    <th>action</th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="(data, index) in planListData.data" :key="index">
                    <td>{{ index +  }}</td>
                    <td>{{ data.plan_name }}</td>
                    <td>{{ data.category }}</td>
                    <td class="text-success">{{ data.amount }}</td>
                    <td>{{ data.description }}</td>
                    <td>{{ data.date }}</td>
                    <td>{{ data.target_date }}</td>
                    <td class="action">
                        <span>
                            <button><img src="/public/image/view-eye.png" width="25" alt=""></button>
                            <button>
                                <img src="/public/image/update-pencil-icon.svg" width="20px" alt="">
                            </button>
                            <button @click="deletePlanBtn(data.id)">
                                <img src="/public/image/delete-icon.png" width="20px" alt="">
                            </button>

                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
    <div class="row text-center">
        <div class="col text-center nextprevbtn">
            <button @click="prevBtn"><img src="/public/image/prev-icon.png" width="20" alt=""></button>
            <span> {{ pagination.current_page }} of {{ pagination.last_page }} </span>
            <button @click="nextBtn"><img src="/public/image/next-icon.png" width="24" alt=""></button>
        </div>
    </div>
</template>

<style scoped>
section {
    width: 92%;
    margin: auto;
}

.balance {
    display: flex;
    align-items: center;
    height: 5rem;
}
.balance h1{
    font-weight: 600;
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
.nextprevbtn button{
    background: none;
    border:0;
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
        cursor:pointer;
    }
    .nextprevbtn button{
        background: none;
        border:0;
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
    .nextprevbtn button{
        background: none;
        border:0;
    }
}

@media screen and (min-width: 601px) {}
</style>