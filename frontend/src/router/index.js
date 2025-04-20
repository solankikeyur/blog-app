import { createRouter, createWebHistory } from "vue-router";
import LoginPage from "../pages/Auth/LoginPage.vue";
import MyBlogsPage from "../pages/MyBlogsPage.vue";
import BlogsPage from "../pages/BlogsPage.vue";

const routes = [
  { path: "/login", component: LoginPage },
  { path: "/my-posts", component: MyBlogsPage },
  { path: "/all-posts", component: BlogsPage },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
