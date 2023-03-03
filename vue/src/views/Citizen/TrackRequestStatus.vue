<template>
    <div class="md:grid-cols-3 md:gap-6 mt-12 ml-10 mr-10">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-[40px] font-medium leading-6 text-gray-900">Track Status</h3>
          <p class="text-[20px] mt-5 text-sm text-gray-600">Please enter the following etails to track your request</p>
        </div>
      </div>
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form @submit.prevent="trackVaccineStatus">  
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Reference ID<span class="text-red-400">*</span>:</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input v-model="trackRequestStatus.reference_id" type="text" name="reference_id" id="reference_id" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Reference Id" />
                  </div>
                </div>
              </div>
              
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button @click="open = true" type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 flex justify-between items-center mt-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                Track Status
            </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="relative z-10" @close="open = false">
      <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
      </TransitionChild>

      <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 ">
          <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <DialogPanel class=" relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-screen-xl">
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                  <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th class="pt-3 py-3">Name</th>
                            <th class="pt-3 py-3">Age</th>
                            <th class="pt-3 py-3">Sex</th>
                            <th class="pt-3 py-3">Email</th>
                            <th class="pt-3 py-3">Phone</th>
                            <th class="pt-3 py-3">Address</th>
                            <th class="pt-3 py-3">Zip code</th>
                            <th class="pt-3 py-3">Vaccine Type</th>
                            <th class="pt-3 py-3">Vaccine Dose</th>
                            <th class="pt-3 py-3">Vaccine Date</th>
                            <th class="pt-3 py-3">Location</th>
                            <th class="pt-3 py-3">Pregnant</th>
                            <th class="pt-3 py-3">Months</th>
                            <th class="pt-3 py-3">Days</th>
                        </tr>
                    </thead>
                    <div v-if="trackerLoading" class=" h-fit ">
                        <div class="loader border-t-sky-400 border-10 border-8 rounded-full w-10 h-10 animation-pulse border-t-8 absolute top-1/2 left-1/2"></div>
                    </div>
                    <template v-else>
                      <tbody v-if="getallVaccinees < 1">
                      <tr>
                        <td class="text-center pt-4 pb-4" colspan="14">
                          <span class="text-red-400 font-semibold block text-xl ">The reference id is not correct. Please make sure that the reference id is correct to see that status.</span>
                        </td>
                        
                      </tr>
                    </tbody>
                      <tbody>
                        <tr v-for="trackStatus in getallVaccinees">
                            <td data-label="Name" class="pt-3 py-3">{{ trackStatus.firstname +"&nbsp"+  trackStatus.middlename +"&nbsp"+  trackStatus.lastname}}</td>
                            <td data-label="Age" class="pt-3 py-3">{{ trackStatus.age }}</td>
                            <td data-label="Sex" class="pt-3 py-3">{{ trackStatus.sex }}</td>
                            <td data-label="Email" class="pt-3 py-3">{{ trackStatus.email }}</td>
                            <td data-label="Phone" class="pt-3 py-3">{{ trackStatus.phone }}</td>
                            <td data-label="Address" class="pt-3 py-3">{{ trackStatus.address_line_1 + trackStatus.city + trackStatus.state  }}</td>
                            <td data-label="Zip Code" class="pt-3 py-3">{{ trackStatus.zipcode }}</td>
                            <td data-label="Vaccine Type" class="pt-3 py-3">{{ trackStatus.vaccine_type }}</td>
                            <td data-label="Dosage" class="pt-3 py-3">{{ trackStatus.dosage }}</td>
                            <td data-label="Vaccine Date" class="pt-3 py-3">{{ trackStatus.vaccine_date }}</td>
                            <td data-label="Location" class="pt-3 py-3">{{ trackStatus.vaccine_location }}</td>
                            <td data-label="Pregnant" class="pt-3 py-3">{{ trackStatus.pregnant }}</td>
                            <td data-label="Months" class="pt-3 py-3">{{ trackStatus.month }}</td>
                            <td data-label="Days" class="pt-3 py-3">{{ trackStatus.days }}</td>
                        </tr>
                        
                    </tbody>  
                    </template>
                   
                    
                    
                </table>
                  
                </div>
              </div>
              <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 flex justify-between items-center">
                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" @click="open = false" ref="cancelButtonRef">Close</button>
                <div v-if="getallVaccinees > 0">
                  <span class="text-green-400 font-bold ">Status: Complete</span>
                </div>
                
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>


    
</template>
<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import { ref, watch,computed } from "vue";
import store from "../../store";
import { useRouter, useRoute } from "vue-router"

import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ExclamationTriangleIcon } from '@heroicons/vue/24/outline'

const router = useRouter();
const route = useRoute();

const getallVaccinees = computed(() => store.state.currentTrackerStatus.data);
const trackerLoading = computed(() => store.state.currentTrackerStatus.loading);

let trackRequestStatus = ref({
  reference_id: '',
});
const open = ref(false);

function trackVaccineStatus() {
  store.dispatch("trackRequest", trackRequestStatus.value).then(() => {
    
    router.push({
      name: "TrackRequestStatus",
    });
  });
}


</script>
<style></style>