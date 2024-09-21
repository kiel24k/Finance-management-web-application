<script setup>
import Header from '@/components/Client_Header.vue'
import axios from 'axios';
import { computed, onMounted, ref } from 'vue';
import ProfileNameModal from '@/components/Client_Profile_Name.vue'

const userData = ref({})
const result = computed(() => {
    return Object.values(userData.value).some(userData => userData === null)
})
const profileNameModal = ref(false)

const userProfile = () => {
    axios({
        method: 'GET',
        url: 'api/user'
    }).then(response => {
        userData.value = response.data
    })
}

const nameContent = () => {
    profileNameModal.value = true
}
const closeModal = () => {
    profileNameModal.value = false
}



onMounted(() => {
    userProfile()
})
</script>

<template>
    <ProfileNameModal v-if="profileNameModal" @closeModal="closeModal"/>
    <Header />
    <section class="row" id="profile">
        <div class="col">
            <figure>
                <img src="/public/image/370076_account_avatar_client_male_person_icon.png" alt="">
                <figcaption class="profile-figcaption text-dark">
                    <span>{{ userData.username }}</span>
                </figcaption>
            </figure>
        </div>
        <div class="col profile-action">
            <div class="">
                <button class="btn btn-dark">Edit Profile</button>
            </div>
        </div>
        <hr>
    </section>

    <section id="info">
        <article>
            <div class="fill-info-warning alert alert-danger" v-if="result === true">
                <img src="/public/image/alert-icon.png" width="20" alt=""> <span title="dsdsd">Complete your details
                    here!</span>
            </div>
            <h2>Profile</h2>
            <div class="content" @click="nameContent">
                <figure class="figure-info">
                    <figcaption class="figure-figcaption">
                        Name
                    </figcaption>
                    <img src="/public/image/next-icon.png" width="25" alt="">
                </figure>
            </div>
            <div class="content">
                <figure class="figure-info">
                    <figcaption class="figure-figcaption">
                        Username
                    </figcaption>
                    <img src="/public/image/next-icon.png" width="25" alt="">
                </figure>
            </div>
            <div class="content">
                <figure class="figure-info">
                    <figcaption class="figure-figcaption">
                        Links
                    </figcaption>
                    <img src="/public/image/next-icon.png" width="25" alt="">
                </figure>
            </div>
            <div class="change-password text-end">
                <button class="btn btn-danger">Change password</button>
            </div>  
        </article>
        
    </section>
</template>

<style scoped>
#profile {
    max-width: 60rem;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
}

figure {
    display: flex;
    align-items: center;
    gap: 10px
}

.profile-figcaption {
    font-weight: 600;
}

.profile-action {
    display: flex;
    justify-content: end;
    align-items: center;
}

#info {
    max-width: 60rem;
    margin: auto;
    box-shadow: 0px 0px 2px 0px gray;
    border-radius: 10px;
    padding: 10px;

}

.figure-info {
    display: flex;
    justify-content: space-between;
    padding:10px;
    border-radius: 10px;
    transition: all linear 0.1s;
}
.figure-info:hover{
    background: #dfdfdf;
    cursor:pointer;
}

.figure-figcaption {
    font-weight: 600;
}

.fill-info-warning {
    display: flex;
    align-items: center;
    gap: 10px;
    z-index: -1;
}
</style>