<template>
    <div class="flex justify-center items-center bg-gray-950 min-h-[93.3vh]">
      <form @submit.prevent="submitForm">
        <h1 class="text-yellow-50 mb-12 text-2xl">Edit Customer</h1>
        <div class="mb-6 w-[350px]">
          <input
            class="w-[100%]"
            type="text"
            v-model="form.name"
            placeholder="Customer name"
          />
          <p v-if="form.errors.name" class="text-red-600">
            {{ form.errors.name }}
          </p>
        </div>
        <div class="mb-6 w-[350px]">
          <input
            class="w-[100%]"
            type="text"
            v-model="form.city"
            placeholder="Customer city"
          />
          <p v-if="form.errors.city" class="text-red-600">
            {{ form.errors.city }}
          </p>
        </div>
        <div class="mb-6 w-[350px]">
          <input
            class="w-[100%]"
            type="file"
            @change="handleImageChange"
            accept="image/*"
            id="image"
            hidden
          />
          <div
            class="grid w-[100px] text-center rounded-md bg-blue-900 hover:bg-blue-600"
          >
            <label class="text-yellow-50 cursor-pointer" for="image">Browse</label>
          </div>
          <img
            v-if="imagePreview"
            :src="imagePreview"
            alt="customer image"
            class="w-[100px] h-[100px] m-2 object-cover"
          />
          <p v-if="form.errors.image_path" class="text-red-600">
            {{ form.errors.image_path }}
          </p>
        </div>
        <div>
          <button
            class="bg-blue-600 text-yellow-50 w-[200px] h-[40px] rounded-md"
            type="submit"
            :disabled="form.processing"
          >
            Update customer
          </button>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { useForm } from '@inertiajs/vue3';
  import AuthLayout from '@/Layouts/AuthLayout.vue';
  
  
  defineOptions({
    layout: AuthLayout,
  });
  
  const props = defineProps({
    customer: Object,
    errors: Object,
  });
  
  const imagePreview = ref(props.customer.image_path || '');
  
  const form = useForm({
    name: props.customer.name,
    city: props.customer.city,
    image: '',
  });
  
  const handleImageChange = (event) => {
    const file = event.target.files[0];
    form.image = file;
    if (imagePreview.value) {
      URL.revokeObjectURL(imagePreview.value);
    }
    imagePreview.value = URL.createObjectURL(file);
    console.log('Image preview URL:', imagePreview.value);
  };
  
  const submitForm = () => {
    
  
    form.post(route('customers.updateCustomer', props.customer.id));
  };
  
  </script>
  
  
  
  