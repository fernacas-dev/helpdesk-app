import axiosLib from "axios";
window.axios = axiosLib;

window.axios.defaults.withCredentials = true;

window.axios.defaults.withXSRFToken = true;

// window.axios.defaults.xsrfCookieName = "XSRF-TOKEN";
window.axios.defaults.xsrfHeaderName = "X-XSRF-TOKEN";

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

export const axios = window.axios;
