<template>
          
</template>

<script>
export default {
    data(){
        return{
            post:null
            
        }
    },
    mounted(){
        axios.get('/api/posts').then((response)=>{
            this.post = response.data
            
        })
    },
    methods:{
        
        }
    }
</script>