import { defineStore } from "pinia";
import { getAllBlogs } from "../services/blogService";

const useBlogStore = defineStore('blog', {
    state: () => ({
        blogs: []
    }),
    actions: {
        async getAll() {
            const {data} = await getAllBlogs();
            this.blogs = data.data;
        }
    }
})

export {useBlogStore};