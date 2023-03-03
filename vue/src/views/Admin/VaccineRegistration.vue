<template>
    <admin-page-component>
    <div>
    <div class="container mx-auto">
        <div class="flex justify-between items-center mt-3">
            <div></div>
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
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr v-for="allVaccineeRegistered in getAllVaccineeRegistered">
                            <template v-if="allVaccineeRegistered.status == 0">
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccineeRegistered.firstname +"&nbsp"+    allVaccineeRegistered.middlename +"&nbsp"+  allVaccineeRegistered.lastname}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccineeRegistered.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccineeRegistered.sex }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ allVaccineeRegistered.email }}</td>
                                <td data-label="Phone" class="pt-3 py-3">{{ allVaccineeRegistered.phone }}</td>
                                <td data-label="Address" class="pt-3 py-3">{{ allVaccineeRegistered.address_line_1 + allVaccineeRegistered.city + allVaccineeRegistered.state  }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccineeRegistered.zipcode }}</td>
                                <td data-label="Vaccine Type" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_type }}</td>
                                <td data-label="Dosage" class="pt-3 py-3">{{ allVaccineeRegistered.dosage }}</td>
                                <td data-label="Vaccine Date" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_date }}</td>
                                <td data-label="Location" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_location }}</td>
                            </template>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div v-show="registered === 2">   
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="allVaccineeRegistered in getAllVaccineeRegistered">
                            <template v-if="allVaccineeRegistered.age < 18 && allVaccineeRegistered.status == 0">
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccineeRegistered.firstname +"&nbsp"+  allVaccineeRegistered.middlename +"&nbsp"+  allVaccineeRegistered.lastname}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccineeRegistered.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccineeRegistered.sex }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ allVaccineeRegistered.email }}</td>
                                <td data-label="Phone" class="pt-3 py-3">{{ allVaccineeRegistered.phone }}</td>
                                <td data-label="Address" class="pt-3 py-3">{{ allVaccineeRegistered.address_line_1 + allVaccineeRegistered.city + allVaccineeRegistered.state  }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccineeRegistered.zipcode }}</td>
                                <td data-label="Vaccine Type" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_type }}</td>
                                <td data-label="Dosage" class="pt-3 py-3">{{ allVaccineeRegistered.dosage }}</td>
                                <td data-label="Vaccine Date" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_date }}</td>
                                <td data-label="Location" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_location }}</td>
                            </template>
                            
                          
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="registered === 3">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="allVaccineeRegistered in getAllVaccineeRegistered">
                            <template v-if="(allVaccineeRegistered.age > 17) && (allVaccineeRegistered.age < 60 && allVaccineeRegistered.status == 0)">
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccineeRegistered.firstname +"&nbsp"+  allVaccineeRegistered.middlename +"&nbsp"+  allVaccineeRegistered.lastname}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccineeRegistered.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccineeRegistered.sex }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ allVaccineeRegistered.email }}</td>
                                <td data-label="Phone" class="pt-3 py-3">{{ allVaccineeRegistered.phone }}</td>
                                <td data-label="Address" class="pt-3 py-3">{{ allVaccineeRegistered.address_line_1 + allVaccineeRegistered.city + allVaccineeRegistered.state  }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccineeRegistered.zipcode }}</td>
                                <td data-label="Vaccine Type" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_type }}</td>
                                <td data-label="Dosage" class="pt-3 py-3">{{ allVaccineeRegistered.dosage }}</td>
                                <td data-label="Vaccine Date" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_date }}</td>
                                <td data-label="Location" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_location }}</td>
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="registered === 4">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="allVaccineeRegistered in getAllVaccineeRegistered">
                            <template v-if="allVaccineeRegistered.age > 60 || allVaccineeRegistered.age == 60 && allVaccineeRegistered.status == 0">
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccineeRegistered.firstname +"&nbsp"+  allVaccineeRegistered.middlename +"&nbsp"+ allVaccineeRegistered.lastname}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccineeRegistered.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccineeRegistered.sex }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ allVaccineeRegistered.email }}</td>
                                <td data-label="Phone" class="pt-3 py-3">{{ allVaccineeRegistered.phone }}</td>
                                <td data-label="Address" class="pt-3 py-3">{{ allVaccineeRegistered.address_line_1 + allVaccineeRegistered.city + allVaccineeRegistered.state  }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccineeRegistered.zipcode }}</td>
                                <td data-label="Vaccine Type" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_type }}</td>
                                <td data-label="Dosage" class="pt-3 py-3">{{ allVaccineeRegistered.dosage }}</td>
                                <td data-label="Vaccine Date" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_date }}</td>
                                <td data-label="Location" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_location }}</td>
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="registered === 5">
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
                    <tbody>
                        <tr v-for="allVaccineeRegistered in getAllVaccineeRegistered">
                            <template v-if="allVaccineeRegistered.pregnant == 'Yes' && allVaccineeRegistered.status == 0">
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccineeRegistered.firstname +"&nbsp"+  allVaccineeRegistered.middlename +"&nbsp"+  allVaccineeRegistered.lastname}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccineeRegistered.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccineeRegistered.sex }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ allVaccineeRegistered.email }}</td>
                                <td data-label="Phone" class="pt-3 py-3">{{ allVaccineeRegistered.phone }}</td>
                                <td data-label="Address" class="pt-3 py-3">{{ allVaccineeRegistered.address_line_1 + allVaccineeRegistered.city + allVaccineeRegistered.state  }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccineeRegistered.zipcode }}</td>
                                <td data-label="Vaccine Type" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_type }}</td>
                                <td data-label="Dosage" class="pt-3 py-3">{{ allVaccineeRegistered.dosage }}</td>
                                <td data-label="Vaccine Date" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_date }}</td>
                                <td data-label="Location" class="pt-3 py-3">{{ allVaccineeRegistered.vaccine_location }}</td>
                                <td data-label="Pregnant" class="pt-3 py-3">{{ allVaccineeRegistered.pregnant }}</td>
                                <td data-label="Months" class="pt-3 py-3">{{ allVaccineeRegistered.month }}</td>
                                <td data-label="Days" class="pt-3 py-3">{{ allVaccineeRegistered.days }}</td>
                            </template>
                        </tr>
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


const getAllVaccineeRegistered = computed(() => store.state.allVaccinees.data);



export default {
  data() {
    return {
        registered: 1,
    };
  },
  methods: {
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
  },
  setup () {
    return {
        getAllVaccineeRegistered
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