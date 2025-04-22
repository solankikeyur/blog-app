import { defineStore } from "pinia";
import { login, logout } from "../services/authService";


export const useUserStore = defineStore('user', {
    state: () => ({
        user: null as object | null,
        token: localStorage.getItem("token") || '' as string
    }),

    getters: {
        isAuthenticated: (state): boolean => {
            return state.token ? true : false;
        }
    },

    actions: {
        async loginUser(credentials: object) {
            const {data} = await login(credentials);
            this.token = data.data.token;
            localStorage.setItem('token', this.token);
            this.user = data.data.user;
        },
        async logoutUser() {
            await logout();
            this.token = '';
            localStorage.removeItem('token');
            this.user = null;
        }
    }
})