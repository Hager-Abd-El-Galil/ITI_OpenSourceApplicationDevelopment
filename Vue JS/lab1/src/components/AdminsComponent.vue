<template>
    <div>
        <div class="container col-8 col-md-6">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Role</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody v-if="filterAdmins.length !== 0">
                <tr  v-for="admin,index in filterAdmins" :key="index">
                    <td>{{index + 1}}</td>
                    <td>{{admin.name}}</td>
                    <td>{{admin.age}}</td>
                    <td>{{admin.role}}</td>
                    <td><button @click="$emit('deletingAdmin', index)"><i class="fa fa-trash text-danger"></i></button></td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td :class="emptyRowStyle" colspan="5">No Data</td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
</template>

<script>
    export default(await import('vue')).defineComponent ({
        name: 'AdminsComponent',
        props:['filterAdmins'],
        data(){
            return{
                emptyRowStyle: "emptyRow"
            }
        }
    })
</script>

<style scoped>
    .table{
        border: solid thin #d6a8a0;
        font-family: 'Dancing Script', cursive;
        font-size: large; 
    }
    th{
        color:#d6a8a0; 
        font-size: larger;
    }
    .emptyRow{
        font-family: 'Dancing Script', cursive; 
        color: rgb(40, 39, 39); 
    }
    button{
        border:none;
        background: transparent;
    }

</style>