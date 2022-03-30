<template>
  <Head title="Pain Analysis Form" />

  <h1>Make a new entry</h1>

  <form @submit.prevent="submit" class="mx-w-md mx-auto mt-8">
    <!-- Questions -->

    <div class="mb-6">
      <!-- Question 1-->

      <div v-show="step === 1">
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >1. What best describes the pain you have felt today?</label
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
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >2. Point to where you feel the pain the most</label
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
          v-if="form.errors.question_2"
          v-text="form.errors.question_2"
          class="text-red-500 mt-2"
        ></div>
      </div>

      <!-- Question 3-->
      <div v-show="step === 3">
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          ><h1>
            3. Between 1 and 10, describe your pain at its <b>highest</b> over
            the last 24 hours
          </h1></label
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
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >4. Between 1 and 10, describe your pain at its <b>lowest</b> over the
          last 24 hours</label
        >

        <input
          v-model="form.question_4"
          type="text"
          name="question_4"
          id="question_4"
          class="border border-gray-400 p-2 w-full"
          required
        />

        <div
          v-if="form.errors.question_4"
          v-text="form.errors.question_4"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 5-->
      <div v-show="step == 5">
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >5. On average, how intense has the pain felt over the last 24 hours?
          {{ user_id }}</label
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
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >6. How intense is the pain you feel right now?</label
        >

        <input
          v-model="form.question_6"
          type="text"
          name="question_6"
          id="question_6"
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
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >7. Which treatments or medications are you receiving for your
          pain?</label
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
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >8. What amount of the prescribed medication dosage was taken
          today?</label
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
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >9. In the last 24 hours, how much relief has medication
          provided?</label
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
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >10. How has pain interfered with your daily activities in the past 24
          hours.</label
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
        px-3
        border border-blue-700
        rounded
        m-4
      "
    >
      Previous
    </button>

    <button
      @click="step++"
      :disabled="step === 11"
      class="
        bg-green-500
        hover:bg-green-700
        text-white
        font-bold
        py-2
        px-6
        border border-blue-700
        rounded
      "
    >
      Next
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
  question_1: null,
  question_2: null,
  question_3: null,
  question_4: null,
  question_5: null,
  question_6: null,
  question_7: null,
  question_8: null,
  question_9: null,
  question_10: null,
});

let submit = () => {
  form.post("/patients/form", form);
};

let step = ref(1);
</script>

<style>
</style>