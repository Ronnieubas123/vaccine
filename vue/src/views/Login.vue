<template>
  <div class="lg:w-6/12 px-4 md:px-0">
    <div class="md:p-20 md:mx-6">
        <div class="text-center mb-8">
          <h2 class="text-3xl font-bold mb-1 mt-5 pb-1 text-cyan-500">BAKREK</h2>
          <h4 class="text-xl font-semibold mb-1 mt-5 pb-1">All-In-One Vaccination Program for Barangay Health Center</h4>
          <!-- <p class="mt-2 text-center text-sm text-gray-600">
            Or 
            {{ '' }}
            <router-link :to="{ name: 'Register'}" class="font-medium text-sky-400 hover:text-sky-300">
              register for free
            </router-link>
          </p> -->
        </div>
        <form @submit="login">
          <div v-if="errorMsg" class="flex items-center justify-between py-3 px-5 bg-red-500 text-white rounded">
            {{ errorMsg }}
              <span @click="errorMsg= ''" class="w-8 h-8 flex item-center justify-center rounded-full transition-colors cursor-pointer hover:bg-[rgba(0,0,0,0.2)]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" className="w-6 h-6">
                  <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </span>
          </div>
          <p class="mb-4">Please login to your account</p>
          <input type="hidden" name="remember" value="true" />
          <div class="mb-4">
            <input
              type="text"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="email-address"
              placeholder="Username"
              v-model="user.email"
              required=""
              autocomplete="email"
              name="email"
            />
          </div>
          <div class="mb-4">
            <input
              type="password"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="password"
              placeholder="password"
              name="passowrd"
              autocomplete="current-password"
              required=""
              v-model="user.password"
            />
          </div>
          <div class="text-center pt-1 mb-12 pb-1">
            <button
              class="bg-sky-400 inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
              type="submit"
              data-mdb-ripple="true"
              data-mdb-ripple-color="light"
            >
              Log in
            </button>
            <!-- <a class="text-gray-500" href="#!">Forgot password?</a> -->
          </div>
                  <!-- <div class="flex items-center justify-between pb-6">
                    <p class="mb-0 mr-2">Don't have an account?</p>
                    <button
                      type="submit"
                      class="inline-block px-6 py-2 border-2 border-red-600 text-red-600 font-medium text-xs leading-tight uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                      data-mdb-ripple="true"
                      data-mdb-ripple-color="light"
                    >
                      Danger
                    </button>
                  </div> -->
        </form>
      </div>
  </div>
</template>
<script setup>
import store from '../store'
import { useRouter } from 'vue-router'
import { ref, computed } from 'vue'

const router = useRouter();

// const userType = computed(() => store.state.user.type);

const user = {
  email: '',
  password: '',
  remember: false
}

let errorMsg = ref('');

function login(ev) {
  ev.preventDefault();
  store.dispatch('login', user)
    .then(() => {
      if (store.state.user.type === 'Admin') {
          router.push({ 
             name: 'Dashboard'
          })
      } else if(store.state.user.type === 'Bhw') {
          router.push({ 
             name: 'Vaccinee'
          })
      } else if (store.state.user.type === 'BS') {
          router.push({ 
             name: 'Reports'
          })
      }
      
    })
    .catch(err => {
      errorMsg.value = err.response.data.error
    })
}
</script>
<style></style>