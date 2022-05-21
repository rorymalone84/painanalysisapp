<template>
  <Head title="Request Consultation" />

  <h1>
    This is a request for Dr. {{ doctor.name }} to provide you with a Pain
    Analysis consultation based on your entries
  </h1>

  <form @submit.prevent="submit" class="mx-w-md mx-auto mt-8">
    <div class="mb-6">
      <!-- Logged in users ID -->
      <input v-model="form.patient_id" type="hidden" name="patient_id" />

      <!-- Requested Doctor's user ID -->
      <input v-model="form.doctor_id" type="hidden" name="doctor_id" />
    </div>
    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="name"
        >What time duration of past journal entries do you wish the doctor to
        analyse?</label
      >

      <div class="p-6">
        <input
          v-model="form.duration"
          class="pr-2"
          type="radio"
          name="duration"
          value="Past Week"
        />
        <label class="p-4" for="user_role1">The past week</label>

        <input
          v-model="form.duration"
          class="p-2"
          type="radio"
          name="duration"
          value="Past Month"
        />
        <label class="p-2" for="user_role2">Month</label>

        <input
          v-model="form.durarion"
          class="p-2"
          type="radio"
          name="duration"
          value="quarter"
        />
        <label class="p-2" for="user_role3">3 months</label>
      </div>
    </div>

    <div class="mb-6">
      <label
        class="block mb-2 uppercase font-bold text-xs text-gray-700"
        for="password"
        >Do you wish to add any comments?</label
      >

      <input
        v-model="form.comments"
        type="text"
        name="comments"
        id="password"
        class="border border-gray-400 p-2 w-full"
      />
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
      patient_id: props.auth.user.id,
      doctor_id: props.doctor.id,
      duration: "",
      comments: "",
    });
    return { form };
  },

  props: {
    auth: Object,
    doctor: Object,
    errors: Object,
  },
  methods: {
    submit() {
      this.form.post("/patients/requestConsult/" + this.doctor.id);
    },
  },
};
</script>

<style>
</style>