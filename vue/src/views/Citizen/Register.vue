<template>
  <div class="lg:w-6/12 px-4 md:px-0">
    <div class="md:p-20 md:mx-6">
        <div class="text-center mb-8">
          <img
              class="mx-auto w-48"
              src="http://127.0.0.1:5173/src/assets/image/healthcareph_2021.png"
              alt="logo"
              />
          <h4 class="text-xl font-semibold  mb-1 mt-5 pb-1">Welcome to Unicare Community Health Center!</h4>
          <p class="mt-2 text-center text-sm text-gray-600">
            Or 
            {{ '' }}
            <router-link :to="{ name: 'Login' }" class="font-medium text-sky-400 hover:text-sky-300">login to your account</router-link>
          </p>
        </div>
        <form @submit="register">
          <input type="hidden" name="remember" value="true" />  
          <div class="mb-4">
            <input
              type="text"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="fullname"
              placeholder="Full Name"
              name="name"
              autocomplete="name"
              required=""
              v-model="user.name"
            />
          </div>
          <div class="mb-4">
            <input
              type="email"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="email-address"
              placeholder="Email Address"
              name="email"
              autocomplete="email"
              required=""
              v-model="user.email"
            />
          </div>
          <div class="mb-4">
            <input
              type="password"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="confirmpassword"
              placeholder="Password"
              name="password"
              autocomplete="current-passwor"
              required=""
              v-model="user.password"
            />
          </div>
          <div class="mb-4">
            <input
              type="password"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              id="password"
              placeholder="Confirm Password"
              name="password"
              autocomplete="current-passwor"
              required=""
              v-model="user.password_confirmation"
            />
          </div>
          <div class="text-center pt-1 mb-12 pb-1">
            <button
              class="bg-sky-400 inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
              type="submit"
              data-mdb-ripple="true"
              data-mdb-ripple-color="light"
            >
              Sign in
            </button>
            <a class="text-gray-500" href="#!">Forgot password?</a>
          </div>
        </form>
      </div>
  </div>
</template>
<script setup>
  import store from "../../store"
  import { useRouter } from "vue-router"

  const router = useRouter();

  const user = {
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  }
  
  function register(ev) {
    ev.preventDefault();
    store
      .dispatch('register', user)
      .then((res) => {
        router.push({
          name: 'Dashboard'
        })
      })
  }
</script>
<style></style>