<template>
  <div v-if="isVisible" 
    class="w-[90%] px-2 rounded-sm shadow-xl animate-pulse m-2 text-yellow-50 flex text-center items-center"
    :class="{
      'bg-red-700 shadow-red-900': flash.deleted,
      'bg-green-700 shadow-green-900': flash.created,
      'bg-orange-500 shadow-orange-900': flash.updated,
    }"
  >
    <h1>{{ flash.deleted }}</h1>
    <h1>{{ flash.created }}</h1>
    <h1>{{ flash.updated }}</h1>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";

const props = defineProps({
  flash: Object,
});

const isVisible = ref(true);

onMounted(() => {
  setTimeout(() => {
    isVisible.value = false;
  }, 10000); // 5000ms = 5 seconds
});


</script>
