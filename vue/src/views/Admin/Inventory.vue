<template>
    <admin-page-component>
    <div>
    <div class="container mx-auto">
        <div class="flex justify-between items-center mt-3">
            <div>
                <router-link 
                    :to="{ name: 'VaccineUsed' }" 
                    class="py-2 px-3 text-white bg-sky-400 rounded-md hover:bg-sky-400 text-xl"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Add new Vaccine used
                </router-link>
            </div>
                <div>
                    <button
                        @click="totalNumber"
                        :class="[ inventorytab === 1 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Total number
                    </button>

                    <button
                        @click="used"
                        :class="[ inventorytab === 2 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Total Used
                    </button>
                
                    <button
                        @click="left"
                        :class="[ inventorytab === 3 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Total Left
                    </button>
                    <button
                        @click="schedules"
                        :class="[ inventorytab === 4 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Schedule
                    </button>

                    <button
                        @click="historys"
                        :class="[ inventorytab === 5 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        History
                    </button>
                </div>

            </div>
        <div class="p-3 mt-6 bg-white border">
            <div v-show="inventorytab === 1">
                <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th class="pt-3 py-3">Vaccine</th>
                            <th class="pt-3 py-3">Total number</th>
                            <th class="pt-3 py-3">Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="logistics in logistic">
                                <td data-label="Name" class="pt-3 py-3">{{ logistics.vaccine_name}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ logistics.received_vials  }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ logistics.date }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="inventorytab === 2">   
                
                <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th class="pt-3 py-3">Vaccine</th>
                            <th class="pt-3 py-3">Total used</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="vaccineUseds in vaccineUsed">
                                <td data-label="Sex" class="pt-3 py-3">{{ vaccineUseds.vaccinename }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ vaccineUseds.used }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="inventorytab === 3">
                <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th class="pt-3 py-3">Vaccine</th>
                            <th class="pt-3 py-3">Left</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="vaccineLeftlogistics in vaccineLeftlogistic">
                            <tr>
                                <td data-label="Name" class="pt-3 py-3">{{ vaccineLeftlogistics.vaccine_name }}</td>
                                <template v-for="vaccineLeftinventorys in vaccineLeftinventory">
                                            <template v-if="vaccineLeftinventorys.logistic_id == vaccineLeftlogistics.id">
                                                <td data-label="Name" class="pt-3 py-3">
                                                    {{ vaccineLeftlogistics.received_vials - vaccineLeftinventorys.used  }}
                                                </td>
                                            </template>
                                </template>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div v-show="inventorytab === 4">
                <div>
                    <!--Search-->
                    <div class="flex float-right">
                        <div class="mb-3 xl:w-96">
                            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                            <input
                                v-model="search"
                                type="search"
                                class="relative m-0 block w-[1%] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out focus:border-primary-600 focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                placeholder="Search"
                                aria-label="Search"
                                aria-describedby="button-addon2" />
                            <span
                                class="input-group-text flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base font-normal text-neutral-700 dark:text-neutral-200"
                                id="basic-addon2">
                                <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                class="h-5 w-5">
                                <path
                                    fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd" />
                                </svg>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="w-full text-sm" id="inventorySearchTable">
                    <thead class=" text-left">
                        <tr>
                            <th class="pt-3 py-3">Vaccine</th>
                            <th class="pt-3 py-3">Schedule</th>
                            <th class="pt-3 py-3">Deducted</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody> 
                        <template v-for="schedules in filteredData">
                            <tr>    
                                <td data-label="Name" class="pt-3 py-3">{{ schedules.vaccinename }}</td>
                                <td data-label="DeductedDate">{{ moment(schedules.schedule).format("ll") }}</td>
                                <td data-label="Deducted" class="pt-3 py-3">{{ schedules.used }}</td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
            <div v-show="inventorytab === 5">
                <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th class="pt-3 py-3">Vaccine</th>
                            <th class="pt-3 py-3">Deducted</th>
                            <th class="pt-3 py-3">Schedule</th>
                            <th class="pt-3 py-3">Deducted Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody> 
                        <template v-for="historyss in history">
                            <tr>    
                                <td data-label="Name" class="pt-3 py-3">{{ historyss.vaccine_name }}</td>
                                <td data-label="Deducted" class="pt-3 py-3">{{ historyss.used }}</td>
                                <td data-label="Schedule">{{ moment(historyss.schedule).format("YYYY-MM-DD") }}</td>
                                <td data-label="DeductedDate">{{ moment(historyss.created_at).format("LL") }}</td>
                                <td>
                                    <router-link 
                                        :to="{name: 'VaccineUsedView', params: {id: historyss.id}}"
                                        class="py-2 px-4 text-sky-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                    </router-link>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    </admin-page-component>
</template>
<script>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import store from "../../store";
import { computed } from "vue";
import moment from "moment";


const logistic = computed(() => store.state.logistic.data);
const vaccineUsed = computed(() => store.state.vaccineUsed.data);
const vaccineLeftlogistic = computed(() => store.state.vaccineLeft.logistic);
const vaccineLeftinventory = computed(() => store.state.vaccineLeft.inventory);
const history = computed(() => store.state.inventoryHistory.data);
const schedule = computed(() => store.state.inventorySchedule.data);

store.dispatch('getAllLogisticListInventory');




export default {
  data() {
    return {
        inventorytab: 1,
        moment: moment,
        search: '',
        schedule: schedule,
    };
  },
  computed: {
    filteredData() {
      return this.schedule
        .filter(
          ({ schedule }) => [schedule]
            .some(val => val.toLowerCase().includes(this.search))
        );
      }
  },
  methods: {
    totalNumber() {
      this.inventorytab = 1;
    },
    used() {
      store.dispatch('getAllVaccineUsed');
      this.inventorytab = 2;
    },
    left() {
    store.dispatch('getVaccineLeft');
      this.inventorytab = 3;
    },
    schedules() {
        store.dispatch('getScheduleInventory');
        this.inventorytab = 4;
    },
    historys() {
        store.dispatch('getHistory');
        this.inventorytab = 5;
    }
  },
  setup () {
    return {
        logistic,
        vaccineUsed,
        vaccineLeftlogistic,
        vaccineLeftinventory,
        history,
        schedule
        
    }
  }
};


</script>
<style>
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