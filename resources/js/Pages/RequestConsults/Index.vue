<template>
  <div class="flex justify-between mb-6">
    <Head title="Registered Patients" />
    <div class="flex items-center">
      <h1 class="text-3xl">Book a Doctor</h1>
    </div>

    <input
      v-model="search"
      type="text"
      placeholder="Search Doctor"
      class="w-32 border px-2 rounded-lg"
    />
  </div>

  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="user in users.data" :key="user.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <Link
                        class="text-indigo-600 hover:text-indigo-900"
                        :href="route('show.user', user.id)"
                      >
                        <div class="text-sm font-medium text-gray-900">
                          {{ user.name }}
                        </div>
                      </Link>
                    </div>
                  </div>
                </td>

                <td
                  class="
                    px-6
                    py-4
                    whitespace-nowrap
                    text-right text-sm
                    font-medium
                  "
                >
                  Specialism
                </td>

                <td
                  class="
                    px-6
                    py-4
                    whitespace-nowrap
                    text-right text-sm
                    font-medium
                  "
                >
                  <Link
                    :href="route('request.consult', user.id)"
                    class="
                      bg-blue-600
                      rounded
                      text-sm text-white
                      p-2
                      hover:bg-blue-400
                      ml-4
                    "
                    >Consultation</Link
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <Paginator :links="users.links" class="mt-6" />
</template>

<script setup>
import { ref, watch } from "vue";
import Paginator from "../../Shared/Paginator.vue";
import inertia, { Inertia } from "@inertiajs/inertia";
import throttle from "lodash/throttle";

let props = defineProps({
  users: Object,
  filters: Object,
  can: Object,
});

let search = ref(props.filters.search);

//watches the search filter for input, then throttles the network requests to 5ms
watch(
  search,
  throttle(function (value) {
    Inertia.get(
      "/patients/consults",
      { search: value },
      {
        preserveState: true,
        replace: true,
      }
    );
  }, 500)
);
</script>

<style>
</style>