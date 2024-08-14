<template>
    <div class="flex justify-center items-center  bg-gray-950 min-h-[93.3vh]">
      <form @submit.prevent="submitForm">
        <h1 class="text-yellow-50 mb-12 text-2xl">Create Customer</h1>
        <div class="mb-6 w-[350px]">
         
          <input class="w-[100%]" type="text"
           v-model="form.name" placeholder="Customer name"  />
          <p v-if="errors" class="text-red-600">{{ errors.name }}</p>
        </div>
        <div class="mb-6 w-[350px]">
          
          <input class="w-[100%]" type="text"
           v-model="form.city"  placeholder="Customer city"  />
          <p v-if="errors" class="text-red-600">{{ errors.city }}</p>
        </div>
        <div class="mb-6 w-[350px]">
          
          <input class="w-[100%]" 
            type="file"
            @change="handleFileChange"
            accept="image/*"
            id="image" hidden          
          />
     <div class="grid w-[100px] text-center rounded-md  bg-blue-900 hover:bg-blue-600 ">
      <label  class="text-yellow-50 cursor-pointer "
      for="image">Browse Profile</label>
     </div>
     <img v-if="imageUrl" :src="imageUrl" alt="no image selected" class="text-yellow-50 w-[100px] h-[100px] m-2">
          <p v-if="errors" class="text-red-600">{{ errors.image }}</p>
        </div>
     <div>
      <button class="bg-blue-600 text-yellow-50 w-[200px] h-[40px] rounded-md" type="submit">Create Customer</button>
     </div>
      </form>
    </div>
  </template>
  <script setup>
  import AuthLayout from "@/Layouts/AuthLayout.vue";
  import { useForm } from '@inertiajs/vue3';
  import { ref } from "vue";
  defineOptions({
    layout: AuthLayout,
  });
  defineProps({
    errors:Object,
  })
  const form = useForm({
    name:'',
    city:'',
    image:null,
  })

  const imageUrl = ref(null);
  function handleFileChange (event){
    event.preventDefault();
    const file = event.target.files[0];
    form.image=file;
    imageUrl.value = URL.createObjectURL(file);

  }


  function submitForm() {
  form.post(route('customers.store'), {

  });
}

  </script>
  