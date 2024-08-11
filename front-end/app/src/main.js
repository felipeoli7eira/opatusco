import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

// toast
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

// tailwind
import "./index.css";

import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.min.js";

const app = createApp(App);
app.use(router);
app.use(Toast, {});

app.mount("#app");
