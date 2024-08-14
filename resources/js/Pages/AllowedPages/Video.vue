<template>
    <div class="bg-gray-950 min-h-[93.98vh]">
      <PageTitle title="Videos" />
      <div v-if="$page.props.flash" class="flex justify-center items-center">
        <div class="absolute top-1 md:right-10 md:top-[50px]">
          <CardMessage :flash="$page.props.flash" />
        </div>

      </div>
      <div class="flex justify-center gap-5 items-center h-[100px]">
        <Link
          class="left-6 absolute md:left-11 md:top-[125px] bg-blue-600 w-[50px] h-[50px] rounded-full text-yellow-50"
          :href="route('videos.create')"
          as="button"
          type="button"
          method="get"
          >+</Link
        >
      
      </div>
  
      <div
        class="w-[94%] overflow-x-auto m-auto grid auto-cols-max grid-flow-col grid-rows-2 gap-10"
      >
      <!-- -----------------------------video-------------------- -->
      <div v-for="video in videos" :key="video.id"  class="w-[400px] relative bg-slate-900 rounded-lg flex flex-col items-center justify-center">
        <h1 class=" absolute top-0 text-center text-[20px] font-semibold text-yellow-50">Title: {{ video.title }}</h1>
   
        <video :src="video.video_path" controls class="w-[95%] h-[300px]"></video>
        <button @click="openModal">Rename?</button>
        <div class="h-[10px]"></div>
      </div>
    
      </div>
      <RenameVideo  :isRename="isRename"  @close="isRename =false" />
    </div>
  </template>
      
      <script setup>
  import AuthLayout from "@/Layouts/AuthLayout.vue";
  import Paginator from "@/Components/Paginator.vue";
  import RenameVideo from "@/Components/RenameVideo.vue";
  import CardMessage from "@/Components/Cards/CardMessage.vue";
import { ref } from "vue";

  const isRename= ref(false);
  const openModal = ()=>{
    isRename.value=!isRename.value;
  }
  defineOptions({
    layout: AuthLayout,
  });
  const props = defineProps({
    videos:Array
  })
 
  </script>