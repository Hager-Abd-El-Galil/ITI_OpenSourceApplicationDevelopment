<template>
    <div class="card col-md-6 mx-auto card-text">
        <div class="d-flex">
            <div class="col-md-6 border-cafe align-items-center">
                <img class="card-img-top rounded align" src="@/assets/student.png"
                    alt="student image"  style="height: 100%;padding: 3%;">
            </div>
            <div class="col-md-6 text-center border-cafe py-5">
                <div class="The">
                    <div class="line"></div>
                    <h2 class="text-style"> Student </h2>
                </div>
                <h1 class="text-cafe text-style">
                    {{Student.Student.name}}
                </h1>

                <p>Age : {{Student.Student.age}}</p>
                <p>Email : {{Student.Student.email}}</p>
                <p>Phone : {{Student.Student.phone}}</p>
                <p>Grade : {{Student.Student.grade}}</p>
                
                <div>
                    <span class="bg-light w-auto px-3 rounded-5" style="font-family: 'Brush Script MT', cursive;">
                    ID : {{Student.Student.id}}
                    </span>  
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import { reactive } from 'vue'
    import axios from 'axios'
    import { useRoute } from 'vue-router'
    export default {
        name: "studentDetails",
        setup() {
            let state = reactive({
                Student:{
                }
            });
            const route = useRoute();

            // Get Student By ID Function
            function getStudentByID(){ 
                let id  = route.params.id;
                axios
                .get(`http://localhost:3200/students/${id}`)
                .then((res)=>{
                    if(res.data){
                        state.Student = res.data 
                        console.log(`A Student with ID = ${id} = ${res.data}`);
                    }
                })
                .catch((err)=>{
                    console.log(`Error in Getting A Student with ID = ${id}`);
                    console.log(err);
                })
            }

            getStudentByID()

            return{
                Student:state,
                getStudentByID
            }
        }
    }

</script>

<style scoped>

</style>