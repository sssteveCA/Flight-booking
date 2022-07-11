/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/auth/register.ts":
/*!***************************************!*\
  !*** ./resources/js/auth/register.ts ***!
  \***************************************/
/***/ (() => {

eval("\n\n$(function () {\n  var elements = {\n    showPasswordCheckbox: $('#fb_reg_show_pwd'),\n    password: $('#password'),\n    'password-confirm': $('#password-confirm')\n  };\n  elements['showPasswordCheckbox'].on('change', function () {\n    if ($(this).is(':checked')) {\n      elements['password'].attr('type', 'text');\n      elements['password-confirm'].attr('type', 'text');\n    } else {\n      elements['password'].attr('type', 'password');\n      elements['password-confirm'].attr('type', 'password');\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvYXV0aC9yZWdpc3Rlci50cy5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFDYkEsQ0FBQyxDQUFDLFlBQVk7QUFDVixNQUFJQyxRQUFRLEdBQUc7QUFDWEMsSUFBQUEsb0JBQW9CLEVBQUVGLENBQUMsQ0FEWixrQkFDWSxDQURaO0FBRVhHLElBQUFBLFFBQVEsRUFBRUgsQ0FBQyxDQUZBLFdBRUEsQ0FGQTtBQUdYLHdCQUFvQkEsQ0FBQztBQUhWLEdBQWY7QUFLQUMsRUFBQUEsUUFBUSxDQUFSQSxzQkFBUSxDQUFSQSxDQUFBQSxFQUFBQSxDQUFBQSxRQUFBQSxFQUE4QyxZQUFZO0FBQ3RELFFBQUlELENBQUMsQ0FBREEsSUFBQyxDQUFEQSxDQUFBQSxFQUFBQSxDQUFKLFVBQUlBLENBQUosRUFBNEI7QUFDeEJDLE1BQUFBLFFBQVEsQ0FBUkEsVUFBUSxDQUFSQSxDQUFBQSxJQUFBQSxDQUFBQSxNQUFBQSxFQUFBQSxNQUFBQTtBQUNBQSxNQUFBQSxRQUFRLENBQVJBLGtCQUFRLENBQVJBLENBQUFBLElBQUFBLENBQUFBLE1BQUFBLEVBQUFBLE1BQUFBO0FBRkosV0FJSztBQUNEQSxNQUFBQSxRQUFRLENBQVJBLFVBQVEsQ0FBUkEsQ0FBQUEsSUFBQUEsQ0FBQUEsTUFBQUEsRUFBQUEsVUFBQUE7QUFDQUEsTUFBQUEsUUFBUSxDQUFSQSxrQkFBUSxDQUFSQSxDQUFBQSxJQUFBQSxDQUFBQSxNQUFBQSxFQUFBQSxVQUFBQTtBQUNIO0FBUkxBLEdBQUFBO0FBTkpELENBQUMsQ0FBREEiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYXV0aC9yZWdpc3Rlci50cz85ODBiIl0sInNvdXJjZXNDb250ZW50IjpbIlwidXNlIHN0cmljdFwiO1xyXG4kKGZ1bmN0aW9uICgpIHtcclxuICAgIHZhciBlbGVtZW50cyA9IHtcclxuICAgICAgICBzaG93UGFzc3dvcmRDaGVja2JveDogJCgnI2ZiX3JlZ19zaG93X3B3ZCcpLFxyXG4gICAgICAgIHBhc3N3b3JkOiAkKCcjcGFzc3dvcmQnKSxcclxuICAgICAgICAncGFzc3dvcmQtY29uZmlybSc6ICQoJyNwYXNzd29yZC1jb25maXJtJylcclxuICAgIH07XHJcbiAgICBlbGVtZW50c1snc2hvd1Bhc3N3b3JkQ2hlY2tib3gnXS5vbignY2hhbmdlJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIGlmICgkKHRoaXMpLmlzKCc6Y2hlY2tlZCcpKSB7XHJcbiAgICAgICAgICAgIGVsZW1lbnRzWydwYXNzd29yZCddLmF0dHIoJ3R5cGUnLCAndGV4dCcpO1xyXG4gICAgICAgICAgICBlbGVtZW50c1sncGFzc3dvcmQtY29uZmlybSddLmF0dHIoJ3R5cGUnLCAndGV4dCcpO1xyXG4gICAgICAgIH1cclxuICAgICAgICBlbHNlIHtcclxuICAgICAgICAgICAgZWxlbWVudHNbJ3Bhc3N3b3JkJ10uYXR0cigndHlwZScsICdwYXNzd29yZCcpO1xyXG4gICAgICAgICAgICBlbGVtZW50c1sncGFzc3dvcmQtY29uZmlybSddLmF0dHIoJ3R5cGUnLCAncGFzc3dvcmQnKTtcclxuICAgICAgICB9XHJcbiAgICB9KTtcclxufSk7XHJcbiJdLCJuYW1lcyI6WyIkIiwiZWxlbWVudHMiLCJzaG93UGFzc3dvcmRDaGVja2JveCIsInBhc3N3b3JkIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/auth/register.ts\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/auth/register.ts"]();
/******/ 	
/******/ })()
;