<template>
    <div class="min-h-full">
      <Disclosure as="nav" class="bg-white h-22" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-20 items-center justify-between">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <img class="h-10 w-30" src="http://127.0.0.1:5173/src/assets/image/healthcareph_2021.png" alt="Your Company" />
              </div>
              <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                  <router-link v-for="item in navigation" :key="item.name" :to="item.to" active-class="text-gray-900 hover:font-bold" :class="[this.$route.name === item.to.name ? '' : 'text-gray-900 hover:font-bold', 'px-3 py-2 rounded-md text-sm font-medium']">{{ item.name }}</router-link>
                </div>
              </div>
            </div>
            <div class="hidden md:block">
              <div class="ml-4 flex items-center md:ml-6">
                <button type="button" class="rounded-full bg-white p-1 text-gray-900 hover:font-bold focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2">
                  <span class="sr-only">View notifications</span>
                  <BellIcon class="h-6 w-6" aria-hidden="true" />
                </button>
  
                <!-- Profile dropdown -->
                <Menu as="div" class="relative ml-3">
                  <div>
                    <MenuButton class="flex max-w-xs items-center rounded-full bg-white text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-">
                      <span class="sr-only">Open user menu</span>
                      <!--User image-->
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                      </svg>
                    </MenuButton>
                  </div>
                  <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                    <MenuItems class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                      <MenuItem v-slot="{ active }">
                        <a @click="logout" :class="[' block px-4 py-2 text-sm text-gray-700']">Sign out</a>
                      </MenuItem>
                    </MenuItems>
                  </transition>
                </Menu>
              </div>
            </div>
            <div class="-mr-2 flex md:hidden">
              <!-- Mobile menu button -->
              <DisclosureButton class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                <span class="sr-only">Open main menu</span>
                <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
              </DisclosureButton>
            </div>
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
      <header class="bg-sky-400 h-11">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="flex items-center justify-between h-11">
            <div class="flex items-center">
              <span class="text-white px-3 py-2 rounded-md text-sm font-normal">Welcome to Unicare Community Health Center!</span>
            </div>
            <div class="flex items-center">
                <img src="http://127.0.0.1:5173/src/assets/image/facebook.png" class="h-5 w-5" alt="">
                <img src="http://127.0.0.1:5173/src/assets/image/email.png" class="h-5 w-5 ml-3" alt="">
                <img src="http://127.0.0.1:5173/src/assets/image/instagram.png" class="h-5 w-5 ml-3" alt="">
            </div>
            <div class="-mr-2 flex md:hidden"></div>
          </div>
      </div>
    </header>
      <router-view></router-view>
    </div>
  </template>
  
  <script>
  import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
  import { Bars3Icon, BellIcon, XMarkIcon } from '@heroicons/vue/24/outline'
  import { useStore } from 'vuex'
  import { computed } from 'vue'
  import { useRouter } from 'vue-router'
  import router from "@/router";
  
  console.log(router.currentRoute.value.fullPath)
  
  const navigation = [
    { name: 'Dashboard', to: { name: 'Dashboard' } },
    { name: 'Announcement', to: { name: 'Announcement' } },
    { name: 'Vaccine', to: { name: 'Vaccine' } },
    { name: 'Vaccinee', to: { name: 'Vaccinee' } },
    { name: 'Barangay', to: {name: 'Barangay' }}
    //{ name: 'Survey', to: { name: 'Surveys' } },
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