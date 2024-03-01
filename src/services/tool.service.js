import axios from 'axios';
import authHeader from './auth-header';
import {AppConfig} from '../config/app_config.js';
import {config} from "@fortawesome/fontawesome-svg-core";

const API_URL = AppConfig.API_URL;

class ToolService {
    getAllTool() {
        return axios.get(API_URL + 'tool', { headers: authHeader() })
    }

    readTool(id) {
        console.log('ToolService - read() : ', API_URL + 'tool/' + id);
        return axios.get(API_URL + 'tool' + '/' + id, { headers: authHeader() })
    }

    addTool(number, serialId, localisation, dateNextOperation, category) {
        console.log(number, serialId, localisation, dateNextOperation, category)
        return axios.post(API_URL + 'tool', {
            number: number,
            serialId: serialId,
            localisation: localisation,
            dateNextOperation: dateNextOperation,
            category: category,
        }, { headers: authHeader() })
    }

    updateTool(number, id) {

        console.log('ToolService() : number->', number,', id : ', id)
        return axios.put(API_URL + 'tool' + '/' + id, {
            number: number
        }, { headers: authHeader() })
    }
}

export default new ToolService();