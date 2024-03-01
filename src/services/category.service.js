import axios from 'axios';
import authHeader from './auth-header';
import {AppConfig} from '../config/app_config.js';

const API_URL = AppConfig.API_URL;

class CategoryService {
    /**
     *
     * @returns {Promise<axios.AxiosResponse<any>>}
     */
    getAllCategory() {
        return axios.get(API_URL + 'category', { headers: authHeader() })
    }

    /**
     *
     * @param id
     * @returns {Promise<axios.AxiosResponse<any>>}
     */
    readCategory(id) {
        console.log('CategoryService - read() : ', API_URL + 'category/' + id);
        return axios.get(API_URL + 'category' + '/' + id, { headers: authHeader() })
    }

    addCategory(name) {
        return axios.post(API_URL + 'category', {
            name:name
        }, { headers: authHeader() })
    }
}

export default new CategoryService();