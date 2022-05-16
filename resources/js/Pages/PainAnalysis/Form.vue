<template>
  <Head title="Pain Analysis Form" />

  <div class="grid place-items-center">
    <RadialProgressBar
      :diameter="125"
      :completed-steps="step"
      :total-steps="13"
      :stopColor="'#bcf7f4'"
      :startColor="'#77fcf6'"
    >
      <h4 class="font-bold text-gray-500" v-if="step < 13">
        Question {{ step }}
      </h4>
      <h1 class="font-bold text-gray-500" v-else>Complete</h1>
    </RadialProgressBar>
  </div>

  <form @submit.prevent="submit" class="mx-w-md m-8">
    <!-- Questions -->
    <div class="mb-6">
      <!-- Question 1-->
      <div v-show="step === 1">
        <label class="block mb-4 font-bold text-gray-500" for="name"
          >What best describes the pain you have felt today?
        </label>

        <div class="grid grid-cols-2">
          <div v-for="(key, index) in question1_values" :key="index">
            <label class="PillList-item">
              <input
                type="checkbox"
                id="grid-item"
                name="question_1[]"
                :value="key"
                v-model="form.question_1"
                class="PillList-item"
              />
              <span class="PillList-label">{{ key }} </span>
            </label>
          </div>
        </div>

        <div
          v-if="form.errors.question_1"
          v-text="form.errors.question_1"
          class="text-red-500 mt-2"
        ></div>
      </div>

      <!-- Question 2-->
      <div v-show="step === 2">
        <label class="block mb-4 font-bold text-gray-500" for="name"
          >Where you feel the pain the most?</label
        >

        <Tabs
          class="w-11/12 lg:w-10/12 mx-auto mb-16 bg-blue"
          :tabList="tabList"
        >
          <!-- Head -->
          <template v-slot:tabPanel-1>
            <div class="grid grid-cols-2 md:grid-cols-3">
              <div
                v-for="(key, index) in question2_values_head"
                :key="index"
                class="grid"
              >
                <label class="PillList-item">
                  <input
                    type="checkbox"
                    name="question_2[]"
                    :value="key"
                    v-model="form.question_2"
                    class="PillList-item"
                  />
                  <span class="PillList-label">{{ key }} </span>
                </label>
              </div>
            </div>

            <div
              v-if="form.errors.question_2"
              v-text="form.errors.question_2"
              class="text-red-500 mt-2"
            ></div>
          </template>
          <template v-slot:tabPanel-2>
            <div class="grid grid-cols-2 md:grid-cols-3">
              <div
                v-for="(key, index) in question2_values_front"
                :key="index"
                class="grid"
              >
                <label class="PillList-item">
                  <input
                    type="checkbox"
                    name="question_2[]"
                    :value="key"
                    v-model="form.question_2"
                    class="PillList-item"
                  />
                  <span class="PillList-label">{{ key }} </span>
                </label>
              </div>
            </div>

            <div
              v-if="form.errors.question_2"
              v-text="form.errors.question_2"
              class="text-red-500 mt-2"
            ></div>
          </template>
          <template v-slot:tabPanel-3>
            <div class="grid grid-cols-2 md:grid-cols-2">
              <div
                v-for="(key, index) in question2_values_back"
                :key="index"
                class="grid"
              >
                <label class="PillList-item">
                  <input
                    type="checkbox"
                    name="question_2[]"
                    :value="key"
                    v-model="form.question_2"
                    class="PillList-item"
                  />
                  <span class="PillList-label">{{ key }} </span>
                </label>
              </div>
            </div>

            <div
              v-if="form.errors.question_2"
              v-text="form.errors.question_2"
              class="text-red-500 mt-2"
            ></div>
          </template>
          <template v-slot:tabPanel-4>
            <div class="grid grid-cols-2 md:grid-cols-2">
              <div
                v-for="(key, index) in question2_values_arms"
                :key="index"
                class="grid"
              >
                <label class="PillList-item">
                  <input
                    type="checkbox"
                    name="question_2[]"
                    :value="key"
                    v-model="form.question_2"
                    class="PillList-item"
                  />
                  <span class="PillList-label">{{ key }} </span>
                </label>
              </div>
            </div>

            <div
              v-if="form.errors.question_2"
              v-text="form.errors.question_2"
              class="text-red-500 mt-2"
            ></div>
          </template>
          <template v-slot:tabPanel-5>
            <div class="grid grid-cols-2 md:grid-cols-2">
              <div
                v-for="(key, index) in question2_values_legs"
                :key="index"
                class="grid"
              >
                <label class="PillList-item">
                  <input
                    type="checkbox"
                    name="question_2[]"
                    :value="key"
                    v-model="form.question_2"
                    class="PillList-item"
                  />
                  <span class="PillList-label">{{ key }} </span>
                </label>
              </div>
            </div>

            <div
              v-if="form.errors.question_2"
              v-text="form.errors.question_2"
              class="text-red-500 mt-2"
            ></div>
          </template>
          <template v-slot:tabPanel-6>
            <div class="grid grid-cols-2 md:grid-cols-2">
              <div
                v-for="(key, index) in question2_values_feet"
                :key="index"
                class="grid"
              >
                <label class="PillList-item">
                  <input
                    type="checkbox"
                    name="question_2[]"
                    :value="key"
                    v-model="form.question_2"
                    class="PillList-item"
                  />
                  <span class="PillList-label">{{ key }} </span>
                </label>
              </div>
            </div>

            <div
              v-if="form.errors.question_2"
              v-text="form.errors.question_2"
              class="text-red-500 mt-2"
            ></div>
          </template>
        </Tabs>
      </div>

      <!--Question 3 -->
      <div v-show="step === 3">
        <label class="block mb-4 font-bold text-gray-500" for="name">
          At what time('s) of day does the pain mostly occur?
        </label>
        <div class="grid grid-cols-2 md:grid-cols-3">
          <div
            v-for="(key, index) in question3_values"
            :key="index"
            class="grid"
          >
            <label class="PillList-item">
              <input
                type="checkbox"
                name="question_3[]"
                :value="key"
                v-model="form.question_3"
                class="PillList-item"
              />
              <span class="PillList-label">{{ key }} </span>
            </label>
          </div>
        </div>
        <div
          v-if="form.errors.question_3"
          v-text="form.errors.question_3"
          class="text-red-500 mt-2"
        ></div>
      </div>

      <!--Question 4 -->
      <div v-show="step === 4">
        <label class="block mb-4 font-bold text-gray-500" for="name">
          How frequently does the pain occur?
        </label>
        <div class="grid grid-cols-2 md:grid-cols-3">
          <div
            v-for="(key, index) in question4_values"
            :key="index"
            class="grid"
          >
            <label class="PillList-item">
              <input
                type="checkbox"
                name="question_4[]"
                :value="key"
                v-model="form.question_4"
                class="PillList-item"
              />
              <span class="PillList-label">{{ key }} </span>
            </label>
          </div>
        </div>
        <div
          v-if="form.errors.question_4"
          v-text="form.errors.question_4"
          class="text-red-500 mt-2"
        ></div>
      </div>

      <!-- Question 5-->
      <div v-show="step === 5">
        <label class="block mb-4 font-bold text-gray-500" for="name">
          Between 1 and 10, describe your pain at its <b>highest</b> over the
          last 24 hours:
        </label>
        <label class="block mb-4 text-gray-700 mb-6">
          <b v-if="form.question_5">{{ form.question_5 }}</b> of 10
        </label>
        <input
          v-model="form.question_5"
          type="range"
          min="1"
          max="10"
          name="question_5"
          id="rangeSlider"
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
        <label class="block mb-4 font-bold text-gray-500" for="name"
          >Between 1 and 10, describe your pain at its <b>lowest</b> over the
          last 24 hours</label
        >
        <label class="block mb-4 text-gray-700 mb-6">
          <b>{{ form.question_6 }} </b> of 10
        </label>
        <input
          v-model="form.question_6"
          type="range"
          min="1"
          max="10"
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
      <div v-show="step == 7">
        <label class="block mb-4 font-bold text-gray-500" for="name"
          >On average, how intense has the pain felt over the last 24
          hours?</label
        >
        <label class="block mb-4 text-gray-700 mb-6">
          <b>{{ form.question_7 }} </b> of 10
        </label>
        <input
          v-model="form.question_7"
          type="range"
          min="1"
          max="10"
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
      <div v-show="step == 8">
        <label class="block mb-4 font-bold text-gray-500" for="name"
          >How intense is the pain you feel right now?</label
        >

        <label class="block mb-4 text-gray-700 mb-6">
          <b>{{ form.question_8 }} </b> of 10
        </label>

        <input
          v-model="form.question_8"
          type="range"
          min="1"
          max="10"
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
      <div v-show="step === 9">
        <label class="block mb-4 font-bold text-gray-500" for="name"
          >Which treatments or medications are you receiving for your
          pain?</label
        >

        <div class="grid grid-cols-2">
          <div
            v-for="(key, index) in question9_values"
            :key="index"
            class="col-md-12"
          >
            <label class="PillList-item">
              <input
                type="checkbox"
                id="grid-item"
                name="question_9[]"
                :value="key"
                v-model="form.question_9"
                class="PillList-item"
              />
              <span class="PillList-label">{{ key }} </span>
            </label>
          </div>
        </div>

        <div
          v-if="form.errors.question_9"
          v-text="form.errors.question_9"
          class="text-red-500 mt-2"
        ></div>
      </div>

      <!-- Question 10-->
      <div v-show="step === 10">
        <label class="block mb-4 font-bold text-gray-500" for="name"
          >How many doses of the prescribed medication dosage was taken
          today?</label
        >
        <label class="block mb-4 text-gray-700 mb-6">
          <b>{{ form.question_10 }} </b> of 10
        </label>
        <input
          v-model="form.question_10"
          type="range"
          min="0"
          max="10"
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
      <!-- Question 11-->
      <div v-show="step == 11">
        <label class="block mb-4 font-bold text-gray-500" for="name"
          >In the last 24 hours, how much relief has medication provided?</label
        >
        <label class="block mb-4 text-gray-700 mb-6">
          <b>{{ form.question_11 }} </b> of 10
        </label>
        <input
          v-model="form.question_11"
          type="range"
          min="1"
          max="10"
          name="question_11"
          id="question_11"
          class="border border-gray-400 p-2 w-full"
          required
        />
        <div
          v-if="form.errors.question_11"
          v-text="form.errors.question_11"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Question 12-->
      <div v-show="step == 12">
        <label class="block mb-4 font-bold text-gray-500" for="name"
          >How has pain interfered with your daily activities in the past 24
          hours.</label
        >
        <label class="block mb-4 text-gray-700">
          <b>{{ form.question_12 }} </b> of 10
        </label>
        <input
          v-model="form.question_12"
          type="range"
          min="1"
          max="10"
          name="question_12"
          id="question_12"
          class="border border-gray-400 p-2 w-full"
          required
        />
        <div
          v-if="form.errors.question_12"
          v-text="form.errors.question_12"
          class="text-red-500 mt-2"
        ></div>
      </div>
      <!-- Nav buttons -->
      <div class="m-4 grid place-items-center">
        <div v-if="step < 13">
          <div
            @click="step++"
            :disabled="step === 13"
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
          </div>
        </div>
        <div v-if="step > 1">
          <div
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
          </div>
        </div>
        <div v-show="step === 13">
          <!-- submit -->
          <div class="mb-6 mt-2">
            <button
              type="submit"
              class="
                bg-green-500
                text-white
                py-2
                rounded
                px-4
                hover:bg-blue-300
              "
              :disabled="form.processing"
            >
              Submit
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { ref, defineComponent, onMounted } from "vue";
import RadialProgressBar from "vue3-radial-progress";

//'step' is used to paginate the questions into 1 question per page
//this variable sets step 1
let step = ref(1);

//sets the initial value for the range sliders v-model to the midway point of the slider
onMounted(() => {
  form.question_5 = 5;
  form.question_6 = 5;
  form.question_7 = 5;
  form.question_8 = 5;
  form.question_10 = 5;
  form.question_11 = 5;
  form.question_12 = 5;
});

defineProps({
  user: Object,
  errors: Object,

  //values are passed from PainAnalysisController for the checkbox values
  question1_values: Array,
  //values for each tab on question 2
  question2_values_head: Array,
  question2_values_front: Array,
  question2_values_back: Array,
  question2_values_arms: Array,
  question2_values_legs: Array,
  question2_values_feet: Array,
  //
  question3_values: Array,
  question4_values: Array,
  question9_values: Array,
});

//Tabs list for question 2
const tabList = ["Head", "Front", "Back", "Arms", "Legs", "Feet"];

let form = useForm({
  question_1: [],
  question_2: [],
  question_3: [],
  question_4: [],
  question_5: "",
  question_6: "",
  question_7: "",
  question_8: "",
  question_9: [],
  question_10: "",
  question_11: "",
  question_12: "",
});

let submit = () => {
  form.post("/patients/form", form);
};
</script>

<style scoped>
.PillList-item {
  cursor: pointer;
  display: inline-block;
  font-size: 14px;
  font-weight: normal;
  line-height: 20px;
  margin: 0 12px 12px 0;
  text-transform: capitalize;
}

.PillList-item input[type="checkbox"] {
  display: none;
}
.PillList-item input[type="checkbox"]:checked + .PillList-label {
  background-color: #c8e7fd;
  border: 1px solid #1da1f2;
  font-weight: bold;
  color: rgb(0, 0, 0);
}
.PillList-label {
  border: 1px solid #1da1f2;
  border-radius: 20px;
  color: #1c94e0;
  display: block;
  padding: 3px 18px;
  text-decoration: none;
}

.PillList-item input[type="checkbox"]:checked + .PillList-label .Icon--addLight,
.PillList-label .Icon--checkLight,
.PillList-children {
  display: none;
}
.PillList-label .Icon {
  width: 12px;
  height: 12px;
  margin: 0 0 0 12px;
}
.Icon--smallest {
  font-size: 12px;
  line-height: 12px;
}
.Icon {
  background: transparent;
  display: inline-block;
  font-style: normal;
  vertical-align: baseline;
  position: relative;
}
</style>