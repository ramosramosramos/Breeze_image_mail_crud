<template>
  <Head title="User"/>
  <div class="absolute left-[25%]">
    <CardMessage :flash="$page.props.flash"/>
  </div>
  <div class=" min-h-[93.4vh] bg-gray-950">
    <PageTitle title="User"/>
 
    <div class="h-[60px] w-[80%] gap-5 m-auto  flex items-center justify-end">
    
      
      <div>
        <input v-model="form.search" type="text" placeholder="Search..."
         class="w-[300px] rounded-sm outline-none h-[35px]" >
        <p v-if="errors.search"> {{ errors.search }}</p>
      </div>

      <div>
        <select v-model="form.selectedRole" class="rounded outline-none w-[250px] h-[35px] cursor-pointer">
          <option value="all" class="cursor-pointer">All</option>
          <option value="admin" class="cursor-pointer">Admin</option>
          <option value="user" class="cursor-pointer">User</option>
        </select>
      </div>
    </div>
    
    <div class="w-[82%] m-auto grid grid-flow-col grid-rows-2 auto-cols-max gap-3 overflow-x-auto">
      <CardUser :items="users"/>
    </div>

    <div class="mt-2 w-[90%] m-auto flex justify-center items-center">
      <Paginator :items="users"/>
    </div>
  </div>

 
</template>

<script setup>
import CardUser from "@/Components/Cards/CardUser.vue";
import Paginator from "@/Components/Paginator.vue";
import CardMessage from "@/Components/Cards/CardMessage.vue";
import AuthLayout from "@/Layouts/AuthLayout.vue";
import { useForm } from "@inertiajs/vue3";
import { watch } from "vue";
import { throttle } from "lodash";



defineOptions({
  layout: AuthLayout,
});


const props = defineProps({
  users: Object,
  filters: Object,
  errors: Object,
  flash:Object
});

const form = useForm({
  search: props.filters.search,
  selectedRole: props.filters.selectedRole,
});

watch(
  () => [form.search, form.selectedRole],
  throttle(() => {
    form.get(route('users.index'), {
      preserveState: true,
      replace: true,
    });
  }, 300)
);
</script>
