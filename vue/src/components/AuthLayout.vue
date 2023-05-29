<template>
  <section class="h-screen gradient-form bg-gray-200">
  <div class="container py-12 px-6 h-full ml-auto mr-auto">
    <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">
      <div class="xl:w-10/12">
        <div class="block bg-white shadow-lg rounded-lg">
          <div class="lg:flex lg:flex-wrap g-0">
          <router-view></router-view>    
            <div
              class="lg:w-6/12 flex items-center lg:rounded-r-lg rounded-b-lg lg:rounded-bl-none bg-[url('../src/assets/image/vaccine.png')] bg-cover bg-no-repeat bg-center fill-teal-900"
            >
              <div class="text-white px-4 py-6 md:p-12 md:mx-6">
                <h4 class="text-xl font-semibold mb-6">We are more than just a company</h4>
                <p class="text-sm">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
</section>
</template>
  
  <script setup>
  import { LockClosedIcon } from '@heroicons/vue/20/solid'
  </script>
  
  <style>
  </style>