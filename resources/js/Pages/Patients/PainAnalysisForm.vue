<template>
  <Head title="Pain Analysis Form" />

  <h1>Make a new entry</h1>

  <form @submit.prevent="submit" class="mx-w-md mx-auto mt-8">
    <!-- Questions -->

    <div class="mb-6">
      <!-- Question 1-->

      <!-- array- checkbox -->
      <div v-show="step === 1">
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >1. What best describes the pain you have felt today?</label
        >
        <input
          type="checkbox"
          id="option1"
          name="question_1[]"
          value="pulsing"
          v-model="form.question_2"
        />
        <label for="option1"> Pulsing</label><br />
        <input
          type="checkbox"
          id="option2"
          name="question_1[]"
          value="burning"
          v-model="form.question_1"
        />
        <label for="option2"> Burning</label><br />
        <input
          type="checkbox"
          id="option3"
          name="question_1[]"
          value="sore"
          v-model="form.question_1"
        />
        <label for="option3"> Sore</label><br />

        <div
          v-if="form.errors.question_1"
          v-text="form.errors.question_1"
          class="text-red-500 mt-2"
        ></div>
      </div>

      <!-- Question 2-->
      <!-- image map - check box -->
      <div v-show="step === 2">
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >2. Point to where you feel the pain the most</label
        >

        <input
          type="checkbox"
          id="option1"
          name="question_2[]"
          value="Head"
          v-model="form.question_2"
        />
        <label for="option1"> Head</label><br />
        <input
          type="checkbox"
          id="option2"
          name="question_2[]"
          value="Back"
          v-model="form.question_2"
        />
        <label for="option2"> Back</label><br />
        <input
          type="checkbox"
          id="option3"
          name="question_2[]"
          value="Hand"
          v-model="form.question_2"
        />
        <label for="option3"> Hand</label><br />

        <div
          v-if="form.errors.question_2"
          v-text="form.errors.question_2"
          class="text-red-500 mt-2"
        ></div>
      </div>

      <!-- Question 3-->
      <!-- slider - int -->
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

      <!-- slider - int -->
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

      <!-- slider - int -->
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

      <!-- slider - int -->
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

      <!-- checkbox - array -->
      <!-- Question 7-->
      <div v-show="step === 7">
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >7. Which treatments or medications are you receiving for your
          pain?</label
        >

        <input
          type="checkbox"
          id="option1"
          name="question_7[]"
          value="Paracetomal"
          v-model="form.question_7"
        />
        <label for="option1"> Paracetomal</label><br />
        <input
          type="checkbox"
          id="option2"
          name="question_7[]"
          value="Medicine"
          v-model="form.question_7"
        />
        <label for="option2"> Medicine</label><br />
        <input
          type="checkbox"
          id="option3"
          name="question_7[]"
          value="None"
          v-model="form.question_7"
        />
        <label for="option3"> None</label><br />

        <div
          v-if="form.errors.question_7"
          v-text="form.errors.question_7"
          class="text-red-500 mt-2"
        ></div>
      </div>

      <!-- slider - int -->
      <!-- Question 8-->
      <div v-show="step === 8">
        <label class="block mb-2 uppercase font-bold text-gray-700" for="name"
          >8. How many doses of the prescribed medication dosage was taken
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

      <!-- slider - int -->
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

      <!-- int - slider -->
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
  question_1: [],
  question_2: [],
  question_3: null,
  question_4: null,
  question_5: null,
  question_6: null,
  question_7: [],
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