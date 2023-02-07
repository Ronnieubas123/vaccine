<template>
    <admin-page-component>
        <div class="flex justify-between items-center mt-3">
            <h1 class="text-5xl">Vaccines List</h1>
            <router-link 
                :to="{ name: 'VaccineCreate' }" 
                class="py-2 px-3 text-white bg-sky-400 rounded-md hover:bg-sky-400 text-xl"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Add new Vaccine
            </router-link>
        </div>
        <div v-if="vaccinesLoading" class=" h-fit ">
            <div class="loader border-t-sky-400 border-10 border-8 rounded-full w-20 h-20 animation-pulse border-t-8 absolute top-1/2 left-1/2"></div>
        </div>
        <div v-else>
            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-3 grid-rows-1 ">
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
    </admin-page-component>
 
</template>
<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import store from "../../store";
import { computed } from "vue";


const vaccine = computed(() => store.state.vaccines.data);
console.log(vaccine);

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