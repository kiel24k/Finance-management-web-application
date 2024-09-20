<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';



const currentDate = new Date().toLocaleDateString()
const emitCloseModal = defineEmits(['closeModal'])
const propsUserBalanceValue = defineProps(['userBalanceValue'])
const max = propsUserBalanceValue.userBalanceValue.userChangeBalance.amount
const category = ref('')
const categoryValidation = ref('')
const select = ref('')
const userCategoryList = ref({})
const planBudgetValidation = ref({})
const inputs = ref({
    plan_name: ''
})


const closeModal = () => {
    emitCloseModal('closeModal')
}

const newCategoryBtn = () => {
    axios({
        method: 'POST',
        url: 'api/new-category',
        data: {
            category_name: category.value
        }
    }).then(response => {
        category.value = ''
    }).catch(e => {
        if (e.status) {
            categoryValidation.value = e.response.data.message
        }
    })
    userCategory()
}

const userCategory = () => {
    axios({
        method: 'GET',
        url: 'api/list-category'
    }).then(response => {
        userCategoryList.value = response.data
    })
}

const saveBtn = () => {
    axios({
        method: 'POST',
        url: 'api/new-plan-budget',
        data: {
            date: currentDate,
            category: select.value,
            description: inputs.value.description,
            plan_name: inputs.value.plan_name,
            target_date: inputs.value.target_date,
            amount: inputs.value.range,
            current_amount:50
        }
    }).then(response => {
        console.log(response);
        if(response.status == 200){
            emitCloseModal('closeModal')
        }
    }).catch(e => {
        console.log(e);
        
        if(e.response.status == 422){
            planBudgetValidation.value = e.response.data.errors
        }
        
    })
}

onMounted(() => {
    userCategory()
    console.log(propsUserBalanceValue.userBalanceValue.userFixedBalance);
    console.log(propsUserBalanceValue.userBalanceValue.userChangeBalance);
    
    
})

</script>

<template>
    <div id="form-modal">
        <div class="form-modal-main">
            <div class="row">
                <div class="col modal-title">
                    <span>Detailed Course Pricing Breakdown</span>
                    <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque incidunt soluta doloribus
                        aliquam quae, maiores quam autem veritatis! Laboriosam, placeat quam reprehenderit cumque
                        eligendi incidunt repellat nisi magnam atque modi.</small>
                </div>
                <div class="col text-end help-action">
                    <button class="help-btn">
                        <img src="/public/image/help-icon.png" width="25" alt="">
                        <small>Help!</small>
                    </button>
                    <button>
                        <img src="/public/image/view-eye.png" width="25" alt="">
                        <small>Preview</small>
                    </button>
                </div>
            </div>
            <hr>
            <div class="row select-row">
                <small class="text-primary"> {{ categoryValidation }}</small>
                <div class="col select">
                    <select name="" v-model="select" id="">
                        <option :value="data.category_name"  v-for="(data, index) in userCategoryList" :key=index> {{
                            data.category_name }} </option>
                    </select>
                    <input type="text" class="add-category" placeholder="New Category" v-model="category">
                    <button @click="newCategoryBtn">
                        <img src="/public/image/add-icon1.png" width="20" alt="">
                        <span>Add Category</span>
                    </button>
                </div>
                <small v-if="planBudgetValidation.category">{{ planBudgetValidation.category[0] }}</small>
            </div>

            <fieldset>
                <form action="">
                    <div class="row">
                        <div class="col">
                            <label for="">Plan Name</label>
                            <input type="text" placeholder="Your Plan Name" v-model="inputs.plan_name">
                            <small v-if="planBudgetValidation.plan_name">{{ planBudgetValidation.plan_name[0] }}</small>
                        </div>
                        <div class="col">
                            <label for="">Amount</label>
                            ₱{{ inputs.range }}
                            <input type="range" v-model="inputs.range" min="0" :max="max"
                                style="color:red; background:green;">
                               <small v-if="planBudgetValidation.amount">{{ planBudgetValidation.amount[0] }}</small>
                        </div>
                        
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <b>current date: </b>
                            <span>{{ currentDate }}</span>
                        </div>
                        <div class="col">
                            <label for="">Target Date</label>
                            <input type="date" v-model="inputs.target_date">
                            <small v-if="planBudgetValidation.targer_date">{{ planBudgetValidation.target_date[0] }}</small>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Description</label>
                            <textarea name="" rows="15" id="" v-model="inputs.description"></textarea>
                            <small v-if="planBudgetValidation.description">{{ planBudgetValidation.description[0] }}</small>
                        </div>
                    </div>
                </form>
            </fieldset>
            <div class="row">
                <div class="col text-end form-action-save">
                    <button class="btn " @click="closeModal">Cancel</button>
                    <button class="btn" @click="saveBtn">Save</button>
                </div>
            </div>

        </div>

    </div>
</template>

<style scoped>
#form-modal {
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 999;
    background: rgb(240, 235, 235, 0.5);
    backdrop-filter: blur(5px);
    display: grid;
    justify-content: center;
    align-items: center;
}

.form-modal-main {
    max-width: 70rem;
    box-shadow: 0px 0px 5px 0px gray;
    padding: 20px;
    border-radius: 10px;
    background: rgb(255, 255, 255);
    margin: 10px;
}

.modal-title {
    display: grid;
}

.modal-title span {
    font-size: 25px;
    font-weight: bolder;
}

.select {
    display: flex;
    gap: 5px;
}

.select select {
    width: 65%;
    border-radius: 5px;
    border: solid 1px rgb(214, 214, 214);
    padding: 5px;
}

.select select:focus {
    outline: 0;
    padding: 5px;
}

.select button {
    border: 0;
    background: none;
    color: rgb(90, 182, 235);
    border-radius: 5px;
    display: flex;
    align-items: center;
    font-weight: 600;
    font-size: 15px;

}

.add-category {
    width: 20%;
    border-radius: 5px;
    border: solid 1px rgb(194, 191, 191);
    color: blue;
    font-size: 15px;
}

.add-category:focus {
    outline: 0;
    color: blue;
    font-size: 15px;
}
.select-row small{
    color:red;
}

fieldset {
    box-shadow: 0px 0px 2px 0px gray;
    padding: 10px;
    margin-top: 10px;
    border-radius: 10px;
}

fieldset .col {
    display: grid;

}

fieldset label {
    color: gray;
}

fieldset input,
textarea {
    border: 1px solid rgb(182, 178, 178);
    padding: 5px;
    border-radius: 5px;
}

fieldset input,
textarea:focus {
    outline: 0;
    color: rgb(83, 82, 82);
}

fieldset small{
    color:red;
}

.help-action button {
    border: 1px solid rgb(197, 195, 195);
    border-radius: 5px;
    background: 0;
}

.form-action-save button {
    border: 0;
    margin-top: 20px;
    font-size: 15px;
    font-weight: 600;

}

.form-action-save button:nth-child(1) {
    background: white;
    color: red;
}

.form-action-save button:nth-child(2) {
    background: rgb(90, 182, 235);
    color: white;
}
</style>
