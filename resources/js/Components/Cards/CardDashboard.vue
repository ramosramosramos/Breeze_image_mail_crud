<template>
   

    <div class="w-[36.05vh]  h-[150px] rounded-sm select-none
    flex justify-center items-center text-center text-yellow-50"
    :class="{'bg-yellow-900':color==='yellow',
    'bg-orange-900':color==='orange','bg-red-900':color==='red',
'bg-green-900':color==='green','bg-blue-900':color==='blue'}">

  <div>
    <h1>{{label}}</h1>
    <h1 class="text-wrap  overflow-hidden" 
    :class="size" >{{count}}</h1>

  </div>
    </div>
</template>
<script setup>

const props = defineProps({
    color:String,
    count:Number,
    label:String,
    size:String,
});

</script>