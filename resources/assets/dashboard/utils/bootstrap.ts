/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 * @format
 */
import axios from 'axios';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import Vue from 'vue';

import { BROADCAST, cRef } from './consts';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = cRef;

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */
window.Pusher = Pusher;
window.Echo = new Echo(BROADCAST);
Vue.prototype.$http = axios;
