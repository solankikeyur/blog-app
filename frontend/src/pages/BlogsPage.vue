<template>
  <GuestLayout>
    <section class="max-w-5xl mx-auto px-4 py-12">
      <h1 class="text-3xl font-bold mb-8 text-center">All Blog Posts</h1>
      <h2 v-if="loading">Loading...</h2>
      <div class="space-y-8" v-if="blogs.length > 0 && !loading" >
        <!-- Blog Post 1 -->
        <BlogItem v-for="blog in blogs" :title="blog.title" :body="blog.body" :key="blog.id" ></BlogItem>
      </div>
    </section>
  </GuestLayout>
</template>

<script setup lang="ts">
import { onMounted } from "vue";
import BlogItem from "../components/Blog/BlogItem.vue";
import GuestLayout from "../layouts/GuestLayout.vue";
import { useBlogStore } from "../store/blogStore";
import { storeToRefs } from "pinia";

const {blogs, loading} = storeToRefs(useBlogStore());

onMounted(() => {
    useBlogStore().getAll();
})

</script>
