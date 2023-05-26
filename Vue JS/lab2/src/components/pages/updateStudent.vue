<template>
        <div class="col-10 col-md-4 col-lg-3">
            <form
                class="form card-text d-flex flex-column justify-content-center gap-2 border-cafe rounded p-4"
                @submit.prevent="UpdateStudent"
                >
                <div class="text-cafe text-style fw-bold mb-4">Update Student</div>
                <!--Student Name Input-->
                <div class="input-group flex-nowrap">
                    <div class="border-cafe bg-white">
                    <span class="input-group-text bg-white border-white"
                        ><i class="fas fa-user-alt text-cafe bg-white" style="font-size: 23px"></i
                    ></span>
                    </div>
                    <input
                    type="text"
                    class="form-control"
                    placeholder="Student Name"
                    v-model="updatedStudent.name"
                    />
                </div>

                <!--Student Age Input-->
                <div class="input-group flex-nowrap">
                    <div class="border-cafe bg-white">
                    <span class="input-group-text bg-white border-white"
                        ><i class="fas fa-user-edit text-cafe bg-white" style="font-size: 21.5px"></i
                    ></span>
                    </div>
                    <input
                    type="number"
                    class="form-control"
                    placeholder="Student Age"
                    v-model="updatedStudent.age"
                    />
                </div>

                <!--Student Email Input-->
                <div class="input-group flex-nowrap">
                    <div class="border-cafe bg-white">
                    <span class="input-group-text bg-white border-white"
                        ><i class="fa fa-envelope text-cafe bg-white" style="font-size: 24px"></i
                    ></span>
                    </div>
                    <input
                    type="email"
                    class="form-control"
                    placeholder="Student Email"
                    v-model="updatedStudent.email"
                    />
                </div>

                <!--Student Phone Input-->
                <div class="input-group flex-nowrap">
                    <div class="border-cafe bg-white">
                    <span class="input-group-text bg-white border-white"
                        ><i class="fa fa-phone text-cafe bg-white" style="font-size:23px"></i
                    ></span>
                    </div>
                    <input
                    type="text"
                    class="form-control"
                    placeholder="Student Phone"
                    v-model="updatedStudent.phone"
                    />
                </div>

                <!--Student Grade Input-->
                <div class="input-group flex-nowrap col-12">
                    <div class="border-cafe bg-white">
                    <span class="input-group-text bg-white border-white"
                        ><i class="fas fa-star text-cafe bg-white" style="font-size: 23px"></i
                    ></span>
                    </div>
                    <select class="w-100" v-model="updatedStudent.grade">
                        <option v-if="updatedStudent.grade == 'Excellent'" value="Excellent" selected v-once>Excellent</option>
                        <option v-if="updatedStudent.grade == 'Very Good'" value="Very Good" selected v-once>Very Good</option>
                        <option v-if="updatedStudent.grade == 'Good'" value="Good" selected v-once>Good</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Very Good">Very Good</option>
                        <option value="Good">Good</option>
                    </select>
                </div>

                <div>
                    <input
                    type="submit"
                    class="form-control btn update-btn"
                    value="UPDATE"
                    />
                </div>
            </form>
        </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "updateStudent",
        created(){
            this.getStudentById();   
        },
        data(){
            return{
                updatedStudent: {
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
                    this.updatedStudent.id = res.data.id
                    this.updatedStudent.name = res.data.name
                    this.updatedStudent.email = res.data.email
                    this.updatedStudent.age = res.data.age
                    this.updatedStudent.phone = res.data.phone
                    this.updatedStudent.grade = res.data.grade
                })
                .catch((err)=>console.log(err))
                },
            back(){
                this.$router.push('/students')
            },
            UpdateStudent(){
                axios
                .put(`http://localhost:3200/students/${this.updatedStudent.id}`
                    ,this.updatedStudent)
                .then((res)=>{
                    console.log("A Student with ID = ${this.id}` has been Updated Successfully")
                    console.log(res);
                    this.back();
                })
                .catch((err)=>{
                    console.log(`Error at Updating a Student with ID = ${this.updatedStudent.id}`)
                    console.log(err);
                })

            }
        }
    }
        
    
</script>

<style scoped>
    input, select{
        border: solid thin #c2a085;
    }
    .update-btn{
        color: white;
        background: #c2a085;
    }
    .update-btn:hover{
        color: #c2a085;
        background: transparent;
        border: solid thin #c2a085;
    }
</style>