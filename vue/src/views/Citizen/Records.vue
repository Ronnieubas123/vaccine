<template>
    <admin-page-component>
       
        <div v-show="message" class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 float-right text-red-500" v-on:click="cancelMessageError">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>

        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
            <p class="font-bold">Status is not completed</p>
            <p class="text-sm">You can view the PDF file and download if the status is already completed!!!</p>
            </div>
        </div>
        </div>
        <table class="w-full text-sm">
                    <thead class="text-left">
                        <tr>
                            <th class="pt-3 py-3">Vaccine</th>
                            <th  class="pt-3 py-3">Date</th>
                            <th  class="pt-3 py-3">Status</th>
                            <th class="pt-3 py-3">PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="vaccineRecords in vaccineRecord">
                            <td class="pt-3 py-3">{{ vaccineRecords.vaccine }}</td>
                            <td class="pt-3 py-3">{{ vaccineRecords.date }}</td>
                            <template v-if="vaccineRecords.status == 0">
                                <td class="pt-3 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </td>
                            </template>
                            <template v-else>
                                <td class="pt-3 py-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green-600">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </td>
                            </template>
                            <td class="pt-3 py-3">
                                <button v-if="vaccineRecords.status == 0" class="bg-red-400 text-white pl-7 pr-7 pt-3 pb-3" v-on:click="cannotOpen">Download</button>
                                <button v-else class="bg-green-400 text-white pl-7 pr-7 pt-3 pb-3" v-on:click="opens(vaccineRecords.id)">Download</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
    </admin-page-component>
    <!--Modal-->
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
                <div class="grid mt-4 ml-10 mr-10">
                  <div class="w-full mt-4" id="vaccineCertificate">
                      <div class="text-center">
                          <img class="m-auto" src="http://127.0.0.1:5173/src/assets/image/barangay.jpg" alt="">
                          <h2 class="text-2xl font-bold">All in one Vaccination for Barangay Health Center</h2>
                      </div>
                      <div class="bg-green-600 text-center mt-6 p-10">
                            <h1 class=" text-5xl font-bold text-white">Vaccination Certificate</h1>
                      </div>
                      <div class="text-center mt-4">
                        <p class="text-2xl">This individual has received all required vaccinations</p>
                      </div>
                      <div class=" flex justify-between items-center mt-4 text-2xl">
                          <div>
                            <div>
                              <span class="font-bold">Name:</span>
                            </div>
                            <div>
                              <template v-for="citizenRecordModals in citizenRecordModal">
                                <span v-if="citizenRecordModals.id === modal_id">
                                   {{ citizenRecordModals.name  }}
                                </span>
                              </template>
                              
                           </div>
                          </div>

                          <div class="text-right">
                            <div>
                              <span class="font-bold">Date of Birth:</span>
                            </div>
                            <div>
                              <template v-for="getallVaccinee in getallVaccinees">
                                <span v-if="getallVaccinee.reference_id === ref_id">
                                  {{ getallVaccinee.dof }}
                                </span>
                              </template>
                              
                           </div>
                          </div>
                      </div>

                      <div class=" flex justify-between items-center mt-10 text-2xl">
                          <div>
                            <div>
                              <span class="font-bold">Vaccinations:</span>
                            </div>
                          </div>

                          <div class="text-right">
                            <div>
                              <span class="font-bold">Date Completed</span>
                            </div>
                          </div>
                      </div>
                      <div class="h-[2px] bg-black mt-2 mb-2"></div>
                      <div class=" flex justify-between items-center text-2xl">
                          <div>
                            <div>
                              <template v-for="getallVaccinee in getallVaccinees">
                                <span class="font-bold" v-if="getallVaccinee.reference_id === ref_id">
                                  {{getallVaccinee.vaccine_type}}
                                </span>
                              </template>
                              
                            </div>
                          </div>

                          <div class="text-right">
                            <div>
                              <template v-for="getallVaccinee in getallVaccinees">
                                <span class="font-bold" v-if="getallVaccinee.reference_id === ref_id">
                                  {{ getallVaccinee.vaccine_date }}
                                </span>
                              </template>
                              
                            </div>
                          </div>
                      </div>
                      <div class="mb-4 mt-10">
                        This certificate shows your details as reported to the All in one Vaccination for Barangay Health Center Register by your vaccination provider. 
                        It is available because you have received all required vaccinations approved for use in Philippines. The Valid from date reflects the date from whice 
                        your received all required vaccination.
                      </div>
                      <div>
                        Every effort is made to ensure that the information contained of the All in one Vaccination for Barangay Health Center Register is correct. The data is based on information provired
                         by vaccination providers and the accuracy of data is dependent on the quality and timeliness provided.
                      </div>
                      <div class="mt-3">
                        <button class="bg-red-500 text-white pb-2 pt-2 pl-4 pr-4 float-right" @click="pdfVaccineCertificate">Download PDF</button>
                        <button class="bg-blue-500 text-white pb-2 pt-2 pl-4 pr-4 mr-2 float-right" @click="close">Close</button>
                    </div>
                  </div>
                </div>
                
              </div>
            </DialogPanel>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>
<script>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import { Dialog, DialogPanel, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import  store  from "../../store";
import { computed, ref, watch } from 'vue';
import html2canvas from "html2canvas";
import { jsPDF } from "jspdf";

const vaccineRecord = computed(() => store.state.vaccineRecord.data);
const citizenRecordModal = computed(() => store.state.vaccineRecord.citizenRecordModal );

let citizenId = store.state.user.id;

store.dispatch('getCitizenVaccineRecord', citizenId);
  


export default{
    data() {
        return {
        open: false,
        message: '',
        modal_id: null
        };
    },
    methods: {
        pdfVaccineCertificate() {
            window.html2canvas = html2canvas;
            var doc = new jsPDF("l","pt",[1000, 1200], 'center');
            doc.html(document.querySelector("#vaccineCertificate"), {
                callback:function(pdf) {
                    pdf.save("vaccine-certificate.pdf");
                }
            })
        },
        opens(value) {
            this.open = true;
            this.modal_id = value;
            this.message = ''
        },
        close (){
            this.open = false;
        },
        cannotOpen(){
            this.message = 'You cannot view this PDF file because this is not already completed'
        },
        cancelMessageError() {
            this.message = ''
        }
    },
    components: {
        AdminPageComponent,
        Dialog,
        DialogPanel,
        TransitionChild,
        TransitionRoot  
    },
    setup() {
        
        return {
            vaccineRecord,
            citizenRecordModal,
        }
    }
}

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