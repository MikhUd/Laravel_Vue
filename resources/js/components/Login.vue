<template>
    <div>
        <div style="height:600px;" class="min-h-screen flex items-center justify-center bg-gray-50">
  <div class="max-w-md w-full space-y-8">
    <div>
    
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Войти в аккаунт
      </h2>
    
    </div>
    <form class="mt-8 space-y-6" action="#" method="POST">
      
<div class="rounded-md shadow-sm -space-y-px">

    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">Email</label>
                        <input v-model="form.email" type="email" id="email" name="email" placeholder="your@email.com" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
    </div>
        
    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Пароль</label>
                        <input v-model="form.password" type="password" id="password" name="password" placeholder="******" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
    </div>
      
</div>
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember_me" name="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
          <label for="remember_me" class="ml-2 block text-sm text-gray-900">
            Запомнить меня
          </label>
        </div>

        <div class="text-sm">
          <a href="#" class="font-medium text-black hover:text-gray-800">
            Забыли пароль?
          </a>
        </div>
      </div>

      <div>
        <button @click.prevent="loginUser" type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: solid/lock-closed -->
            <svg class="h-5 w-5 text-white group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Войти
        </button>
      </div>
    </form>
  </div>
</div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            form:{
                email: '',
                password: '',
            },
            
        }
    },
    methods:{
        loginUser(){
            axios.post('/api/login', this.form).then(()=>{
                this.$router.push({name: "Dashboard"});
                alert('Успешная авторизация!')
            }).catch((error)=>{
                
            })
        }
    }
}
</script>

