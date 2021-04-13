<template>
        <ul>
            <div class="grid grid-cols-3 gap-4 shadow-3xl p-10">
                <li v-for="post in posts">
                <router-link to="/post/{post.id}" v-bind:tooltip="post.id">
                    <div  class="max-w-sm rounded overflow-hidden shadow-lg">
                        <img class="object-center hover:opacity-80" style="height:330px; width:400px;" v-bind:src="post.image">
                    <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 shadow-3xl">{{post.title}}</div>
                        <p style="overflow: hidden; text-overflow: ellipsis;" class="text-gray-700 text-base ">
                            {{post.description}}
                        </p>
                        <p>{{post.created_at}}</p>
                    </div>
                <div class="px-72 pt-2 pb-2">
                    <p class="px-1">Автор</p><span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{post.username}}</span>
                </div>
            </div>
            </router-link>
                </li>
            </div>
        </ul>   
</template>

<script>
export default {
    data(){
        return{
            posts:[],
            
        }
    },
    mounted(){
        axios.get('/api/posts').then((response)=>{
            this.posts = response.data
            
        })
    },
    methods:{
           
            }
        }
    
</script>