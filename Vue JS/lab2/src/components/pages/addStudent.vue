<template>
        <div class="col-10 col-md-4 col-lg-3">
            <form
            class="form card-text d-flex flex-column justify-content-center gap-2 border-cafe p-4"
                    @submit.prevent="AddNewStudent"
                    >
                    <div class="text-cafe text-style fw-bold mb-4">Add New Student</div>
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
                        v-model="newStudent.name"
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
                        v-model="newStudent.age"
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
                        v-model="newStudent.email"
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
                        v-model="newStudent.phone"
                        />
                    </div>

                    <!--Student Grade Input-->
                    <div class="input-group flex-nowrap">
                        <div class="border-cafe bg-white">
                        <span class="input-group-text bg-white border-white"
                            ><i class="fas fa-star text-cafe bg-white" style="font-size: 23px"></i
                        ></span>
                        </div>
                        <select class="w-100" v-model="newStudent.grade" aria-placeholder="Student Grade">
                            <option value="Excellent">Excellent</option>
                            <option value="Very Good">Very Good</option>
                            <option value="Good">Good</option>
                        </select>
                    </div>

                    <div>
                        <input
                        type="submit"
                        class="form-control btn add-btn"
                        value="ADD"
                        />
                    </div>
            </form>   
        </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "addStudent",
        data(){
            return{
                newStudent: {
                    id: '',
                    name: '',
                    email: '',
                    age: '',
                    phone: '',
                    grade: ''
                }
            }
        },
        methods: {
            back(){
                this.$router.push('/students')
            },
            AddNewStudent(){
                axios
                .post(`http://localhost:3200/students`
                    ,this.newStudent)
                .then((res)=>{
                    console.log("A New Student has been added Successfully");
                    console.log(res);
                    this.back();
                })
                .catch((err)=>{
                    console.log("Error at Adding New Student");
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
    .add-btn{
        color: white;
        background: #c2a085;
    }
    .add-btn:hover{
        color: #c2a085;
        background: transparent;
        border: solid thin #c2a085;
    }

</style>