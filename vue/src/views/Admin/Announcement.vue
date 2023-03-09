<template>
    <admin-page-component>
        <div v-if="getAllAnnouncementLoading" class=" h-fit ">
            <div class="loader border-t-sky-400 border-10 border-8 rounded-full w-20 h-20 animation-pulse border-t-8 absolute top-1/2 left-1/2"></div>
        </div>
        
        <div v-else class="flex flex-col">
            <div class="mb-4 flex justify-between items-center mt-3">
                <div>
                    <h2 class=" text-2xl tracking-tight text-gray-900 font-medium ">Anouncement</h2>
                    <span class=" font-sm font-normal text-gray-600">List of the Anouncement</span>
                </div>
                <div>
                    <router-link 
                            :to="{ name: 'AnnouncementCreate' }" 
                            class="py-2 px-3 text-white bg-sky-400 rounded-md hover:bg-sky-400 text-xl"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Add new Announcement
                    </router-link>
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
    </admin-page-component>
</template>
<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue"
import { computed } from "vue";
import store from "../../store";

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



</script>
<style></style>