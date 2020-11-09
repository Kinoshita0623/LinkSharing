"use strict";

var _vue = _interopRequireDefault(require("vue"));

var _router = _interopRequireDefault(require("./router.js"));

var _vuex = _interopRequireDefault(require("vuex"));

var _store = _interopRequireDefault(require("./store"));

var _RegisterPage = _interopRequireDefault(require("./pages/RegisterPage.vue"));

var _HeaderComponent = _interopRequireDefault(require("./components/HeaderComponent.vue"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

_vue["default"].use(_vuex["default"]);

window.Vue = _vue["default"];
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

_vue["default"].component('example-component', require('./components/ExampleComponent.vue')["default"]);

_vue["default"].component('login-page', require('./pages/LoginPage.vue')["default"]);

_vue["default"].component('register-page', _RegisterPage["default"]["default"]);

_vue["default"].component('header-component', _HeaderComponent["default"]);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


var app = new _vue["default"]({
  el: '#app',
  store: _store["default"],
  router: _router["default"]
});