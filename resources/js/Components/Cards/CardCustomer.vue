<template>
    
    <div 
     class="grid rounded-sm text-yellow-50 text-center bg-gray-800 w-[250px] h-[250px]">
     
      <img  :src="image" :alt="name"
       class="w-[90%] h-[150px] m-auto py-1 bg-inherit   bg-cover object-cover  bg-no-repeat  rounded-lg">
       <h2>{{ name }}</h2>
       <p>{{ city }}</p>
     <div class="flex justify-around gap-2 m-2">
        <Link :href="route('customers.destroy',id)" as='button' type="button" method="delete"
        class="bg-red-600 hover:bg-red-700  text-yellow-50
         w-[100px] rounded-sm" 
        >Trash</Link>
       <Link :href="route('customers.edit',id)" as='button' type="button" method="get"
        class="bg-blue-600 hover:bg-blue-700  text-yellow-50
         w-[100px] rounded-sm" 
        >Edit</Link>
     </div>
    </div>

</template>


<script setup>

defineProps({
name:String,
city:String,
image:String,
id:Number,
})


</script>