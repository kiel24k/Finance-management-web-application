<template>
    <header>
        <div class="content1">
         <img src="/public/image/logo.png" width="150px" alt="">
        </div>
        <div class="content2">
        <ul class="navbar nav">
            <li class="nav-item">
                <a href="#section-one" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="#section-two" class="nav-link">Features</a>
            </li>
            <li class="nav-item">
                <a href="#section-three" class="nav-link">Contact</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Signup</a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Login</a>
            </li>
        </ul>
        </div>
     </header>
     
</template>

<style scoped>

:root{
    --background-color: #F6E8DF;
    --bold-font-color: #013237;
    --button-color: #FE979C;
}

    header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        position: sticky;
        top:0;
        background-color: #ffffff;
        backdrop-filter: blur(10px);
        padding:10px;
        box-shadow: 0px 0px 5px 0px gray;
    }
    .nav-item a{
        font-weight: bold;
        color:var(--bold-font-color)
    }
</style>