<template>
    <div class="flex bg-gray-900 min-h-[100vh] justify-center items-center">
      
        <form @submit.prevent="form.post(route('login.store'))">
            <h1 class="mb-8 text-yellow-50 text-center text-2xl font-bold tracking-widest">
                Welcome to Login Mail
            </h1>
            <!-- --------------------loading==================== -->
           <div v-if="form.processing" class="flex gap-5 mb-7">
            <h1 class=" text-center  text-yellow-300 animate-pulse ani text-1xl font-bold tracking-widest">
                Signing in please wait
            </h1>
            <div class="relative bg-inherit rounded-full overflow-hidden animate-spin h-[20px] w-[20px]">
                <div class="absolute  w-[80%] h-[20%]  bg-blue-500 ">

                </div>
            </div>
           </div>
           <!-- ============================================================ -->
         

            <div class="mb-6">
                <input v-model="form.email" type="email" :class="{'ring-2  ring-red-700':errors.email}" placeholder="Email"
                 class="w-[400px] rounded-lg outline-none focus:ring-gray-400" >
                 <p class="text-red-500" v-if="errors.email">{{ errors.email }}</p>
            </div>

            <div class="mb-6 relative">
                <input  v-model="form.password" :type="passwordType"   :class="{'ring-2  ring-red-700':errors.password}" placeholder="Password"
                 class="w-[400px] rounded-lg outline-none focus:ring-gray-400" >
                 <p class="text-red-500" v-if="errors.password">{{ errors.password }}</p>
                 <img v-if="!isShow" @click="toggleShowPassword" :src="`/storage/icons/show.png`" alt="wala" class="absolute right-2 top-2 cursor-pointer ">
                 <img  v-if='isShow' @click="toggleShowPassword" :src="`/storage/icons/hide.png`" alt="wala" class="absolute right-2 top-2 cursor-pointer ">

            </div>
            <div class="mb-6">
                <input v-model="form.remember" type="checkbox" id="remember"
                 class=" rounded-sm cursor-pointer outline-none focus:ring-gray-400" >
               <label for="remember" class="cursor-pointer outline-none select-none text-yellow-50 px-2">Remember me</label>
            </div>
          
            <button type="submit" :disabled="form.processing"
            class="bg-blue-600 hover:bg-blue-700 outline-none text-yellow-50 w-[400px] h-[40px] rounded-md">
                Login
            </button><br>

          <div class="mt-5">
            <Link :href="route('register')" as="button" type='button' method="get"  class="text-yellow-50 text-sm
             hover:text-blue-400 transition-all 
             ease-in-out ">Don't have an account? Register</Link>
          </div>
        </form>
      

    </div>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";
import {ref } from 'vue'
const props = defineProps({
    errors:Object,
})
const isShow = ref(false);
const passwordType = ref('text');

const toggleShowPassword = ()=>{
    isShow.value=!isShow.value;
    if(passwordType.value==='text'){
        passwordType.value='password';
    }else{
        passwordType.value='text';
    }
    

}

const form = useForm({
   
    email:'',
    password:'',
    remember:false,
  
})

</script>