<template>
    <div>
        Профиль:
        <br>
        Имя: {{user.name}}
        <br>
        Email: {{user.email}}
        <br>
        <button @click.prevent = "logout">Выйти</button>
    </div>
</template>

<script>
export default {
    data(){
        return{
            user:null
        }
    },
    mounted(){
        axios.get('/api/user').then((response)=>{
            this.user = response.data
        })
    },
    methods:{
        logout(){
            axios.post('/api/logout').then(()=>{
                this.$router.push({name:"Home"})
            })
        }
    }
}
</script>