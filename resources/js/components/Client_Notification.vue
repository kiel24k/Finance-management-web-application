<script setup>
import { ref } from 'vue';


const isNotifAnimation = ref(false)
const test = () => {
    isNotifAnimation.value = true
}
</script>

<template>
    <div id="notification">
        <div class="row">
            <div class="col">
                <h3>Your notification</h3>
            </div>
            <div class="col text-end">
                Mark all as read
            </div>
        </div>
        <div class="row">
            <div class="col notif-section">
                <figure>
                    <img src="/public/image/370076_account_avatar_client_male_person_icon.png" alt="" width="50">
                </figure>
                <figcaption>
                    <b>@Kiel</b>
                    <span>Followed you</span>
                    <p>Thursday 4:20pm</p>
                </figcaption>
            </div>
            <div class="col-3 text-end">
                <span>2 hours ago</span>
            </div>
        </div>
        <div class="row">
            <div class="col notif-section">
                <figure>
                    <img src="/public/image/370076_account_avatar_client_male_person_icon.png" alt="" width="50">
                </figure>
                <figcaption>
                    <b>@Kiel</b>
                    <span>Followed you</span>
                    <p>Thursday 4:20pm</p>
                </figcaption>
            </div>
            <div class="col-3 text-end">
                <span>2 hours ago</span>
            </div>
        </div>
        <div class="row">
            <div class="col notif-section">
                <figure>
                    <img src="/public/image/370076_account_avatar_client_male_person_icon.png" alt="" width="50">
                </figure>
                <figcaption>
                    <b>@Kiel</b>
                    <span>Followed you</span>
                    <p>Thursday 4:20pm</p>
                </figcaption>
            </div>
            <div class="col-3 text-end">
                <span>2 hours ago</span>
            </div>
        </div>
        <div class="row">
            <div class="col notif-section">
                <figure>
                    <img src="/public/image/370076_account_avatar_client_male_person_icon.png" alt="" width="50">
                </figure>
                <figcaption>
                    <b>@Kiel</b>
                    <span>Followed you</span>
                    <p>Thursday 4:20pm</p>
                </figcaption>
            </div>
            <div class="col-3 text-end">
                <span>2 hours ago</span>
            </div>
        </div>


    </div>
</template>
<style scoped>
    @media screen and (min-width: 769px) {
        #notification {
            position: fixed;
            right: 0;
            top: 0;
            width: 35rem;
            background: white;
            box-shadow: 0px 0px 5px 0px;
            padding: 15px;
            border-radius: 10px;
            margin-top:4rem;
            margin-right: 1rem;
        }

        .notif-section {
            display: flex;
            align-items: center;
            gap: 10px
        }
        .haha{
            background: red;
        }
        

    }

    @media screen and (max-width: 1160px) {
        #notification {
            position: fixed;
            right: 0;
            top: 0;
            max-width: 30rem;
            background: white;
            box-shadow: 0px 0px 5px 0px;
            padding: 15px;
            border-radius: 10px;
        }

        .notif-section {
            display: flex;
            align-items: center;
            gap: 10px
        }
    }

    @media screen and (min-width: 601px) {
        #notification {
            position: fixed;
            right: 0;
            top: 0;
            width: 35rem;
            background: white;
            box-shadow: 0px 0px 5px 0px;
            padding: 15px;
            border-radius: 10px;
        }

        .notif-section {
            display: flex;
            align-items: center;
            gap: 10px
        }
    }
</style>