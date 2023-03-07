<template>
    <div class="landingpage-wrapper bg-[url('../../src/assets/image/healt-care.jpg')] h-screen backdrop-blur-{100}">
        <h1 class="text-[150px] text-cyan-500 font-bold drop-shadow-2xl text-center leading-tight">Vaccine</h1>
        <h1 class="text-[150px] text-cyan-500 font-bold drop-shadow-2xl text-center leading-tight">Philippines</h1>
        <h3 class="text-[40px] text-white font-bold drop-shadow-2xl text-center mt-2">DIRECTORY OF VACCINE FACILITIES IN THE PHILIPPINES</h3>
        <router-link
            :to="{ name: 'RegisterForm' }" 
            class="bg-[#89cf34] pl-3 pr-3 pt-2 pb-2 font-bold drop-shadow-2xl text-[35px] text-white text-center mt-10 ml-auto mr-auto block w-80 rounded-3xl"
            >
            Vaccine form
            </router-link>
           
    </div>
<!-- <a href="http://127.0.0.1:5173/vaccine-form">Vaccine form</a> -->
</template>
<script>
</script>
<style>
  @media screen and (max-width: 768px) {
  h1 {
    font-size: 60px !important;
  }
  h3 {
    font-size: 25px !important;
  }
  .landingpage-wrapper {
    padding-top: 100px;
  }
  a.text-gray-900.hover\:font-bold.px-3.py-2.rounded-md.text-lg.font-medium {
    font-size: 14px !important;
    margin-left: 0px;
  }
}
</style>