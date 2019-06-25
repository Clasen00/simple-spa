import axios from 'axios';

export default {
    create (message) {
        return axios.post(
            '/api/issues/create',
            {
                message: message,
            }
        );
    },
    getAll () {
        return axios.get('/api/issues');
    },
}