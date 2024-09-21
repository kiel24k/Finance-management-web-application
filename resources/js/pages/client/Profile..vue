<script setup>
import Header from '@/components/Client_Header.vue'
import axios from 'axios';
import { computed, onMounted, ref } from 'vue';

const userData = ref({})
const result = computed(() => {
            return Object.values(userData.value).some(userData => userData === null)
        })
const userProfile = () => {
    axios({
        method: 'GET',
        url: 'api/user'
    }).then(response => {
        userData.value = response.data
        // console.log(userData.value.last_name);
        // console.log(result.value);
    })
}



onMounted(() => {
    userProfile()
})
</script>

<template>
    <Header />
    <section class="row" id="profile">
        <div class="col">
            <figure>
                <img src="/public/image/370076_account_avatar_client_male_person_icon.png" alt="">
                <figcaption class="profile-figcaption text-dark">
                    <span>KIEL ALARCON BERMUDEZ</span>
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
               <img src="/public/image/alert-icon.png" width="20" alt=""> <span>Complete your details here!</span>
            </div>
            <h2>Info</h2>
            <div class="content">
                <figure class="figure-info">
                    <img src="/public/image/5296499_fb_facebook_facebook logo_icon.png" width="50" alt="">
                    <figcaption class="figure-figcaption">
                        keilbermudez@gmail.com
                    </figcaption>
                </figure>
            </div>
            <div class="content">
                <figure class="figure-info">
                    <img src="/public/image/5296499_fb_facebook_facebook logo_icon.png" width="50" alt="">
                    <figcaption class="figure-figcaption">
                        keilbermudez@gmail.com
                    </figcaption>
                </figure>
            </div>
            <div class="content">
                <figure class="figure-info">
                    <img src="/public/image/5296499_fb_facebook_facebook logo_icon.png" width="50" alt="">
                    <figcaption class="figure-figcaption">
                        keilbermudez@gmail.com
                    </figcaption>
                </figure>
            </div>
            <div class="content">
                <figure class="figure-info">
                    <img src="/public/image/5296499_fb_facebook_facebook logo_icon.png" width="50" alt="">
                    <figcaption class="figure-figcaption">
                        keilbermudez@gmail.com
                    </figcaption>
                </figure>
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
}

.figure-figcaption {
    font-weight: 600;
}
.fill-info-warning{
    display: flex;
    align-items: center;
    gap:10px;
    z-index: -1;
}
</style>