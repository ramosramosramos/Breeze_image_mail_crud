<template>
    <div class="flex justify-center items-center bg-gray-950 min-h-[93.3vh]">
      <form @submit.prevent="submitForm">
        <h1 class="text-yellow-50 mb-12 text-2xl">Create Video</h1>
        <div v-if="form.processing" class="flex gap-5 right-[60px] top-[-25px] absolute">
            <h1 class=" text-center  text-yellow-700 animate-pulse ani text-1xl font-bold tracking-widest">
                Uploading video 
            </h1> </div>
        <div class="mb-6 w-[350px]">
          <input class="w-[100%]" type="text" v-model="form.title" placeholder="Title" />
          <p v-if="errors.title" class="text-red-600">{{ errors.title }}</p>
        </div>
        <div class="mb-6 w-[350px]">
          <input class="w-[100%]" type="file" @change="handleFileChange" accept="video/*" id="video" name="video" hidden />
          <div class="grid w-[100px] text-center rounded-md bg-blue-900 hover:bg-blue-600 ">
            <label class="text-yellow-50 cursor-pointer px-2" for="video">Browse Video</label>
          </div>
          <video v-if="videoUrl" :src="videoUrl" controls  class="w-[400px] h-[400px] m-2"></video>
          <p v-if="errors.video" class="text-red-600">{{ errors.video }}</p>
        </div>
        <div class="w-[100%] ">
          <button class="bg-blue-600 text-yellow-50 w-[200px] h-[45px] px-2 rounded-md" type="submit">Upload Video</button>
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
    errors: Object,
  });
  
  const form = useForm({
    title: '',
    video: null,
  });
  
  const videoUrl = ref(null);
  
  function handleFileChange(event) {
    const file = event.target.files[0];
    form.video = file;
    videoUrl.value = URL.createObjectURL(file);
  }
  
  function submitForm() {
    form.post(route('videos.store'));
  }
  </script>
  