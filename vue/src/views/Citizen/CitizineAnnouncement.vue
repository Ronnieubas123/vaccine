<template>
    <admin-page-component>
        <div v-if="getAllAnnouncementLoading" class=" h-fit ">
            <div class="loader border-t-sky-400 border-10 border-8 rounded-full w-20 h-20 animation-pulse border-t-8 absolute top-1/2 left-1/2"></div>
        </div>
        
        <div v-else class="flex flex-col announcement-wrapper">
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
                    <p class="text-gray-700 text-base p-10">{{ getAllAnnouncement.announcement }}</p>
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




</script>
<style>
@media screen and (max-width: 768px) {
    .flex.flex-col.announcement-wrapper {
        margin-left: 33px;
    }
}
</style>