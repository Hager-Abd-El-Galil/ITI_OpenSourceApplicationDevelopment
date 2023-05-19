<template>
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
            <tbody v-if="filterUsers.length !== 0">
                <tr  v-for="user, index in filterUsers" :key="index">
                    <td>{{index + 1}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.age}}</td>
                    <td>{{user.role}}</td>
                    <td><button @click="$emit('deletingUser', index)"><i class="fa fa-trash text-danger"></i></button></td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td :class="emptyRowStyle" colspan="5">No Data</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default(await import('vue')).defineComponent ({
        name: 'UsersComponent',
        props:['filterUsers'],
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