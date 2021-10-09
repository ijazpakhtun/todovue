<template>

       


  <div class="col-md-4 col-lg-4" >
    
    <div class="card " >
            <div :class="[task.status==='Done'?'bg-success':'']" class="card-header  text-center"><strong>{{task.name}}</strong> </div>
            <div class="card-body ">
            <p><span  class="fw-bold fs-2" ><strong>Author Name : {{task.assignedto}}</strong></span></p>  
            <p><strong>Assigned To : {{task.assignedto}}</strong></p>  
            <p class="card-text">{{task.description}}</p>

            
            <div class="col-md-12 col-lg-12">
                <h5><strong>Due Date : {{task.duedate}}</strong></h5>
                <h5 ><strong>Priority : {{task.priority}}</strong></h5>  
                <h5><strong>Status : {{task.status}}</strong></h5>  
            </div> 
            
            
            </div>
            <div class="card-footer bg-transparent border-success text-right ">
                <strong>Action :</strong>
                
                <!-- <button type="button" class="btn btn-primary" href="#" >Edit</button> -->
                <!-- <button type="button" class="btn btn-info" href="#" >Done</button> -->
                <button type="button" @click="remove" href="#" class="btn btn-danger ">Delete</button>
                
            </div>
    </div>
    <br>
</div>



    
</template>

<script>
export default {
    
    data(){
        return {
            
               

        }
    },

    methods: {

        remove(){

            this.$emit('delete', this.task.id);
        }
    },

    props:['task']
}
</script>