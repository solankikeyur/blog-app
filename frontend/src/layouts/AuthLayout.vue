<template>
  <body class="flex flex-col min-h-screen">
    <Navbar></Navbar>
    <main class="flex-grow">
      <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold text-gray-800">Welcome to MySite</h1>
      </div>
    </main>
    <Footer></Footer>
  </body>
</template>
<script setup>
import Navbar from "../components/Shared/Navbar.vue";
import Footer from "../components/Shared/Footer.vue";
import { onMounted } from "vue";
import { useUserStore } from "../store/userStore";
import { useRouter } from "vue-router";

const {isAuthenticated} = useUserStore();
const router = useRouter();

onMounted(() => {
  if(!isAuthenticated) {
    router.push('/login');
  }
});
</script>
