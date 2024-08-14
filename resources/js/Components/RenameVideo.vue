<template>
    <Teleport to="body">
      <transition bounce>
        <div  v-if="isRename" class="absolute top-0 bottom-0 left-0 right-0 bg-[rgb(0,0,0,0.8)]">
            <button @click="close"  class=" text-yellow-50">Close</button>

        </div>


      </transition>

    </Teleport>

</template>

<script setup>
 
const props = defineProps({
    isRename:Boolean,
})




 const emit = defineEmits(['close']);

 const close = ()=>{
    emit('close');
 }


</script>