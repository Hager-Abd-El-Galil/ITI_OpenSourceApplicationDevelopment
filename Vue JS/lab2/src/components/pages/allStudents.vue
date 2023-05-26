<template>
    <div class="container my-5 d-flex flex-row flex-wrap justify-content-around gap-2">
        <div
            v-for="student of students" :key="student.id"
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
                    <i class="fa fa-duotone fa-eye text-secondary"></i>
                </router-link>
                <router-link
                    class="text-decoration-none"
                    :to= "`/students/edit/${student.id}`"
                >
                    <i class="fa fa-edit text-cafe"></i>
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
import axios from "axios";

    export default {
        name: 'allStudentsApp',
        created(){
            this.getAllStudents();
        },
        data(){
            return{
                students: []
            }
        },
        methods: {
            getAllStudents(){
                axios
                .get("http://localhost:3200/students")
                .then((res)=>{
                    this.students = res.data;
                    console.log(`All Students = ${res.data}`);
                })
                .catch((err)=>{
                    console.log(`Error in Getting All Students`);
                    console.log(err);
                })
            },
            deleteStudent(id){
                axios
                .delete(`http://localhost:3200/students/${id}`)
                .then((res)=>{
                    console.log(`Student With id = ${id} has been Deleted Successfully`);
                    console.log(res);
                    this.getAllStudents();
                })
                .catch((err)=>{
                    console.log(`Error in Deleting Student With id = ${id}`);
                    console.log(err);
                })
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