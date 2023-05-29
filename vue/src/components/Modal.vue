<template>
    <div>{{open}}</div> 
<TransitionRoot as="template" :show="open">
    <Dialog as="div" class="relative z-10" @close="open = false">
      <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
      </TransitionChild>

      <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 ">
          <TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <DialogPanel class=" relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-[950px]">
              <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <form @submit.prevent="updateCitizen"> 
                    <div class="space-y-12">
                        
                        <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <h2 class="text-base font-semibold leading-7 text-gray-900 col-span-full" >Update information</h2>
                                <div class="sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                    <input type="text" v-model="citizenInfos.name" name="name" id="name" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                    <div class="mt-2">
                                    <input id="email" v-model="citizenInfos.email" name="email" type="email" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-2 sm:col-start-1">
                                    <label for="city" class="block text-sm font-medium leading-6 text-gray-900">DATE OF BIRTH</label>
                                    <div class="mt-2">
                                    <input type="text" v-model="citizenInfos.dof" name="dof" id="dof" autocomplete="date of birth" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>  
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">SEX</label>
                                    <div class="mt-2">
                                        <select v-model="citizenInfos.sex" id="sex" name="sex" autocomplete="sex" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                          <option>Male</option>
                                          <option>Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">AGE</label>
                                    <div class="mt-2">
                                    <input type="number" v-model="citizenInfos.age" name="age" id="postal-code" autocomplete="age" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-4">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">ENDIGENOUS</label>
                                    <div class="mt-2">
                                        <select v-model="citizenInfos.indigenous" id="endigenous" name="endigenous" autocomplete="endigenous" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6">
                                          <option>Yes</option>
                                          <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">REGION</label>
                                    <div class="mt-2">
                                        <input type="text" v-model="citizenInfos.region" name="region" id="region" autocomplete="region" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="province" class="block text-sm font-medium leading-6 text-gray-900">PROVINCE</label>
                                    <div class="mt-2">
                                        <input id="province" v-model="citizenInfos.province" name="province" type="province" autocomplete="province" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="city_municipality" class="block text-sm font-medium leading-6 text-gray-900">CITY/MUNICIPALITY</label>
                                    <div class="mt-2">
                                        <input type="text" v-model="citizenInfos.city_municipality" name="city_municipality" id="city_municipality" autocomplete="city_municipality" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="barangay" class="block text-sm font-medium leading-6 text-gray-900">BARANGAY</label>
                                    <div class="mt-2">
                                        <input id="barangay" v-model="citizenInfos.barangay" name="barangay" type="barangay" autocomplete="barangay" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            
                        </div>
            
                    </div>  
                    {{ citizenInfos }}

                    
                </form> 
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button class="bg-blue-500 text-white pb-2 pt-2 pl-4 pr-4 mr-2 float-right" @click="open = false">Close</button>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
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
import { Dialog, DialogPanel, TransitionRoot, TransitionChild } from "@headlessui/vue";
import { ref, watch,computed, defineProps } from "vue";
import store from '../store';
const modal = defineProps(['open','citizenId','citizenFullInfo']);


let citizenInfos = ref({
    name: '',
    email: '',
    dof: '',
    sex: '',
    age: '',
    endigenous: '',
    province: '',
    city_municipality: '',
    barangay: ''
});

watch(
  () => store.state.currentCitizenInfo.data,
  (newVal, oldVal) => {
    citizenInfos.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    }
  }
);



  store.dispatch("getCitizenInfos", modal.citizenId);

  function updateCitizen() {
    store.dispatch("updateCitizen", citizenInfos.value).then(() => {
      router.push({
      });
    })
  }


</script>
<style></style>