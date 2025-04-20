import { defineStore } from "pinia";
import { login, logout } from "../services/authService";

export const useUserStore = defineStore('user', {
    state: () => ({
        user : null,
        token: localStorage.getItem("token") || null
    }),

    getters: {
        isAuthenticated: (state) => {
            return state.token ? true : false;
        }
    },

    actions: {
        async loginUser(credentials) {
            const {data} = await login(credentials);
            this.token = data.data.token;
            localStorage.setItem('token', this.token);
            this.user = data.data.user;
        },
        async logoutUser() {
            await logout();
            this.token = null;
            localStorage.removeItem('token');
            this.user = null;
        }
    }
})