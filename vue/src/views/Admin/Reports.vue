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
                        <div class="w-2/12">
                            <h3 class="text-xl font-bold mb-2">Barangay List</h3>
                            <div v-for="(barangay, index) in barangays" :class="[ barangaytab === index ? 'active' : '' ]" class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mb-2">
                                <button class="w-full text-left" @click="barangayFilter(index)" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{  barangay.barangay_name }}
                                </button>
                            </div>
                        </div>
                        <template v-for="(barangay, index) in barangays">
                            <div v-show="barangaytab === index"  id="pdfBarangayLifter" class="mr-10 ml-10 w-10/12">
                                <div>
                                    <h2 class=" text-xl font-bold mb-5 mt-10">{{barangay.barangay_name + " " + "Vaccinee list Reports"}}</h2>
                                </div>
                               <!--Search-->
                                <div class="flex float-right">
                                    <div class="mb-3 xl:w-96">
                                        <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                        <input
                                            v-model="searchbarangay"
                                            type="search"
                                            class="relative m-0 block w-[1%] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out focus:border-primary-600 focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                            placeholder="Search by Vaccine date or Vaccine name"
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
                                        <template v-if="index === 0">
                                            <template v-for="filterRegisterform in filteredDataBarangay">
                                                <tr v-if="barangay.barangay_name == filterRegisterform.vaccine_location">
                                                    <template v-if="filterRegisterform.status == 1">
                                                        <td data-label="Name" class="pt-3 py-3">{{ filterRegisterform.firstname +"&nbsp"+  filterRegisterform.middlename +"&nbsp"+  filterRegisterform.lastname}}</td>
                                                        <td data-label="Age" class="pt-3 py-3">{{ filterRegisterform.age }}</td>
                                                        <td data-label="Sex" class="pt-3 py-3">{{ filterRegisterform.sex }}</td>
                                                        <td data-label="Email" class="pt-3 py-3">{{ filterRegisterform.email }}</td>
                                                        <td data-label="Phone" class="pt-3 py-3">{{ filterRegisterform.phone }}</td>
                                                        <td data-label="Address" class="pt-3 py-3">{{ filterRegisterform.address_line_1 + filterRegisterform.city + filterRegisterform.state  }}</td>
                                                        <td data-label="Zip Code" class="pt-3 py-3">{{ filterRegisterform.zipcode }}</td>
                                                        <td data-label="Vaccine Type" class="pt-3 py-3">{{ filterRegisterform.vaccine_type }}</td>
                                                        <td data-label="Dose" class="pt-3 py-3">{{ filterRegisterform.dose }}</td>
                                                        <td data-label="Vaccine Date" class="pt-3 py-3">{{ filterRegisterform.vaccine_date }}</td>
                                                        <td data-label="Location" class="pt-3 py-3">{{ filterRegisterform.vaccine_location }}</td>
                                                    </template>
                                                </tr>
                                            </template>
                                        </template>
                                        <template v-else>
                                            <template v-for="filterRegisterform in filteredDataBarangay">
                                                <tr v-if="barangay.barangay_name === filterRegisterform.vaccine_location">
                                                    <template v-if="filterRegisterform.status == 1">
                                                        <td data-label="Name" class="pt-3 py-3">{{ filterRegisterform.firstname +"&nbsp"+  filterRegisterform.middlename +"&nbsp"+  filterRegisterform.lastname}}</td>
                                                        <td data-label="Age" class="pt-3 py-3">{{ filterRegisterform.age }}</td>
                                                        <td data-label="Sex" class="pt-3 py-3">{{ filterRegisterform.sex }}</td>
                                                        <td data-label="Email" class="pt-3 py-3">{{ filterRegisterform.email }}</td>
                                                        <td data-label="Phone" class="pt-3 py-3">{{ filterRegisterform.phone }}</td>
                                                        <td data-label="Address" class="pt-3 py-3">{{ filterRegisterform.address_line_1 + filterRegisterform.city + filterRegisterform.state  }}</td>
                                                        <td data-label="Zip Code" class="pt-3 py-3">{{ filterRegisterform.zipcode }}</td>
                                                        <td data-label="Vaccine Type" class="pt-3 py-3">{{ filterRegisterform.vaccine_type }}</td>
                                                        <td data-label="Dose" class="pt-3 py-3">{{ filterRegisterform.dose }}</td>
                                                        <td data-label="Vaccine Date" class="pt-3 py-3">{{ filterRegisterform.vaccine_date }}</td>
                                                        <td data-label="Location" class="pt-3 py-3">{{ filterRegisterform.vaccine_location }}</td>
                                                    </template>
                                                </tr>
                                            </template>
                                        </template>
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    <button class="bg-red-500 text-white pb-2 pt-2 pl-4 pr-4 float-right" @click="pdfFilterByBarangay">Download PDF</button>
                                </div>
                            </div>
                        </template>
                </div>
                
            </div>
            <div class="flow-root" v-show="reportstab === 2">   
                <div class="flex mt-3">
                        <div class="w-2/12">
                            <h3 class="text-xl font-bold mb-2">Schedule List</h3>
                            <div v-for="(schedules, index) in schedule" :class="[ scheduletab === index ? 'active' : '' ]" class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mb-2">
                                <button class="w-full text-left" @click="scheduleFilter(index)" >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{  schedules.date }}
                                </button>
                            </div>
                        </div>
                        <template v-for="(schedules, index) in schedule">
                            <div v-show="scheduletab === index" id="pdfDateLifter" class="mr-10 ml-10 w-10/12">
                                <div>
                                    <h2 class=" text-xl font-bold mb-5 mt-10">{{schedules.date + " Vaccinee list Reports"}}</h2>
                                </div>
                                <!--Search-->
                                <div class="flex float-right">
                                    <div class="mb-3 xl:w-96">
                                        <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                        <input
                                            v-model="searchbydate"
                                            type="search"
                                            class="relative m-0 block w-[1%] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out focus:border-primary-600 focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                            placeholder="Search by Location or Vaccine name"
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
                                        
                                        <template v-if="index === 0">   
                                            <template v-for="filterRegisterform in filteredDataDate">
                                                <tr v-if="schedules.id == filterRegisterform.date_id">
                                                    <template v-if="filterRegisterform.status == 1">
                                                        <td data-label="Name" class="pt-3 py-3">{{ filterRegisterform.firstname +"&nbsp"+  filterRegisterform.middlename +"&nbsp"+  filterRegisterform.lastname}}</td>
                                                        <td data-label="Age" class="pt-3 py-3">{{ filterRegisterform.age }}</td>
                                                        <td data-label="Sex" class="pt-3 py-3">{{ filterRegisterform.sex }}</td>
                                                        <td data-label="Email" class="pt-3 py-3">{{ filterRegisterform.email }}</td>
                                                        <td data-label="Phone" class="pt-3 py-3">{{ filterRegisterform.phone }}</td>
                                                        <td data-label="Address" class="pt-3 py-3">{{ filterRegisterform.address_line_1 + filterRegisterform.city + filterRegisterform.state  }}</td>
                                                        <td data-label="Zip Code" class="pt-3 py-3">{{ filterRegisterform.zipcode }}</td>
                                                        <td data-label="Vaccine Type" class="pt-3 py-3">{{ filterRegisterform.vaccine_type }}</td>
                                                        <td data-label="Dose" class="pt-3 py-3">{{ filterRegisterform.dose }}</td>
                                                        <td data-label="Vaccine Date" class="pt-3 py-3">{{ filterRegisterform.vaccine_date }}</td>
                                                        <td data-label="Location" class="pt-3 py-3">{{ filterRegisterform.vaccine_location }}</td>
                                                    </template>
                                                </tr>
                                            </template>
                                        </template>
                                        <template v-else>
                                            <template v-for="filterRegisterform in filteredDataDate">
                                                <tr v-if="schedules.id == filterRegisterform.date_id">
                                                    <template v-if="filterRegisterform.status == 1">
                                                        <td data-label="Name" class="pt-3 py-3">{{ filterRegisterform.firstname +"&nbsp"+  filterRegisterform.middlename +"&nbsp"+  filterRegisterform.lastname}}</td>
                                                        <td data-label="Age" class="pt-3 py-3">{{ filterRegisterform.age }}</td>
                                                        <td data-label="Sex" class="pt-3 py-3">{{ filterRegisterform.sex }}</td>
                                                        <td data-label="Email" class="pt-3 py-3">{{ filterRegisterform.email }}</td>
                                                        <td data-label="Phone" class="pt-3 py-3">{{ filterRegisterform.phone }}</td>
                                                        <td data-label="Address" class="pt-3 py-3">{{ filterRegisterform.address_line_1 + filterRegisterform.city + filterRegisterform.state  }}</td>
                                                        <td data-label="Zip Code" class="pt-3 py-3">{{ filterRegisterform.zipcode }}</td>
                                                        <td data-label="Vaccine Type" class="pt-3 py-3">{{ filterRegisterform.vaccine_type }}</td>
                                                        <td data-label="Dose" class="pt-3 py-3">{{ filterRegisterform.dose }}</td>
                                                        <td data-label="Vaccine Date" class="pt-3 py-3">{{ filterRegisterform.vaccine_date }}</td>
                                                        <td data-label="Location" class="pt-3 py-3">{{ filterRegisterform.vaccine_location }}</td>
                                                    </template>
                                                </tr>
                                            </template>
                                        </template>
                                    </tbody>
                                </table>
                                    <div class="mt-3">
                                        <button class="bg-red-500 text-white pb-2 pt-2 pl-4 pr-4 float-right" @click="pdfFilterByDate">Download PDF</button>
                                    </div>
                            </div>
                        </template>
                </div>
            </div>
            <div class="flow-root" v-show="reportstab === 3">
                <div class="flex justify-between items-center mt-3">
                    <div class="w-2/12">
                        <h3 class="text-xl font-bold mb-2">Schedule List</h3>
                        <div v-for="(vaccine, index) in vaccines" :class="[ vaccinetab === index ? 'active' : '' ]" class="py-2 px-3 text-white bg-sky-400 rounded-md text-sm mb-2">
                            <button class="w-full text-left" @click="vaccineFilter(index)" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{  vaccine.name }}
                             </button>
                        </div>
                    </div>
                    <template v-for="(vaccine, index) in vaccines">
                        <div v-show="vaccinetab === index" id="pdfVaccineLifter" class="mr-10 ml-10 w-10/12">
                        <div>
                            <h2 class=" text-xl font-bold mb-5 mt-10">{{"filterVaccine.vaccine" + " Vaccinee list Reports"}}</h2>
                        </div>
                         <!--Search-->
                         <div class="flex float-right">
                            <div class="mb-3 xl:w-96">
                            <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                                <input
                                    v-model="searchbyvaccine"
                                    type="search"
                                    class="relative m-0 block w-[1%] min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-neutral-700 outline-none transition duration-300 ease-in-out focus:border-primary-600 focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200"
                                    placeholder="Search by Location or Vaccine date"
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
                                <template v-if="index === 0">   
                                            <template v-for="filterRegisterform in filteredDataVaccine">
                                                <tr v-if="vaccine.id == filterRegisterform.vaccine_id">
                                                    <template v-if="filterRegisterform.status == 1">
                                                        <td data-label="Name" class="pt-3 py-3">{{ filterRegisterform.firstname +"&nbsp"+  filterRegisterform.middlename +"&nbsp"+  filterRegisterform.lastname}}</td>
                                                        <td data-label="Age" class="pt-3 py-3">{{ filterRegisterform.age }}</td>
                                                        <td data-label="Sex" class="pt-3 py-3">{{ filterRegisterform.sex }}</td>
                                                        <td data-label="Email" class="pt-3 py-3">{{ filterRegisterform.email }}</td>
                                                        <td data-label="Phone" class="pt-3 py-3">{{ filterRegisterform.phone }}</td>
                                                        <td data-label="Address" class="pt-3 py-3">{{ filterRegisterform.address_line_1 + filterRegisterform.city + filterRegisterform.state  }}</td>
                                                        <td data-label="Zip Code" class="pt-3 py-3">{{ filterRegisterform.zipcode }}</td>
                                                        <td data-label="Vaccine Type" class="pt-3 py-3">{{ filterRegisterform.vaccine_type }}</td>
                                                        <td data-label="Dose" class="pt-3 py-3">{{ filterRegisterform.dose }}</td>
                                                        <td data-label="Vaccine Date" class="pt-3 py-3">{{ filterRegisterform.vaccine_date }}</td>
                                                        <td data-label="Location" class="pt-3 py-3">{{ filterRegisterform.vaccine_location }}</td>
                                                    </template>
                                                </tr>
                                            </template>
                                        </template>
                                        <template v-else>
                                            <template v-for="filterRegisterform in filteredDataVaccine">
                                                <tr v-if="vaccine.id == filterRegisterform.vaccine_id">
                                                    <template v-if="filterRegisterform.status == 1">
                                                        <td data-label="Name" class="pt-3 py-3">{{ filterRegisterform.firstname +"&nbsp"+  filterRegisterform.middlename +"&nbsp"+  filterRegisterform.lastname}}</td>
                                                        <td data-label="Age" class="pt-3 py-3">{{ filterRegisterform.age }}</td>
                                                        <td data-label="Sex" class="pt-3 py-3">{{ filterRegisterform.sex }}</td>
                                                        <td data-label="Email" class="pt-3 py-3">{{ filterRegisterform.email }}</td>
                                                        <td data-label="Phone" class="pt-3 py-3">{{ filterRegisterform.phone }}</td>
                                                        <td data-label="Address" class="pt-3 py-3">{{ filterRegisterform.address_line_1 + filterRegisterform.city + filterRegisterform.state  }}</td>
                                                        <td data-label="Zip Code" class="pt-3 py-3">{{ filterRegisterform.zipcode }}</td>
                                                        <td data-label="Vaccine Type" class="pt-3 py-3">{{ filterRegisterform.vaccine_type }}</td>
                                                        <td data-label="Dose" class="pt-3 py-3">{{ filterRegisterform.dose }}</td>
                                                        <td data-label="Vaccine Date" class="pt-3 py-3">{{ filterRegisterform.vaccine_date }}</td>
                                                        <td data-label="Location" class="pt-3 py-3">{{ filterRegisterform.vaccine_location }}</td>
                                                    </template>
                                                </tr>
                                            </template>
                                        </template>
                            </tbody>
                        </table>
                 </div>
                    </template>
                    
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


const allFilterRegisterform = computed(() => store.state.filterRegisterform.data);
// const allFilterByDate = computed(() => store.state.filterDate.data);
// const allFilterByVaccine = computed(() => store.state.filterVaccine.data);
const barangays = computed(() => store.state.allBarangays.data);
const schedule = computed(() => store.state.schedule.data);
const vaccines = computed(() => store.state.filterVaccine.data);


store.dispatch("getAllBarangayReports");
store.dispatch("getAllScheduleReports");
store.dispatch("getAllVaccineReports");


// store.dispatch("getAllVaccinees");



// function filterByBarangay() {
//     store.dispatch("filterByBarangay", filterBarangay.value).then(() => {
 
//   });
// }

store.dispatch("filterRegisterform");


export default {
  data() {
    return {
        reportstab: 1,
        barangaytab: 0,
        scheduletab: 0,
        vaccinetab: 0,
        searchbarangay: '',
        searchbydate: '',
        searchbyvaccine: '',
        allFilterRegisterforms: allFilterRegisterform,
        allData: [
    {"id": 1, "city":"California", "country": "United State of America", "price": "700", "reviewnum": "890", "daynum": "5", "imgsrc": "img/place/1.png"},
    {"id": 2, "city":"london", "country": "United Kingdom", "price": "550", "reviewnum": "900", "daynum": "4", "imgsrc": "img/place/2.png"},
    {"id": 3, "city":"Korola Megna", "country": "Nepal", "price": "350", "reviewnum": "150", "daynum": "5", "imgsrc": "img/place/3.png"},
    {"id": 4, "city":"Miami Beach", "country": "United State of America", "price": "850", "reviewnum": "660", "daynum": "7", "imgsrc": "img/place/4.png"},
    {"id": 5, "city":"California", "country": "United State of America", "price": "600", "reviewnum": "380", "daynum": "6", "imgsrc": "img/place/5.png"},
    {"id": 6, "city":"Saintmartine Iceland", "country": "Kingdom of the Netherlands", "price": "450", "reviewnum": "340", "daynum": "3", "imgsrc": "img/place/6.png"}
]
    };
  },
  computed: {
    filteredDataBarangay() {
      return this.allFilterRegisterforms
        .filter(
          ({ vaccine_type, vaccine_date }) => [vaccine_type, vaccine_date]
            .some(val => val.toLowerCase().includes(this.searchbarangay))
        );
      },
      filteredDataDate() {
      return this.allFilterRegisterforms
        .filter(
          ({ vaccine_type, vaccine_location }) => [vaccine_type, vaccine_location]
            .some(val => val.toLowerCase().includes(this.searchbydate))
        );
      },
      filteredDataVaccine() {
      return this.allFilterRegisterforms
        .filter(
          ({ vaccine_date, vaccine_location }) => [vaccine_date, vaccine_location]
            .some(val => val.toLowerCase().includes(this.searchbyvaccine))
        );
      }
  },
  methods: {
    vaccineFilter(value) {
        this.vaccinetab = value;
    },
    scheduleFilter(value) {
        this.scheduletab = value;
    },
    barangayFilter(value) {
        this.barangaytab = value;
    },
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
        allFilterRegisterform,
        barangays,
        schedule,
        vaccines
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
