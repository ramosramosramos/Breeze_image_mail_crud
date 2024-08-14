<template>
    <div v-for="user in items.data" :key="user.id" class="w-[300px] h-[260px] bg-gray-900 rounded-md transition-all ease-in-out">
        <div class="w-[95%] m-auto flex items-center gap-5 py-2">
        <div class="w-[50px] h-[50px] rounded-full flex justify-center 
        items-center bg-gray-400">
        <img :src="`/storage/icons/usertype.png`" alt="wala">

        </div>
        <h1 class="text-yellow-50">Account no: 0000{{ user.id }} </h1>
      </div>
      
      <h1 class="text-gray-400 text-center m-4">{{ user.email }}</h1>
  
      <div class="w-[90%] m-auto flex flex-col gap-1 text-gray-400">
        <h1><strong class="text-yellow-50">Name :</strong> {{ user.name }}</h1>
        <h1><strong class="text-yellow-50">Role :</strong> {{ user.role }}</h1>
        <h1><strong class="text-yellow-50">Created at :</strong> {{ user.formatted_created_at }}</h1>
        
        <div class="text-yellow-50 m-2 flex justify-evenly">
        
      
          <button @click="openModal(user)" class="bg-red-700 hover:bg-red-800 rounded-sm outline-none w-[30%]">
            Trash
          </button>
          <DeleteModal :isDelete="isDelete" @close="isDelete = false" :user="userAll"  />
        </div>
      </div>
    </div>
    

    

  </template>
  
  <script setup>
  import { ref } from 'vue';
  import DeleteModal from "@/Components/DeleteModal.vue";
  
  const props = defineProps({
    items: Object,
  });
  const userAll= ref([]);
 
  
  const isDelete = ref(false);
  

  const openModal = (user)=>{
    userAll.value=user;
    isDelete.value=true;
  }
  
 
  </script>
  