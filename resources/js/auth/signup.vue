<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter()
const input = ref({})
const inputValidation = ref({})

  const back = () => {
    window.history.back()
  }

  const submit = () => {
  axios({
    method: 'POST',
    url: '/api/signup',
    data: {
      username: input.value.username,
      email: input.value.email,
      password: input.value.password
    }
  }).then(response => {
 if(response.status == 200){
  router.push('/login')

 }
    
    
  }).catch(e => {
   if(e.status == 422){
    inputValidation.value = e.response.data.errors
   }
  })
  }
</script>

<template>
    <div id="signup">
        <div class="signup-body">
          <div class="form">
            <div class="display1">
              <div class="signup-content1">
                <button class="backBtn" @click="back">
                    <img src="/public/image/back.png" alt="">
                </button>
                <div class="row title">
                  <p>Signup</p>
                  <span>And enjoy life during the time you just saved!</span>
                </div>
                <div class="row mt-2">
                  <form action="" @submit.prevent>
                    <fieldset>
                      <div class="row mt-3">
                        <div class="col">
                          <label for="">Username</label>
                          <input type="text" class="form-control" v-model="input.username" />
                          <span class="text-danger" v-if="inputValidation.username">{{ inputValidation.username[0] }}</span>
                        </div>
                        <div class="col">
                          <label for="">Email</label>
                          <input type="text" class="form-control" v-model="input.email" />
                          <span class="text-danger" v-if="inputValidation.email">{{ inputValidation.email[0] }}</span>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col">
                          <label for="">Password</label>
                          <input type="text" class="form-control" v-model="input.password" />
                          <span class="text-danger" v-if="inputValidation.password">{{ inputValidation.password[0] }}</span>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col checkbox">
                          <div class="">
                            <input type="checkbox" />
                          </div>
                          <div class="">
                            <label for=""
                              >Creating an account means you are aggree with our
                              terms and policies</label
                            >
                          </div>
                        </div>
                      </div>
                      <div class="row m-3 create-account-btn">
                        <div class="col text-center">
                          <button class="btn btn-info p-2" @click="submit">
                            Create an account
                          </button>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col text-center">
                          <span>
                            account already?
                            <router-link :to="{name: 'login'}">Login</router-link>
                          </span>
                        </div>
                      </div>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
            <div class="display2"></div>
          </div>
        </div>
      </div>
</template>

<style scoped>
/* For large screens (laptops) */
@media screen and (min-width: 769px) {
  #signup {
 display: grid;
 justify-content: center;
 align-items: center;
 position: absolute;
 height: 100%;
 width: 100%;
 background-color: rgb(240, 240, 240);
}

/* .signup-body {
 max-width: 80rem;
 height: 50rem;
 background-image: url('/public/image/web-design-and-development-concept-developer-team-designing-and-creating-a-website-modern.webp');
 box-shadow: 0px 0px 5px 0px gray;
 border-radius: 20px;
 display: grid;
 justify-content: center;
 align-items: center;
} */

.form {
 display: flex;
 flex-wrap:wrap;
 box-shadow: 0px 0px 10px 0px gray;
 border-radius: 20px;
}

.display1 {
 width: 35rem;
 background-color: white;
 height: 40rem;
 border-top-left-radius: 20px;
 border-bottom-left-radius: 20px;
 padding: 20px;
 display: grid;
 justify-content: center;
 align-items: center;
 margin:auto;
}

.display2 {
 width: 35rem;
 height: 40rem;
 background-image: url('/public/image/signup-bg.png');
 border-top-right-radius: 20px;
 border-bottom-right-radius: 20px;
 background-position: 50%;
 background-size: cover;
}

.title p {
 font-weight: 600;
 font-size: 50px;
}

.checkbox {
 display: flex;
 align-items: start;
 justify-content: center;
 align-content: center;
 gap: 10px;
}

.signup-with button {
 padding: 10px;
 background-color: white;
 display: flex;
 align-items: center;
 font-size: 15px;
 border: 1px solid black;
 transition: all linear 0.2s;
}

.signup-with button:hover {
 border: solid 1px black;
 background: black;
 color: white;
}

.create-account-btn button {
 background-color: rgb(30, 83, 228);
 color: White;
 border: 0;
}

.create-account-btn button:hover {
 background-color: black;
 color: white;
}
.backBtn {
    background: none;
    border:none;
    
}
.backBtn img{
    width: 20px;
}
}

/* For small screens (phones) */
@media screen and (max-width: 1116px) {
#signup {
 display: grid;
 justify-content: center;
 align-items: center;
 position: absolute;
 height: 100%;
 width: 100%;
 background-color: rgb(240, 240, 240);
}
.form {
 display: flex;
 flex-wrap:wrap;
 box-shadow: 0px 0px 10px 0px gray;
 border-radius: 20px;
 margin:20px;
}
.display1 {
 max-width: 35rem;
 background-color: white;
 height: auto;
 border-radius: 20px;
 padding: 20px;
 display: grid;
 justify-content: center;
 align-items: center;
 margin:auto;
}
.display2{
 display: none;
}
.title p {
 font-weight: 600;
 font-size: 50px;
}

.checkbox {
 display: flex;
 align-items: start;
 justify-content: center;
 align-content: center;
 gap: 10px;
}
.signup-with button {
 padding: 10px;
 background-color: white;
 display: flex;
 align-items: center;
 font-size: 15px;
 border: 1px solid black;
 transition: all linear 0.2s;
}

.signup-with button:hover {
 border: solid 1px black;
 background: black;
 color: white;
}

.create-account-btn button {
 background-color: rgb(30, 83, 228);
 color: White;
 border: 0;
}

.create-account-btn button:hover {
 background-color: black;
 color: white;
}
.backBtn {
    background: none;
    border:none;
    
}
.backBtn img{
    width: 20px;
}
}

/* For medium screens (tablets) */
@media screen and (min-width: 601px) and (max-width: 768px) {
 .element {
   /* Apply styles for medium screens */
 }
}


</style>
