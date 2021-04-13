<template>
  <div class="w-full flex flex-wrap h-3/6">

        <!-- Register Section -->
        <div class="w-full md:w-2/3 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-12">
                <a href="#" class="bg-black text-white font-bold text-xl p-4">DVACH</a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl underline">Зарегистрироваться</p>
                <form class="flex flex-col pt-3 md:pt-8" onsubmit="event.preventDefault();">
                    <div class="flex flex-col pt-4">
                        <label for="name" class="text-lg">Имя</label>
                        <input v-model="form.name" type="text" id="name" name="name" placeholder="Иван" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">Email</label>
                        <input v-model="form.email" type="email" id="email" name="email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    </div>
    
                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Пароль</label>
                        <input v-model="form.password" type="password" id="password" name="password" placeholder="******" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    </div>

                    <div class="flex flex-col pt-4">
                        <label for="confirm-password" class="text-lg">Подтверждение пароля</label>
                        <input v-model="form.password_confirmation" type="password" id="confirm-password" name="password_confirmation" placeholder="******" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    </div>
    
                    <input @click.prevent="saveForm" type="submit" value="Регистрация" class="bg-black text-white font-bold text-lg hover:bg-gray-700 p-2 mt-8">
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Уже есть аккаунт? <router-link class="underline font-semibold" to='/login'>Войти.</router-link></p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        
            <img style ="height:640px;" class="shadow-2xl w-1/3 object-fill" src="https://sun9-35.userapi.com/impg/Bfhus0Yro6AL1tYReJT2YOYZhh3vqcuYdQUl7g/fipjxSE1jN8.jpg?size=1440x1920&quality=96&sign=7fbe0543c28fc3a32c2c9b7fff3d6d7f&type=album">
        
    </div>
</template>

<script>
export default {
    data(){
        return{
            form:{
                name: '',
                email: '',
                password: '',
                password_confirmation: ''
            },
            
        }
    },
    methods:{
        saveForm(){
            axios.post('/api/register', this.form).then(()=>{
                console.log('saved');
            }).catch((error)=>{
                console.log(error);
                
            })
        }
    }
}
</script>