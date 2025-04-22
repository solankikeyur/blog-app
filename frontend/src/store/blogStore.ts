import { defineStore } from "pinia";
import { getAllBlogs } from "../services/blogService";

interface BlogPost {
    id: number,
    title: string,
    user: object,
    body: string
}

const useBlogStore = defineStore('blog', {
    state: () => ({
        blogs: [] as Array<BlogPost>,
        loading: false as boolean
    }),
    actions: {
        async getAll() {
            this.loading = true;
            const {data} = await getAllBlogs();
            this.blogs = data.data;
            this.loading = false;
        }
    }
})

export {useBlogStore};