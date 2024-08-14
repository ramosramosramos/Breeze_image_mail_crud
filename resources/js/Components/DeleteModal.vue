<template>
  <Teleport to="body">
    <transition name="bounce">
      <div
        v-if="isDelete"
        @click="close"
        class="fixed top-0 left-0 right-0 bottom-0 bg-[rgba(0,0,0,0.17)] flex justify-center items-center z-[1000]"
      >
        <div
          @click.stop
          class="flex justify-center items-center bg-yellow-50 w-[500px] h-[300px] rounded-md p-4 relative"
        >
          <button @click="close" class="absolute top-2 right-4 font-bold p-2">x</button>

          <div>
            <h1 class="border-b-2 border-gray-600">Are you sure want to delete this user?</h1>
          <div class="m-3">
            <h1>Account no: 0000{{ props.user.id }}</h1>
            <h1>Name :{{ props.user.name }}</h1>
            <h1>Email :{{ props.user.email }}</h1>
          </div>
            <div class="flex justify-center items-center">
                <div class="flex gap-10 ">
                    <Link
                      @click="close"
                      :href="route('users.destroy', props.user.id)"
                      as="button"
                      type="button"
                      method="delete"
                      class="w-[100px] bg-blue-600 hover:bg-blue-700 text-yellow-50 rounded-sm outline-none "
                    >
                      Yes
                    </Link>
                    <button @click="close"
                      class="w-[100px] bg-red-600 hover:bg-red-700 text-yellow-50 rounded-sm outline-none "
                    >
                      No
                    </button>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </Teleport>
</template>
  
  <script setup>
const props = defineProps({
  isDelete: Boolean,
  user: Object,
});

const emit = defineEmits(["close"]);

const close = () => {
  emit("close");
};
</script>
  
  <style>
.bounce-enter-active {
  animation: bounce-in 0.5s;
}
.bounce-leave-active {
  animation: bounce-in 0.5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
    background: hsla(0, 0%, 0%, 0);
    transition: all ease-in-out;
  }
  50% {
    transform: scale(1.25);
  }
  100% {
    transform: scale(1);
  }
}
</style>
  