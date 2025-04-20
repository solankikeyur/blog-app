import axios from "axios";
import {useUserStore} from "../store/userStore";
import router from "../router";


const instance = axios.create({
  baseURL: "http://127.0.0.1:8000/api/",
  headers: {
    Accept: "application/json",
  },
});

instance.interceptors.response.use(
  (response) => response,
  (error) => {
    const userStore = useUserStore();

    if (error.response.data) {
        const status = error.response.status;
        if(status === 422) {
            const validationErrors = error.response.data.errors;
            return Promise.reject(validationErrors);
        } else if(status === 401) {
          userStore.token = null;
          userStore.user = null;
          localStorage.removeItem('token');
          router.push({path: '/login'});
        }
        return Promise.reject(error.response.data)
    } 
    return Promise.reject(error);
  }
);

instance.interceptors.request.use(
  (config) => {
    const {token} = useUserStore();
    if (token) {
      config.headers['Authorization'] = `Bearer ${token}`
    }
    return config;
  }
)

export default instance;
