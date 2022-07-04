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

/***/ "./resources/js/welcome.ts":
/*!*********************************!*\
  !*** ./resources/js/welcome.ts ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n$(function () {\n  var buttons = $('button.nav-link');\n  buttons.on('click', function (event) {\n    var clickbutton = event.currentTarget;\n    console.log(clickbutton);\n    var cb_dbt = clickbutton.getAttribute('data-bs-target');\n    console.log(cb_dbt);\n    $('' + cb_dbt).css('display', 'block');\n    $('div[role=tabpanel]:not(' + cb_dbt + ')').css('display', 'none');\n  });\n});\n//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvd2VsY29tZS50cy5qcyIsIm1hcHBpbmdzIjoiO0FBQUFBLENBQUMsQ0FBQyxZQUFZO0FBQ1YsTUFBSUMsT0FBTyxHQUFHRCxDQUFDLENBQWYsaUJBQWUsQ0FBZjtBQUNBQyxFQUFBQSxPQUFPLENBQVBBLEVBQUFBLENBQUFBLE9BQUFBLEVBQW9CLGlCQUFpQjtBQUNqQyxRQUFJQyxXQUFXLEdBQUdDLEtBQUssQ0FBdkI7QUFDQUMsSUFBQUEsT0FBTyxDQUFQQSxHQUFBQSxDQUFBQSxXQUFBQTtBQUNBLFFBQUlDLE1BQU0sR0FBR0gsV0FBVyxDQUFYQSxZQUFBQSxDQUFiLGdCQUFhQSxDQUFiO0FBQ0FFLElBQUFBLE9BQU8sQ0FBUEEsR0FBQUEsQ0FBQUEsTUFBQUE7QUFDQUosSUFBQUEsQ0FBQyxDQUFDLEtBQUZBLE1BQUMsQ0FBREEsQ0FBQUEsR0FBQUEsQ0FBQUEsU0FBQUEsRUFBQUEsT0FBQUE7QUFDQUEsSUFBQUEsQ0FBQyxDQUFDLHFDQUFGQSxHQUFDLENBQURBLENBQUFBLEdBQUFBLENBQUFBLFNBQUFBLEVBQUFBLE1BQUFBO0FBTkpDLEdBQUFBO0FBRkpELENBQUMsQ0FBREEiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvd2VsY29tZS50cz9kZTQ2Il0sInNvdXJjZXNDb250ZW50IjpbIiQoZnVuY3Rpb24gKCkge1xyXG4gICAgdmFyIGJ1dHRvbnMgPSAkKCdidXR0b24ubmF2LWxpbmsnKTtcclxuICAgIGJ1dHRvbnMub24oJ2NsaWNrJywgZnVuY3Rpb24gKGV2ZW50KSB7XHJcbiAgICAgICAgdmFyIGNsaWNrYnV0dG9uID0gZXZlbnQuY3VycmVudFRhcmdldDtcclxuICAgICAgICBjb25zb2xlLmxvZyhjbGlja2J1dHRvbik7XHJcbiAgICAgICAgdmFyIGNiX2RidCA9IGNsaWNrYnV0dG9uLmdldEF0dHJpYnV0ZSgnZGF0YS1icy10YXJnZXQnKTtcclxuICAgICAgICBjb25zb2xlLmxvZyhjYl9kYnQpO1xyXG4gICAgICAgICQoJycgKyBjYl9kYnQpLmNzcygnZGlzcGxheScsICdibG9jaycpO1xyXG4gICAgICAgICQoJ2Rpdltyb2xlPXRhYnBhbmVsXTpub3QoJyArIGNiX2RidCArICcpJykuY3NzKCdkaXNwbGF5JywgJ25vbmUnKTtcclxuICAgIH0pO1xyXG59KTtcclxuZXhwb3J0IHt9O1xyXG4iXSwibmFtZXMiOlsiJCIsImJ1dHRvbnMiLCJjbGlja2J1dHRvbiIsImV2ZW50IiwiY29uc29sZSIsImNiX2RidCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/welcome.ts\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/welcome.ts"](0, __webpack_exports__, __webpack_require__);
/******/ 	
/******/ })()
;