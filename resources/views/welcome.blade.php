@extends('layouts.app')

@section('content')
    <div class="flex bg-gray-100 border-b border-gray-300 py-4">
        <div class="container mx-auto flex justify-between">
            <div class="container mx-auto">


                <router-view name="a"></router-view>


                <router-link class="text-black font-bold hover: p-4" to='/'>DVACH</router-link>
                <router-link class="mr-4" to='/' exact>Home</router-link>
                <router-link class="mr-4" to='/about'>About</router-link>
                <router-link class="mr-4" to='/postmaker'>Postmaker</router-link>
                <router-link to='/checkposts'>CheckPosts</router-link>

                

                <div class="text-right flex justify-end">
                    @if(\Illuminate\Support\Facades\Auth::user()==false)
                        <router-link class="mr-4 -my-5" to='/login'>Login</router-link>
                        <router-link class="ml-4 -my-5 mr-4" to='/register'>Register</router-link>
                    @endif
                    
                </div>   
            </div>
            
            
        </div>
    </div>


    <div class="container mx-auto">
        <router-view></router-view>
    </div>
    


@endsection