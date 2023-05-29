<template>
    <admin-page-component>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class=" py-10 inline-block min-w-full sm:px-6 lg:px-8 bg-stone-50">
                    <div class="overflow-hidden">
                        <div class="flex justify-between items-center mt-3 mb-10">
                            <div >
                                <h1 class="font-bold text-3xl">Reports</h1>
                            </div>
                            <form @submit.prevent="reportsFilterSearch">
                                <div class="flex">
                                    <div class="mr-3">
                                        <label for="company-website" class="block text-sm font-medium text-gray-700">Filter Date From:</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input v-model="filter.fromdate" type="date" name="fromdate" id="fromdate" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Date From" />
                                        </div>
                                    </div>
                                    <div class="mr-3">
                                        <label for="company-website" class="block text-sm font-medium text-gray-700">Filter Date To:</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <input  v-model="filter.todate" type="date" name="todate" id="todate" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Date To" />
                                        </div>
                                    </div>
                                    <div class="mr-3">
                                        <label for="company-website" class="block text-sm font-medium text-gray-700">Filter Barangay:</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            <select v-model="filter.barangay" name="barangay" id="barangay" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option value="" selected disabled hidden>All</option>
                                                <template v-for="allBarangays in allBarangay">
                                                    <option :value="allBarangays.barangay_name">{{ allBarangays.barangay_name }}</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mr-3">
                                        <label for="company-website" class="block text-sm font-medium text-gray-700">Filter Vaccine:</label>
                                        <div class="mt-1 flex rounded-md shadow-sm">
                                            
                                            <select v-model="filter.vaccine" name="vaccine" id="vaccine" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                <option value="" selected disabled hidden>All</option>
                                                <template v-for="allVaccines in allVaccine">
                                                    <option :value="allVaccines.name">{{ allVaccines.name }}</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mr-3">
                                        <div class="mt-6 flex rounded-md shadow-sm">
                                            <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <table class="w-full text-sm">
                            <thead class=" text-left">
                                <tr>
                                    <th class="pt-3 py-3">Name</th>
                                    <th class="pt-3 py-3">Age</th>
                                    <th class="pt-3 py-3">Sex</th>
                                    <th class="pt-3 py-3">Email</th>
                                    <th class="pt-3 py-3">Address</th>
                                    <th class="pt-3 py-3">Vaccine Type</th>
                                    <th class="pt-3 py-3">Vaccine Dose</th>
                                    <th class="pt-3 py-3">Vaccine Date</th>
                                    <th class="pt-3 py-3">Location</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <template v-for="allFilterRegisterforms in allFilterRegisterform">
                                    <tr>
                                        <td data-label="Name" class="pt-3 py-3">{{ allFilterRegisterforms.name}}</td>
                                        <td data-label="Age" class="pt-3 py-3">{{ allFilterRegisterforms.age }}</td>
                                        <td data-label="Sex" class="pt-3 py-3">{{ allFilterRegisterforms.sex }}</td>
                                        <td data-label="Email" class="pt-3 py-3">{{ allFilterRegisterforms.email }}</td>
                                        <td data-label="Address" class="pt-3 py-3">{{ allFilterRegisterforms.region + allFilterRegisterforms.province + allFilterRegisterforms.city_municipality }}</td>
                                        <td data-label="Vaccine Type" class="pt-3 py-3">{{ allFilterRegisterforms.vaccine_type }}</td>
                                        <td data-label="Dose" class="pt-3 py-3">{{ allFilterRegisterforms.dose }}</td>
                                        <td data-label="Vaccine Date" class="pt-3 py-3">{{ allFilterRegisterforms.vaccine_date }}</td>
                                        <td data-label="Location" class="pt-3 py-3">{{ allFilterRegisterforms.vaccine_location }}</td>
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
<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import { ref, watch,computed } from "vue";
import store from "../../store";

const allFilterRegisterform = computed(() => store.state.filterRegisterform.data);
const allBarangay = computed(() => store.state.reportsGetAllBarangay.data);
const allVaccine = computed(() => store.state.reportsGetAllVaccine.data);


store.dispatch("filterRegisterform");
store.dispatch("reportsGetAllBarangay");
store.dispatch("reportsGetAllVaccine");

let filter = ref({
    fromdate: '',
    todate: '',
    barangay: '',
    vaccine: ''
});

function reportsFilterSearch() {
    store.dispatch("reportsFilterSearch", filter.value).then(() => {
    })
}





</script>
<style></style>