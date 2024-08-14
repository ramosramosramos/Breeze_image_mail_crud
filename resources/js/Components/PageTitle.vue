<template>
    <div class=" flex items-center w-[95%] m-auto h-[50px] text-yellow-50">
        <h1 class="text-2xl text-gray-400 tracking-widest">
             {{title}}
            </h1>
    
        </div>
</template>

<script setup>
defineProps({
    title:String,
})

</script>