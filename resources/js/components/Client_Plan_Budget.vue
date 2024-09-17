<script setup>
import { onMounted, ref } from 'vue';



const currentDate = new Date().toLocaleDateString()
const emitCloseModal = defineEmits(['closeModal'])
const propsUserBalanceValue = defineProps(['userBalanceValue'])
const closeModal = () => {
    emitCloseModal('closeModal')
}



 const rangeValue = ref()
 const max = propsUserBalanceValue.userBalanceValue.amount

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
            <div class="row">
                <div class="col select">
                    <select name="" value="dasdsa" id="">
                        <option value="" disabled selected>Create or select a name of our project</option>
                    </select>
                    <input type="text" class="add-category" placeholder="New Category">
                    <button>
                        <img src="/public/image/add-icon1.png" width="20" alt="">
                        <span>Add Category</span>
                    </button>
                </div>
            </div>

            <fieldset>
                <form action="">
                    <div class="row">
                        <div class="col">
                            <label for="">Budget Name</label>
                            <input type="text" placeholder="Standard Aspiring Artist">
                        </div>
                        <div class="col">
                            <label for="">Amount</label>
                            {{ rangeValue }}
                            <input type="range" v-model="rangeValue" min="0" :max="max" style="color:red; background:green;">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <b>current date: </b>
                            <span>{{ currentDate }}</span>
                        </div>
                        <div class="col">
                            <label for="">Target Date</label>
                            <input type="date">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="">Description</label>
                            <textarea name="" rows="15" id=""></textarea>
                        </div>
                    </div>
                </form>
            </fieldset>
            <div class="row">
                <div class="col text-end form-action-save">
                    <button class="btn " @click="closeModal">Cancel</button>
                    <button class="btn ">Save</button>
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

.add-category{
    width: 20%;
    border-radius: 5px;
    border: solid 1px rgb(194, 191, 191);
    color:blue;
    font-size: 15px;
}
.add-category:focus{
    outline: 0;
    color:blue;
    font-size: 15px;
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
