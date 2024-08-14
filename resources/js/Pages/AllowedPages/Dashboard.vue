<template>
<div class=" bg-gray-950 min-h-[93.3vh]">
   <PageTitle title="Dashboard"/>
   <div class="absolute">
      <CardMessage :flash="$page.props.flash"/>
   </div>
   <div class="w-[90%] flex justify-center gap-5 m-auto text-center text-gray-300 text-2xl font-extrabold tracking-widest">
      <span class="material-symbols-outlined text-[30px]">
         groups
         </span>   Users
   </div>
<div class="grid grid-flow-col auto-cols-max gap-5 overflow-x-auto
 h-[200px] m-auto mt-1 w-[95%] rounded-sm  mb-3">

    <CardDashboard size="text-[50px]" label="People" :count="counts.userCounts" color="blue"/>
    <CardDashboard size="text-[50px]" label="Admins" :count="counts.adminRole" color="green"/>
    <CardDashboard size="text-[50px]" label="Normal users" :count="counts.userRole" color="orange"/>
    <CardDashboard size="text-[50px]" label="Verified accounts" :count="counts.verified" color="red"/>
    <CardDashboard size="text-[50px]" label="Unverified accounts" :count="counts.unverified" color="yellow"/>
  

</div>

<div class="w-[90%] flex justify-center gap-5 m-auto text-center  text-gray-300 text-2xl font-extrabold tracking-widest">
   <span class="material-symbols-outlined text-[30px] ">
      point_of_sale
      </span>
   Sales
</div>

<div class="grid grid-flow-col auto-cols-max gap-5 overflow-x-auto
 h-[200px] m-auto mt-1 w-[95%] rounded-sm">

    <CardDashboard size="text-[20px] before:content-['$']  " label="Current Month Sales" :count="counts.currentMonthSales" color="blue"/>
    <CardDashboard size="text-[20px] before:content-['$']  " label="Previous Month Sales" :count="counts.previousMonthSales" color="green"/>
    <CardDashboard size="text-[20px] before:content-['$']" label="Total Sales" :count="counts.totalSales" color="orange"/>
    <CardDashboard size="text-[20px] before:content-['$']" label="Sales Return" count="0.00" color="red"/>
    <CardDashboard size="text-[20px] before:content-['$']" label="Suppliers " count="0.00" color="yellow"/>
   

</div>





</div>


</template>
<script setup>
import CardDashboard from '@/Components/Cards/CardDashboard.vue';
import AuthLayout from '@/Layouts/AuthLayout.vue';
 defineOptions({
    layout:AuthLayout,
 })   

 const props = defineProps({
    counts:Object,
 })

 


</script>