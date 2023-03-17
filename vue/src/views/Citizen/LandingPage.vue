<template>
    <div class="landingpage-wrapper bg-[url('../../src/assets/image/healt-care.jpg')] h-screen backdrop-blur-{100} pt-[140px] bg-right-top">
        <!-- <h1 class="text-[150px] text-cyan-500 font-bold drop-shadow-2xl text-center leading-tight">Vaccine</h1> -->
        <h1 class="text-[150px] text-cyan-500 font-bold drop-shadow-2xl text-center leading-tight landing-page-heading">BAKREK</h1>
        <h3 class="text-[40px] text-white font-bold drop-shadow-2xl text-center mt-2">All-In-One Vaccination Program for Barangay Health Center</h3>
        <router-link
            :to="{ name: 'RegisterForm' }" 
            class="bg-[#89cf34] pl-3 pr-3 pt-2 pb-2 font-bold drop-shadow-2xl text-[35px] text-white text-center mt-10 ml-auto mr-auto block w-80 rounded-3xl"
            >
            Vaccine form
            </router-link>
            <div v-if="error" class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded error-message">
            {{ error }}
              <span class="w-8 h-8 flex item-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
         
              </span>
          </div>
            <!-- <h3 class="text-[30px] text-white font-bold drop-shadow-2xl text-center mt-2">test{{ error }} </h3> -->
            
           
    </div>
<!-- <a href="http://127.0.0.1:5173/vaccine-form">Vaccine form</a> -->
</template>
<script setup>
import { ref, computed } from "vue";
import store from "../../store";
const error = computed(() => store.state.currentVaccineForm.error);



</script>
<style>
.error-message {
  width: 283px;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    font-size: 29px;
    margin-top: 70px;
}
  @media screen and (max-width: 768px) {
  h1 {
    font-size: 60px !important;
  }
  h3 {
    font-size: 25px !important;
  }
  .landingpage-wrapper {
    padding-top: 250px;
  }
  a.text-gray-900.hover\:font-bold.px-3.py-2.rounded-md.text-lg.font-medium {
    font-size: 13px !important;
    margin-left: 0px;
  }
  .landing-page-heading {
    font-size: 45px !important;
  }
}
</style>