<script setup>
import Sidebar from '@/components/Client_Sidebar.vue'
import { onMounted, ref } from 'vue';
import { useRouter } from 'vue-router';
import Notification from '@/components/Client_Notification.vue'

const router = useRouter()
const userInfo = ref()
const emitUserId = defineEmits(['userID'])
const showBurger = ref(false)
const notification = ref(false)

const burger = () => {
    showBurger.value = true
}

const user = () => {
    axios({
        method: 'GET',
        url: 'api/user'
    }).then(response => { 
        userInfo.value = response.data
        emitUserId('user', userInfo.value)
    })
}

const hideBurger = () => {
    showBurger.value = false
}

const profileBtn = () => {
    router.push('/client-profile')
       
}

const notificationBtn = () => {
   if(notification.value === false){
    notification.value = true
   }else if(notification.value === true){
    notification.value = false
   }
}

onMounted(() => {
    user()
})


</script>
<template>
    <Sidebar :showBurger="showBurger" @hideBurger="hideBurger" />
    <header>
        <div class="content1">
            <img src="/public/image/burder-menu1.png" alt="" width="40px" height="40px" class="burger"
                @click="burger" />
            <img src="/public/image/logo.png" width="150px" alt="">
        </div>
        <div class="content2">
            <ul class="navbar nav nav-action">
                <li class="nav-item">
                    <div class="notification" @click="notificationBtn">
                        <img src="/public/image/notification-icon.png" width="20" alt="">
                        notification
                    </div>
                </li>
                <Notification v-if="notification"/>
                <li class="nav-item">
                    <div class="profile" @click="profileBtn">
                        <img src="/public/image/370076_account_avatar_client_male_person_icon.png" width="40" alt="">
                    </div>
                </li>
            </ul>
        </div>
    </header>

</template>

<style scoped>
:root {
    --background-color: #F6E8DF;
    --bold-font-color: #013237;
    --button-color: #FE979C;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    position: sticky;
    top: 0;
    background-color: #ffffff;
    backdrop-filter: blur(10px);
    padding: 10px;
    box-shadow: 0px 0px 5px 0px gray;
}

.nav-item a {
    font-weight: bold;
    color: var(--bold-font-color)
}

.hideSidebar {
    position: absolute;
    height: 100%;
    z-index: 999;
    transform: translate(25%);
    transition: all linear 2s;
}

.notification {
    background-color: rgb(226, 223, 223);
    height: 2rem;
    padding: 5px;
    border-radius: 10px;
    display: flex;
    align-items: center;
}

.nav-action {
    display: flex;
    gap: 10px;
    align-items: center
}
.profile, .burger, .notification{
    cursor: pointer;
}
</style>