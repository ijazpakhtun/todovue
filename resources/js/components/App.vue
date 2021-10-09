<template>
   
    <section class="container">
        
        
        <div class=" col-lg-12 text-center">

            <h1>TODO APP</h1>
            <br><br>
        </div>


         <div class="row">

            <div class="col">

                

              </div>

    <div class="col">
        <div class="container">
            <div class="row justify-content-center js-fullheight">
                <div class="col-md-6 text-center d-flex align-items-center">
                    <div class="">
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                          Add Task
                        </button>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div> 

 
<br>



<hr>


		
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" @hide="resetfrom" ref="my-modal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true" class="ion-ios-close"></span>
		        </button>
		      </div>
		      <div class="modal-body p-4 py-5 p-md-5">
		      	<h3 class="text-center mb-3"><strong>ADD A Task</strong> </h3>
		      <br>
            <section class="container">
                <form  class="needs-validation"   ref="my-form"  novalidate id="myform" >
                    <div class="">
                        
                      <div class="form-group col-md-12 col-lg-12">
                        <label for="inputname">Task Name</label>
                        <input v-model="task.title" type="text"  class="form-control"  pattern=".{5,10}" id="taskname" placeholder="Task Name" required>
                        <div class="alert alert-danger" v-if="errors && errors.title">
                          The name is required and should be of 5 to 10 characters
                        </div>
                      </div>
                      <div class="form-group col-md-12 col-lg-12">
                        <label for="Description">Description</label>
                        <textarea v-model="task.description" class="form-control" name="description"  id="description" placeholder="Description of the task"  required></textarea>
                            <div class="alert alert-danger" v-if="errors && errors.description">
                              {{errors.description[0]}}
                            </div>
                      </div>
                   
                    <div class="form-group col-md-12 col-lg-12">
                      <label for="Assigne">Assign to</label>
                     
                      <select v-model="task.assignedto" id="assinedto" class="form-control" name="assinedto"  required>
                        <option selected value="" disabled>Choose...</option>
                        <option>Ijaz</option>
                        <option>Nur</option>
                        <option>Zach</option>
                        
                        </select>
                        <div class="alert alert-danger" v-if="errors && errors.assignedto">
                          {{errors.assignedto[0]}}
                        </div>
                     
                     
                      <!-- <input type="text" class="form-control" id="Assigne" placeholder="person name e.g ijaz"> -->
                    </div>
                    
                    
                      <div class="form-group col-md-12 col-lg-12 ">
                        <label for="status">Status</label>
                        <select v-model="task.status" id="status" name="status" class="form-control" required>
                          <option selected value=""  disabled>Choose...</option>
                          <option>TODO</option>
                          <option>IN PROGRESS</option>
                          <option>REVIEW</option>
                          <option>DONE</option>
                          
                        </select>
                        <div class="alert alert-danger" v-if="errors && errors.status">
                          {{errors.status[0]}}
                        </div>
                      </div>
                    <div class="form-group col-md-12 col-lg-12">
                                <label for="priority">Priority</label>
                                <select v-model="task.priority" id="priority" name="priority" class="form-control" required>
                                <option selected value="" disabled>Choose...</option>
                                <option>High</option>
                                <option>Medium</option>
                                <option>Low</option>
                                
                                </select>
                                <div class="alert alert-danger" v-if="errors && errors.priority">
                                  {{errors.priority[0]}}
                                </div>
                            </div>
            
            
                      <div class="form-group col-md-12 col-lg-12">
                        <label for="duedate">Due Date</label>
                        <input v-model="task.duedate" type="date" name="duedate" class="form-control" id="duedate" required>
                        <div class="alert alert-danger" v-if="errors && errors.duedate">
                          {{errors.duedate[0]}}
                        </div>
                      </div>
                      
                    </div>
                    
                    <div class="form-group col-md-12 col-lg-12 text-center">
                      <div class="row">
                        <div class="col-md-6">
                            <button type="submit" @click="addtask" id="taskfrom" class="btn btn-primary form-control col-md-8">Add Task</button> 


                        </div>
                         <div class="col-md-6">

                            <button type="reset" @click="resetfrom" class="btn btn-warning form-control col-md-8">Reset</button> 

                        </div>
                    </div>
                           
                    
                </div>
           
             </form>


             </section>
    
    </div>
  </div>
</div>
</div>



            
         
            


           <section class="container">

            <div class="row" id="tasklist">

                     <task-component v-for="task in tasks" :key="task.id" :task="task" @delete="remove" ></task-component>

            </div>

           </section>


</section>  
          
</template>

<script>
// import { defineComponent } from '@vue/composition-api'
import TaskComponent from './Task.vue';
// import Vuelidate from 'vuelidate'
// Vue.use(Vuelidate);
// import Loading from 'vue-loading-overlay';
// import 'vue-loading-overlay/dist/vue-loading.css';
export default ({
    data() {
      
       return {
        //  isLoading: false,
        //  fullPage: false,
        //  loader: 'bars',
         tasks: [],
         success:false,
         errors:{},
         task:{title:'', priority:'', description:'', assignedto:'', status:'', duedate:''}
       } 
    },
    mounted(){
        $(this.$refs['my-modal']).on("hidden.bs.modal", this.resetfrom)
      },

    methods:{

     
       resetfrom(){
          
        // this.task = []
        this.errors = []
           this.task.title = null;
           this.task.description = null;
           this.task.priority = null;
           this.task.status = null;
           this.task.duedate = null;
           this.task.assignedto = null;
        // this.$refs['my-form'].reset();
       },
        gettasks(){
            window.axios.get('/api/tasks').then(({data})=>{
               
                data.forEach(task => {
                    this.tasks.push(task);
                });
               
            });
        },

         store(){
            
                //  this.isLoading = true;
                  window.axios.post('/api/tasks',this.task).then(savedtask=>{
                 this.tasks.push(savedtask.data);
                //  this.isLoading = false;
             });
           
            
        },
        remove(id){
          //  this.isLoading = true;
            window.axios.delete(`/api/tasks/${id}`).then(()=>{
                let index=this.tasks.findIndex(task=>task.id===id);
                this.tasks.splice(index,1);
            // this.isLoading = false;
            });
            
        },

        addtask(e){
            e.preventDefault();



            
             window.axios.post('/api/tasks',this.task).then(savedtask=>{
                 this.tasks.push(savedtask.data); 
                 
                  $('#exampleModalCenter').modal('hide');
                $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                 
                 }).catch(error=>{
              if(error.response.status==422){
                 this.errors=error.response.data.errors;
              
              }
               
             });
         

                 

        }, 


      
    },
    created(){
        this.gettasks();
    },
   
    components:{TaskComponent}
});



</script>

<style scoped>

</style>
