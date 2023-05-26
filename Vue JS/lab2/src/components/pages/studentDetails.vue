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
                    {{Student.name}}
                </h1>

                <p>Age : {{Student.age}}</p>
                <p>Email : {{Student.email}}</p>
                <p>Phone : {{Student.phone}}</p>
                <p>Grade : {{Student.grade}}</p>
                
                <div>
                    <span class="bg-light w-auto px-3 rounded-5" style="font-family: 'Brush Script MT', cursive;">
                    ID : {{Student.id}}
                    </span>  
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import axios from 'axios';
    export default {
        name: "studentDetails",
        created(){
            this.getStudentById()
        },
        data(){
            return{
                Student:{
                    id: '',
                    name: '',
                    email: '',
                    age: '',
                    phone: '',
                    grade: ''
                }
            }
        },
        methods:{
            getStudentById(){
                this.id = this.$route.params.id;
                axios
                .get(` http://localhost:3200/students/${this.id}`)
                .then((res)=>{
                    this.Student.id = res.data.id
                    this.Student.name = res.data.name
                    this.Student.email = res.data.email
                    this.Student.age = res.data.age
                    this.Student.phone = res.data.phone
                    this.Student.grade = res.data.grade
                })
                .catch((err)=>console.log(err))
                },
                back(){
                    this.$router.push('/students')
            }
        }
    }
</script>

<style scoped>
</style>