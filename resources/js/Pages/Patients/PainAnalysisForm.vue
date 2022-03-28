<template>
  <Head title="Pain Analysis Form" />

  <h1>Make a new entry</h1>

  <form @submit.prevent="submit" class="mx-w-md mx-auto mt-8">
    <!-- Questions -->

    <div class="mb-6">
      <!-- Question 1-->
      <div v-show="step === 1">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="name"
          >Question 1</label
        >

        <input
          v-model="form.question_1"
          type="text"
          name="question_1"
          id="question"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_1"
          v-text="form.errors.question_1"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 2-->
      <div v-show="step === 2">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="name"
          >Question 2</label
        >

        <input
          v-model="form.question_2"
          type="text"
          name="question_2"
          id="question_2"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_1"
          v-text="form.errors.question_1"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 3-->
      <div v-show="step === 3">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="name"
          >Question 3</label
        >

        <input
          v-model="form.question_3"
          type="text"
          name="question_3"
          id="question_3"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_3"
          v-text="form.errors.question_3"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 4-->
      <div v-show="step == 4">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="name"
          >Question 4</label
        >

        <input
          v-model="form.question_2"
          type="text"
          name="question_2"
          id="question_2"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_1"
          v-text="form.errors.question_1"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 5-->
      <div v-show="step == 5">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="name"
          >Question 5</label
        >

        <input
          v-model="form.question_5"
          type="text"
          name="question_5"
          id="question_5"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_5"
          v-text="form.errors.question_5"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 6-->
      <div v-show="step == 6">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="name"
          >Question 6</label
        >

        <input
          v-model="form.question_6"
          type="text"
          name="question_2"
          id="question_2"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_6"
          v-text="form.errors.question_6"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 7-->
      <div v-show="step === 7">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="name"
          >Question 7</label
        >

        <input
          v-model="form.question_7"
          type="text"
          name="question_7"
          id="question_7"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_7"
          v-text="form.errors.question_7"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 8-->
      <div v-show="step === 8">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="name"
          >Question 8</label
        >

        <input
          v-model="form.question_8"
          type="text"
          name="question_8"
          id="question_8"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_8"
          v-text="form.errors.question_8"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 9-->
      <div v-show="step == 9">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="name"
          >Question 9</label
        >

        <input
          v-model="form.question_9"
          type="text"
          name="question_9"
          id="question_9"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_9"
          v-text="form.errors.question_9"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 10-->
      <div v-show="step == 10">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="name"
          >Question 10</label
        >

        <input
          v-model="form.question_10"
          type="text"
          name="question_10"
          id="question_10"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_10"
          v-text="form.errors.question_10"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- submit -->
      <div v-show="step === 11">
        <div class="mb-6 mt-2">
          <button
            type="submit"
            class="bg-blue-500 text-white py-2 rounded px-4 hover:bg-blue-300"
            :disabled="form.processing"
          >
            Submit
          </button>
        </div>
      </div>
    </div>
  </form>

  <!-- Nav buttons -->
  <div class="mb-6 mt-6">
    <button
      @click="step--"
      :disabled="step === 1"
      class="
        bg-blue-500
        hover:bg-blue-700
        text-white
        font-bold
        py-2
        px-6
        border border-blue-700
        rounded
        m-4
      "
    >
      No
    </button>

    <button
      @click="step++"
      :disabled="step === 11"
      class="
        bg-red-500
        hover:bg-red-700
        text-white
        font-bold
        py-2
        px-6
        border border-blue-700
        rounded
      "
    >
      Yes
    </button>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";

defineProps({
  user: Object,
  errors: Object,
});

let form = useForm({
  user_id: "",
  question_1: null,
});

let submit = () => {
  form.post("/patients/painAnalysisForm", form);
};

let step = ref(1);

let firstQuestion = () => {};
</script>

<style>
</style>