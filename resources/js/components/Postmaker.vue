<template>
<div class="w-full flex flex-wrap h-3/6">
    <div class="py-12 w-2/3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Заголовок <span class="text-red-500">*</span></label></br>
                            <input v-model="form.title" type="text" class="border-2 border-gray-300 p-2 w-full shadow-inner" name="title" id="title" value="" required></input>
                        </div>

                        <div class="mb-4">
                            <label class="text-xl text-gray-600">Описание</label></br>
                            <input v-model="form.description" type="text" class="border-2 border-gray-300 p-2 w-full shadow-inner" name="description" id="description" placeholder="(Optional)"></input>
                        </div>

                        <div class="mb-8">
                            <label class="text-xl text-gray-600">Текст поста <span class="text-red-500">*</span></label></br>
                            <textarea v-model="form.content" name="content" class="border-2 border-gray-500 w-full min-h-0 md:min-h-full max-h-52 shadow-inner">
                                
                            </textarea>
                        </div>

                        <div class="flex p-1">
                            <input ref="imageInput" name="fime" id="file" type="file" required v-on:change="handleImageUpload()" required></input>
                            <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" v-on:click="submitForm()">Добавить</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
        
            <img style ="height:660px;" class="object-fill w-1/3 shadow-2xl" src="https://web.archive.org/web/20190731161042if_/https://2ch.hk/b/src/201037250/15645828106071.jpg" >
        
</div>    
</template>

<script>
export default {
    data(){
        return{
            form:{
                title: '',
                description: '',
                content: '',
            },
            image: ''
        }
    },
    methods:{
        submitForm(){
            let formData = new FormData();
            formData.append('image', this.image);
            formData.append('form', JSON.stringify(this.form));


            axios({
  method: "post",
  url: "/api/addpost",
  data: formData,
  headers: { "Content-Type": "multipart/form-data" },
}).then(()=>{
                
                this.$router.push({name: "CheckPosts"});

            }).catch((error)=>{

                console.log(error);
                
            })
        },
        handleImageUpload(){
            this.image = this.$refs.imageInput.files[0];
      }
    }
}
</script>