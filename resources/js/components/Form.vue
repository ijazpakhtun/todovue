<template>
    	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <form  class="needs-validation"  novalidate id="myform" >
                    <div class="">
                        
                      <div class="form-group col-md-12 col-lg-12">
                        <label for="inputname">Task Name</label>
                        <input type="text" v-model.trim="taskName" name="taskName" class="form-control"  pattern=".{5,10}" id="taskname" placeholder="Task Name" required>
                       
                       <p v-if="!$v.taskName.taskName">Email is required</p>
                       <p v-if="!$v.taskName.required">Email is required</p>
                        <div class="invalid-feedback">
                          Name is required and should be of 5 to 10 characters
                        </div>
                      </div>
                      <div class="form-group col-md-12 col-lg-12">
                        <label for="Description">Description</label>
                        <textarea class="form-control" name="description"  id="description" placeholder="Description of the task"  required></textarea>
                            <div class="invalid-feedback">
                              Decription is required
                            </div>
                      </div>
                   
                    <div class="form-group col-md-12 col-lg-12">
                      <label for="Assigne">Assign to</label>
                     
                      <select id="assinedto" class="form-control" name="assinedto"  required>
                        <option selected value="" disabled>Choose...</option>
                        <option>Ijaz</option>
                        <option>Nur</option>
                        <option>Zach</option>
                        
                        </select>
                        <div class="invalid-feedback">
                          Please select an Assigne.
                        </div>
                     
                     
                      <!-- <input type="text" class="form-control" id="Assigne" placeholder="person name e.g ijaz"> -->
                    </div>
                    
                    
                      <div class="form-group col-md-12 col-lg-12 ">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control" required>
                          <option selected value=""  disabled>Choose...</option>
                          <option>TODO</option>
                          <option>IN PROGRESS</option>
                          <option>REVIEW</option>
                          <option>DONE</option>
                          
                        </select>
                        <div class="invalid-feedback">
                          Please select a status.
                        </div>
                      </div>
                    <div class="form-group col-md-12 col-lg-12">
                                <label for="priority">Priority</label>
                                <select id="priority" name="priority" class="form-control" required>
                                <option selected value="" disabled>Choose...</option>
                                <option>High</option>
                                <option>Medium</option>
                                <option>Low</option>
                                
                                </select>
                                <div class="invalid-feedback">
                                  Please select an priority.
                                </div>
                            </div>
            
            
                      <div class="form-group col-md-12 col-lg-12">
                        <label for="duedate">Due Date</label>
                        <input type="date" name="duedate" class="form-control" id="duedate" required>
                        <div class="invalid-feedback " id="datep">
                          Please select a date.
                        </div>
                      </div>
                      
                    </div>
                    
                    <div class="form-group col-md-12 col-lg-12 text-center">
                      <div class="row">
                        <div class="col-md-6">
                            <button type="submit" id="taskfrom" class="btn btn-primary form-control col-md-8">Add Task</button> 


                        </div>
                         <div class="col-md-6">

                            <button type="reset" class="btn btn-warning form-control col-md-8">Reset</button> 

                        </div>
                    </div>
                           
                    
               
             </form>
            
            
            
            </section>
		      </div>
		    </div>
		  </div>
		</div>

</template>

<script>


export default formComponent ({

 
    setup() {
        
    },
})
</script>


<style scoped>


</style>