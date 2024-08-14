<template>
  <div class="bg-gray-950 min-h-[93.98vh]">
    <PageTitle title="Products" />
    <div v-if="$page.props.flash" class="flex justify-center items-center">
      <div class="absolute top-1 md:right-10 md:top-[50px]">
        <CardMessage :flash="$page.props.flash" />
      </div>

      <!-- -------------------------Search------------------------ -->
      <div class="absolute w-[300px] md:left-[150px] md:top-[130px]">
        <input
          type="search"
          v-model="form.search"
          placeholder="Search Product..."
          class="w-[100%] rounded-lg outline-none"
        />
        <div v-if="form.processing" class="flex gap-5 right-[60px] top-[-25px] absolute">
            <h1 class=" text-center  text-yellow-700 animate-pulse ani text-1xl font-bold tracking-widest">
                Searching 
            </h1>
            <div class="relative bg-inherit rounded-full overflow-hidden animate-spin h-[20px] w-[20px]">
                <div class="absolute  w-[80%] h-[20%]  bg-blue-500 ">
    
                </div>
            </div>
           </div>
      </div>
   
      <!-- -------------------------------------------------------------- -->
    </div>
    <div class="flex justify-center gap-5 items-center h-[100px]">
      <Link
        class="left-6 absolute md:left-11 md:top-[125px] bg-blue-600 w-[50px] h-[50px] rounded-full text-yellow-50"
        :href="route('products.create')"
        as="button"
        type="button"
        method="get"
        >+</Link
      >
      <Paginator :items="products" />
    </div>

    <div
      class="w-[94%] overflow-x-auto m-auto grid auto-cols-max grid-flow-col grid-rows-2 gap-10"
    >
      <CardProduct
        v-for="product in products.data"
        :key="product.id"
        :name="product.name"
        :price="product.price"
        :image="product.image_path"
        :id="product.id"
      />
    </div>
  </div>
</template>
    
    <script setup>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import Paginator from "@/Components/Paginator.vue";
import CardProduct from "@/Components/Cards/CardProduct.vue";
import CardMessage from "@/Components/Cards/CardMessage.vue";
import { watch } from "vue";
import { useForm } from "@inertiajs/vue3";
import { throttle } from "lodash";

defineOptions({
  layout: AuthLayout,
});
const props = defineProps({
  products: Object,
  filters: Object,
});
const form = useForm({
  search: props.filters.search,
});

watch(
  () => form.search,
  throttle(() => {
    form.get(route("products.index"), {
      preserveState: true,
      replace: true,
    });
  }, 300)
);
</script>