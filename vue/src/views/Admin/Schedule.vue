<template>
    <admin-page-component>
      
        <div v-if="error" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">ADD SCHEDULE! </strong>
            <span class="block sm:inline">{{ error }}</span>
            <!-- <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span> -->
            </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class=" py-10 inline-block min-w-full sm:px-6 lg:px-8 bg-stone-50">
                <div class="overflow-hidden">
                    <div class="mb-4 flex justify-between items-center mt-3">
                        <div>
                            <h2 class=" text-2xl tracking-tight text-gray-900 font-medium ">Vaccine Logistics</h2>
                            <span class=" font-sm font-normal text-gray-600">List of the Vaccine Logistics</span>
                        </div>
                        <div>
                            <router-link 
                                :to="{ name: 'ScheduleCreate' }" 
                                class="py-2 px-3 text-white bg-sky-400 rounded-md hover:bg-sky-400 text-xl"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    Add new Vaccine Schedule
                            </router-link>
                        </div>
                        
                    </div>
                    <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th class="pt-3 py-3">Schedule Date</th>
                            <th class="pt-3 py-3">Barangay</th>
                            <th class="pt-3 py-3"></th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="scheduleLists in scheduleList">
                                <td data-label="Schedule" class="pt-3 py-3">{{ scheduleLists.date}}</td>
                                <td data-label="Barangay" class="pt-3 py-3">{{ scheduleLists.barangay}}</td>
                                <td data-label="Action" class="pt-3 py-3">
                                    <div class="flex items-center mt-1 justify-center ">
                                        <router-link 
                                            :to="{name: 'ScheduleView', params: {id: scheduleLists.schedule_id}}"
                                            class="flex py-2 px-4 text-sky-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                        </router-link>
                                    </div>
                                </td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </admin-page-component>
</template>
<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue"
import { computed } from "vue";
import store from "../../store";

const users = computed(() => store.state.allUsers.data);
const scheduleList = computed(() => store.state.schedule.data);
const error = computed(() => store.state.currentSchedule.error);



store.dispatch("getSchedule");

function deleteUser(user){
    if (
    confirm(
      `Are you sure you want to delete this Vaccine? Operation can't be undone!!`
    )
  ) {   
    store.dispatch("deleteUser", user.id).then(() => {
      store.dispatch("getUsers");
    });
  }
}

</script>
<style></style>