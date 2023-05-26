<template>
    <div>
        <div class="container-fluid bg-light py-1">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                <img :src="logoImage" alt="logo" style="width: 80px;height: 60px;" />
                </div>

                <div class="d-flex gap-2 align-middle">
                <router-link
                    class="all-btn btn text-decoration-none"
                    to="/students">
                    ALL STUDENTS
                </router-link>
                <router-link class="add-btn btn text-white text-decoration-none" to="/students/create">
                    <i class="fa fa-plus align-middle pe-2" style="font-size: 18px"></i>
                    Create New Student
                </router-link>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "navbarApp",
        data(){
            return{
                logoImage: require('@/assets/logo.png'),
            }
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