<template>
    <admin-page-component>
  <div v-if="userLoading" class=" h-fit ">
            <div class="loader border-t-sky-400 border-10 border-8 rounded-full w-20 h-20 animation-pulse border-t-8 absolute top-1/2 left-1/2"></div>
  </div>
  <div v-else>
    <div class="md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-2xl font-medium leading-6 text-gray-900 mb-4">Add Vaccine Logistics</h3>
          <!-- <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p> -->
        </div>
      </div>
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form @submit.prevent="addVaccineLogistic">  
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-3">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Types</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <div v-for="vaccineTypes in vaccineType" class="mr-2">
                        <span class="mr-2">{{ vaccineTypes.type }}</span>
                        <input v-model="logistic.type" type="radio" :value="vaccineTypes.type" name="type" id="type" class="" @click="type" />
                    </div>
                    
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Vaccines</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <select v-model="logistic.vaccine_name" name="location" id="location">
                        <template v-for="vaccineTypeNames in vaccineTypeName">
                            <option :value="vaccineTypeNames.name">{{vaccineTypeNames.name}}</option>
                        </template> 
                         
                        </select>
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Received Vials</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input v-model="logistic.received_vials" type="text" name="vials" id="vials" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Received Vials" />
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Expiration date</label>
                      <div class="mt-1 rounded-md">
                        <input v-model="logistic.expiration" type="date" id="expiration" name="expiration">
                      </div>
                    </div>
                  </div>

              <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Date</label>
                      <div class="mt-1 rounded-md">
                        <input v-model="logistic.date" type="datetime-local" id="date" name="date">
                      </div>
                    </div>
                  </div>
              
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </div>
          </div>
        </form>
        {{ logistic }}
      </div>
    </div>
  </div>
 
    </admin-page-component>
</template>

<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import { ref, watch,computed } from "vue";
import store from "../../store";
import { useRouter, useRoute } from "vue-router"

const router = useRouter();
const route = useRoute();
const vaccineType = computed(() => store.state.vaccineType.data);
const vaccineTypeName = computed(() => store.state.vaccineTypeName.data);


let logistic = ref({
    type: '',
    vaccine_name: '',
    received_vials: '',
    expiration: '',
    date: ''
});


store.dispatch('getAllVaccineType');
store.dispatch('getAllVaccineTypeName');

// export default {
//   data() {
//   },
//   methods: {
  
//   },
//   setup () {
//     return {
//     }
//   }
// }

// watch(
//   () => store.state.currentUser.data,
//   (newVal, oldVal) => {
//     user.value = {
//       ...JSON.parse(JSON.stringify(newVal)),
//     }
//   }
// );

// if (route.params.id) {
//   store.dispatch("getUserss", route.params.id);
// }


function addVaccineLogistic() {
  store.dispatch("addVaccineLogistic", logistic.value).then(() => {
    router.push({
       name: 'Logistic',
    });
  })
}

</script>
