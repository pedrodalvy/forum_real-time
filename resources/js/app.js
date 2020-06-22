require('./bootstrap');

window.Vue = require('vue');

Toastr.options = {
    "progressBar": true,
    "positionClass": "toast-top-right",
    "showDuration": "500",
}

Vue.component('threads', require('./components/threads/Threads').default);
Vue.component('replies', require('./components/replies/Replie').default);

const app = new Vue({
    el: '#app',
});
