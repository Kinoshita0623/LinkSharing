"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = void 0;

var _vueRouter = _interopRequireDefault(require("vue-router"));

var _vue = _interopRequireDefault(require("vue"));

var _LoginPage = _interopRequireDefault(require("./pages/LoginPage.vue"));

var _RegisterPage = _interopRequireDefault(require("./pages/RegisterPage.vue"));

var _HomePage = _interopRequireDefault(require("./pages/HomePage.vue"));

var _store = _interopRequireDefault(require("./store"));

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { "default": obj }; }

_vue["default"].use(_vueRouter["default"]);

var _default = new _vueRouter["default"]({
  mode: 'history',
  routes: [{
    path: '/',
    component: _HomePage["default"],
    name: 'home',
    beforeEnter: function beforeEnter(to, from, next) {
      if (_store["default"].state.token == null) {
        next('/login');
      } else {
        next();
      }
    }
  }, {
    path: '/login',
    name: 'login',
    component: _LoginPage["default"]
  }, {
    path: '/register',
    name: 'register',
    component: _RegisterPage["default"]
  }]
});

exports["default"] = _default;