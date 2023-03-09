<template>
    <admin-page-component>
        <!-- Announcement-->
        <div class="mb-20">
            <div class="mb-4 flex justify-between items-center mt-3">
                <div>
                    <h2 class=" text-2xl tracking-tight text-gray-900 font-medium ">Anouncement</h2>
                    <span class=" font-sm font-normal text-gray-600">List of the Anouncement</span>
                </div>
                <div>
                    
                </div>
                        
            </div>
            <div class="max-w-sm w-full lg:max-w-full lg:flex" v-for="getAllAnnouncement in allAnnouncements">
                <div class="w-full border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="">
                    <p class="text-gray-700 text-base">{{ getAllAnnouncement.announcement }}</p>
                    <div class="mb-4 flex justify-between items-center mt-3">
                        <div></div>
                        <div class="flex">
                            <router-link
                                :to="{name: 'AnnouncementView', params: {id: getAllAnnouncement.id}}"
                                class="flex py-2 px-4 border border-transparent text-sm rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-inndigo-500"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                                Edit
                            </router-link>
                            <button
                                v-if="getAllAnnouncement.id"
                                type="button"
                                @click="deleteAnnouncement(getAllAnnouncement)"
                                class="h8 w8 flex items-center justify-center rounded-full border border-transparent text-sm text-red-500 focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                                Delete
                            </button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        <!--End announcement-->
        <!--Vaccine-->
        <div>
        <div class="mb-4 flex justify-between items-center mt-3">
                <div>
                    <h2 class=" text-2xl tracking-tight text-gray-900 font-medium ">Vacine</h2>
                    <span class=" font-sm font-normal text-gray-600">List of the Vaccine</span>
                </div>
                <div>
                    
                </div>
                        
        </div>
        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-3 grid-rows-1 mb-20">
            
                <div
                        v-for="vaccines in vaccine"
                        :key="vaccines.id"
                        class="flex-col py-4 px-6 shadow-md bg-white hover:bg-gray-50 h-auto inline-table"
                    >
                    <div class="h-full pb-5 pt-5">
                    <img :src="vaccines.image_url" class="h-5/6"/>
                    <h4 class="mt-4 text-lg"><b>Name:</b> {{ vaccines.name}}</h4>
                    <h3 class=" text-sm"><b>Dosage: </b>{{ vaccines.dosage }}</h3>
                    <div v-html="vaccines.description" class="overflow-hidden flex-1 text-sm"></div>

                    <div class="flex justify-between items-center mt-3">
                        <router-link
                            :to="{name: 'VaccineView', params: {id: vaccines.id}}"
                            class="flex py-2 px-4 border border-transparent text-sm rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-inndigo-500"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            Edit
                        </router-link>
                        <button
                            v-if="vaccines.id"
                            type="button"
                            @click="deleteVaccine(vaccines)"
                            class="h8 w8 flex items-center justify-center rounded-full border border-transparent text-sm text-red-500 focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            Delete
                        </button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End vaccinee-->
    <div>
        <div class="mb-4 flex justify-between items-center mt-3">
                <div>
                    <h2 class=" text-2xl tracking-tight text-gray-900 font-medium ">Vaccinee</h2>
                    <span class=" font-sm font-normal text-gray-600">List of the Vaccinee</span>
                </div>
                <div>
                    
                </div>
                        
        </div>
    <div class="w-full">
        <div class="flex justify-between items-center mt-3">
            <div></div>
                <div>
                    <button
                        @click="all"
                        :class="[ vaccineestab === 1 ? 'active' : '' ]"
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
                        :class="[ vaccineestab === 2 ? 'active' : '' ]"
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
                        :class="[ vaccineestab === 3 ? 'active' : '' ]"
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
                        :class="[ vaccineestab === 4 ? 'active' : '' ]"
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
                        :class="[ vaccineestab === 5 ? 'active' : '' ]"
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
            <div v-show="vaccineestab === 1">
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
                        
                        <tr v-for="allVaccinee in getallVaccinees">
                            <template v-if="allVaccinee.status == 1">
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccinee.firstname +"&nbsp"+  allVaccinee.middlename +"&nbsp"+  allVaccinee.lastname}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccinee.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccinee.sex }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ allVaccinee.email }}</td>
                                <td data-label="Phone" class="pt-3 py-3">{{ allVaccinee.phone }}</td>
                                <td data-label="Address" class="pt-3 py-3">{{ allVaccinee.address_line_1 + allVaccinee.city + allVaccinee.state  }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccinee.zipcode }}</td>
                                <td data-label="Vaccine Type" class="pt-3 py-3">{{ allVaccinee.vaccine_type }}</td>
                                <td data-label="Dosage" class="pt-3 py-3">{{ allVaccinee.dosage }}</td>
                                <td data-label="Vaccine Date" class="pt-3 py-3">{{ allVaccinee.vaccine_date }}</td>
                                <td data-label="Location" class="pt-3 py-3">{{ allVaccinee.vaccine_location }}</td>
                            </template>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div v-show="vaccineestab === 2">   
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
                        <tr v-for="allVaccinee in getallVaccinees">
                            <template v-if="allVaccinee.age < 18 && allVaccinee.status == 1">
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccinee.firstname +"&nbsp"+ allVaccinee.middlename +"&nbsp"+ allVaccinee.lastname}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccinee.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccinee.sex }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ allVaccinee.email }}</td>
                                <td data-label="Phone" class="pt-3 py-3">{{ allVaccinee.phone }}</td>
                                <td data-label="Address" class="pt-3 py-3">{{ allVaccinee.address_line_1 + allVaccinee.city + allVaccinee.state  }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccinee.zipcode }}</td>
                                <td data-label="Vaccine Type" class="pt-3 py-3">{{ allVaccinee.vaccine_type }}</td>
                                <td data-label="Dosage" class="pt-3 py-3">{{ allVaccinee.dosage }}</td>
                                <td data-label="Vaccine Date" class="pt-3 py-3">{{ allVaccinee.vaccine_date }}</td>
                                <td data-label="Location" class="pt-3 py-3">{{ allVaccinee.vaccine_location }}</td>
                            </template>
                            
                          
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="vaccineestab === 3">
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
                        <tr v-for="allVaccinee in getallVaccinees">
                            <template v-if="allVaccinee.age > 17 && allVaccinee.age < 60 && allVaccinee.status == 1">
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccinee.firstname +"&nbsp"+ allVaccinee.middlename +"&nbsp"+ allVaccinee.lastname}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccinee.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccinee.sex }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ allVaccinee.email }}</td>
                                <td data-label="Phone" class="pt-3 py-3">{{ allVaccinee.phone }}</td>
                                <td data-label="Address" class="pt-3 py-3">{{ allVaccinee.address_line_1 + allVaccinee.city + allVaccinee.state  }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccinee.zipcode }}</td>
                                <td data-label="Vaccine Type" class="pt-3 py-3">{{ allVaccinee.vaccine_type }}</td>
                                <td data-label="Dosage" class="pt-3 py-3">{{ allVaccinee.dosage }}</td>
                                <td data-label="Vaccine Date" class="pt-3 py-3">{{ allVaccinee.vaccine_date }}</td>
                                <td data-label="Location" class="pt-3 py-3">{{ allVaccinee.vaccine_location }}</td>
                            </template>
                            
                          
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="vaccineestab === 4">
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
                        <tr v-for="allVaccinee in getallVaccinees">
                            <template v-if="allVaccinee.age > 60 || allVaccinee.age == 60 && allVaccinee.status == 1">
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccinee.firstname +"&nbsp"+ allVaccinee.middlename +"&nbsp"+ allVaccinee.lastname}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccinee.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccinee.sex }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ allVaccinee.email }}</td>
                                <td data-label="Phone" class="pt-3 py-3">{{ allVaccinee.phone }}</td>
                                <td data-label="Address" class="pt-3 py-3">{{ allVaccinee.address_line_1 + allVaccinee.city + allVaccinee.state  }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccinee.zipcode }}</td>
                                <td data-label="Vaccine Type" class="pt-3 py-3">{{ allVaccinee.vaccine_type }}</td>
                                <td data-label="Dosage" class="pt-3 py-3">{{ allVaccinee.dosage }}</td>
                                <td data-label="Vaccine Date" class="pt-3 py-3">{{ allVaccinee.vaccine_date }}</td>
                                <td data-label="Location" class="pt-3 py-3">{{ allVaccinee.vaccine_location }}</td>
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-show="vaccineestab === 5">
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
                        <tr v-for="allVaccinee in getallVaccinees">
                            <template v-if="allVaccinee.pregnant == 'Yes' && allVaccinee.status == 1">
                                <td data-label="Name" class="pt-3 py-3">{{ allVaccinee.firstname +"&nbsp"+ allVaccinee.middlename +"&nbsp"+ allVaccinee.lastname}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ allVaccinee.age }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ allVaccinee.sex }}</td>
                                <td data-label="Email" class="pt-3 py-3">{{ allVaccinee.email }}</td>
                                <td data-label="Phone" class="pt-3 py-3">{{ allVaccinee.phone }}</td>
                                <td data-label="Address" class="pt-3 py-3">{{ allVaccinee.address_line_1 + allVaccinee.city + allVaccinee.state  }}</td>
                                <td data-label="Zip Code" class="pt-3 py-3">{{ allVaccinee.zipcode }}</td>
                                <td data-label="Vaccine Type" class="pt-3 py-3">{{ allVaccinee.vaccine_type }}</td>
                                <td data-label="Dosage" class="pt-3 py-3">{{ allVaccinee.dosage }}</td>
                                <td data-label="Vaccine Date" class="pt-3 py-3">{{ allVaccinee.vaccine_date }}</td>
                                <td data-label="Location" class="pt-3 py-3">{{ allVaccinee.vaccine_location }}</td>
                                <td data-label="Pregnant" class="pt-3 py-3">{{ allVaccinee.pregnant }}</td>
                                <td data-label="Months" class="pt-3 py-3">{{ allVaccinee.month }}</td>
                                <td data-label="Days" class="pt-3 py-3">{{ allVaccinee.days }}</td>
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
     <!--Vaccinee-->
    </admin-page-component>
    <!--<schedule-component></schedule-component>-->
   
    
 </template>
 <script>
 import AdminPageComponent from "../../components/AdminPageComponent.vue";
 import { computed } from "vue";
 import store from "../../store";

//ANNOUNCEMENT FUNCTION
const allAnnouncements = computed(() => store.state.currentAnnouncement.data);
const getAllAnnouncementLoading = computed(() => store.state.currentAnnouncement.loading);

store.dispatch("getAllAnnouncements");

function deleteAnnouncement(getAllAnnouncement) {
  if (
    confirm(
      `Are you sure you want to delete this Vaccine? Operation can't be undone!!`
    )
  ) {   
    store.dispatch("deleteAnnouncement", getAllAnnouncement.id).then(() => {
        
      store.dispatch("getAllAnnouncements");
    });
  }
}
//END OF ANNOUNCEMENT

//Vaccine 
const vaccine = computed(() => store.state.vaccines.data);


const vaccinesLoading = computed(() => store.state.vaccines.loading);

store.dispatch("getVaccines");

function deleteVaccine(vaccines) {
  if (
    confirm(
      `Are you sure you want to delete this Vaccine? Operation can't be undone!!`
    )
  ) {   
    store.dispatch("deleteVaccine", vaccines.id).then(() => {
        
      store.dispatch("getVaccines");
    });
  }
}

//END vaccine

//VACCINEE

const getallVaccinees = computed(() => store.state.allVaccinees.data);


store.dispatch("getAllVaccinees");



export default {
  data() {
    return {
        vaccineestab: 1,
    };
  },
  methods: {
    all() {
      this.vaccineestab = 1;
    },
    below18() {
      this.vaccineestab = 2;
    },
    adult() {
      this.vaccineestab = 3;
    },
    senior() {
      this.vaccineestab = 4;
    },
    pregnant() {
      this.vaccineestab = 5;
    },
  },
  setup () {
    return {
        getallVaccinees,
        allAnnouncements,
        getAllAnnouncementLoading,
        deleteAnnouncement,
        vaccine,
        vaccinesLoading,
        deleteVaccine
    }
  }
}
//END VACCINEE
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