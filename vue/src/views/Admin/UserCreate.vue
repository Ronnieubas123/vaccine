<template>
    <admin-page-component>
  <div v-if="userLoading" class=" h-fit ">
            <div class="loader border-t-sky-400 border-10 border-8 rounded-full w-20 h-20 animation-pulse border-t-8 absolute top-1/2 left-1/2"></div>
  </div>
  <div v-else>
    <div class="md:grid-cols-3 md:gap-6">
      <div class="md:col-span-1">
        <div class="px-4 sm:px-0">
          <h3 class="text-lg font-medium leading-6 text-gray-900">Add Barangay Form</h3>
          <!-- <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what you share.</p> -->
        </div>
      </div>
      <div class="mt-5 md:col-span-2 md:mt-0">
        <form @submit.prevent="addUser">  
          <div class="shadow sm:overflow-hidden sm:rounded-md">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Name</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input v-model="user.name" type="text" name="name" id="name" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Name" />
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Email</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input v-model="user.email" type="email" name="email" id="email" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Test@gmail.com" />
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2">
                  <label for="company-website" class="block text-sm font-medium text-gray-700">Password</label>
                  <div class="mt-1 flex rounded-md shadow-sm">
                    <input v-model="user.password" type="password" name="password" id="address" class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Password" />
                  </div>
                </div>
              </div>

              <div class="grid grid-cols-1 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company-website" class="block text-sm font-medium text-gray-700">Type</label>
                      <div class="mt-1 rounded-md">
                        <select v-model="user.type" name="location" id="location">
                          <option value="Admin">Admin</option>
                          <option value="Bhw">Barangay Health Worker</option>
                          <option value="BS">Barangay Secretary </option>
                        </select>
                      </div>
                    </div>
                  </div>
              
            </div>
            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
              <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
 
    </admin-page-component>
</template>

<script setup>
import AdminPageComponent from "../../components/AdminPageComponent.vue";
import { ref, watch,computed } from "vue";
import store from "../../store";
import { useRouter, useRoute } from "vue-router"

const router = useRouter();
const route = useRoute();
const userLoading = computed(() => store.state.currentUser.loading);

let user = ref({
    name: '',
    email: '',
    password: '',
    type: ''
});



watch(
  () => store.state.currentUser.data,
  (newVal, oldVal) => {
    user.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    }
  }
);

if (route.params.id) {
  store.dispatch("getUserss", route.params.id);
}


function addUser() {
  store.dispatch("saveUser", user.value).then(() => {
    router.push({
       name: 'User',
    });
  })
}

</script>
<style>
/* @keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.loader {
    animation: spin 2s linear infinite;
} */
</style>