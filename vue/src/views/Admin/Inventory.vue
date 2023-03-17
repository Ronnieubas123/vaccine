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
                        Used
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
                        Left
                    </button>

                    <button
                        @click="historys"
                        :class="[ inventorytab === 4 ? 'active' : '' ]"
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
                <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th class="pt-3 py-3">Vaccine</th>
                            <th>Deducted</th>
                            <th class="pt-3 py-3">Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody> 
                        <template v-for="historyss in history">
                            <tr>
                                <td data-label="Name" class="pt-3 py-3">{{ historyss.vaccine_name }}</td>
                                <td data-label="Name" class="pt-3 py-3">{{ historyss.used }}</td>
                                <td>{{ moment(historyss.created_at).format("YYYY-MM-DD HH:mm") }}</td>
                                <td>
                                    <router-link 
                                        :to="{name: 'VaccineUsedView', params: {id: historyss.id}}"
                                        class="flex py-2 px-4 text-sky-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                    </router-link>
                                    <!-- <button type="button" @click="deleteBarangay(barangays)"  class="text-red-500 text-left flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button> -->
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

store.dispatch('getAllLogisticListInventory');


export default {
  data() {
    return {
        inventorytab: 1,
        moment: moment
    };
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
    historys() {
        store.dispatch('getHistory');
        this.inventorytab = 4;
    }
  },
  setup () {
    return {
        logistic,
        vaccineUsed,
        vaccineLeftlogistic,
        vaccineLeftinventory,
        history
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