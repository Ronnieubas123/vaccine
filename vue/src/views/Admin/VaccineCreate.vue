<template>
    <admin-page-component>
  <div v-if="vaccineLoading" class=" h-fit ">
            <div class="loader border-t-sky-400 border-10 border-8 rounded-full w-20 h-20 animation-pulse border-t-8 absolute top-1/2 left-1/2"></div>
        </div>
  <div v-else>
    <div class="md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Vaccine Form</h3>
          <!-- <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p> -->
        </div>
      </div>
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form @submit.prevent="saveVaccine">
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Vaccine Name</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input v-model="vaccine.name" type="text" name="vaccine" id="vaccine" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Vaccine Name" />
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Vaccine Dosage</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input v-model="vaccine.dosage" type="text" name="dosage" id="dosage" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Vaccine Dosage" />
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Vaccine Manufacturer</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input v-model="vaccine.manufacturer" type="text" name="manufacturer" id="manufacturer" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Manufacturer" />
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Vaccine Type</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input v-model="vaccine.type" type="text" name="dosage" id="dosage" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Type" />
                  </div>
                </div>
              </div>
              

              <div>
                <label for="about" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                  <textarea v-model="vaccine.description" id="vaccinedescription" name="vaccinedescription" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Vaccine description (Optional)" />
                </div>
            
              </div>

              <div>
                <label class="block text-sm font-medium text-gray-700">Image</label>
                <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                  <div class="space-y-1 text-center">
                    <img v-if="vaccine.image_url" :src="vaccine.image_url" :alt="vaccine.title" class="w-20 h-20 object-cover mr-auto ml-auto " />
                    <span v-else>
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <div class="flex text-sm text-gray-600">
                      <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                        <span>Upload a file</span>
                        <input id="file-upload" @change="onImageChoose" name="file-upload" type="file" class="sr-only" />
                      </label>
                      <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button v-if="update" type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update</button>
              <button v-else type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
 
    </admin-page-component>
</template>

<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import  store  from "../../store";
import { useRouter, useRoute } from "vue-router";
import { ref, watch, computed } from "vue";

const router = useRouter();
const route = useRoute();
const vaccineLoading = computed(() => store.state.currentVaccine.loading);

const update = route.params.id;


let vaccine = ref({
    name: '',
    dosage:'',
    description: '',
    image_url: null,
    manufacturer: '',
    type: ''
});

watch(
  () => store.state.currentVaccine.data,
  (newVal, oldVal) => {
    vaccine.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
    
  }
);


// check if there is a id in parameter then pass value to store with the parameter ID
if (route.params.id) {
  store.dispatch('getVaccine', route.params.id);
}
// display image in frontend and pass image value in backend
function onImageChoose(ev) {
  const file = ev.target.files[0];

  const reader = new FileReader();
  reader.onload = () => {
    // pass value in backend
    vaccine.value.image = reader.result;
    //display value in frontend
    vaccine.value.image_url = reader.result;

  };
  reader.readAsDataURL(file);
}

// Add function
function saveVaccine() {
  // Pass value in store
    store.dispatch("saveVaccine", vaccine.value).then(() => {
      // after passing value redirect to vaccine router
        router.push({
            name: "Vaccine",
        })
    })

}
</script>
<style>
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.loader {
    animation: spin 2s linear infinite;
}
</style>