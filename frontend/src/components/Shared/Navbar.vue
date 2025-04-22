<template>
  <nav class="bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <span class="text-xl font-bold text-blue-600">Blog App</span>
        </div>
        <div class="hidden md:flex items-center space-x-6">
          <a href="#" class="text-gray-700 hover:text-blue-600">Home</a>
          <router-link to="all-posts" class="text-gray-700 hover:text-blue-600">All Blogs</router-link>
          <router-link :class="`text-gray-700 hover:text-blue-600`" to="my-posts" v-if="isAuthenticated">My Blogs</router-link>
          <div class="nav-right" v-if="isAuthenticated" >
            <button @click="handleLogout" >Logout</button> 
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>
<script setup lang="ts">
import { useRouter } from 'vue-router';
import { useUserStore } from '../../store/userStore.ts';

const router = useRouter();
const {isAuthenticated} = useUserStore();

const handleLogout = async () => {
  await useUserStore().logoutUser();
  router.push("/login");
}
</script>
