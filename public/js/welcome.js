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
/***/ (() => {

eval("\n\n$(function () {\n  var buttons = $('button.nav-link');\n  buttons.on('click', function (event) {\n    var clickbutton = event.currentTarget;\n    console.log(clickbutton);\n    var cb_dbt = clickbutton.getAttribute('data-bs-target');\n    console.log(cb_dbt);\n    $('' + cb_dbt).css('display', 'block');\n    $('div[role=tabpanel]:not(' + cb_dbt + ')').css('display', 'none');\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvd2VsY29tZS50cy5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFDYkEsQ0FBQyxDQUFDLFlBQVk7QUFDVixNQUFJQyxPQUFPLEdBQUdELENBQUMsQ0FBZixpQkFBZSxDQUFmO0FBQ0FDLEVBQUFBLE9BQU8sQ0FBUEEsRUFBQUEsQ0FBQUEsT0FBQUEsRUFBb0IsaUJBQWlCO0FBQ2pDLFFBQUlDLFdBQVcsR0FBR0MsS0FBSyxDQUF2QjtBQUNBQyxJQUFBQSxPQUFPLENBQVBBLEdBQUFBLENBQUFBLFdBQUFBO0FBQ0EsUUFBSUMsTUFBTSxHQUFHSCxXQUFXLENBQVhBLFlBQUFBLENBQWIsZ0JBQWFBLENBQWI7QUFDQUUsSUFBQUEsT0FBTyxDQUFQQSxHQUFBQSxDQUFBQSxNQUFBQTtBQUNBSixJQUFBQSxDQUFDLENBQUMsS0FBRkEsTUFBQyxDQUFEQSxDQUFBQSxHQUFBQSxDQUFBQSxTQUFBQSxFQUFBQSxPQUFBQTtBQUNBQSxJQUFBQSxDQUFDLENBQUMscUNBQUZBLEdBQUMsQ0FBREEsQ0FBQUEsR0FBQUEsQ0FBQUEsU0FBQUEsRUFBQUEsTUFBQUE7QUFOSkMsR0FBQUE7QUFGSkQsQ0FBQyxDQUFEQSIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy93ZWxjb21lLnRzP2RlNDYiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcbiQoZnVuY3Rpb24gKCkge1xyXG4gICAgdmFyIGJ1dHRvbnMgPSAkKCdidXR0b24ubmF2LWxpbmsnKTtcclxuICAgIGJ1dHRvbnMub24oJ2NsaWNrJywgZnVuY3Rpb24gKGV2ZW50KSB7XHJcbiAgICAgICAgdmFyIGNsaWNrYnV0dG9uID0gZXZlbnQuY3VycmVudFRhcmdldDtcclxuICAgICAgICBjb25zb2xlLmxvZyhjbGlja2J1dHRvbik7XHJcbiAgICAgICAgdmFyIGNiX2RidCA9IGNsaWNrYnV0dG9uLmdldEF0dHJpYnV0ZSgnZGF0YS1icy10YXJnZXQnKTtcclxuICAgICAgICBjb25zb2xlLmxvZyhjYl9kYnQpO1xyXG4gICAgICAgICQoJycgKyBjYl9kYnQpLmNzcygnZGlzcGxheScsICdibG9jaycpO1xyXG4gICAgICAgICQoJ2Rpdltyb2xlPXRhYnBhbmVsXTpub3QoJyArIGNiX2RidCArICcpJykuY3NzKCdkaXNwbGF5JywgJ25vbmUnKTtcclxuICAgIH0pO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIiQiLCJidXR0b25zIiwiY2xpY2tidXR0b24iLCJldmVudCIsImNvbnNvbGUiLCJjYl9kYnQiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/welcome.ts\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/welcome.ts"]();
/******/ 	
/******/ })()
;