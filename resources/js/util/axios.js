import axios from "axios";

const instance = axios.create();

instance.interceptors.response.use(
    (response) => {
        return response;
    },

    (error) => {
        const { status } = error.response;

        if (status >= 500) {
            Anodyne.$emit("error", error.response.data.message);
        }

        return Promise.reject(error);
    }
);

export default instance;
