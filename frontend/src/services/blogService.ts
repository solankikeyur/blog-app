import axios from "../plugins/axios";

const getAllBlogs = async () => {
    return await axios.get('/blog-post/all');
}

export {getAllBlogs};