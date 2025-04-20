<template>
  <body class="flex flex-col min-h-screen">
    <Navbar></Navbar>
    <main class="flex-grow">
      <slot />
    </main>
    <Footer></Footer>
  </body>
</template>
<script setup>
import Navbar from "../components/Shared/Navbar.vue";
import Footer from "../components/Shared/Footer.vue";
</script>
