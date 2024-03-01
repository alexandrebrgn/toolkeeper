import axios from 'axios';
import {AppConfig} from '../config/app_config.js';

const API_URL = AppConfig.API_URL;

class AuthService {
    login(user) {
        console.log('Authservice - login')
        return axios
            .post(API_URL + 'login', {
                email: user.email,
                password: user.password
            })
            .then(response => {
                if (response.data.success.token) {
                    console.log('AuthService : ', response.data.success);
                    localStorage.setItem('user', JSON.stringify(response.data));
                //     localStorage.setItem('token', JSON.stringify(response.data.success.token));
                } else {
                    console.log('erreur');
                }
                return response.data;
            });
    }

    logout() {
        localStorage.removeItem('user');
    }

    register(user) {
        console.log('Authservice - register')
        return axios
            .post(API_URL + 'register', {
            firstName: user.firstName,
            lastName: user.lastName,
            email: user.email,
            password: user.password
            })
            .then(response => {
            if (response.data.success.token) {
                console.log('AuthService | register: ', response.data.success);
                localStorage.setItem('user', JSON.stringify(response.data));
                //     localStorage.setItem('token', JSON.stringify(response.data.success.token));
            } else {
                console.log('erreur');
            }
            return response.data;
        });;
    }
}

export default new AuthService();