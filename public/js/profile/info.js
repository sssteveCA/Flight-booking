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

/***/ "./resources/js/profile/info.ts":
/*!**************************************!*\
  !*** ./resources/js/profile/info.ts ***!
  \**************************************/
/***/ (() => {

eval("\n\n$(function () {\n  //detect showPassword checkbox changes\n  $('#showPassword').on('change', function () {\n    //console.log(\"ShowPassword change\");\n    var checked = $(this).is(\":checked\");\n\n    if (checked) {\n      $('#oldpwd').attr('type', 'text');\n      $('#newpwd').attr('type', 'text');\n      $('#confnewpwd').attr('type', 'text');\n    } else {\n      $('#oldpwd').attr('type', 'password');\n      $('#newpwd').attr('type', 'password');\n      $('#confnewpwd').attr('type', 'password');\n    }\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvcHJvZmlsZS9pbmZvLnRzLmpzIiwibWFwcGluZ3MiOiJBQUFhOztBQUNiQSxDQUFDLENBQUMsWUFBWTtBQUNWO0FBQ0FBLEVBQUFBLENBQUMsQ0FBREEsZUFBQyxDQUFEQSxDQUFBQSxFQUFBQSxDQUFBQSxRQUFBQSxFQUFnQyxZQUFZO0FBQ3hDO0FBQ0EsUUFBSUMsT0FBTyxHQUFHRCxDQUFDLENBQURBLElBQUMsQ0FBREEsQ0FBQUEsRUFBQUEsQ0FBZCxVQUFjQSxDQUFkOztBQUNBLGlCQUFhO0FBQ1RBLE1BQUFBLENBQUMsQ0FBREEsU0FBQyxDQUFEQSxDQUFBQSxJQUFBQSxDQUFBQSxNQUFBQSxFQUFBQSxNQUFBQTtBQUNBQSxNQUFBQSxDQUFDLENBQURBLFNBQUMsQ0FBREEsQ0FBQUEsSUFBQUEsQ0FBQUEsTUFBQUEsRUFBQUEsTUFBQUE7QUFDQUEsTUFBQUEsQ0FBQyxDQUFEQSxhQUFDLENBQURBLENBQUFBLElBQUFBLENBQUFBLE1BQUFBLEVBQUFBLE1BQUFBO0FBSEosV0FLSztBQUNEQSxNQUFBQSxDQUFDLENBQURBLFNBQUMsQ0FBREEsQ0FBQUEsSUFBQUEsQ0FBQUEsTUFBQUEsRUFBQUEsVUFBQUE7QUFDQUEsTUFBQUEsQ0FBQyxDQUFEQSxTQUFDLENBQURBLENBQUFBLElBQUFBLENBQUFBLE1BQUFBLEVBQUFBLFVBQUFBO0FBQ0FBLE1BQUFBLENBQUMsQ0FBREEsYUFBQyxDQUFEQSxDQUFBQSxJQUFBQSxDQUFBQSxNQUFBQSxFQUFBQSxVQUFBQTtBQUNIO0FBWkxBLEdBQUFBO0FBRkpBLENBQUMsQ0FBREEiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvcHJvZmlsZS9pbmZvLnRzPzQwMjgiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcbiQoZnVuY3Rpb24gKCkge1xyXG4gICAgLy9kZXRlY3Qgc2hvd1Bhc3N3b3JkIGNoZWNrYm94IGNoYW5nZXNcclxuICAgICQoJyNzaG93UGFzc3dvcmQnKS5vbignY2hhbmdlJywgZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIC8vY29uc29sZS5sb2coXCJTaG93UGFzc3dvcmQgY2hhbmdlXCIpO1xyXG4gICAgICAgIHZhciBjaGVja2VkID0gJCh0aGlzKS5pcyhcIjpjaGVja2VkXCIpO1xyXG4gICAgICAgIGlmIChjaGVja2VkKSB7XHJcbiAgICAgICAgICAgICQoJyNvbGRwd2QnKS5hdHRyKCd0eXBlJywgJ3RleHQnKTtcclxuICAgICAgICAgICAgJCgnI25ld3B3ZCcpLmF0dHIoJ3R5cGUnLCAndGV4dCcpO1xyXG4gICAgICAgICAgICAkKCcjY29uZm5ld3B3ZCcpLmF0dHIoJ3R5cGUnLCAndGV4dCcpO1xyXG4gICAgICAgIH1cclxuICAgICAgICBlbHNlIHtcclxuICAgICAgICAgICAgJCgnI29sZHB3ZCcpLmF0dHIoJ3R5cGUnLCAncGFzc3dvcmQnKTtcclxuICAgICAgICAgICAgJCgnI25ld3B3ZCcpLmF0dHIoJ3R5cGUnLCAncGFzc3dvcmQnKTtcclxuICAgICAgICAgICAgJCgnI2NvbmZuZXdwd2QnKS5hdHRyKCd0eXBlJywgJ3Bhc3N3b3JkJyk7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiJCIsImNoZWNrZWQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/profile/info.ts\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/profile/info.ts"]();
/******/ 	
/******/ })()
;