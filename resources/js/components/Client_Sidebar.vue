<script setup>
import { onMounted, ref, watch } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter()
const burgerProps = defineProps(['showBurger'])
const hideBurgerEmit = defineEmits(['hideBurger'])
const isBurger = ref(false)

watch(burgerProps, (oldVal, newVal) => {
  if (burgerProps.showBurger == true) {
    isBurger.value = true
  } else if (burgerProps.showBurger == false) {
    isBurger.value = false
  }
})

const hideBurger = () => {
  hideBurgerEmit('hideBurger')
}

const logoutBtn = () => {
  axios({
    url: 'api/logout',
    method: 'GET'
  }).then(response => {
    if(response.status === 200){
      router.push('/login')
    }
  })
}


</script>

<template>
  <aside id="sidebar">
    <div class="sidebar" :class="{ burger: isBurger }">
      <div class="title mt-3">
        <img src="/public/image/logo.png" width="150" alt="">
        <img src="/public/image/burder-menu1.png" alt="" width="40px" height="40px" @click="hideBurger" />
      </div>
      <div class="menu1">
        <ul class="navbar nav mt-1">
          <router-link :to="{name: 'client-dashboard'}" class="item1" >
            <li class="nav-link text-dark">
              <img src="/public/image/dashboard-icon.png" width="20px" alt="" />
              Dashboard
            </li>
          </router-link>
          <router-link  :to="{name: 'client-settings'}" class="item1" >
            <li class="nav-link text-dark">
              <img src="/public/image/settings-icon.png" width="20px" alt="" />
              Settings
            </li>
          </router-link>
          <router-link :to="{name: 'client-manage'}" class="item1">
            <li class="nav-link text-dark">
              <img src="/public/image/manage-icon.png" width="20px" alt="" />
              Manage
            </li>
          </router-link>
          <a class="item1" @click="logoutBtn">
            <li class="nav-link text-dark">
              <img src="/public/image/logout.png" width="22" alt="">
              Logout
            </li>
          </a>
        </ul>
      </div>
    </div>
  </aside>
</template>
<style scoped>
.sidebar {
  width: 15rem;
  box-shadow: 0px 0px 5px 0px gray;
  border-width: 0px 2px 0px 0px;
  position: absolute;
  height: 100%;
  overflow-y: scroll;
  z-index: 999;
  background: white;
  transform: translate(-100%);
  transition: all linear 0.3s;
}

.burger {
  transition: all linear 0.3s;
  transform: translate(0);

}


.sidebar::-webkit-scrollbar {
  width: 2px;
  height: 50px;
}

.sidebar::-webkit-scrollbar-thumb {
  background-color: #d3d3d3;
  border-radius: 10px;
}

.sidebar::-webkit-scrollbar-track {
  background-color: #f4f9fa;
}

.title {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.item1 {
  width: 100%;
  padding: 15px;
  transition: all linear 0.2s;
}

.item1:hover {
  background: rgb(231, 230, 230);
  color: rgb(253, 248, 248);
}
a{
  text-decoration: none;
}

.nav-link {
  display: flex;
  align-items: center;
  gap: 10px;
  color: red;
  
}
.router-link-active, .router-link-exact-active {
  background-color: rgb(206, 59, 59);
}
</style>