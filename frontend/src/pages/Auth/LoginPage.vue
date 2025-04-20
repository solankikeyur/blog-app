<template>
  <GuestLayout >
    <div class="flex items-center justify-center mt-10">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
          <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Login to your account
          </h2>
    
          <form @submit.prevent="handleLogin" method="POST" class="space-y-5" autocomplete="off">
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700"
                >Email</label
              >
              <input
                type="email"
                id="email"
                name="text"
                v-model="credentials.email"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
    
            <div>
              <label for="password" class="block text-sm font-medium text-gray-700"
                >Password</label
              >
              <input
                type="password"
                id="password"
                name="password"
                v-model="credentials.password"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
            <button
              type="submit"
              class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition"
            >
              Login
            </button>
          </form>
    
          <p class="mt-6 text-center text-sm text-gray-600">
            Don't have an account?
            <a href="#" class="text-blue-600 hover:underline">Sign up</a>
          </p>
        </div>
    </div>
  </GuestLayout>
</template>
<script setup>
import { reactive } from "vue";
import GuestLayout from "../../layouts/GuestLayout.vue";
import { useUserStore } from "../../store/userStore";
import { useRouter } from "vue-router";

const credentials = reactive({
    email : "solankikeyur@gmail.com",
    password: "Test@1234"
})

const userStore = useUserStore();
const router = useRouter();

const handleLogin = async () => {
    try {
        await userStore.loginUser(credentials);
        router.push("/my-posts")
    } catch (error) {
        console.log(error);
    }
}

</script>
