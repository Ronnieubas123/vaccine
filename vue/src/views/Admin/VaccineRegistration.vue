<template>
    <admin-page-component>
    <div>
    <div class="container mx-auto">
        <div class="flex justify-between items-center mt-3">
                <div>
                    <input type="text" id="vaccineRegistrationMyInput" v-on:keyup="vaccineRegistrationMyFunction()" placeholder="Search for names.." title="Type in a name"/>
                </div>
                <div>
                    <button
                        @click="all"
                        :class="[ registered === 1 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        All
                    </button>

                    <button
                        @click="below18"
                        :class="[ registered === 2 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Below 18
                    </button>
                
                    <button
                        @click="adult"
                        :class="[ registered === 3 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Adult
                    </button>

                    <button
                        @click="senior"
                        :class="[ registered === 4 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Senior
                    </button>

                    <button
                        @click="pregnant"
                        :class="[ registered === 5 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Pregnant
                    </button>
                </div>

            </div>
        <div class="p-3 mt-6 bg-white border">
            <div v-show="registered === 1">
                <table class="w-full text-sm" id="vaccine-registration-tables">
                    <thead class=" text-left">
                        <tr>
                            <th></th>
                            <th class="pt-3 py-3">Name</th>
                            <th class="pt-3 py-3">Age</th>
                            <th class="pt-3 py-3">Sex</th>
                            <th class="pt-3 py-3">Region</th>
                            <th class="pt-3 py-3">Province</th>
                            <th class="pt-3 py-3">City/Mucipality</th>
                            <th class="pt-3 py-3">Barangay</th>
                            <th class="pt-3 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="allVaccineeRegistered in getAllVaccineeRegistered">
                            <template v-if="allVaccineeRegistered.status == 0">
                                <td data-label="Photo">
                                    <img :src="photo_url + allVaccineeRegistered.photo" class="h-10 w-10"/>
                                </td>
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccineeRegistered.name}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccineeRegistered.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccineeRegistered.sex }}</td>
                                <td data-label="Region" class="pt-3 py-3">{{ allVaccineeRegistered.region }}</td>
                                <td data-label="Province" class="pt-3 py-3">{{ allVaccineeRegistered.province }}</td>
                                <td data-label="City/Municipality" class="pt-3 py-3">{{ allVaccineeRegistered.city_municipality }}</td>
                                <td data-label="Barangay" class="pt-3 py-3">{{ allVaccineeRegistered.barangay }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccineeRegistered.zipcode }}</td>
                                <td>
                                    <button class="bg-sky-400 text-white pl-7 pr-7 pt-3 pb-3" v-on:click="opens(allVaccineeRegistered.citizen_id)">View</button>
                                </td>
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="registered === 2">   
                <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th></th>
                            <th class="pt-3 py-3">Name</th>
                            <th class="pt-3 py-3">Age</th>
                            <th class="pt-3 py-3">Sex</th>
                            <th class="pt-3 py-3">Region</th>
                            <th class="pt-3 py-3">Province</th>
                            <th class="pt-3 py-3">City/Mucipality</th>
                            <th class="pt-3 py-3">Barangay</th>
                            <th class="pt-3 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="allVaccineeRegistered in getAllVaccineeRegistered">
                            <template v-if="allVaccineeRegistered.age < 18 && allVaccineeRegistered.status == 0">
                                <td data-label="Photo">
                                    <img :src="photo_url + allVaccineeRegistered.photo" class="h-10 w-10"/>
                                </td>
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccineeRegistered.name}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccineeRegistered.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccineeRegistered.sex }}</td>
                                <td data-label="Region" class="pt-3 py-3">{{ allVaccineeRegistered.region }}</td>
                                <td data-label="Province" class="pt-3 py-3">{{ allVaccineeRegistered.province }}</td>
                                <td data-label="City/Municipality" class="pt-3 py-3">{{ allVaccineeRegistered.city_municipality }}</td>
                                <td data-label="Barangay" class="pt-3 py-3">{{ allVaccineeRegistered.barangay }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccineeRegistered.zipcode }}</td>
                                <td>
                                    <button class="bg-sky-400 text-white pl-7 pr-7 pt-3 pb-3" v-on:click="opens(allVaccineeRegistered.citizen_id)">View</button>
                                </td>
                            </template>
                            
                          
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="registered === 3">
                <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th></th>
                            <th class="pt-3 py-3">Name</th>
                            <th class="pt-3 py-3">Age</th>
                            <th class="pt-3 py-3">Sex</th>
                            <th class="pt-3 py-3">Region</th>
                            <th class="pt-3 py-3">Province</th>
                            <th class="pt-3 py-3">City/Mucipality</th>
                            <th class="pt-3 py-3">Barangay</th>
                            <th class="pt-3 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="allVaccineeRegistered in getAllVaccineeRegistered">
                            <template v-if="(allVaccineeRegistered.age > 17) && (allVaccineeRegistered.age < 60 && allVaccineeRegistered.status == 0)">
                                <td data-label="Photo">
                                    <img :src="photo_url + allVaccineeRegistered.photo" class="h-10 w-10"/>
                                </td>
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccineeRegistered.name}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccineeRegistered.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccineeRegistered.sex }}</td>
                                <td data-label="Region" class="pt-3 py-3">{{ allVaccineeRegistered.region }}</td>
                                <td data-label="Province" class="pt-3 py-3">{{ allVaccineeRegistered.province }}</td>
                                <td data-label="City/Municipality" class="pt-3 py-3">{{ allVaccineeRegistered.city_municipality }}</td>
                                <td data-label="Barangay" class="pt-3 py-3">{{ allVaccineeRegistered.barangay }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccineeRegistered.zipcode }}</td>
                                <td>
                                    <button class="bg-sky-400 text-white pl-7 pr-7 pt-3 pb-3" v-on:click="opens(allVaccineeRegistered.citizen_id)">View</button>
                                </td>
                               
                                
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="registered === 4">
                <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th></th>
                            <th class="pt-3 py-3">Name</th>
                            <th class="pt-3 py-3">Age</th>
                            <th class="pt-3 py-3">Sex</th>
                            <th class="pt-3 py-3">Region</th>
                            <th class="pt-3 py-3">Province</th>
                            <th class="pt-3 py-3">City/Mucipality</th>
                            <th class="pt-3 py-3">Barangay</th>
                            <th class="pt-3 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="allVaccineeRegistered in getAllVaccineeRegistered">
                            <template v-if="allVaccineeRegistered.age > 60 || allVaccineeRegistered.age == 60 && allVaccineeRegistered.status == 0">
                                <td data-label="Photo">
                                    <img :src="photo_url + allVaccineeRegistered.photo" class="h-10 w-10"/>
                                </td>
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccineeRegistered.name}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccineeRegistered.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccineeRegistered.sex }}</td>
                                <td data-label="Region" class="pt-3 py-3">{{ allVaccineeRegistered.region }}</td>
                                <td data-label="Province" class="pt-3 py-3">{{ allVaccineeRegistered.province }}</td>
                                <td data-label="City/Municipality" class="pt-3 py-3">{{ allVaccineeRegistered.city_municipality }}</td>
                                <td data-label="Barangay" class="pt-3 py-3">{{ allVaccineeRegistered.barangay }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccineeRegistered.zipcode }}</td>
                                <td>
                                    <button class="bg-sky-400 text-white pl-7 pr-7 pt-3 pb-3" v-on:click="opens(allVaccineeRegistered.citizen_id)">View</button>
                                </td>
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="registered === 5">
                <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th></th>
                            <th class="pt-3 py-3">Name</th>
                            <th class="pt-3 py-3">Age</th>
                            <th class="pt-3 py-3">Sex</th>
                            <th class="pt-3 py-3">Pregnant</th>
                            <th class="pt-3 py-3">Months</th>
                            <th class="pt-3 py-3">Region</th>
                            <th class="pt-3 py-3">Province</th>
                            <th class="pt-3 py-3">City/Mucipality</th>
                            <th class="pt-3 py-3">Barangay</th>
                            <th class="pt-3 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="allVaccineeRegistered in getAllVaccineeRegistered">
                            <template v-if="allVaccineeRegistered.pregnant == 'Yes' && allVaccineeRegistered.status == 0">
                                <td data-label="Photo">
                                    <img :src="photo_url + allVaccineeRegistered.photo" class="h-10 w-10"/>
                                </td>
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccineeRegistered.name}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccineeRegistered.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccineeRegistered.sex }}</td>
                                <td data-label="Pregnant" class="pt-3 py-3">{{ allVaccineeRegistered.pregnant }}</td>
                                <td data-label="Months" class="pt-3 py-3">{{ allVaccineeRegistered.months }}</td>
                                <td data-label="Region" class="pt-3 py-3">{{ allVaccineeRegistered.region }}</td>
                                <td data-label="Province" class="pt-3 py-3">{{ allVaccineeRegistered.province }}</td>
                                <td data-label="City/Municipality" class="pt-3 py-3">{{ allVaccineeRegistered.city_municipality }}</td>
                                <td data-label="Barangay" class="pt-3 py-3">{{ allVaccineeRegistered.barangay }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccineeRegistered.zipcode }}</td>
                                <td>
                                    <button class="bg-sky-400 text-white pl-7 pr-7 pt-3 pb-3" v-on:click="opens(allVaccineeRegistered.citizen_id)">View</button>
                                </td>
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
                <template v-for="(citizenVaccineRegisters, index) in citizenVaccineRegister">
                    <h1 class="text-xl uppercase" v-if="index === 0"><b>NAME:</b> {{ citizenVaccineRegisters.name }}</h1>
                </template>
                <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th class="pt-3 py-3">Name</th>
                            <th class="pt-3 py-3">Vaccine</th>
                            <th class="pt-3 py-3">Schedule</th>
                            <th class="pt-3 py-3">Barangay</th>
                            <th class="pt-3 py-3">Status</th>
                            <th class="pt-3 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="citizenVaccineRegisters in citizenVaccineRegister">
                            <td data-label="Name">{{ citizenVaccineRegisters.name }}</td>
                            <td data-label="Vaccine">{{ citizenVaccineRegisters.vaccine }}</td>
                            <td data-label="Schedule">{{ citizenVaccineRegisters.date }}</td>
                            <td data-label="Barangay">{{ citizenVaccineRegisters.vaccine_location }}</td>
                            <td data-label="Status">
                                <svg v-if="citizenVaccineRegisters.status === 0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <svg v-else xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-400">
                                     <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </td>
                            <td data-label="Action">
                                <button
                                    :value="citizenVaccineRegisters.id"
                                    type="button"
                                    @click="completeStatus($event)"
                                    class="h8 w8 flex items-center justify-center rounded-full border border-transparent text-sm text-red-500 focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                    >
                                    Not complete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>   
  </TransitionRoot>
    </admin-page-component>
</template>
<script>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import store from "../../store";
import { computed } from "vue";
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'

const getAllVaccineeRegistered = computed(() => store.state.allVaccineesRegisterd.data);
const citizenVaccineRegister = computed(() => store.state.citizenVaccineRegisterList.data);

const userId = store.state.user.id;

if (userId > 0) {
    store.dispatch('getAllVaccineesRegister', userId);
}

function completeStatus(e) {
    const buttonValue = e.target.value;
    store.dispatch("completeStatus", buttonValue).then(() => {
        location.reload();
        
      });
}

export default {
  data() {
    return {
        registered: 1,
        open: false,
        photo_url: 'http://localhost:8000/'
    };
  },
  methods: {
    vaccineRegistrationMyFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("vaccineRegistrationMyInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("vaccine-registration-tables");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
            txtValue = td.textContent || td.innerText;
            console.log(txtValue);
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                console.log('test');
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
    },
    all() {
      this.registered = 1;
    },
    below18() {
      this.registered = 2;
    },
    adult() {
      this.registered = 3;
    },
    senior() {
      this.registered = 4;
    },
    pregnant() {
      this.registered = 5;
    },
    opens(value) {
        this.open = true;
        store.dispatch('getCitizenVaccineRegisterList', value);
    },
  },
  components: { 
        Dialog,
        DialogPanel,
        TransitionChild,
        TransitionRoot
    },
  setup () {
    return {
        getAllVaccineeRegistered,
        completeStatus,
        citizenVaccineRegister
    }
  }
};


</script>
<style scoped>
tbody tr:nth-child(odd) {
    background-color: #f3f4f680;
}
.active {
    background: #FFFFFF;
    color: #000000;
    border: solid 2px rgb(56 189 248 / var(--tw-bg-opacity));
    padding: 7px 10px !important;
}
tr {
    display: table-row;
    border-bottom-width: 0px;
    position: relative;
    padding: 40px;
    max-width: 100%;
    border-bottom-width: 4px;
    --tw-border-opacity: 1;
    border-color: rgb(243 244 246 / var(--tw-border-opacity));
}   
@media screen and (max-width: 600px) {
td {
    display: flex;
    justify-content: space-between;
    border-bottom-width: 1px;
    --tw-border-opacity: 1;
    border-color: rgb(243 244 246 / var(--tw-border-opacity));
    padding: 0.75rem 1rem;
    text-align: right;
    vertical-align: top;
}
td:before {
    content: attr(data-label);
    padding-right: 0.75rem;
    text-align: left;
    font-weight: 600;
}
thead {
    display: none;
}
}
</style>