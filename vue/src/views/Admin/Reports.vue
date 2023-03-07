<template>
    <admin-page-component>
    <div>
    <div class="container mx-auto">
        <div class="flex justify-between items-center mt-3">
            <div></div>
                <div>
                    <button
                        @click="barangay"
                        :class="[ reportstab === 1 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Barangay
                    </button>

                    <button
                        @click="date"
                        :class="[ reportstab === 2 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Date
                    </button>
                
                    <button
                        @click="vaccine"
                        :class="[ reportstab === 3 ? 'active' : '' ]"
                        class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mr-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Vaccine
                    </button>
                </div>

            </div>
            
        <div class="p-3 mt-6 bg-white border">
            <div class="flow-root" v-show="reportstab === 1">
                <div class="flex justify-between items-center mt-3">
                        <div></div>
                        <form @submit.prevent="filterByBarangay">
                            <div class="flex justify-between items-center mt-3">
                                <div></div>
                                <div class="flex justify-between items-center">
                                    <div class="grid grid-cols-1 gap-6">     
                                        <div class="col-span-3 sm:col-span-2">
                                            <!-- <label for="company-website" class="block text-sm font-medium text-gray-700">Address</label> -->
                                            <div class="mt-1 rounded-md">
                                            
                                                <div class="flex gap-2 mt-1">
                                                    <input v-model="filterBarangay.barangay" type="text" name="barangay" id="barangay" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter Barangay" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <button type="submit" class="float-right ml-2 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                </div>
                <div v-if="allFilterByBarangays < 1" class="w-full mt-3">
                    <p class="text-2xl text-center">To see the list Search by Barangay</p>   
                </div> 
                <div id="pdfBarangayLifter" class="mr-10 ml-10" v-else>
                    <div>
                        <h2 class=" text-xl font-bold mb-5 mt-10">{{filterBarangay.barangay + " " + "Vaccinee" + " " + "list" + " " + "Reports"}}</h2>
                    </div>
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
                            
                            <tr v-for="filterBarangays in allFilterByBarangays">
                                <template v-if="filterBarangays.status == 1">
                                    <td data-label="Name" class="pt-3 py-3">{{ filterBarangays.firstname +"&nbsp"+  filterBarangays.middlename +"&nbsp"+  filterBarangays.lastname}}</td>
                                    <td data-label="Age" class="pt-3 py-3">{{ filterBarangays.age }}</td>
                                    <td data-label="Sex" class="pt-3 py-3">{{ filterBarangays.sex }}</td>
                                    <td data-label="Email" class="pt-3 py-3">{{ filterBarangays.email }}</td>
                                    <td data-label="Phone" class="pt-3 py-3">{{ filterBarangays.phone }}</td>
                                    <td data-label="Address" class="pt-3 py-3">{{ filterBarangays.address_line_1 + filterBarangays.city + filterBarangays.state  }}</td>
                                    <td data-label="Zip Code" class="pt-3 py-3">{{ filterBarangays.zipcode }}</td>
                                    <td data-label="Vaccine Type" class="pt-3 py-3">{{ filterBarangays.vaccine_type }}</td>
                                    <td data-label="Dosage" class="pt-3 py-3">{{ filterBarangays.dosage }}</td>
                                    <td data-label="Vaccine Date" class="pt-3 py-3">{{ filterBarangays.vaccine_date }}</td>
                                    <td data-label="Location" class="pt-3 py-3">{{ filterBarangays.vaccine_location }}</td>
                                </template>
                            </tr>
                            
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <button class="bg-red-500 text-white pb-2 pt-2 pl-4 pr-4 float-right" @click="pdfFilterByBarangay">Download PDF</button>
                    </div>
                </div>
            </div>
            <div class="flow-root" v-show="reportstab === 2">   
                <div class="flex justify-between items-center mt-3">
                        <div></div>
                        <form @submit.prevent="filterByDate">
                            <div class="flex justify-between items-center mt-3">
                                <div></div>
                                <div class="flex justify-between items-center">
                                    <div class="grid grid-cols-1 gap-6">     
                                        <div class="col-span-3 sm:col-span-2">
                                            <!-- <label for="company-website" class="block text-sm font-medium text-gray-700">Address</label> -->
                                            <div class="mt-1 rounded-md">
                                            
                                                <div class="flex gap-2 mt-1">
                                                    <input v-model="filterDate.date" type="date" name="date" id="date" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter Date" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <button type="submit" class="float-right ml-2 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
                <div v-if="allFilterByDate < 1" class="w-full mt-3">
                    <p class="text-2xl text-center">To see the list Search by Date</p>   
                </div> 
                <div id="pdfDateLifter" class="mr-10 ml-10" v-else>
                    <div>
                        <h2 class=" text-xl font-bold mb-5 mt-10">{{filterDate.date + " " + "Vaccinee" + " " + "list" + " " + "Reports"}}</h2>
                    </div>
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
                            <tr v-for="allFilterByDates in allFilterByDate">
                                <template v-if="allFilterByDates.status == 1">
                                    <td data-label="Name" class="pt-3 py-3">{{ allFilterByDates.firstname +"&nbsp"+ allFilterByDates.middlename +"&nbsp"+ allFilterByDates.lastname}}</td>
                                    <td data-label="Age" class="pt-3 py-3">{{ allFilterByDates.age }}</td>
                                    <td data-label="Sex" class="pt-3 py-3">{{ allFilterByDates.sex }}</td>
                                    <td data-label="Email" class="pt-3 py-3">{{ allFilterByDates.email }}</td>
                                    <td data-label="Phone" class="pt-3 py-3">{{ allFilterByDates.phone }}</td>
                                    <td data-label="Address" class="pt-3 py-3">{{ allFilterByDates.address_line_1 + allFilterByDates.city + allFilterByDates.state  }}</td>
                                    <td data-label="Zip Code" class="pt-3 py-3">{{ allFilterByDates.zipcode }}</td>
                                    <td data-label="Vaccine Type" class="pt-3 py-3">{{ allFilterByDates.vaccine_type }}</td>
                                    <td data-label="Dosage" class="pt-3 py-3">{{ allFilterByDates.dosage }}</td>
                                    <td data-label="Vaccine Date" class="pt-3 py-3">{{ allFilterByDates.vaccine_date }}</td>
                                    <td data-label="Location" class="pt-3 py-3">{{ allFilterByDates.vaccine_location }}</td>
                                </template>
                                
                            
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <button class="bg-red-500 text-white pb-2 pt-2 pl-4 pr-4 float-right" @click="pdfFilterByDate">Download PDF</button>
                    </div>
                </div>
            </div>
            <div class="flow-root" v-show="reportstab === 3">
                <div class="flex justify-between items-center mt-3">
                        <div></div>
                        <form @submit.prevent="filterByVaccine">
                            <div class="flex justify-between items-center mt-3">
                                <div></div>
                                <div class="flex justify-between items-center">
                                    <div class="grid grid-cols-1 gap-6">     
                                        <div class="col-span-3 sm:col-span-2">
                                            <!-- <label for="company-website" class="block text-sm font-medium text-gray-700">Address</label> -->
                                            <div class="mt-1 rounded-md">
                                            
                                                <div class="flex gap-2 mt-1">
                                                    <input v-model="filterVaccine.vaccine" type="text" name="vaccine" id="vaccine" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Vaccine Name" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 gap-6">
                                        <div class="col-span-3 sm:col-span-2">
                                            <button type="submit" class="float-right ml-2 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
                <div v-if="allFilterByVaccine < 1" class="w-full mt-3">
                    <p class="text-2xl text-center">To see the list Search by Vaccine name</p>   
                </div> 
                <div id="pdfVaccineLifter" class="mr-10 ml-10" v-else>
                    <div>
                        <h2 class=" text-xl font-bold mb-5 mt-10">{{filterVaccine.vaccine + " " + "Vaccinee" + " " + "list" + " " + "Reports"}}</h2>
                    </div>
                    <table class="w-full text-sm m-auto">
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
                            <tr v-for="filterByVaccines in allFilterByVaccine">
                                <template v-if="filterByVaccines.status == 1">
                                    <td data-label="Name" class="pt-3 py-3">{{ filterByVaccines.firstname +"&nbsp"+ filterByVaccines.middlename +"&nbsp"+ filterByVaccines.lastname}}</td>
                                    <td data-label="Age" class="pt-3 py-3">{{ filterByVaccines.age }}</td>
                                    <td data-label="Sex" class="pt-3 py-3">{{ filterByVaccines.sex }}</td>
                                    <td data-label="Email" class="pt-3 py-3">{{ filterByVaccines.email }}</td>
                                    <td data-label="Phone" class="pt-3 py-3">{{ filterByVaccines.phone }}</td>
                                    <td data-label="Address" class="pt-3 py-3">{{ filterByVaccines.address_line_1 + filterByVaccines.city + filterByVaccines.state  }}</td>
                                    <td data-label="Zip Code" class="pt-3 py-3">{{ filterByVaccines.zipcode }}</td>
                                    <td data-label="Vaccine Type" class="pt-3 py-3">{{ filterByVaccines.vaccine_type }}</td>
                                    <td data-label="Dosage" class="pt-3 py-3">{{ filterByVaccines.dosage }}</td>
                                    <td data-label="Vaccine Date" class="pt-3 py-3">{{ filterByVaccines.vaccine_date }}</td>
                                    <td data-label="Location" class="pt-3 py-3">{{ filterByVaccines.vaccine_location }}</td>
                                </template>
                                
                            
                            </tr>
                        </tbody>
                    </table>
                    
                 </div>
                 <div class="mt-3">
                    <button class="bg-red-500 text-white pb-2 pt-2 pl-4 pr-4 float-right" @click="pdfFilterByVaccine">Download PDF</button>
                </div>
              
            </div>
       
        </div>
        </div>
    </div>

    <!--Try PDF-->
   
    
    </admin-page-component>
</template>

<script >
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import store from "../../store";
import { ref, computed } from "vue";
import html2canvas from "html2canvas";
import { jsPDF } from "jspdf";


const allFilterByBarangays = computed(() => store.state.filterBarangay.data);
const allFilterByDate = computed(() => store.state.filterDate.data);
const allFilterByVaccine = computed(() => store.state.filterVaccine.data);


// store.dispatch("getAllVaccinees");

let filterBarangay = ref({
    barangay: '',
});

function filterByBarangay() {
    store.dispatch("filterByBarangay", filterBarangay.value).then(() => {
 
  });
}

let filterDate = ref({
    date: '',
});

function filterByDate() {
    store.dispatch("filterByDate", filterDate.value).then(() => {
     
    })
}

let filterVaccine = ref({
    vaccine: '',
});

function filterByVaccine() {
    console.log(filterVaccine.value);
    store.dispatch("filterByVaccine", filterVaccine.value).then(() => {

    });
}

export default {
  data() {
    return {
        reportstab: 1,
    };
  },
  methods: {
    barangay() {
      this.reportstab = 1;
    },
    date() {
      this.reportstab = 2;
    },
    vaccine() {
      this.reportstab = 3;
    },
    pdfFilterByVaccine() {
        window.html2canvas = html2canvas;
        var doc = new jsPDF("l","pt",[1000, 1500], 'center');
        doc.html(document.querySelector("#pdfVaccineLifter"), {
            callback:function(pdf) {
                pdf.save("filter-by-vaccinee-report.pdf");
            }
        })
    },
    pdfFilterByDate() {
        window.html2canvas = html2canvas;
        var doc = new jsPDF("l","pt",[1000, 1500], 'center');
        doc.html(document.querySelector("#pdfDateLifter"), {
            callback:function(pdf) {
                pdf.save("filter-by-date-report.pdf");
            }
        })
    },
    pdfFilterByBarangay() {
        window.html2canvas = html2canvas;
        var doc = new jsPDF("l","pt",[1000, 1500], 'center');
        doc.html(document.querySelector("#pdfBarangayLifter"), {
            callback:function(pdf) {
                pdf.save("filter-by-barangay-report.pdf");
            }
        })
    },
},
  setup () {
    return {
        filterBarangay,
        filterByBarangay,
        filterDate,
        filterByDate,
        allFilterByBarangays,
        allFilterByDate,
        filterVaccine,
        filterByVaccine,
        allFilterByVaccine,
    }
  }
}


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
