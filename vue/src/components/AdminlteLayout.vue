<template>
  <div :class="menu ? 'test' : 'overflow-hidden lg:overflow-visible'">
  <div :class="menu ? 'xl:pl-60 pt-14 min-h-screen w-screen transition-position lg:w-auto bg-gray-50 dark:bg-slate-800 dark:text-slate-100': 'xl:pl-60 ml-60 lg:ml-0 pt-14 min-h-screen w-screen transition-position lg:w-auto bg-gray-50 dark:bg-slate-800 dark:text-slate-100'">
    <nav :class="menu ? 'top-0 inset-x-0 fixed bg-gray-50 h-14 z-30 transition-position w-screen lg:w-auto dark:bg-slate-800 xl:pl-60' : 'top-0 inset-x-0 fixed bg-gray-50 h-14 z-30 transition-position w-screen lg:w-auto dark:bg-slate-800 xl:pl-60 ml-60 lg:ml-0'">
      <div class="flex lg:items-stretch xl:max-w-7xl xl:mx-auto">
        <!-- <div class="flex flex-1 items-stretch h-14">
          <div @click="menu=!menu" class="flex lg:hidden text-black hover:text-blue-500 py-2 px-3 items-center cursor-pointer dark:text-white dark:hover:text-slate-400">
            <span   class="inline-flex justify-center items-center w-6 h-6">
              <svg viewBox="0 0 24 24" width="24" height="24" class="inline-block">
                <path fill="currentColor" d="M19,13H3V11H19L15,7L16.4,5.6L22.8,12L16.4,18.4L15,17L19,13M3,6H13V8H3V6M13,16V18H3V16H13Z"></path>
              </svg>
            </span> 
          </div>
          <div class="hidden lg:flex xl:hidden text-black hover:text-blue-500 py-2 px-3 items-center cursor-pointer dark:text-white dark:hover:text-slate-400">
            <span class="inline-flex justify-center items-center w-6 h-6">
              <svg viewBox="0 0 24 24" width="24" height="24" class="inline-block">
                <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z"></path>
              </svg>
            </span>
          </div>
          <div class="flex text-black hover:text-blue-500 my-2 mx-3 items-center cursor-pointer dark:text-white dark:hover:text-slate-400">
            <div class="relative">
              <span>Welcome to Unicare Community Health Center!</span>
            </div>
          </div>
        </div> -->
        <div class="flex-none items-stretch flex h-14 lg:hidden">
          <div class="flex text-black hover:text-blue-500 py-2 px-3 items-center cursor-pointer dark:text-white dark:hover:text-slate-400">
            <span class="inline-flex justify-center items-center w-6 h-6">
              <svg viewBox="0 0 24 24" width="24" height="24" class="inline-block">
                <path fill="currentColor" d="M12,16A2,2 0 0,1 14,18A2,2 0 0,1 12,20A2,2 0 0,1 10,18A2,2 0 0,1 12,16M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M12,4A2,2 0 0,1 14,6A2,2 0 0,1 12,8A2,2 0 0,1 10,6A2,2 0 0,1 12,4Z"></path>
              </svg>
            </span>
          </div>
        </div>
       
      </div>
    </nav>

    <aside id="aside" :class="menu ? 'lg:py-2 lg:pl-2 w-60 fixed flex z-40 top-0 h-screen transition-position overflow-hidden -left-60 lg:left-0 lg:hidden xl:flex': 'lg:py-2 lg:pl-2 w-60 fixed flex z-40 top-0 h-screen transition-position overflow-hidden left-0 lg:hidden xl:flex'">
      <div class="bg-gray-800 lg:rounded-2xl flex-1 flex flex-col overflow-hidden dark:bg-slate-900">
        <div class="bg-gray-900 text-white flex flex-row h-14 items-center justify-between dark:bg-slate-900">
          <div class="text-center flex-1 lg:text-left lg:pl-6 xl:text-center xl:pl-0">
            <b class="font-black">One</b>
          </div>
        </div>
        <div class="aside-scrollbars-gray flex-1 overflow-y-auto overflow-x-hidden">
          <ul class="pl-5">
            <template v-if="user.type === 'Admin' ">
              <li v-for="item in navigationAdmin" class="flex">
                <img :src="url + item.logo" alt="" class="inline-flex justify-center items-center h-4 w-4 mt-4">
                <router-link
                    :key="item.name"
                    :to="item.to"
                    :class="[
                    this.$route.name === item.to.name
                      ? 'flex cursor-pointer py-3 hover:text-white dark:text-slate-300 dark:hover:text-white font-bold text-white ml-5'
                      : 'flex cursor-pointer py-3 text-gray-300 hover:text-white dark:text-slate-300 dark:hover:text-white ml-5',
                    ]" exact
                    >{{ item.name }}
                </router-link>
            </li>
            </template>

            <template v-else-if="user.type === 'Bhw'">
              <li v-for="item in navigationBhw" class="flex">
                <img :src="url + item.logo" alt="" class="inline-flex justify-center items-center h-4 w-4 mt-4">
                <router-link
                    :key="item.name"
                    :to="item.to"
                    :class="[
                    this.$route.name === item.to.name
                      ? 'flex cursor-pointer py-3 hover:text-white dark:text-slate-300 dark:hover:text-white font-bold text-white ml-5'
                      : 'flex cursor-pointer py-3 text-gray-300 hover:text-white dark:text-slate-300 dark:hover:text-white ml-5',
                    ]" exact
                    >{{ item.name }}
                </router-link>
            </li>
            </template>
            
          </ul>    
        </div>
      </div> 
    </aside>
    <section class="p-6 xl:max-w-10xl xl:mx-auto">
      <router-view></router-view>
    </section>
  </div>
  </div>  
</template>
<script>
  import  store  from "../store";
  import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
  import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
  import { useStore } from 'vuex';
  import { computed } from 'vue';
  import { useRouter, useRoute } from "vue-router";

  const user = computed(() => store.state.loggedinUser.data);
  store.dispatch("getUser");


  
const url = window.location.origin + "/src/assets/image/";

const navigationAdmin = [
  { name: 'Dashboard', to: { name: 'Dashboard' }, logo: "dashboard.png" },
  { name: 'User', to: { name: 'User' }, logo: "megaphone.png" },
  { name: 'Announcement', to: { name: 'Announcement' }, logo: "megaphone.png" },
  { name: 'Vaccine', to: { name: 'Vaccine' }, logo: "vaccine (3).png" }, 
  {name: 'Vaccine Logistic', to: {name: 'Logistic'}, logo: "verify.png"},
  { name: 'Vaccinee', to: { name: 'Vaccinee' }, logo: "vaccinated.png"},
  { name: 'Barangay', to: {name: 'Barangay' }, logo: "crowd-of-users.png"},
  { name: 'Schedule', to: {name: 'Schedule' }, logo: "crowd-of-users.png"},
  {name: 'Vaccine Registration', to: {name: 'VaccineRegistration'}, logo: "verify.png"},
  {name: 'Reports', to: {name: 'Reports'}, logo: "verify.png"}
  
];

const navigationBhw = [
  { name: 'Vaccinee', to: { name: 'Vaccinee' }, logo: "vaccinated.png"},
  {name: 'Vaccine Registration', to: {name: 'VaccineRegistration'}, logo: "verify.png"},
  {name: 'Reports', to: {name: 'Reports'}, logo: "verify.png"}
];


const test = setTimeout(myGreeting, 5000);

function myGreeting() {
  var dateObj = new Date();
  var month = ("0" + (dateObj.getMonth() + 1)).slice(-2);
  var date = ("0" + dateObj.getDate()).slice(-2);
  var year = dateObj.getUTCFullYear();

  var newdate = year + "-" + month + "-" + date;

  store.dispatch("message", newdate).then(() => {
        // router.push({
        //     name: "Announcement",
        // })
  })
}

  
  export default{
    data() {
      return {
        menu: false
      }
    },
    components: {
      Disclosure,
      DisclosureButton,
      DisclosurePanel,
      Menu,
      MenuButton,
      MenuItem,
      MenuItems,
      Bars3Icon,
      BellIcon,
      XMarkIcon,
  
    },
    setup() {

      return {
        navigationBhw,
        navigationAdmin,
        url,
        myGreeting,
        user
        
      }
    }
  }
  </script>

<style>
.transition-position {
  transition-property: right,left,top,bottom,margin,padding;
    transition-timing-function: cubic-bezier(.4,0,.2,1);
    transition-duration: .15s;
}
</style>


