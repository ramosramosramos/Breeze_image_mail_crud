<template>
    <a :href="route('users.download',props.auth.user.id)"
    target="_blank"
      :download="auth.user.name + '_avatar.jpg'"
    class="bg-gray-700  hover:bg-gray-600 text-yellow-50 px-1  text-sm rounded-full cursor-pointer"
  >
  <span class="material-symbols-outlined">
    download
    </span></a
  >
</template>
<script setup>
const props = defineProps({
    auth:Object
})
</script>