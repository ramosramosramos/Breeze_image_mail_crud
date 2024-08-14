<template>
  <header>
    <nav class="flex justify-start bg-gray-900 text-yellow-50 h-[50px]">
     <div class="flex justify-center items-center ">
      <button @click="isOpen = true" class="  h-[65%] rounded-lg ml-3 hover:bg-gray-800"><span class=" text-[35px] material-symbols-outlined">
        menu
        </span></button>
     </div>
      <!-- -------------------------Side Navigation---------------------- -->
      <div
        class="z-50 absolute select-none w-[300px] h-[100%] transition-all ease-in-out duration-700 bg-gray-900"
        :class="{ 'left-0': isOpen, 'left-[-999px] blur-xl': !isOpen }"
      >
        <div class="flex justify-end">
          <button @click="isOpen = false" class=" hover:bg-gray-800  mr-2 p-1 rounded-md">
            <span class="material-symbols-outlined text-gray-500">
            keyboard_double_arrow_left
            </span></button>
        </div>
        <AvatarVue :auth="$page.props.auth" />
       <div class="relative left-2 top-[250px]">
        <Menu />
       </div>
      </div>
    </nav>
  </header>

  <main @click="isOpen = false">
    <slot />
  </main>
</template>
<script setup>
import { ref } from "vue";
import AvatarVue from "@/Components/Avatar.vue";
import Menu from "@/Components/Menu.vue";

const isOpen = ref(false);
</script>
