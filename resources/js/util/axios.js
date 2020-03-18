import axios from 'axios';
import FormErrors from '../form-errors';

const instance = axios.create();

instance.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const token = document.head.querySelector('meta[name="csrf-token"]');
instance.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

instance.interceptors.response.use(
    (response) => {
        return response;
    },

    (error) => {
        const { status } = error.response;

        if (status === 422) {
            FormErrors.setErrors(error.response.data.errors);
        }

        if (status >= 500) {
            // Nova.$emit('error', error.response.data.message);
        }

        return Promise.reject(error);
    }
);

export default instance;
