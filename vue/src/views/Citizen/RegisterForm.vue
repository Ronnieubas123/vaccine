<template>
  <admin-page-component>
   <div>
      <form @submit.prevent="saveVaccineForm">
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
                  
                  <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                  
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Have you previously received a COVID-19 vaccine dose?</label>
                      <div class="mt-1 rounded-md">
                        <div>
                          <span>
                            <input v-model="vaccineform.receive_vaccine_dose" type="radio" name="receive_vaccine_dose" value="Yes" @click="VaccineDose">
                            Yes
                          </span>
                        </div>
                        <div>
                          <span>
                            <input v-model="vaccineform.receive_vaccine_dose" type="radio" name="receive_vaccine_dose" value="No" @click="VaccineDose">
                            No
                          </span>
                        </div>
                        
                      </div>
                    </div>
                  </div>


                  <div v-if="vaccineform.receive_vaccine_dose" class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <div v-if="vaccineform.receive_vaccine_dose === 'Yes'">
                        <label for="company-website" class="block text-sm font-medium text-gray-700">What was your 1st dose vaccine type?</label>
                        <div class="mt-1 rounded-md">
                          <div v-for="formvaccines in formvaccine" :key="formvaccines.id" >
                            <span>
                              <input v-model="vaccineform.first_vaccine_type" type="radio" name="first_vaccine_type" :value="formvaccines.name" @click="FirstVaccineType">
                              {{ formvaccines.name }}
                            </span>
                          </div>
                        </div>
                      </div>
                      <div v-else>
                        <label for="company-website" class="block text-sm font-medium text-gray-700">Which vaccine are you interested in receiving?</label>
                        <div class="mt-1 rounded-md">
                          <div v-for="formvaccines in formvaccine" :key="formvaccines.id" >
                            <span>
                              <input v-model="vaccineform.first_vaccine_type" type="radio" name="first_vaccine_type" value="Pfizer" @click="FirstVaccineType">
                              {{ formvaccines.name }}
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  
                </div>
              </div>
          </div>
        </div>
        <div class="hidden sm:block" aria-hidden="true">
          <div class="py-5">
            <div class="border-t border-gray-200" />
          </div>
        </div>


        <div class="md:grid md:grid-cols-3 md:gap-6">
          <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
              <h3 class="text-lg font-medium leading-6 text-gray-900">Information</h3>
              <!-- <p class="mt-1 text-sm text-gray-600">Vaccine questions</p> -->
            </div>
          </div>
          <div class="mt-5 md:col-span-2 md:mt-0">
            
              <div class="shadow sm:overflow-hidden sm:rounded-md">
                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                  <div class="grid grid-cols-1gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Name</label>
                      <div class="mt-1 rounded-md">
                        <div class="flex gap-2">
                          <input v-model="vaccineform.firstname" type="text" name="firstname" id="firstname" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder=" First Name" />
                          <input v-model="vaccineform.middlename" type="text" name="middlename" id="middlename" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder=" Middle Name" />
                          <input v-model="vaccineform.lastname" type="text" name="lastname" id="lastname" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder=" Last Name" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                      <div class="mt-1 rounded-md">
                        <div class="flex gap-2">
                          <input v-model="vaccineform.dof" type="date" name="dof" id="dof" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder=" Date of Birth" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Age</label>
                      <div class="mt-1 rounded-md">
                        <div class="flex gap-2">
                         
                          <select v-model="vaccineform.age" name="age" id="age">
                            <option value="">Under 18</option>
                            <option value="">18 - 24</option>
                            <option value="">25 - 34</option>
                            <option value="">34 - 44</option>
                            <option value="">45 - 54</option>
                            <option value="">55 - 64</option>
                            <option value="">65 - 97</option>
                            <option value="">98+</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Address</label>
                      <div class="mt-1 rounded-md">
                          <input v-model="vaccineform.address_line_1" type="text" name="address_line_1" id="address_line_1" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder=" Address Line 1" />
                          <div class="flex gap-2 mt-1">
                            <input v-model="vaccineform.city" type="text" name="city" id="city" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="City" />
                            <input v-model="vaccineform.state" type="text" name="state" id="state" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="State" />
                          </div>
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Zip Code</label>
                      <div class="mt-1 rounded-md">
                          <input v-model="vaccineform.zipcode" type="number" name="zipcode" id="zipcode" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Zip Code" />
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Phone Number</label>
                      <div class="mt-1 rounded-md">
                          <input v-model="vaccineform.phone" type="number" name="phone" id="phone" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Phone Number" />
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Email</label>
                      <div class="mt-1 rounded-md">
                          <input v-model="vaccineform.email" type="email" name="email" id="email" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Example@gmail.com" />
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Sex</label>
                      <div class="mt-1 rounded-md">
                        <div>
                          <span>
                            <input v-model="vaccineform.sex" value="Female" type="radio" name="sex" id="sex" class=" border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"  />
                            Female
                          </span>
                        </div>
                        <div>
                          <span>
                            <input v-model="vaccineform.sex" value="Male" type="radio" name="sex" id="sex" class=" border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                            Male
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Vaccine Location</label>
                      <div class="mt-1 rounded-md">
                        <select name="location" id="location">
                          <option value="">BRGY 1</option>
                          <option value="">BRGY 2</option>
                          <option value="">BRGY 3</option>
                          <option value="">BRGY 4</option>
                          <option value="">BRGY 5</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Vaccine Date</label>
                      <div class="mt-1 rounded-md">
                        <input v-model="vaccineform.vaccine_date" type="date" name="vaccine_date" id="vaccine_date" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                      </div>
                    </div>
                  </div>
                  
                </div>
              </div>
          </div>
        </div>
        <div class="grid grid-cols-1 gap-6">
          <div class="col-span-3 sm:col-span-2">
              <button type="submit" class="float-right mt-4 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
          </div>
        </div>
      </form>
   </div>
  </admin-page-component>
 </template>
<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import { ref, watch, computed } from "vue";
import store from "../../store";



const formvaccine = computed(() => store.state.vaccinestest.data);
// console.log(formvaccine);

store.dispatch("getVaccinesRegisterForm");

let vaccineform = ref({
  receive_vaccine_dose: '',
  first_vaccine_type: '',
  interested_vaccine: '',
  firstname: '',
  middlename: '',
  lastname: '',
  dof: '',
  age: '',
  address_line_1: '',
  city: '',
  state: '',
  zipcode: '',
  phone: '',
  email: '',
  sex: '',
  vaccine_location: '',
  vaccine_date: '',
});

function VaccineDose() {
  const VDose = 
  document.querySelectorAll('input[name="receive_vaccine_dose"]')
  for (const v of VDose) {
    if (v.checked) {
      vaccineform.value.receive_vaccine_dose = v.value;
      
    }
  }
}

function saveVaccineForm() {
  console.log(vaccineform.value);
}

</script>
<style></style>