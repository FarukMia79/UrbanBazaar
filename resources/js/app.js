import './bootstrap';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

// import notification class
import Notification from './Helpers/Notification';
window.Notification = Notification;

// import sweetalert2
import Swal from 'sweetalert2';
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
window.Toast = Toast;


const app = createApp(App);
app.use(router);
app.mount("#content");
