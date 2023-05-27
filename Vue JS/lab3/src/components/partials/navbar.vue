<template>
    <div>
        <div class="container-fluid py-1" v-theme="''">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                <img :src="require('@/assets/logo.png')" alt="logo" style="width: 80px;height: 60px;" />
                </div>

                <div class="d-flex gap-2 align-middle">
                    <router-link
                        class="all-btn btn text-decoration-none"
                        to="/students">
                        ALL STUDENTS
                    </router-link>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "navbarApp",
        setup(){
        }
    }
</script>

<style scoped>
    .add-btn{
        background: #bdb0a4;
    }
    .add-btn:hover{
        color: #bdb0a4 !important;
        border: solid 1.5px #bdb0a4;
    }
    .all-btn{
        color: #bdb0a4;
        background: transparent;
    }
    .all-btn:hover{
        color: #bdb0a4;
        border: solid 1.5px #bdb0a4;
    }

</style>