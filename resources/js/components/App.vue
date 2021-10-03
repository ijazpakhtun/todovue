<template>
   
        <table className="table">
            <thead>
                <tr>
                    <th>Task Title</th>
                    <th>Priority</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                
            </tbody>

            <task-component v-for="task in tasks" :key="task.id" :task="task" @delete="remove" ></task-component>
            <tr>
                <td><input v-model="task.title" type="text" id="task"></td>
                <td>
                    <select  v-model="task.priority"  id="priority" className="form-control">
                        <option >Low</option>
                        <option >Medium</option>
                        <option >High</option>
                    </select>
                </td>
                <td><input @click="store" type="button" value="Add"></td>
            </tr>

        </table>
   
</template>

<script>
// import { defineComponent } from '@vue/composition-api'
import TaskComponent from './Task.vue';
export default ({
    data() {

       return {

         tasks: [],
         task:{title:'', priority:''}
       } 
    },

    methods:{
        gettasks(){
            window.axios.get('/api/tasks').then(({data})=>{
               
                data.forEach(task => {
                    this.tasks.push(task);
                });
               
            });
        },

         store(){
             window.axios.post('/api/tasks',this.task).then(savedtask=>{
                 this.tasks.push(savedtask.data);
             });
        },
        remove(id){
            console.log(`i got id : ${id}`);
        }
    },
    created(){
        this.gettasks();
    },
   
    components:{TaskComponent}
})
</script>

<style scoped>

</style>
