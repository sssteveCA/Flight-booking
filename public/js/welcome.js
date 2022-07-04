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

eval("\n\n$(function () {\n  var buttons = $('button.nav-link');\n  buttons.on('click', function (event) {\n    var clickbutton = event.currentTarget;\n    console.log(clickbutton);\n    var cb_dbt = clickbutton.getAttribute('data-bs-target');\n    var cb_id = clickbutton.getAttribute('id');\n    console.log(cb_id);\n    $('' + cb_dbt).css('display', 'block');\n    $('div[role=tabpanel]:not(' + cb_dbt + ')').css('display', 'none');\n\n    if (cb_id == 'events-tab') {//User want see flight events list\n    } //if(cb_id == 'events_tab'){\n\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvd2VsY29tZS50cy5qcyIsIm1hcHBpbmdzIjoiQUFBYTs7QUFDYkEsQ0FBQyxDQUFDLFlBQVk7QUFDVixNQUFJQyxPQUFPLEdBQUdELENBQUMsQ0FBZixpQkFBZSxDQUFmO0FBQ0FDLEVBQUFBLE9BQU8sQ0FBUEEsRUFBQUEsQ0FBQUEsT0FBQUEsRUFBb0IsaUJBQWlCO0FBQ2pDLFFBQUlDLFdBQVcsR0FBR0MsS0FBSyxDQUF2QjtBQUNBQyxJQUFBQSxPQUFPLENBQVBBLEdBQUFBLENBQUFBLFdBQUFBO0FBQ0EsUUFBSUMsTUFBTSxHQUFHSCxXQUFXLENBQVhBLFlBQUFBLENBQWIsZ0JBQWFBLENBQWI7QUFDQSxRQUFJSSxLQUFLLEdBQUdKLFdBQVcsQ0FBWEEsWUFBQUEsQ0FBWixJQUFZQSxDQUFaO0FBQ0FFLElBQUFBLE9BQU8sQ0FBUEEsR0FBQUEsQ0FBQUEsS0FBQUE7QUFDQUosSUFBQUEsQ0FBQyxDQUFDLEtBQUZBLE1BQUMsQ0FBREEsQ0FBQUEsR0FBQUEsQ0FBQUEsU0FBQUEsRUFBQUEsT0FBQUE7QUFDQUEsSUFBQUEsQ0FBQyxDQUFDLHFDQUFGQSxHQUFDLENBQURBLENBQUFBLEdBQUFBLENBQUFBLFNBQUFBLEVBQUFBLE1BQUFBOztBQUNBLFFBQUlNLEtBQUssSUFBVCxjQUEyQixDQUN2QjtBQVQ2QixNQVUvQjs7QUFWTkwsR0FBQUE7QUFGSkQsQ0FBQyxDQUFEQSIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy93ZWxjb21lLnRzP2RlNDYiXSwic291cmNlc0NvbnRlbnQiOlsiXCJ1c2Ugc3RyaWN0XCI7XHJcbiQoZnVuY3Rpb24gKCkge1xyXG4gICAgdmFyIGJ1dHRvbnMgPSAkKCdidXR0b24ubmF2LWxpbmsnKTtcclxuICAgIGJ1dHRvbnMub24oJ2NsaWNrJywgZnVuY3Rpb24gKGV2ZW50KSB7XHJcbiAgICAgICAgdmFyIGNsaWNrYnV0dG9uID0gZXZlbnQuY3VycmVudFRhcmdldDtcclxuICAgICAgICBjb25zb2xlLmxvZyhjbGlja2J1dHRvbik7XHJcbiAgICAgICAgdmFyIGNiX2RidCA9IGNsaWNrYnV0dG9uLmdldEF0dHJpYnV0ZSgnZGF0YS1icy10YXJnZXQnKTtcclxuICAgICAgICB2YXIgY2JfaWQgPSBjbGlja2J1dHRvbi5nZXRBdHRyaWJ1dGUoJ2lkJyk7XHJcbiAgICAgICAgY29uc29sZS5sb2coY2JfaWQpO1xyXG4gICAgICAgICQoJycgKyBjYl9kYnQpLmNzcygnZGlzcGxheScsICdibG9jaycpO1xyXG4gICAgICAgICQoJ2Rpdltyb2xlPXRhYnBhbmVsXTpub3QoJyArIGNiX2RidCArICcpJykuY3NzKCdkaXNwbGF5JywgJ25vbmUnKTtcclxuICAgICAgICBpZiAoY2JfaWQgPT0gJ2V2ZW50cy10YWInKSB7XHJcbiAgICAgICAgICAgIC8vVXNlciB3YW50IHNlZSBmbGlnaHQgZXZlbnRzIGxpc3RcclxuICAgICAgICB9IC8vaWYoY2JfaWQgPT0gJ2V2ZW50c190YWInKXtcclxuICAgIH0pO1xyXG59KTtcclxuIl0sIm5hbWVzIjpbIiQiLCJidXR0b25zIiwiY2xpY2tidXR0b24iLCJldmVudCIsImNvbnNvbGUiLCJjYl9kYnQiLCJjYl9pZCJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/welcome.ts\n");

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