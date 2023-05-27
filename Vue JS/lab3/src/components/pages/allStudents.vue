<template>
    <div class="container my-5 d-flex flex-row flex-wrap justify-content-around gap-2">
        <div
            v-for="student of students.students" :key="student.id"
            class="student-card d-block my-5 col-md-3 col-lg-2 rounded mb-2"
        >
            <div class="alert card p-0">
            <div class="card-body">
                <div class="align-middle">
                <div class="image">
                    <img
                        src="@/assets/student.png"
                        alt="student Icon"
                        style="width: 60px;"
                    />
                </div>
                <div class="text-name fw-bold">
                    {{ student.name }}
                </div>
                </div>
                <hr class="border-2" />
                <p class="card-text text-secondary truncate">
                Grade : {{ student.grade }}
                </p>
            </div>
            <div class="d-flex justify-content-evenly mx-5">
                <router-link class="text-decoration-none" :to="`/students/${student.id }`">
                    <i class="fa fa-duotone fa-eye text-cafe"></i>
                </router-link>
                <router-link
                    class="text-decoration-none"
                    @click="deleteStudent(student.id)" to="/"
                >
                    <i class="fa fa-trash text-danger"></i>
                </router-link>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { reactive } from 'vue'
    import axios from 'axios'

    export default {
        name: "allStudents",
        setup() {
            const state = reactive({
            students: []
            })
            // Get All Students
            getAllStudents();
            // Get All Students Function
            function getAllStudents(){
                axios
                .get("http://localhost:3200/students")
                .then((res)=>{
                    state.students = res.data;
                    console.log(`All Students = ${res.data}`);
                })
                .catch((err)=>{
                    console.log(`Error in Getting All Students`);
                    console.log(err);
                })
            }
            // Get Student By ID Function
            function deleteStudent(id){
                axios
                .delete(`http://localhost:3200/students/${id}`)
                .then((res)=>{
                    console.log(`Student With id = ${id} has been Deleted Successfully`);
                    console.log(res);
                    getAllStudents();
                })
                .catch((err)=>{
                    console.log(`Error in Deleting Student With id = ${id}`);
                    console.log(err);
                })
            }

            return{
                students:state,
                getAllStudents,
                deleteStudent
            }
        }
    }
</script>

<style scoped>
.student-card{
    border:solid 1.5px #bdb0a4;
}
.student-card:hover{
    transform: scale(1.1);
    cursor: pointer;
}
hr{
    border:solid 1.5px #c2a085; 
}
.text-name{
    color: #c2a085;
    font-family: 'Brush Script MT', cursive;
    font-size: xx-large;
}
</style>