<template>
  <!-- removeble photo -->
  <div class="relative w-20 h-20">
    <img :src="src" alt="photo" class="rounded-lg" />
    <button
      type="button"
      class="absolute top-0 right-0 w-6 h-6 bg-red-500 rounded-full flex justify-center items-center"
      @click="remove()"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-4 w-4 text-white"
        viewBox="0 0 20 20"
        fill="currentColor"
      >
        <path
          fill-rule="evenodd"
          d="M10 1a9 9 0 100 18 9 9 0 000-18zM5.172 8.172a.5.5 0 01.707 0L10 11.293l4.121-4.12a.5.5 0 11.707.707L10.707 12l4.12 4.121a.5.5 0 01-.707.707L10 12.707l-4.121 4.12a.5.5 0 01-.707-.707L9.293 12 5.172 7.879a.5.5 0 010-.707z"
          clip-rule="evenodd"
        />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  props: {
    src: {
      type: String,
      default: null,
    },
  },

  // reomve image
  methods: {
    // remove img from page and from array
    // without emit
    remove() {
      this.$el.remove();
      this.$emit("remove");
    },
    
  },
};
</script>

<style scoped>
img {
  height: 100%;
}
</style>