<template>
  <div class="  bg-gray-950 min-h-[93.3vh]">
      <PageTitle title="Customer"/>
  <div v-if="$page.props.flash" class="flex justify-center items-center">
 <div class="absolute">
    <CardMessage :flash="$page.props.flash"/>
 </div>
  </div>
     <div class="flex items-center h-[100px]">
      <Link class=" absolute left-6 bg-blue-600 w-[50px] h-[50px] rounded-full
      text-yellow-50"
     :href="route('customers.create')" as="button" type="button" method="get">+</Link>
     </div>
    
   <div class="w-[90%] overflow-x-auto m-auto grid auto-cols-max grid-flow-col grid-rows-2 gap-10">
      <CardCustomer  v-for="customer in customers" :key="customer.id"
      :name="customer.name" :city="customer.city" :image="customer.image_path"
       :id="customer.id"
      />
     
   </div>

  </div>
     
  </template>
  
  <script setup>
  import AuthLayout from '@/Layouts/AuthLayout.vue';
  import CardCustomer from '@/Components/Cards/CardCustomer.vue';
  import CardMessage from '@/Components/Cards/CardMessage.vue';

  defineOptions({
      layout:AuthLayout,
  })
  defineProps({
      customers:Array
  })
  </script>