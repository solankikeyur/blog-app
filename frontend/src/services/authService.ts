import axios from "../plugins/axios";

const login = (credentials: object) => {
    return axios.post('/authenticate', credentials);
}

const logout = () => {
    return axios.post('/logout');
}

export {login, logout};