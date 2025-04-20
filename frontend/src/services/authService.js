import axios from "../plugins/axios";

const login = (credentials) => {
    return axios.post('/authenticate', credentials);
}

const logout = () => {
    return axios.post('/logout');
}

export {login, logout};