<template>
  <admin-page-component>
   <div> 
    <div v-if="citizenStatus == 0" class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded mb-10">
        You need to fillup all of your information. You cannot register vaccine if there is an nformation you miss to update. Please check.
        <span class="w-8 h-8 flex item-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg> -->
        </span>
    </div>
    <div v-if="error == 'You already registered the vaccine'" class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded mt-80">
            {{ error }}
              <span @click="errors" class="w-8 h-8 flex item-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </span>
      </div>
      <div v-else-if="error == 'success' " class="flex items-center justify-between py-3 px-5 bg-green-300 text-white rounded mt-80">
            <span class="text-center">Vaccine Registration success!!! Please copy the reference id <strong class="font-bold">{{ vaccineform.reference_id }}</strong>.</span>
              <span @click="errors" class="w-8 h-8 flex item-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </span>
      </div>
      <form @submit="saveRegistrationForm" v-else>
        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Vaccine</h3>
              <!-- <p class="mt-1 text-sm text-gray-600">Vaccine questions</p> -->
            </div>
          </div>
          <div class="mt-5 md:col-span-2 md:mt-0">
              <div class="shadow sm:overflow-hidden sm:rounded-md">
                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Reference Id</label>
                      <span class="block text-sm font-sm text-gray-700">Don't forget to copy the reference id</span>
                      <div class="mt-1 rounded-md">
                        <div class="flex gap-2">
                          <input v-model="vaccineform.reference_id" type="text" name="reference_id" id="reference_id" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-3 gap-6">  
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Have you previously received a vaccine dose?</label>
                      <div class="mt-1 rounded-md">
                        <div>
                          <span>
                            <input v-model="vaccineform.receive_vaccine_dose" type="radio" name="receive_vaccine_dose" value="Yes" v-on:click="VaccineDose">
                            Yes
                          </span>
                        </div>
                        <div>
                          <span>
                            <input v-model="vaccineform.receive_vaccine_dose" type="radio" name="receive_vaccine_dose" value="No" v-on:click="VaccineDose">
                            No
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div v-if="vaccineform.receive_vaccine_dose" class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <div v-if="vaccineform.receive_vaccine_dose === 'Yes'">

                        <label for="company-website" class="block text-sm font-medium text-gray-700">Select Dose</label>
                        <div class="mt-1 rounded-md">
                              <select v-model="vaccineform.dose" name="date" id="date">
                                <option value="" selected disabled hidden>Choose Dose</option>
                                <option value="1st">1st dose</option>
                                <option value="2nd">2nd dose</option>
                                <option value="Booster">Booster</option>
                            </select>
                        </div>
                        <label for="company-website" class="mt-5 block text-sm font-medium text-gray-700">What was your 1st dose vaccine type?</label>
                        <div class="mt-1 rounded-md">
                          <div >
                              <select v-model="vaccineform.first_vaccine_type" name="first_vaccine_type" id="first_vaccine_type" v-on:change="vaccineSelected()">
                                <option value="" selected disabled hidden>Choose Vaccine</option>
                                <template v-for="formvaccines in formvaccine" :key="formvaccines.id">
                                  <option :value="formvaccines.id">{{formvaccines.name}}</option>
                                </template>
                              </select>
                          </div>
                        </div>
                     
                      </div>
                      <div v-else>
                        <label for="company-website" class="block text-sm font-medium text-gray-700">Which vaccine are you interested in receiving?</label>
                        <div class="mt-1 rounded-md">
                          <div>
                            <select v-model="vaccineform.first_vaccine_type" name="first_vaccine_type" id="first_vaccine_type" v-on:change="vaccineSelected()">
                                <option value="" selected disabled hidden>Choose Vaccine</option>
                                <template v-for="formvaccines in formvaccine" :key="formvaccines.id">
                                  <option :value="formvaccines.id">{{formvaccines.name}}</option>
                                </template> 
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div v-if="vaccineDescription" class="mt-0">
                     <span>{{ vaccineDescription.description }}</span>
                  </div>
                  
                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Vaccine Location</label>
                      <div class="mt-1 rounded-md">
                        <select v-model="vaccineform.vaccine_location" name="location" id="location" v-on:change="locationSelected()">
                          <option value="" selected disabled hidden>Choose location here</option>
                          <template v-for="barangay in barangays">
                            <template v-if="barangay.status == 1">
                              <option :value="barangay.barangay_name">{{ barangay.barangay_name }}</option>
                            </template>
                          </template>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Vaccine Schedule</label>
                      <div class="mt-1 rounded-md">
                        <select v-model="vaccineform.vaccine_date" name="date" id="date">
                          <option value="" selected disabled hidden>Choose schedule here</option>
                          <template v-for="locationSchedules in locationSchedule">
                            <option :value="locationSchedules.id">{{locationSchedules.date}}</option>
                          </template>
                        </select>
                        
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        </div>
        <div class="grid grid-cols-1 gap-6">
          <div class="col-span-3 sm:col-span-2">
              <button v-if="citizenStatus != 0 " type="submit" class="float-right mt-4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
              <button v-else disabled class="float-right mt-4 inline-flex justify-center rounded-md border border-transparent bg-indigo-300 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
          </div>
        </div>
      </form>
   
   </div>
  </admin-page-component>
 </template>
<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import { ref, computed } from "vue";
import store from "../../store";
import { useRouter, useRoute } from "vue-router";

import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { ExclamationTriangleIcon } from '@heroicons/vue/24/outline'

const genderOpen = ref(false);


const router = useRouter();
const route = useRoute();

const formvaccine = computed(() => store.state.vaccines.data);
const citizineGetSched = computed(() => store.state.citizineSchedule.data);
const barangays = computed(() => store.state.allBarangays.data);
const vaccineDescription = computed(() => store.state.vaccineDescription.data);
const vaccineDescriptionLoading = computed(() => store.state.vaccineDescription.loading);
const citizenStatus = computed(() => store.state.citizenStatus.data);
const locationSchedule = computed(() => store.state.barangayLocationList.data);



const error = computed(() => store.state.currentVaccineForm.error);
// const success = computed(() => store.state.currentVaccineForm.success);
// console.log(store.state.currentVaccineForm.success);

function errors() {
  location.reload();
}


store.dispatch("getVaccinesRegisterForm");
store.dispatch("getAllBarangayRegisterform");
store.dispatch('citizineGetSchedule');



// let errorMessage = store.state.currentVaccineForm.error;

const characters ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

function generateReferenceId(length) {
    let result = '';
    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
      counter += 1;
    }
    return result;
}

let generatedReferenceId = generateReferenceId(6);

let citizenId = store.state.user.id;
store.dispatch('checkUserStatus', citizenId);


function locationSelected() {
  let barangayName = document.getElementById('location').value;
  store.dispatch('getLocationScheduleList', barangayName);
}

let vaccineform = ref({
  receive_vaccine_dose: '',
  first_vaccine_type: '',
  interested_vaccine: '0',
  citizen_id: citizenId,
  vaccine_location: '',
  vaccine_date: '',
  status: '0',
  pregnant: 'None',
  month: 'None',
  days: 'None',
  reference_id: generatedReferenceId,
  dose: '1st',
  user_id: '0'
});



function vaccineSelected() {
  let vaccineId = document.getElementById('first_vaccine_type').value;
  store.dispatch("getVaccineDescription", vaccineId)
}

function VaccineDose() {
  const VDose = 
  document.querySelectorAll('input[name="receive_vaccine_dose"]')
  for (const v of VDose) {
    if (v.checked) {
      vaccineform.value.receive_vaccine_dose = v.value;
      
    }
  }
}



function saveRegistrationForm(ev) {
  ev.preventDefault();
  store.dispatch("saveRegistrationForm", vaccineform.value).then(() => {
  
  })  
  
}






</script>
<style></style>