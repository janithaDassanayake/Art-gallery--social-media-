<template>
    
    <div>
         <button class="btn btn-primary ml-5" @click="followUser"> Follow </button>  
    </div>


</template>

<script>
    export default {

        props: ['userId'],

        mounted() {
            console.log('Component mounted.')
        },
  
// axios is use to call api routs
      
        methods:{
            followUser(){
                axios.post('/follow/'+ this.userId)
                   .then(response => {
                        console.log(response.data);
                   });
            }
        }
    }
</script>
