/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */
window.cheet = require('cheet.js');
window.$ = window.jQuery = require('jquery');
jQuery.noConflict();
require('./libs/lettering.min');
require('bootstrap-sass');
require('./menu');
require('./filter');
require('./faq');