/** @format */

import { extend, localize } from 'vee-validate';
import { min, required, email, confirmed } from 'vee-validate/dist/rules';
import en from 'vee-validate/dist/locale/en.json';

// Install rules
extend('required', required);
extend('min', min);
extend('email', email);
extend('confirmed', email);

// Install messages
localize({
    en,
});
