<template>
  <div class="absolute top-[75px] left-2 grid gap-2 h-[20%] w-[90%] m-auto">
    <div class="absolute right-10 top-14">
      <DowloadAvatar :auth="$page.props.auth"/>
    </div>
    <div class="flex justify-center">
      <div
        class="w-[100px] h-[100px] bg-gray-400 rounded-full flex justify-center text-center"
      >
      
        <img
          :src="imageUrl"
          alt="avatar"
          class="overflow-hidden h-[100px] w-[100px] rounded-full bg-cover object-cover bg-no-repeat"
        />
      </div>
    </div>


    <div class="text-gray-400 text-center">
      <form @submit.prevent="submitAvatar">
        <input
          type="file"
          @change="handleAvatar"
          accept="image/*"
          id="image_avatar"
          hidden
        />
        <label
          for="image_avatar"
          class="bg-gray-700 hover:bg-gray-600 text-yellow-50 px-3 py-1 text-sm rounded-full cursor-pointer"
        >
          Edit Avatar</label
        >
    
      </form>

  
   
      <h1 v-if="form.processing" class="text-yellow-400">Updating please wait</h1>
      <h1>{{ $page.props.auth.user.name }}</h1>
      <h1>{{ $page.props.auth.user.email }}</h1>

   
      <h1>Account No. :{{ $page.props.auth.user.id }}</h1>
    </div>
  </div>
</template>
<script setup>
import DowloadAvatar from "./DowloadAvatar.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

const props = defineProps({
  auth: Object,
});
const form = useForm({
  image: null,
});

const imageUrl = ref(props.auth.user.avatar_path||'');

const handleAvatar = (event) => {
  const file = event.target.files[0];
  form.image = file;

  if(imageUrl.value){
    URL.revokeObjectURL(imageUrl.value);

  }
  imageUrl.value = URL.createObjectURL(file);
  submitAvatar() 
};



function submitAvatar() {
  form.post(route("users.updateAvatar", props.auth.user.id),{

  });
}
</script>