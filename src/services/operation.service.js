import axios from 'axios';
import authHeader from './auth-header';
import {AppConfig} from '../config/app_config.js';

const API_URL = AppConfig.API_URL;

class OperationService {
    getAllOperation() {
        return axios.get(API_URL + 'operation', { headers: authHeader() })
    }

    readOperation(id) {
        return axios.get(API_URL + 'operation' + '/' + id, {headers: authHeader()})
    }

    addOperation(operator_id, tool_id, toDoDate) {
        return axios.post(API_URL + 'operation', {
            operator_id: operator_id,
            tool_id: tool_id,
            toDoDate: toDoDate,
        }, {headers: authHeader()}
        )
    }
}

export default new OperationService();