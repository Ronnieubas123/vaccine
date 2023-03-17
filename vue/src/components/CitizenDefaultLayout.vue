<template>
    <div class="min-h-full">
    <!-- <header class="bg-sky-400 h-11">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-11">
            <div class="flex items-center">
              <span class="text-white px-3 py-2 rounded-md text-sm font-normal">All in one Vaccination Program for barangay health center</span>
            </div>
            <div class="flex items-center">
                <img src="http://127.0.0.1:5173/src/assets/image/facebook.png" class="h-5 w-5" alt="">
                <img src="http://127.0.0.1:5173/src/assets/image/email.png" class="h-5 w-5 ml-3" alt="">
                <img src="http://127.0.0.1:5173/src/assets/image/instagram.png" class="h-5 w-5 ml-3" alt="">
            </div>
            <div class="-mr-2 flex md:hidden"></div>
          </div>
      </div>
    </header> -->
      <Disclosure as="nav" class="bg-white h-22 shadow-md" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-28">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <h1 class="text-3xl header font-bold md:text-sm">BAKREK</h1>
              </div>
            </div>
            <div>
                <div>
                <div class="ml-10 flex items-baseline space-x-4">
                  <router-link v-for="item in navigation" :key="item.name" :to="item.to" active-class="text-gray-900 hover:font-bold" :class="[this.$route.name === item.to.name ? '' : 'text-gray-900 hover:font-bold', 'px-3 py-2 rounded-md text-lg font-medium']">{{ item.name }}</router-link>
                </div>
              </div>
            </div>
            <!-- <div class="-mr-2 flex md:hidden">
              <DisclosureButton class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="sr-only">Open main menu</span>
                <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
              </DisclosureButton>
            </div> -->
          </div>
        </div>
  
        <DisclosurePanel class="md:hidden">
          <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
            <router-link v-for="item in navigation" :key="item.name" as="a" :to="item.to" active-class="bg-gray-900 text-white" :class="[this.$route.name === item.to.name ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white', 'block px-3 py-2 rounded-md text-base font-medium']">{{ item.name }}</router-link>
          </div>
          <div class="border-t border-gray-700 pt-4 pb-3">
            <div class="flex items-center px-5">
              <div class="flex-shrink-0">
                <!--User image-->
                <img class="h-10 w-10 rounded-full" src="" alt="" />
              </div>
              <div class="ml-3">
                <div class="text-base font-medium leading-none text-white">{{ user.name }}</div>
                <div class="text-sm font-medium leading-none text-gray-400">{{ user.email }}</div>
              </div>
              <button type="button" class="ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="sr-only">View notifications</span>
                <BellIcon class="h-6 w-6" aria-hidden="true" />
              </button>
            </div>
            <div class="mt-3 space-y-1 px-2">
              <DisclosureButton as="a" @click="logout"  class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</DisclosureButton>
            </div>
          </div>
        </DisclosurePanel>
      </Disclosure>
      
      <router-view></router-view>
    </div>
  </template>
  
  <script>
  import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
  import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
  import { useStore } from 'vuex'
  import { computed } from 'vue'
  import { useRouter } from 'vue-router'
  
  
  
  const navigation = [
    { name: 'Home', to: { name: 'LandingPage' } },
    { name: 'Track Request Status', to: { name: 'TrackRequestStatus' } },
    { name: 'Announcement', to: { name: 'CitizineAnnouncement' } }
  ]
  
  export default{
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
      // const store = useStore(); 
      // const router = useRouter();
  
      // function logout() {
      //   store.dispatch("logout")
      //   .then(() => {
      //     router.push({
      //       name: "Login",
      //     });
      //   });
      // }
      return {
       // user: computed(() => store.state.user.data),
        navigation
        //logout
      }
    }
  }
  </script>
<style>
  @media screen and (max-width: 768px) {
  .header {
    font-size: 20px !important;
  }
  a.text-gray-900.hover\:font-bold.px-3.py-2.rounded-md.text-lg.font-medium {
    font-size: 13px !important;
    margin-left: 0px;
  }
}
</style>