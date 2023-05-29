<template>
    <admin-page-component>
  <div v-if="userLoading" class=" h-fit ">
            <div class="loader border-t-sky-400 border-10 border-8 rounded-full w-20 h-20 animation-pulse border-t-8 absolute top-1/2 left-1/2"></div>
  </div>
  <div v-else>
    <div class="md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-2xl font-medium leading-6 text-gray-900 mb-4">Add Vaccine Schedule</h3>
          <!-- <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p> -->
        </div>
      </div>
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form @submit.prevent="AddSchedule">  
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

              <div class="grid grid-cols-1 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Date</label>
                  <div class="mt-1 rounded-md">
                    <input v-model="schedule.date" type="date" id="date" name="date">
                  </div>
                </div>
              </div>
              <div class="grid grid-cols-1 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Barangay</label>
                  <div class="mt-1 rounded-md">
                      <select v-model="schedule.barangay_id" id="barangay_id" name="barangay_id" autocomplete="barangay_id" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6">
                        <template v-for="barangay in barangays">
                          <option :value="barangay.id">{{ barangay.barangay_name }}</option>
                        </template>
                      </select>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
 
    </admin-page-component>
</template>

<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import { ref, watch,computed } from "vue";
import store from "../../store";
import { useRouter, useRoute } from "vue-router"

const router = useRouter();
const route = useRoute();

const barangays = computed(() => store.state.allBarangaysSchedule.data);

let schedule = ref({
    date: '',
    barangay: ''
});


watch(
  () => store.state.currentSchedule.data,
  (newVal, oldVal) => {
    schedule.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    }
  }
);

if (route.params.id) {
  store.dispatch("getSchedules", route.params.id);
}

const userId = store.state.user.id;
store.dispatch("getAllBarangayForAddSchedule", userId);
// store.dispatch("getAllBarangayRegisterform");


function AddSchedule() {
  store.dispatch("AddSchedule", schedule.value).then(() => {
    router.push({
       name: 'Schedule',
    });
  })
}

</script>
