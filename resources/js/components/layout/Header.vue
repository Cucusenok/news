<template>

    <div class="main-header">

        <div class="menu-container">

            <div class="menu-container__left">
                <div class="menu-container__item">
                    <router-link :to="{ name: 'home' }">Home</router-link>
                </div>
                <div class="menu-container__item">
                    <router-link :to="{ name: 'hello' }">Hello</router-link>
                </div>
                <div class="menu-container__item">
                    <router-link :to="{ name: 'new-post' }">New Post</router-link>
                </div>
                <div class="menu-container__item">
                    <router-link :to="{ path: '/posts/1' }">Posts</router-link>
                </div>
            </div>

            <div class="menu-container__right">
                <div class="menu-container__item mr-20">
                    <router-link :to="{ path: '/profile' }">Profile</router-link>
                </div>
                <div class="menu-container__right-item" @click="backButtonClick">Назад</div>
            </div>

        </div>
    </div>




</template>

<script>
    export default {
        name: "Header",

        methods: {

            backButtonClick() {
                this.$router.go(-1);
            }

        },

    }


</script>

<style scoped lang="scss">
    .main-header {
        margin-top: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .menu-container {
        width: 1120px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 45px;
        background: #2a2a2a;
        color: #fff;

        &__right {
            width: 20%;
            display: flex;
            justify-content: flex-end;

            &-item {
                margin-right: 20px;
            }
        }

        &__left {
            width: 80%;
            display: flex;
        }

        &__item > a {
            margin-left: 20px;
            color: #fff;
        }
    }


</style>