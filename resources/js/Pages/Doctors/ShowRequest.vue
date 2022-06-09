<template>
  <Head title="Request Consultation" />

  <h1 class="mb-6">
    This is a request from user for you to provide a pain analysis for the
    following...
  </h1>

  <label
    class="block mb-2 uppercase font-bold text-xs text-gray-700"
    for="password"
    >Duration:</label
  >
  <h1 class="mb-6">{{ consultRequest.duration }}</h1>

  <label
    class="block mb-2 uppercase font-bold text-xs text-gray-700"
    for="password"
    >Further Comments:</label
  >
  <h1 class="mb-2">{{ consultRequest.comments }}</h1>

  <form @submit.prevent="submit" class="mx-w-md mx-auto mt-8">
    <div class="mb-6">
      <!-- Logged in users ID -->
      <input v-model="form.patient_id" type="hidden" name="patient_id" />

      <!-- Requested Doctor's user ID -->
      <input v-model="form.doctor_id" type="hidden" name="doctor_id" />
    </div>
    <div class="mb-6">
      <label
        class="block mb-6 uppercase font-bold text-xs text-gray-700"
        for="name"
        >Check the patients journal and provide the patient with an analysis
        below:</label
      >

      <div class="mb-6">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="password"
          >Diagnosis</label
        >

        <input
          v-model="form.diagnosis"
          type="text"
          name="diagnosis"
          class="border border-gray-400 p-2 w-full"
        />
      </div>

      <div class="mb-6">
        <label
          class="block mb-2 uppercase font-bold text-xs text-gray-700"
          for="password"
          >Prescription</label
        >

        <input
          v-model="form.prescription"
          type="text"
          name="diagnosis"
          class="border border-gray-400 p-2 w-full"
        />
      </div>

      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="name"
        >Ask patient to request another analysis for a checkup in...</label
      >

      <div class="p-6">
        <input
          v-model="form.checkup"
          class="pr-2"
          type="radio"
          name="checkup"
          value="One Week"
        />
        <label class="p-4" for="duration">One week</label>

        <input
          v-model="form.checkup"
          class="p-2"
          type="radio"
          name="checkup"
          value="Two weeks"
        />
        <label class="p-2" for="duration">Two weeks</label>

        <input
          v-model="form.checkup"
          class="p-2"
          type="radio"
          name="checkup"
          value="quarter"
        />
        <label class="p-2" for="duration">One Month</label>
      </div>
    </div>

    <div class="mb-6 mt-2">
      <button
        type="submit"
        class="bg-blue-500 text-white py-2 rounded px-4 hover:bg-blue-300"
        :disabled="form.processing"
      >
        Submit
      </button>
    </div>
  </form>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  setup(props) {
    let form = useForm({
      request_id: props.consultRequest.id,
      patient_id: props.consultRequest.patient_id,
      doctor_id: props.consultRequest.doctor_id,
      diagnosis: "",
      prescription: "",
      checkup: "",
    });
    return { form };
  },

  props: {
    auth: Object,
    consultRequest: Object,
    errors: Object,
  },
  methods: {
    submit() {
      this.form.post("/doctors/consults/" + this.consultRequest.id);
    },
  },
};
</script>

<style>
</style>