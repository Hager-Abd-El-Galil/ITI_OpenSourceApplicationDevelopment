<template>
    <div :class="AllContainer" :style="theme ? lightTheme : darkTheme">
        <div class="text-end me-5">
            <label class="switch mb-3">
                <input type="checkbox" :class="ToggleBtn" @click="theme = !theme">
                <span class="slider round"></span>
            </label>
        </div>
        <!-- Header -->
        <div class="text-center">
            <button :class="HeaderBtn" @click="checkValue('Form')">Form</button>
            <button :class="HeaderBtn" @click="checkValue('Admins')">Admins</button>
            <button :class="HeaderBtn" @click="checkValue('Users')">Users</button>
        </div>
        <div v-if="btn === 'Admins'"><AdminsComponent :filterAdmins="filterAdmins" @deletingAdmin="DeleteAdmin"/></div>
        <div v-else-if="btn === 'Users'"><UsersComponent :filterUsers="filterUsers" @deletingUser="DeleteUser"/></div>
        <div v-else>
            <!-- Form Structure -->
            <form :class="formStyle" class="col-7 col-md-4 col-lg-3" @submit.prevent="AddNew">
                <h1 :class="formTitleStyle" class='text-center fw-bolder'>Registration Form</h1>
                <hr :class="formLineStyle"/>

                <section :class="bgStarsStyle">
                    <span :class="starStyle"></span>
                    <span :class="starStyle"></span>
                    <span :class="starStyle"></span>
                    <span :class="starStyle"></span>
                </section>

                <label :class="labelStyle" class="fw-bold fs-3" for="name">Name</label>
                <input :class="inputStyle" v-model.trim.lazy="formValues.name" name="name" id="name" placeholder="Enter Your Name" type="text"/>
                            
                <label :class="labelStyle" for="age" class="fw-bold fs-3">Age</label>
                <input :class="inputStyle" v-model.number.lazy="formValues.age" name="age" id="age" placeholder="Enter Your Age" type="number"/>

                <label :class="labelStyle" for="role" class="fw-bold fs-3">Role</label>
                <select :class="inputStyle" v-model.lazy="formValues.role" name="role">
                    <option disabled selected>Enter Your Role</option>
                    <option value="Admin">Admin</option>
                    <option value="User">User</option>
                </select>

                <button :class="addButtonStyle" id="add" type="submit">ADD<span></span></button>
            </form>
        </div>

    </div>
</template>

<script>
    import AdminsComponent from './AdminsComponent.vue';
    import UsersComponent from './UsersComponent.vue';

    export default(await import('vue')).defineComponent ({
        name: "FormComponent",
        components:{
            AdminsComponent,
            UsersComponent
        },
        data(){
            return{
                AllContainer: "all-container",
                theme: true,
                lightTheme: {background: '#fff'},
                darkTheme:  {background: 'rgba(0,0,0,0.75)'},
                HeaderBtn : "header-btn",
                formStyle: "form",
                bgStarsStyle: "bg-stars",
                starStyle : "star",
                formTitleStyle : "title",
                labelStyle : "label",
                formLineStyle: "line",
                inputStyle : "form-input",
                addButtonStyle : "add-btn",
                btn : 'Form',
                formDataArray: [],
                formValues:{
                    name:'',
                    age:'',
                    role:''
                }
            }
        },
        methods:{
            AddNew(){
                this.formDataArray.push(this.formValues);
                this.formValues ={
                    name:'',
                    age:'',
                    role:''
                }
            },
            checkValue(val){
                if(val === 'Form') this.btn = 'Form';
                else if(val === 'Admins') this.btn = 'Admins';
                else if(val === 'Users') this.btn = 'Users';
                else this.btn = 'Form';
            },
            DeleteAdmin(index) {
                this.filterAdmins.splice(index, 1);
            },
            DeleteUser(index) {
                this.filterUsers.splice(index, 1);
            }
        },
        computed:{
            filterAdmins(){
                return this.formDataArray.filter((d)=>d.role === 'Admin')
            },
            filterUsers(){
                return this.formDataArray.filter((d)=>d.role === 'User')
            }
        }
        
    });
</script>

<style scoped>
    .all-container{
        height: 100vh;
        padding: 30px;
    }
    .header-btn{
        color: #d6a8a0;
        border:solid 2px #d6a8a0;
        font: 1.2rem 'Dancing Script', cursive;
        font-weight: bold;
        background: #fff;
        padding: 0.5rem 2rem;
        margin: 3% 1%;
        margin-top:0%;
    }
    .header-btn:hover{
        background: #d6a8a0;
        color:#fff;
    }
    .form {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin: 0 auto;
        padding: 2rem;
        background: #d6a8a0; 
        border: 2px solid #d6a8a0;
        box-shadow: #d6a8a0 0px 0px 50px -15px;
        overflow: hidden;
        z-index: 1;
        }
    .title, .label{
        text-align: left;
        font-family: 'Dancing Script', cursive; 
        color:#fff; 
    }
    .line{
        border: solid 2px white;
        border-radius: 10px;
    }    
    .form-input{
        width: 100%;
        padding: 8px;
        font-size: 16px;
        border: solid thin #d6a8a0;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .form-input:focus{
        border: solid 2px #ede6e5;
        box-shadow: rgba(155,255,255,0.3) 2px 2px;
        box-shadow: #fff 0px 0px 50px -15px;
        outline: none;
    }
  
    .add-btn {
        border: none;
        display: block;
        position: relative;
        width:60%;
        margin: 0 auto;
        padding: 0.7em 2.4em;
        font-size: 18px;
        background: #d6a8a0;
        cursor: pointer;
        user-select: none;
        overflow: hidden;
        color: #fff;
        z-index: 1;
        font-family: 'Dancing Script', cursive;
        font-weight: bold;
    }
  
    .add-btn span {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: transparent;
        z-index: -1;
        border: 3px solid #fff;
    }
  
    .add-btn span::before {
        content: "";
        display: block;
        position: absolute;
        width: 8%;
        height: 500%;
        background: #d6a8a0;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) rotate(-60deg);
        transition: all 0.3s;
    }
  
    .add-btn:hover span::before {
        transform: translate(-50%, -50%) rotate(-90deg);
        background: #fff;
    }
    .add-btn:hover {
        color: #d6a8a0;
        background: #fff;
        transition: all 0.1s ease;
    }
    .bg-stars {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -2;
    background-size: cover;
    animation: animateBg 50s linear infinite;
    }

    @keyframes animateBg {
    0%,100% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.2);
    }
    }

    .star {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 4px;
    height: 4px;
    background: #fff;
    border-radius: 50%;
    box-shadow: 0 0 0 4px rgba(255,255,255,0.1),0 0 0 8px rgba(255,255,255,0.1),0 0 20px rgba(255,255,255,0.1);
    animation: animate 3s linear infinite;
    }

    .star::before {
    content: '';
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 300px;
    height: 1px;
    background: linear-gradient(90deg,#fff,transparent);
    }

    @keyframes animate {
    0% {
        transform: rotate(315deg) translateX(0);
        opacity: 1;
    }

    70% {
        opacity: 1;
    }

    100% {
        transform: rotate(315deg) translateX(-1000px);
        opacity: 0;
    }
    }
    .star:nth-child(1) {
        top: 0;
        right: 0;
        left: initial;
        animation-delay: 0s;
        animation-duration: 1s;
    }
    .star:nth-child(2) {
        top: 0;
        right: 100px;
        left: initial;
        animation-delay: 0.2s;
        animation-duration: 3s;
    }
    .star:nth-child(3) {
        top: 0;
        right: 220px;
        left: initial;
        animation-delay: 2.75s;
        animation-duration: 2.75s;
    }
    .star:nth-child(4) {
        top: 0;
        right: -220px;
        left: initial;
        animation-delay: 1.6s;
        animation-duration: 1.6s;
    }
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }
    .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
    }
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }
    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }
    input:checked + .slider {
        background-color: #d6a8a0;
    }
    input:focus + .slider {
        box-shadow: 0 0 1px #d6a8a0;
    }
    input:checked + .slider:before {
        transform: translateX(26px);
    }
    .slider.round {
        border-radius: 34px;
    }
     .slider.round:before {
        border-radius: 50%;
    }

</style>