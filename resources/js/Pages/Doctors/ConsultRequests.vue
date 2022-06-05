<template>
  <div class="flex justify-between mb-6">
    <Head title="Registered Patients" />
    <div class="flex items-center">
      <h1 class="text-3xl">Patient Consult Requests</h1>
    </div>
  </div>

  <div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <table class="min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200">
              <tr
                v-for="requestConsult in requestConsults"
                :key="requestConsult.id"
              >
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <Link
                        class="text-indigo-600 hover:text-indigo-900"
                        :href="route('show.request', requestConsult.id)"
                      >
                        <div class="text-sm font-medium text-gray-900">
                          {{ requestConsult.name }}
                        </div>
                      </Link>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watch } from "vue";
import Paginator from "../../Shared/Paginator.vue";
import inertia, { Inertia } from "@inertiajs/inertia";
import throttle from "lodash/throttle";

let props = defineProps({
  requestConsults: Object,
});
</script>

<style>
</style>