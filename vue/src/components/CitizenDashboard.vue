<template>
      <div v-if="citizenFullInfoLoading" class=" h-fit ">
        <div class="loader border-t-sky-400 border-10 border-8 rounded-full w-20 h-20 animation-pulse border-t-8 absolute top-1/2 left-1/2"></div>
      </div>
    <div v-else :class="menu ? 'test' : 'overflow-hidden lg:overflow-visible'">
    <div :class="menu ? 'xl:pl-60 pt-14 min-h-screen w-screen transition-position lg:w-auto bg-gray-50 dark:bg-slate-800 dark:text-slate-100': 'xl:pl-60 ml-60 lg:ml-0 pt-14 min-h-screen w-screen transition-position lg:w-auto  dark:bg-slate-800 dark:text-slate-100'">
      <nav :class="menu ? 'top-0 inset-x-0 fixed bg-teal-100 h-14 z-30 transition-position w-screen lg:w-auto  dark:bg-slate-800 xl:pl-60' : 'top-0 inset-x-0 fixed h-14 z-30 transition-position w-screen lg:w-auto dark:bg-slate-800 xl:pl-60 ml-60 lg:ml-0'">
        <div class="flex justify-between items-center mt-4 ">
            <div></div>
            <div>
              <router-link 
                  :to="{ name: 'RegisterForm' }" 
                  class="py-2 px-3 text-white bg-teal-300 rounded-md hover:bg-teal-500 text-base"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                  </svg>
                  Vaccine Form
              </router-link>
              <router-link 
                  :to="{ name: 'Records' }" 
                  class="py-2 px-3 text-white bg-teal-300 rounded-md hover:bg-teal-500 text-base ml-2"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                  </svg>
                  Vaccine Records
              </router-link>
              <router-link 
                  :to="{ name: 'CitizineAnnouncement' }" 
                  class="py-2 px-3 text-white bg-teal-300 rounded-md hover:bg-teal-500 text-base ml-2"
                  >
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" />
                  </svg>
                  Announcement
              </router-link>
            </div>
        </div>
      </nav>
      <aside id="aside" :class="menu ? 'lg:py-2 lg:pl-2 w-60 fixed flex z-40 top-0 h-screen transition-position overflow-hidden -left-60 lg:left-0 lg:hidden xl:flex': 'lg:py-2 lg:pl-2 w-80 fixed flex z-40 top-0 h-screen transition-position overflow-hidden left-0 lg:hidden xl:flex'">
        <div class="bg-teal-100 lg:rounded-2xl flex-1 flex flex-col overflow-hidden dark:bg-slate-900">
          <div class="bg-teal-300 text-white flex flex-row h-14 items-center justify-between dark:bg-slate-900">
            <div class="text-center flex-1 lg:text-left lg:pl-6 xl:text-center xl:pl-0">
              <b class="font-black">BAKREK</b>
            </div>
          </div>
          <div class="aside-scrollbars-gray flex-1 overflow-y-auto overflow-x-hidden">
            <div class="w-11/12 ml-auto mr-auto mt-2"> 
              <img v-if="citizenPhoto" :src="citizenPhoto" class="h-1/2 rounded-lg"/>
              <img v-else src="../assets/image/profile.png" class="h-5/6"/>
            </div>
            
            <ul class="pl-5">
                <li v-for="item in navigationAdmin" class="flex">
                  <img :src="url + item.logo" alt="" class="inline-flex justify-center items-center h-4 w-4 mt-4">
              </li>
              
            </ul>     
            <div>
              <template v-for="citizenInfo in citizenFullInfo"> 
              <div class="border-b pb-1">
                <div class="pt-5 pl-5 pr-5 flex justify-between items-center">
                    <div>
                      <span class="text-sm text-slate-700">Name:</span>
                    </div>
                    <div>
                      <svg @click="opens" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-slate-700">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                      </svg>
                    </div>
                </div>
                <div class="text-center">
                      <span class="text-slate-700 font-bold text-xl">{{ citizenInfo.name }}</span>
                </div>
              </div>
              <div class="grid grid-cols-2 mt-3 pl-5 pr-5 border-slate-800 border-b pb-1">
                  <div class="text-sm text-slate-700">
                    <span>Email:  </span>
                  </div>
                  <div class="text-slate-700 font-semibold text-sm">
                        <span>{{ citizenInfo.email }}</span>
                  </div> 
              </div>
              <div class="border-b border-slate-800 pb-1 pl-5 pr-5 mt-2 mb-2">
                  <div class="text-sm text-slate-700">
                    <span>DEMOGRAPHICS</span>
                  </div>
              </div>
              <table class="flex">
                <thead class="w-2/4">
                  <tr class="inline-flex flex-col pt-0 pr-0 pl-5 pb-0 border-none">
                    <th class="font-normal text-sm text-slate-700">DATE OF BIRTH</th>
                    <th class="font-normal text-sm text-slate-700 text-left">SEX</th>
                    <th class="font-normal text-sm text-slate-700 text-left">AGE (YEARS)</th>
                    <th class="font-normal text-sm text-slate-700 text-left">ENDIGENOUS</th>
                    <template v-if="citizenInfo.pregnant =='Yes'">
                      <th class="font-normal text-sm text-slate-700 text-left">Pregnant</th>
                      <th class="font-normal text-sm text-slate-700 text-left">Months</th>
                    </template>
                  </tr>
                </thead>
                <tbody>
                      <tr class="inline-flex flex-col p-0 bg-inherit border-none text-slate-700 font-semibold text-sm">
                        <td><span class="text-sm text-stone-400">: </span>{{ citizenInfo.dof }}</td>
                        <td><span class="text-sm text-stone-400">: </span>{{  citizenInfo.sex  }}</td>
                        <td><span class="text-sm text-stone-400">: </span>{{ citizenInfo.age }}</td>
                        <td><span class="text-sm text-stone-400">: </span>{{ citizenInfo.indigenous  }}</td> 
                        <template v-if="citizenInfo.pregnant =='Yes'">
                          <td><span class="text-sm text-stone-400">: </span>{{ citizenInfo.pregnant }}</td>
                          <td><span class="text-sm text-stone-400">: </span>{{ citizenInfo.months  }}</td> 
                        </template>
                      </tr>
                </tbody>
              </table>
              <div class="border-b border-t border-slate-800 pb-1 pl-5 pr-5 mt-2 mb-2 pt-1">
                  <div class="text-sm text-slate-700">
                    <span>PRESENT ADDRESS</span>
                  </div>
              </div>
              <table class="flex">
                <thead class="w-2/4">
                  <tr class="inline-flex flex-col pt-0 pr-0 pl-5 pb-0 border-none">
                    <th class="font-normal text-sm text-slate-700 text-left">REGION</th>
                    <th class="font-normal text-sm text-slate-700 text-left">PROVINCE</th>
                    <th class="font-normal text-sm text-slate-700 text-left">CITY/MUNICIPALITY</th>
                    <th class="font-normal text-sm text-slate-700 text-left">BARANGAY</th>
                  </tr>
                </thead>
                <tbody>
                      <tr class="inline-flex flex-col p-0 bg-inherit border-none text-slate-700 font-semibold text-sm">
                        <td><span class="text-sm text-stone-400">: </span>{{ citizenInfo.region }}</td>
                        <td><span class="text-sm text-stone-400">: </span>{{ citizenInfo.province }}</td>
                        <td><span class="text-sm text-stone-400">: </span>{{ citizenInfo.city_municipality }}</td>
                        <td><span class="text-sm text-stone-400">: </span>{{ citizenInfo.barangay }}</td>
                      </tr>
                </tbody>
              </table>
              </template>
            </div>
          </div>
        </div> 
      </aside>  
      <section class="p-6 xl:max-w-10xl xl:mx-auto">
        <router-view></router-view>
      </section>

      </div>
    </div> 
    <!--Modal--> 
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
                                    <input type="date" v-model="citizenInfos.dof" name="dof" id="dof" autocomplete="date of birth" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>  
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="region" class="block text-sm font-medium leading-6 text-gray-900">SEX</label>
                                    <div class="mt-2">
                                        <select v-on:change="citizenSex()" v-model="citizenInfos.sex" id="citizen_sex" name="sex" autocomplete="sex" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
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
                                <template v-if="citizenSexSelected == 'Female' || citizenInfos.sex == 'Female'">
                                    <div class="sm:col-span-2">
                                        <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">Pregnant</label>
                                        <div class="mt-2">
                                          <select  v-model="citizenInfos.pregnant" id="pregnant" name="pregnant" autocomplete="sex" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option>Yes</option>
                                            <option>No</option>
                                          </select>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">Months</label>
                                        <div class="mt-2">
                                        <input type="number" v-model="citizenInfos.months" name="months" id="months" autocomplete="months" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        </div>
                                    </div>
                                 </template>

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
                                <div class="col-span-full">
                                <label class="block text-sm font-medium text-gray-700">Image</label>
                                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                  <div class="space-y-1 text-center">
                                    <img v-if="citizenInfos.image_url" :src="citizenInfos.image_url" :alt="citizenInfos.title" class="w-20 h-20 object-cover mr-auto ml-auto " />
                                    <span v-else>
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <div class="flex text-sm text-gray-600">
                                      <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" @change="onImageChoose" name="file-upload" type="file" class="sr-only" />
                                      </label>
                                      <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                  </div>
                                </div>
                              </div>
                        </div>
            
                    </div>  

                  <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
                </form> 
                
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot> 
  <!--END MODAL-->
</template>

<script>
    import  store  from "../store";
    import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems, Dialog, DialogPanel, TransitionRoot, TransitionChild } from "@headlessui/vue";
    import { Bars3Icon, BellIcon, XMarkIcon, PhotoIcon } from '@heroicons/vue/24/outline';
    import { computed, ref, watch } from 'vue';
    import { useRouter, useRoute } from "vue-router";

  const citizenFullInfoLoading =  computed(() => store.state.citizenInfo.loading);
  const citizenFullInfo =  computed(() => store.state.citizenInfo.data);
  const citizenPhoto = computed(() => store.state.citizenInfo.photo);

  const citizenId = store.state.user.id; 
    

  store.dispatch("getCitizenInfo", citizenId);
  const open = ref(false);
  const citizenSexSelected = ref();

  const navigation = [
    {name: 'Reports', to: {name: 'Reports'}, logo: "verify.png"}
  ];

  let citizenInfos = ref({
      name: '',
      email: '',
      dof: '',
      sex: '',
      age: '',
      endigenous: '',
      province: '',
      city_municipality: '',
      barangay: '',
      image_url: null,
      pregnant: '',
      months: 'None'
  });

  watch(
    () => store.state.currentCitizenInfo.data,
    (newVal, oldVal) => {
      citizenInfos.value = {
        ...JSON.parse(JSON.stringify(newVal)),
      }
    }
  );
  
  store.dispatch("getCitizenInfos", citizenId);

  function updateCitizen() {
    store.dispatch("updateCitizen", citizenInfos.value).then(() => {
        location.reload();
    })
  }


  function onImageChoose(ev) {
    const file = ev.target.files[0];

    const reader = new FileReader();
    reader.onload = () => {
      // pass value in backend
      citizenInfos.value.image = reader.result;
      //display value in frontend
      citizenInfos.value.image_url = reader.result;

    };
    reader.readAsDataURL(file);
  }

    export default{
      data() {
        return {
          menu: false,
          open: false,
          citizenSexSelected: ''
        }
      },
      methods: {
        opens() {
          this.open = true;
        },
        citizenSex() {
          this.citizenSexSelected = document.getElementById('citizen_sex').value;

          if(document.getElementById('citizen_sex').value == 'Male') {
            citizenInfos.value.pregnant = 'No';
            citizenInfos.value.months = 'None';

          } else {
            citizenInfos.value.pregnant
            citizenInfos.value.months
          }
        }
        
      },
      components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        Bars3Icon,
        BellIcon,
        XMarkIcon,
        Dialog,
        DialogPanel,
        TransitionRoot,
        TransitionChild,
        PhotoIcon
    
      },
      setup() {
  
        return {
          navigation,
          citizenId,
          open,
          citizenFullInfo,
          citizenInfos,
          updateCitizen,
          citizenFullInfoLoading,
          onImageChoose,
          citizenPhoto,
          citizenSexSelected
       
          
        }
      }
    }
    </script>
  
  <style>
  .transition-position {
    transition-property: right,left,top,bottom,margin,padding;
      transition-timing-function: cubic-bezier(.4,0,.2,1);
      transition-duration: .15s;
  }
  </style>
  
  
  