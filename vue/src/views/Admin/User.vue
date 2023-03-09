<template>
    <admin-page-component>
      
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class=" py-10 inline-block min-w-full sm:px-6 lg:px-8 bg-stone-50">
                <div class="overflow-hidden">
                    <div class="mb-4 flex justify-between items-center mt-3">
                        <div>
                            <h2 class=" text-2xl tracking-tight text-gray-900 font-medium ">User</h2>
                            <span class=" font-sm font-normal text-gray-600">List of the User</span>
                        </div>
                        <div>
                            <router-link 
                                :to="{ name: 'UserCreate' }" 
                                class="py-2 px-3 text-white bg-sky-400 rounded-md hover:bg-sky-400 text-xl"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 -mt-1 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                    Add new User
                            </router-link>
                        </div>
                        
                    </div>
               
                    <table class="w-full text-sm">
                    <thead class=" text-left">
                        <tr>
                            <th class="pt-3 py-3">Name</th>
                            <th class="pt-3 py-3">Email</th>
                            <th class="pt-3 py-3">Type</th>
                            <th class="pt-3 py-3"></th>
                         
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users">
                                <td data-label="Name" class="pt-3 py-3">{{ user.name}}</td>
                                <td data-label="Age" class="pt-3 py-3">{{ user.email }}</td>
                                <td data-label="Sex" class="pt-3 py-3">{{ user.type }}</td>
                                <td data-label="Email" class="pt-3 py-3">
                                    <div class="flex items-center mt-1 justify-center ">
                                        <router-link 
                                            :to="{name: 'UsersView', params: {id: user.id}}"
                                            class="flex py-2 px-4 text-sky-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                        </router-link>
                                        <button type="button" @click="deleteUser(user)"  class="text-red-500 text-left flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                        </tr>
                    </tbody>
                </table>
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

const users = computed(() => store.state.allUsers.data);


store.dispatch("getUsers");

function deleteUser(user){
    if (
    confirm(
      `Are you sure you want to delete this Vaccine? Operation can't be undone!!`
    )
  ) {   
    store.dispatch("deleteUser", user.id).then(() => {
        
      store.dispatch("getUsers");
    });
  }
}

</script>
<style></style>