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

/***/ "./resources/js/classes/flighteventslist.ts":
/*!**************************************************!*\
  !*** ./resources/js/classes/flighteventslist.ts ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony import */ var _values_constants__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../values/constants */ \"./resources/js/values/constants.ts\");\nvar __awaiter = undefined && undefined.__awaiter || function (thisArg, _arguments, P, generator) {\n  function adopt(value) {\n    return value instanceof P ? value : new P(function (resolve) {\n      resolve(value);\n    });\n  }\n\n  return new (P || (P = Promise))(function (resolve, reject) {\n    function fulfilled(value) {\n      try {\n        step(generator.next(value));\n      } catch (e) {\n        reject(e);\n      }\n    }\n\n    function rejected(value) {\n      try {\n        step(generator[\"throw\"](value));\n      } catch (e) {\n        reject(e);\n      }\n    }\n\n    function step(result) {\n      result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected);\n    }\n\n    step((generator = generator.apply(thisArg, _arguments || [])).next());\n  });\n};\n\nvar __generator = undefined && undefined.__generator || function (thisArg, body) {\n  var _ = {\n    label: 0,\n    sent: function sent() {\n      if (t[0] & 1) throw t[1];\n      return t[1];\n    },\n    trys: [],\n    ops: []\n  },\n      f,\n      y,\n      t,\n      g;\n  return g = {\n    next: verb(0),\n    \"throw\": verb(1),\n    \"return\": verb(2)\n  }, typeof Symbol === \"function\" && (g[Symbol.iterator] = function () {\n    return this;\n  }), g;\n\n  function verb(n) {\n    return function (v) {\n      return step([n, v]);\n    };\n  }\n\n  function step(op) {\n    if (f) throw new TypeError(\"Generator is already executing.\");\n\n    while (_) {\n      try {\n        if (f = 1, y && (t = op[0] & 2 ? y[\"return\"] : op[0] ? y[\"throw\"] || ((t = y[\"return\"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;\n        if (y = 0, t) op = [op[0] & 2, t.value];\n\n        switch (op[0]) {\n          case 0:\n          case 1:\n            t = op;\n            break;\n\n          case 4:\n            _.label++;\n            return {\n              value: op[1],\n              done: false\n            };\n\n          case 5:\n            _.label++;\n            y = op[1];\n            op = [0];\n            continue;\n\n          case 7:\n            op = _.ops.pop();\n\n            _.trys.pop();\n\n            continue;\n\n          default:\n            if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) {\n              _ = 0;\n              continue;\n            }\n\n            if (op[0] === 3 && (!t || op[1] > t[0] && op[1] < t[3])) {\n              _.label = op[1];\n              break;\n            }\n\n            if (op[0] === 6 && _.label < t[1]) {\n              _.label = t[1];\n              t = op;\n              break;\n            }\n\n            if (t && _.label < t[2]) {\n              _.label = t[2];\n\n              _.ops.push(op);\n\n              break;\n            }\n\n            if (t[2]) _.ops.pop();\n\n            _.trys.pop();\n\n            continue;\n        }\n\n        op = body.call(thisArg, _);\n      } catch (e) {\n        op = [6, e];\n        y = 0;\n      } finally {\n        f = t = 0;\n      }\n    }\n\n    if (op[0] & 5) throw op[1];\n    return {\n      value: op[0] ? op[1] : void 0,\n      done: true\n    };\n  }\n};\n\n\n\nvar FlightEventsList =\n/** @class */\nfunction () {\n  function FlightEventsList() {\n    this._flight_events = new Array();\n    this._errno = 0;\n    this._error = null;\n  }\n\n  Object.defineProperty(FlightEventsList.prototype, \"flight_events\", {\n    get: function get() {\n      return this._flight_events;\n    },\n    enumerable: false,\n    configurable: true\n  });\n  Object.defineProperty(FlightEventsList.prototype, \"html\", {\n    get: function get() {\n      return this._html;\n    },\n    enumerable: false,\n    configurable: true\n  });\n  Object.defineProperty(FlightEventsList.prototype, \"errno\", {\n    get: function get() {\n      return this._errno;\n    },\n    enumerable: false,\n    configurable: true\n  });\n  Object.defineProperty(FlightEventsList.prototype, \"error\", {\n    get: function get() {\n      switch (this._errno) {\n        case FlightEventsList.ERR_SCRIPT_EXCEPTION:\n          this._error = FlightEventsList.ERR_SCRIPT_EXCEPTION_MSG;\n          break;\n\n        default:\n          this._error = null;\n          break;\n      }\n\n      return this._error;\n    },\n    enumerable: false,\n    configurable: true\n  });\n\n  FlightEventsList.prototype.flight_events_request = function () {\n    return __awaiter(this, void 0, void 0, function () {\n      var ok, fe_list;\n\n      var _this = this;\n\n      return __generator(this, function (_a) {\n        switch (_a.label) {\n          case 0:\n            ok = false;\n            this._errno = 0;\n            console.log(\"Prima della promise\");\n            return [4\n            /*yield*/\n            , this.flight_event_request_promise().then(function (res) {\n              console.log(res);\n              var json = JSON.parse(res);\n              _this._flight_events = json;\n              console.log(_this._flight_events);\n\n              _this.htmlSet();\n\n              ok = true;\n            })[\"catch\"](function (err) {\n              console.warn(err);\n              _this._errno = FlightEventsList.ERR_SCRIPT_EXCEPTION;\n            })];\n\n          case 1:\n            fe_list = _a.sent();\n            return [2\n            /*return*/\n            , ok];\n        }\n      });\n    });\n  };\n\n  FlightEventsList.prototype.flight_event_request_promise = function () {\n    return __awaiter(this, void 0, void 0, function () {\n      return __generator(this, function (_a) {\n        return [2\n        /*return*/\n        , new Promise(function (resolve, reject) {\n          fetch(FlightEventsList.SCRIPT_URL).then(function (res) {\n            resolve(res.text());\n          })[\"catch\"](function (err) {\n            reject(err);\n          });\n        })];\n      });\n    });\n  };\n\n  FlightEventsList.prototype.htmlSet = function () {\n    var _this = this;\n\n    var cards = \"\"; //Add cards elements to result\n\n    this._flight_events.forEach(function (val, index) {\n      var fel_elem = {\n        image: _values_constants__WEBPACK_IMPORTED_MODULE_0__.Constants.FOLDER_FLIGHTEVENTS + '/' + val['image'],\n        name: val['name'],\n        location: val['location'],\n        country: val['country'],\n        price: val['price']\n      };\n      cards += _this.htmlCard(fel_elem);\n    });\n\n    this._html = \"\\n<div class=\\\"container-fluid\\\">\\n    <div class=\\\"row\\\">\\n        \".concat(cards, \"\\n    </div>\\n</div>\\n\");\n  };\n\n  FlightEventsList.prototype.htmlCard = function (data) {\n    var htmlCard = \"\\n<div class=\\\"card col-12 col-sm-6 col-md-4 col-lg-3\\\">\\n    <img src=\\\"\".concat(data.image, \"\\\" alt=\\\"\").concat(data.name, \"\\\" title=\\\"\").concat(data.name, \"\\\">\\n    <div class=\\\"card-body\\\">\\n        <h3>\").concat(data.name, \"</h3>\\n        <div class=\\\"card-text d-flex justify-content-between\\\">\\n            <div class=\\\"fs-6\\\">\").concat(data.location, \"</div>\\n            <div class=\\\"fs-6\\\">\").concat(data.country, \"</div>\\n        </div>\\n        <div class=\\\"card-text d-flex justify-content-between\\\">\\n            <div class=\\\"fs-5\\\">\").concat(data.price, \"</div>\\n            <a href=\\\"#\\\" class=\\\"btn btn-warning\\\">Biglietti</a>\\n        </div>\\n    </div>\\n</div>\\n\");\n    return htmlCard;\n  }; //Numbers\n\n\n  FlightEventsList.ERR_SCRIPT_EXCEPTION = 1; //Messages\n\n  FlightEventsList.ERR_SCRIPT_EXCEPTION_MSG = 'Errore durante l\\' esecuzione dello script';\n  FlightEventsList.SCRIPT_URL = _values_constants__WEBPACK_IMPORTED_MODULE_0__.Constants.HOSTNAME + ':' + _values_constants__WEBPACK_IMPORTED_MODULE_0__.Constants.PORT + '/welcome/flightevents';\n  return FlightEventsList;\n}();\n\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FlightEventsList);//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvY2xhc3Nlcy9mbGlnaHRldmVudHNsaXN0LnRzLmpzIiwibWFwcGluZ3MiOiI7Ozs7O0FBQUEsSUFBSUEsU0FBUyxHQUFJLFNBQUksSUFBSSxTQUFJLENBQWIsU0FBQyxJQUEyQiw2Q0FBNkM7QUFDckYsd0JBQXNCO0FBQUUsV0FBT0MsS0FBSyxZQUFMQSxDQUFBQSxHQUFBQSxLQUFBQSxHQUE2QixNQUFNLG1CQUFtQjtBQUFFQyxNQUFBQSxPQUFPLENBQVBBLEtBQU8sQ0FBUEE7QUFBL0QsS0FBb0MsQ0FBcEM7QUFBb0Y7O0FBQzVHLFNBQU8sS0FBS0MsQ0FBQyxLQUFLQSxDQUFDLEdBQVosT0FBTSxDQUFOLEVBQXlCLDJCQUEyQjtBQUN2RCw4QkFBMEI7QUFBRSxVQUFJO0FBQUVDLFFBQUFBLElBQUksQ0FBQ0MsU0FBUyxDQUFUQSxJQUFBQSxDQUFMRCxLQUFLQyxDQUFELENBQUpEO0FBQU4sUUFBcUMsVUFBVTtBQUFFRSxRQUFBQSxNQUFNLENBQU5BLENBQU0sQ0FBTkE7QUFBWTtBQUFFOztBQUMzRiw2QkFBeUI7QUFBRSxVQUFJO0FBQUVGLFFBQUFBLElBQUksQ0FBQ0MsU0FBUyxDQUFUQSxPQUFTLENBQVRBLENBQUxELEtBQUtDLENBQUQsQ0FBSkQ7QUFBTixRQUF5QyxVQUFVO0FBQUVFLFFBQUFBLE1BQU0sQ0FBTkEsQ0FBTSxDQUFOQTtBQUFZO0FBQUU7O0FBQzlGLDBCQUFzQjtBQUFFQyxNQUFBQSxNQUFNLENBQU5BLElBQUFBLEdBQWNMLE9BQU8sQ0FBQ0ssTUFBTSxDQUE1QkEsS0FBcUIsQ0FBckJBLEdBQXNDQyxLQUFLLENBQUNELE1BQU0sQ0FBWkMsS0FBSyxDQUFMQSxDQUFBQSxJQUFBQSxDQUFBQSxTQUFBQSxFQUF0Q0QsUUFBc0NDLENBQXRDRDtBQUFzRjs7QUFDOUdILElBQUFBLElBQUksQ0FBQyxDQUFDQyxTQUFTLEdBQUdBLFNBQVMsQ0FBVEEsS0FBQUEsQ0FBQUEsT0FBQUEsRUFBeUJJLFVBQVUsSUFBaEQsRUFB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QkFBZ0IsQ0FBaEJBLFVBQUFBLEdBQThCaUIsaUVBQUFBLEdBQUFBLEdBQUFBLEdBQTJCQSw2REFBM0JBLEdBQTlCakIsdUJBQUFBO0FBQ0E7QUF0R0osQ0FBc0MsRUFBdEM7O0FBd0dBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL2NsYXNzZXMvZmxpZ2h0ZXZlbnRzbGlzdC50cz80NDg1Il0sInNvdXJjZXNDb250ZW50IjpbInZhciBfX2F3YWl0ZXIgPSAodGhpcyAmJiB0aGlzLl9fYXdhaXRlcikgfHwgZnVuY3Rpb24gKHRoaXNBcmcsIF9hcmd1bWVudHMsIFAsIGdlbmVyYXRvcikge1xyXG4gICAgZnVuY3Rpb24gYWRvcHQodmFsdWUpIHsgcmV0dXJuIHZhbHVlIGluc3RhbmNlb2YgUCA/IHZhbHVlIDogbmV3IFAoZnVuY3Rpb24gKHJlc29sdmUpIHsgcmVzb2x2ZSh2YWx1ZSk7IH0pOyB9XHJcbiAgICByZXR1cm4gbmV3IChQIHx8IChQID0gUHJvbWlzZSkpKGZ1bmN0aW9uIChyZXNvbHZlLCByZWplY3QpIHtcclxuICAgICAgICBmdW5jdGlvbiBmdWxmaWxsZWQodmFsdWUpIHsgdHJ5IHsgc3RlcChnZW5lcmF0b3IubmV4dCh2YWx1ZSkpOyB9IGNhdGNoIChlKSB7IHJlamVjdChlKTsgfSB9XHJcbiAgICAgICAgZnVuY3Rpb24gcmVqZWN0ZWQodmFsdWUpIHsgdHJ5IHsgc3RlcChnZW5lcmF0b3JbXCJ0aHJvd1wiXSh2YWx1ZSkpOyB9IGNhdGNoIChlKSB7IHJlamVjdChlKTsgfSB9XHJcbiAgICAgICAgZnVuY3Rpb24gc3RlcChyZXN1bHQpIHsgcmVzdWx0LmRvbmUgPyByZXNvbHZlKHJlc3VsdC52YWx1ZSkgOiBhZG9wdChyZXN1bHQudmFsdWUpLnRoZW4oZnVsZmlsbGVkLCByZWplY3RlZCk7IH1cclxuICAgICAgICBzdGVwKChnZW5lcmF0b3IgPSBnZW5lcmF0b3IuYXBwbHkodGhpc0FyZywgX2FyZ3VtZW50cyB8fCBbXSkpLm5leHQoKSk7XHJcbiAgICB9KTtcclxufTtcclxudmFyIF9fZ2VuZXJhdG9yID0gKHRoaXMgJiYgdGhpcy5fX2dlbmVyYXRvcikgfHwgZnVuY3Rpb24gKHRoaXNBcmcsIGJvZHkpIHtcclxuICAgIHZhciBfID0geyBsYWJlbDogMCwgc2VudDogZnVuY3Rpb24oKSB7IGlmICh0WzBdICYgMSkgdGhyb3cgdFsxXTsgcmV0dXJuIHRbMV07IH0sIHRyeXM6IFtdLCBvcHM6IFtdIH0sIGYsIHksIHQsIGc7XHJcbiAgICByZXR1cm4gZyA9IHsgbmV4dDogdmVyYigwKSwgXCJ0aHJvd1wiOiB2ZXJiKDEpLCBcInJldHVyblwiOiB2ZXJiKDIpIH0sIHR5cGVvZiBTeW1ib2wgPT09IFwiZnVuY3Rpb25cIiAmJiAoZ1tTeW1ib2wuaXRlcmF0b3JdID0gZnVuY3Rpb24oKSB7IHJldHVybiB0aGlzOyB9KSwgZztcclxuICAgIGZ1bmN0aW9uIHZlcmIobikgeyByZXR1cm4gZnVuY3Rpb24gKHYpIHsgcmV0dXJuIHN0ZXAoW24sIHZdKTsgfTsgfVxyXG4gICAgZnVuY3Rpb24gc3RlcChvcCkge1xyXG4gICAgICAgIGlmIChmKSB0aHJvdyBuZXcgVHlwZUVycm9yKFwiR2VuZXJhdG9yIGlzIGFscmVhZHkgZXhlY3V0aW5nLlwiKTtcclxuICAgICAgICB3aGlsZSAoXykgdHJ5IHtcclxuICAgICAgICAgICAgaWYgKGYgPSAxLCB5ICYmICh0ID0gb3BbMF0gJiAyID8geVtcInJldHVyblwiXSA6IG9wWzBdID8geVtcInRocm93XCJdIHx8ICgodCA9IHlbXCJyZXR1cm5cIl0pICYmIHQuY2FsbCh5KSwgMCkgOiB5Lm5leHQpICYmICEodCA9IHQuY2FsbCh5LCBvcFsxXSkpLmRvbmUpIHJldHVybiB0O1xyXG4gICAgICAgICAgICBpZiAoeSA9IDAsIHQpIG9wID0gW29wWzBdICYgMiwgdC52YWx1ZV07XHJcbiAgICAgICAgICAgIHN3aXRjaCAob3BbMF0pIHtcclxuICAgICAgICAgICAgICAgIGNhc2UgMDogY2FzZSAxOiB0ID0gb3A7IGJyZWFrO1xyXG4gICAgICAgICAgICAgICAgY2FzZSA0OiBfLmxhYmVsKys7IHJldHVybiB7IHZhbHVlOiBvcFsxXSwgZG9uZTogZmFsc2UgfTtcclxuICAgICAgICAgICAgICAgIGNhc2UgNTogXy5sYWJlbCsrOyB5ID0gb3BbMV07IG9wID0gWzBdOyBjb250aW51ZTtcclxuICAgICAgICAgICAgICAgIGNhc2UgNzogb3AgPSBfLm9wcy5wb3AoKTsgXy50cnlzLnBvcCgpOyBjb250aW51ZTtcclxuICAgICAgICAgICAgICAgIGRlZmF1bHQ6XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKCEodCA9IF8udHJ5cywgdCA9IHQubGVuZ3RoID4gMCAmJiB0W3QubGVuZ3RoIC0gMV0pICYmIChvcFswXSA9PT0gNiB8fCBvcFswXSA9PT0gMikpIHsgXyA9IDA7IGNvbnRpbnVlOyB9XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKG9wWzBdID09PSAzICYmICghdCB8fCAob3BbMV0gPiB0WzBdICYmIG9wWzFdIDwgdFszXSkpKSB7IF8ubGFiZWwgPSBvcFsxXTsgYnJlYWs7IH1cclxuICAgICAgICAgICAgICAgICAgICBpZiAob3BbMF0gPT09IDYgJiYgXy5sYWJlbCA8IHRbMV0pIHsgXy5sYWJlbCA9IHRbMV07IHQgPSBvcDsgYnJlYWs7IH1cclxuICAgICAgICAgICAgICAgICAgICBpZiAodCAmJiBfLmxhYmVsIDwgdFsyXSkgeyBfLmxhYmVsID0gdFsyXTsgXy5vcHMucHVzaChvcCk7IGJyZWFrOyB9XHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKHRbMl0pIF8ub3BzLnBvcCgpO1xyXG4gICAgICAgICAgICAgICAgICAgIF8udHJ5cy5wb3AoKTsgY29udGludWU7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgb3AgPSBib2R5LmNhbGwodGhpc0FyZywgXyk7XHJcbiAgICAgICAgfSBjYXRjaCAoZSkgeyBvcCA9IFs2LCBlXTsgeSA9IDA7IH0gZmluYWxseSB7IGYgPSB0ID0gMDsgfVxyXG4gICAgICAgIGlmIChvcFswXSAmIDUpIHRocm93IG9wWzFdOyByZXR1cm4geyB2YWx1ZTogb3BbMF0gPyBvcFsxXSA6IHZvaWQgMCwgZG9uZTogdHJ1ZSB9O1xyXG4gICAgfVxyXG59O1xyXG5pbXBvcnQgeyBDb25zdGFudHMgfSBmcm9tIFwiLi4vdmFsdWVzL2NvbnN0YW50c1wiO1xyXG52YXIgRmxpZ2h0RXZlbnRzTGlzdCA9IC8qKiBAY2xhc3MgKi8gKGZ1bmN0aW9uICgpIHtcclxuICAgIGZ1bmN0aW9uIEZsaWdodEV2ZW50c0xpc3QoKSB7XHJcbiAgICAgICAgdGhpcy5fZmxpZ2h0X2V2ZW50cyA9IG5ldyBBcnJheSgpO1xyXG4gICAgICAgIHRoaXMuX2Vycm5vID0gMDtcclxuICAgICAgICB0aGlzLl9lcnJvciA9IG51bGw7XHJcbiAgICB9XHJcbiAgICBPYmplY3QuZGVmaW5lUHJvcGVydHkoRmxpZ2h0RXZlbnRzTGlzdC5wcm90b3R5cGUsIFwiZmxpZ2h0X2V2ZW50c1wiLCB7XHJcbiAgICAgICAgZ2V0OiBmdW5jdGlvbiAoKSB7IHJldHVybiB0aGlzLl9mbGlnaHRfZXZlbnRzOyB9LFxyXG4gICAgICAgIGVudW1lcmFibGU6IGZhbHNlLFxyXG4gICAgICAgIGNvbmZpZ3VyYWJsZTogdHJ1ZVxyXG4gICAgfSk7XHJcbiAgICBPYmplY3QuZGVmaW5lUHJvcGVydHkoRmxpZ2h0RXZlbnRzTGlzdC5wcm90b3R5cGUsIFwiaHRtbFwiLCB7XHJcbiAgICAgICAgZ2V0OiBmdW5jdGlvbiAoKSB7IHJldHVybiB0aGlzLl9odG1sOyB9LFxyXG4gICAgICAgIGVudW1lcmFibGU6IGZhbHNlLFxyXG4gICAgICAgIGNvbmZpZ3VyYWJsZTogdHJ1ZVxyXG4gICAgfSk7XHJcbiAgICBPYmplY3QuZGVmaW5lUHJvcGVydHkoRmxpZ2h0RXZlbnRzTGlzdC5wcm90b3R5cGUsIFwiZXJybm9cIiwge1xyXG4gICAgICAgIGdldDogZnVuY3Rpb24gKCkgeyByZXR1cm4gdGhpcy5fZXJybm87IH0sXHJcbiAgICAgICAgZW51bWVyYWJsZTogZmFsc2UsXHJcbiAgICAgICAgY29uZmlndXJhYmxlOiB0cnVlXHJcbiAgICB9KTtcclxuICAgIE9iamVjdC5kZWZpbmVQcm9wZXJ0eShGbGlnaHRFdmVudHNMaXN0LnByb3RvdHlwZSwgXCJlcnJvclwiLCB7XHJcbiAgICAgICAgZ2V0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIHN3aXRjaCAodGhpcy5fZXJybm8pIHtcclxuICAgICAgICAgICAgICAgIGNhc2UgRmxpZ2h0RXZlbnRzTGlzdC5FUlJfU0NSSVBUX0VYQ0VQVElPTjpcclxuICAgICAgICAgICAgICAgICAgICB0aGlzLl9lcnJvciA9IEZsaWdodEV2ZW50c0xpc3QuRVJSX1NDUklQVF9FWENFUFRJT05fTVNHO1xyXG4gICAgICAgICAgICAgICAgICAgIGJyZWFrO1xyXG4gICAgICAgICAgICAgICAgZGVmYXVsdDpcclxuICAgICAgICAgICAgICAgICAgICB0aGlzLl9lcnJvciA9IG51bGw7XHJcbiAgICAgICAgICAgICAgICAgICAgYnJlYWs7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgcmV0dXJuIHRoaXMuX2Vycm9yO1xyXG4gICAgICAgIH0sXHJcbiAgICAgICAgZW51bWVyYWJsZTogZmFsc2UsXHJcbiAgICAgICAgY29uZmlndXJhYmxlOiB0cnVlXHJcbiAgICB9KTtcclxuICAgIEZsaWdodEV2ZW50c0xpc3QucHJvdG90eXBlLmZsaWdodF9ldmVudHNfcmVxdWVzdCA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICByZXR1cm4gX19hd2FpdGVyKHRoaXMsIHZvaWQgMCwgdm9pZCAwLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIHZhciBvaywgZmVfbGlzdDtcclxuICAgICAgICAgICAgdmFyIF90aGlzID0gdGhpcztcclxuICAgICAgICAgICAgcmV0dXJuIF9fZ2VuZXJhdG9yKHRoaXMsIGZ1bmN0aW9uIChfYSkge1xyXG4gICAgICAgICAgICAgICAgc3dpdGNoIChfYS5sYWJlbCkge1xyXG4gICAgICAgICAgICAgICAgICAgIGNhc2UgMDpcclxuICAgICAgICAgICAgICAgICAgICAgICAgb2sgPSBmYWxzZTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5fZXJybm8gPSAwO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhcIlByaW1hIGRlbGxhIHByb21pc2VcIik7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybiBbNCAvKnlpZWxkKi8sIHRoaXMuZmxpZ2h0X2V2ZW50X3JlcXVlc3RfcHJvbWlzZSgpLnRoZW4oZnVuY3Rpb24gKHJlcykge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlcyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGpzb24gPSBKU09OLnBhcnNlKHJlcyk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgX3RoaXMuX2ZsaWdodF9ldmVudHMgPSBqc29uO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKF90aGlzLl9mbGlnaHRfZXZlbnRzKTtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBfdGhpcy5odG1sU2V0KCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgb2sgPSB0cnVlO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSkuY2F0Y2goZnVuY3Rpb24gKGVycikge1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGNvbnNvbGUud2FybihlcnIpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIF90aGlzLl9lcnJubyA9IEZsaWdodEV2ZW50c0xpc3QuRVJSX1NDUklQVF9FWENFUFRJT047XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KV07XHJcbiAgICAgICAgICAgICAgICAgICAgY2FzZSAxOlxyXG4gICAgICAgICAgICAgICAgICAgICAgICBmZV9saXN0ID0gX2Euc2VudCgpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICByZXR1cm4gWzIgLypyZXR1cm4qLywgb2tdO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KTtcclxuICAgICAgICB9KTtcclxuICAgIH07XHJcbiAgICBGbGlnaHRFdmVudHNMaXN0LnByb3RvdHlwZS5mbGlnaHRfZXZlbnRfcmVxdWVzdF9wcm9taXNlID0gZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIHJldHVybiBfX2F3YWl0ZXIodGhpcywgdm9pZCAwLCB2b2lkIDAsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgcmV0dXJuIF9fZ2VuZXJhdG9yKHRoaXMsIGZ1bmN0aW9uIChfYSkge1xyXG4gICAgICAgICAgICAgICAgcmV0dXJuIFsyIC8qcmV0dXJuKi8sIG5ldyBQcm9taXNlKGZ1bmN0aW9uIChyZXNvbHZlLCByZWplY3QpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgZmV0Y2goRmxpZ2h0RXZlbnRzTGlzdC5TQ1JJUFRfVVJMKS50aGVuKGZ1bmN0aW9uIChyZXMpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJlc29sdmUocmVzLnRleHQoKSk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pLmNhdGNoKGZ1bmN0aW9uIChlcnIpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHJlamVjdChlcnIpO1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcclxuICAgICAgICAgICAgICAgICAgICB9KV07XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0pO1xyXG4gICAgfTtcclxuICAgIEZsaWdodEV2ZW50c0xpc3QucHJvdG90eXBlLmh0bWxTZXQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgdmFyIF90aGlzID0gdGhpcztcclxuICAgICAgICB2YXIgY2FyZHMgPSBcIlwiO1xyXG4gICAgICAgIC8vQWRkIGNhcmRzIGVsZW1lbnRzIHRvIHJlc3VsdFxyXG4gICAgICAgIHRoaXMuX2ZsaWdodF9ldmVudHMuZm9yRWFjaChmdW5jdGlvbiAodmFsLCBpbmRleCkge1xyXG4gICAgICAgICAgICB2YXIgZmVsX2VsZW0gPSB7XHJcbiAgICAgICAgICAgICAgICBpbWFnZTogQ29uc3RhbnRzLkZPTERFUl9GTElHSFRFVkVOVFMgKyAnLycgKyB2YWxbJ2ltYWdlJ10sXHJcbiAgICAgICAgICAgICAgICBuYW1lOiB2YWxbJ25hbWUnXSxcclxuICAgICAgICAgICAgICAgIGxvY2F0aW9uOiB2YWxbJ2xvY2F0aW9uJ10sXHJcbiAgICAgICAgICAgICAgICBjb3VudHJ5OiB2YWxbJ2NvdW50cnknXSxcclxuICAgICAgICAgICAgICAgIHByaWNlOiB2YWxbJ3ByaWNlJ11cclxuICAgICAgICAgICAgfTtcclxuICAgICAgICAgICAgY2FyZHMgKz0gX3RoaXMuaHRtbENhcmQoZmVsX2VsZW0pO1xyXG4gICAgICAgIH0pO1xyXG4gICAgICAgIHRoaXMuX2h0bWwgPSBcIlxcbjxkaXYgY2xhc3M9XFxcImNvbnRhaW5lci1mbHVpZFxcXCI+XFxuICAgIDxkaXYgY2xhc3M9XFxcInJvd1xcXCI+XFxuICAgICAgICBcIi5jb25jYXQoY2FyZHMsIFwiXFxuICAgIDwvZGl2PlxcbjwvZGl2PlxcblwiKTtcclxuICAgIH07XHJcbiAgICBGbGlnaHRFdmVudHNMaXN0LnByb3RvdHlwZS5odG1sQ2FyZCA9IGZ1bmN0aW9uIChkYXRhKSB7XHJcbiAgICAgICAgdmFyIGh0bWxDYXJkID0gXCJcXG48ZGl2IGNsYXNzPVxcXCJjYXJkIGNvbC0xMiBjb2wtc20tNiBjb2wtbWQtNCBjb2wtbGctM1xcXCI+XFxuICAgIDxpbWcgc3JjPVxcXCJcIi5jb25jYXQoZGF0YS5pbWFnZSwgXCJcXFwiIGFsdD1cXFwiXCIpLmNvbmNhdChkYXRhLm5hbWUsIFwiXFxcIiB0aXRsZT1cXFwiXCIpLmNvbmNhdChkYXRhLm5hbWUsIFwiXFxcIj5cXG4gICAgPGRpdiBjbGFzcz1cXFwiY2FyZC1ib2R5XFxcIj5cXG4gICAgICAgIDxoMz5cIikuY29uY2F0KGRhdGEubmFtZSwgXCI8L2gzPlxcbiAgICAgICAgPGRpdiBjbGFzcz1cXFwiY2FyZC10ZXh0IGQtZmxleCBqdXN0aWZ5LWNvbnRlbnQtYmV0d2VlblxcXCI+XFxuICAgICAgICAgICAgPGRpdiBjbGFzcz1cXFwiZnMtNlxcXCI+XCIpLmNvbmNhdChkYXRhLmxvY2F0aW9uLCBcIjwvZGl2PlxcbiAgICAgICAgICAgIDxkaXYgY2xhc3M9XFxcImZzLTZcXFwiPlwiKS5jb25jYXQoZGF0YS5jb3VudHJ5LCBcIjwvZGl2PlxcbiAgICAgICAgPC9kaXY+XFxuICAgICAgICA8ZGl2IGNsYXNzPVxcXCJjYXJkLXRleHQgZC1mbGV4IGp1c3RpZnktY29udGVudC1iZXR3ZWVuXFxcIj5cXG4gICAgICAgICAgICA8ZGl2IGNsYXNzPVxcXCJmcy01XFxcIj5cIikuY29uY2F0KGRhdGEucHJpY2UsIFwiPC9kaXY+XFxuICAgICAgICAgICAgPGEgaHJlZj1cXFwiI1xcXCIgY2xhc3M9XFxcImJ0biBidG4td2FybmluZ1xcXCI+QmlnbGlldHRpPC9hPlxcbiAgICAgICAgPC9kaXY+XFxuICAgIDwvZGl2PlxcbjwvZGl2PlxcblwiKTtcclxuICAgICAgICByZXR1cm4gaHRtbENhcmQ7XHJcbiAgICB9O1xyXG4gICAgLy9OdW1iZXJzXHJcbiAgICBGbGlnaHRFdmVudHNMaXN0LkVSUl9TQ1JJUFRfRVhDRVBUSU9OID0gMTtcclxuICAgIC8vTWVzc2FnZXNcclxuICAgIEZsaWdodEV2ZW50c0xpc3QuRVJSX1NDUklQVF9FWENFUFRJT05fTVNHID0gJ0Vycm9yZSBkdXJhbnRlIGxcXCcgZXNlY3V6aW9uZSBkZWxsbyBzY3JpcHQnO1xyXG4gICAgRmxpZ2h0RXZlbnRzTGlzdC5TQ1JJUFRfVVJMID0gQ29uc3RhbnRzLkhPU1ROQU1FICsgJzonICsgQ29uc3RhbnRzLlBPUlQgKyAnL3dlbGNvbWUvZmxpZ2h0ZXZlbnRzJztcclxuICAgIHJldHVybiBGbGlnaHRFdmVudHNMaXN0O1xyXG59KCkpO1xyXG5leHBvcnQgZGVmYXVsdCBGbGlnaHRFdmVudHNMaXN0O1xyXG4iXSwibmFtZXMiOlsiX19hd2FpdGVyIiwidmFsdWUiLCJyZXNvbHZlIiwiUCIsInN0ZXAiLCJnZW5lcmF0b3IiLCJyZWplY3QiLCJyZXN1bHQiLCJhZG9wdCIsIl9hcmd1bWVudHMiLCJfX2dlbmVyYXRvciIsIl8iLCJsYWJlbCIsInNlbnQiLCJ0IiwidHJ5cyIsIm9wcyIsIm5leHQiLCJ2ZXJiIiwiZyIsIlN5bWJvbCIsImYiLCJ5Iiwib3AiLCJkb25lIiwiYm9keSIsIkZsaWdodEV2ZW50c0xpc3QiLCJPYmplY3QiLCJnZXQiLCJlbnVtZXJhYmxlIiwiY29uZmlndXJhYmxlIiwiX3RoaXMiLCJfYSIsIm9rIiwiY29uc29sZSIsImpzb24iLCJKU09OIiwiZmVfbGlzdCIsImZldGNoIiwicmVzIiwiY2FyZHMiLCJmZWxfZWxlbSIsImltYWdlIiwiQ29uc3RhbnRzIiwidmFsIiwibmFtZSIsImxvY2F0aW9uIiwiY291bnRyeSIsInByaWNlIiwiaHRtbENhcmQiLCJkYXRhIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/classes/flighteventslist.ts\n");

/***/ }),

/***/ "./resources/js/values/constants.ts":
/*!******************************************!*\
  !*** ./resources/js/values/constants.ts ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"Constants\": () => (/* binding */ Constants)\n/* harmony export */ });\nvar Constants;\n\n(function (Constants) {\n  Constants.FOLDER_IMG = '/img';\n  Constants.FOLDER_FLIGHTEVENTS = Constants.FOLDER_IMG + '/flightevents';\n  Constants.FOLDER_JSON = '/json';\n  Constants.FOLDER_SCRIPT = '/scripts';\n  Constants.HOSTNAME = 'http://127.0.0.1';\n  Constants.PORT = 8000;\n})(Constants || (Constants = {}));//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvdmFsdWVzL2NvbnN0YW50cy50cy5qcyIsIm1hcHBpbmdzIjoiOzs7O0FBQU87O0FBQ1AsQ0FBQyxxQkFBcUI7QUFDbEJBLEVBQUFBLFNBQVMsQ0FBVEEsVUFBQUEsR0FBQUEsTUFBQUE7QUFDQUEsRUFBQUEsU0FBUyxDQUFUQSxtQkFBQUEsR0FBZ0NBLFNBQVMsQ0FBVEEsVUFBQUEsR0FBaENBLGVBQUFBO0FBQ0FBLEVBQUFBLFNBQVMsQ0FBVEEsV0FBQUEsR0FBQUEsT0FBQUE7QUFDQUEsRUFBQUEsU0FBUyxDQUFUQSxhQUFBQSxHQUFBQSxVQUFBQTtBQUNBQSxFQUFBQSxTQUFTLENBQVRBLFFBQUFBLEdBQUFBLGtCQUFBQTtBQUNBQSxFQUFBQSxTQUFTLENBQVRBLElBQUFBLEdBQUFBLElBQUFBO0FBTkosR0FPR0EsU0FBUyxLQUFLQSxTQUFTLEdBUDFCLEVBT1ksQ0FQWiIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy92YWx1ZXMvY29uc3RhbnRzLnRzPzlmNGYiXSwic291cmNlc0NvbnRlbnQiOlsiZXhwb3J0IHZhciBDb25zdGFudHM7XHJcbihmdW5jdGlvbiAoQ29uc3RhbnRzKSB7XHJcbiAgICBDb25zdGFudHMuRk9MREVSX0lNRyA9ICcvaW1nJztcclxuICAgIENvbnN0YW50cy5GT0xERVJfRkxJR0hURVZFTlRTID0gQ29uc3RhbnRzLkZPTERFUl9JTUcgKyAnL2ZsaWdodGV2ZW50cyc7XHJcbiAgICBDb25zdGFudHMuRk9MREVSX0pTT04gPSAnL2pzb24nO1xyXG4gICAgQ29uc3RhbnRzLkZPTERFUl9TQ1JJUFQgPSAnL3NjcmlwdHMnO1xyXG4gICAgQ29uc3RhbnRzLkhPU1ROQU1FID0gJ2h0dHA6Ly8xMjcuMC4wLjEnO1xyXG4gICAgQ29uc3RhbnRzLlBPUlQgPSA4MDAwO1xyXG59KShDb25zdGFudHMgfHwgKENvbnN0YW50cyA9IHt9KSk7XHJcbiJdLCJuYW1lcyI6WyJDb25zdGFudHMiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/values/constants.ts\n");

/***/ }),

/***/ "./resources/js/welcome.ts":
/*!*********************************!*\
  !*** ./resources/js/welcome.ts ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _classes_flighteventslist__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./classes/flighteventslist */ \"./resources/js/classes/flighteventslist.ts\");\n\n$(function () {\n  var buttons = $('button.nav-link');\n  buttons.on('click', function (event) {\n    var clickbutton = event.currentTarget;\n    console.log(clickbutton);\n    var cb_dbt = clickbutton.getAttribute('data-bs-target');\n    var cb_id = clickbutton.getAttribute('id');\n    console.log(cb_id);\n    $('' + cb_dbt).css('display', 'block');\n    $('div[role=tabpanel]:not(' + cb_dbt + ')').css('display', 'none');\n\n    if (cb_id == 'events-tab') {\n      //User want see flight events list\n      var fel_1 = new _classes_flighteventslist__WEBPACK_IMPORTED_MODULE_0__[\"default\"]();\n      fel_1.flight_events_request().then(function (response) {\n        console.log(fel_1.html);\n\n        if (fel_1.errno == 0) {\n          //No errors Happened\n          $('#events').html(fel_1.html);\n        }\n      })[\"catch\"](function (err) {});\n    } //if(cb_id == 'events_tab'){\n\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvd2VsY29tZS50cy5qcyIsIm1hcHBpbmdzIjoiOztBQUFBO0FBQ0FBLENBQUMsQ0FBQyxZQUFZO0FBQ1YsTUFBSUMsT0FBTyxHQUFHRCxDQUFDLENBQWYsaUJBQWUsQ0FBZjtBQUNBQyxFQUFBQSxPQUFPLENBQVBBLEVBQUFBLENBQUFBLE9BQUFBLEVBQW9CLGlCQUFpQjtBQUNqQyxRQUFJQyxXQUFXLEdBQUdDLEtBQUssQ0FBdkI7QUFDQUMsSUFBQUEsT0FBTyxDQUFQQSxHQUFBQSxDQUFBQSxXQUFBQTtBQUNBLFFBQUlDLE1BQU0sR0FBR0gsV0FBVyxDQUFYQSxZQUFBQSxDQUFiLGdCQUFhQSxDQUFiO0FBQ0EsUUFBSUksS0FBSyxHQUFHSixXQUFXLENBQVhBLFlBQUFBLENBQVosSUFBWUEsQ0FBWjtBQUNBRSxJQUFBQSxPQUFPLENBQVBBLEdBQUFBLENBQUFBLEtBQUFBO0FBQ0FKLElBQUFBLENBQUMsQ0FBQyxLQUFGQSxNQUFDLENBQURBLENBQUFBLEdBQUFBLENBQUFBLFNBQUFBLEVBQUFBLE9BQUFBO0FBQ0FBLElBQUFBLENBQUMsQ0FBQyxxQ0FBRkEsR0FBQyxDQUFEQSxDQUFBQSxHQUFBQSxDQUFBQSxTQUFBQSxFQUFBQSxNQUFBQTs7QUFDQSxRQUFJTSxLQUFLLElBQVQsY0FBMkI7QUFDdkI7QUFDQSxVQUFJQyxLQUFLLEdBQUcsSUFBWixpRUFBWSxFQUFaO0FBQ0FBLE1BQUFBLEtBQUssQ0FBTEEscUJBQUFBLEdBQUFBLElBQUFBLENBQW1DLG9CQUFvQjtBQUNuREgsUUFBQUEsT0FBTyxDQUFQQSxHQUFBQSxDQUFZRyxLQUFLLENBQWpCSCxJQUFBQTs7QUFDQSxZQUFJRyxLQUFLLENBQUxBLEtBQUFBLElBQUosR0FBc0I7QUFDbEI7QUFDQVAsVUFBQUEsQ0FBQyxDQUFEQSxTQUFDLENBQURBLENBQUFBLElBQUFBLENBQWtCTyxLQUFLLENBQXZCUCxJQUFBQTtBQUNIO0FBTExPLE9BQUFBLEVBQUFBLE9BQUFBLEVBTVMsZUFBZSxDQU54QkEsQ0FBQUE7QUFYNkIsTUFtQi9COztBQW5CTk4sR0FBQUE7QUFGSkQsQ0FBQyxDQUFEQSIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9qcy93ZWxjb21lLnRzP2RlNDYiXSwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IEZsaWdodEV2ZW50c0xpc3QgZnJvbSBcIi4vY2xhc3Nlcy9mbGlnaHRldmVudHNsaXN0XCI7XHJcbiQoZnVuY3Rpb24gKCkge1xyXG4gICAgdmFyIGJ1dHRvbnMgPSAkKCdidXR0b24ubmF2LWxpbmsnKTtcclxuICAgIGJ1dHRvbnMub24oJ2NsaWNrJywgZnVuY3Rpb24gKGV2ZW50KSB7XHJcbiAgICAgICAgdmFyIGNsaWNrYnV0dG9uID0gZXZlbnQuY3VycmVudFRhcmdldDtcclxuICAgICAgICBjb25zb2xlLmxvZyhjbGlja2J1dHRvbik7XHJcbiAgICAgICAgdmFyIGNiX2RidCA9IGNsaWNrYnV0dG9uLmdldEF0dHJpYnV0ZSgnZGF0YS1icy10YXJnZXQnKTtcclxuICAgICAgICB2YXIgY2JfaWQgPSBjbGlja2J1dHRvbi5nZXRBdHRyaWJ1dGUoJ2lkJyk7XHJcbiAgICAgICAgY29uc29sZS5sb2coY2JfaWQpO1xyXG4gICAgICAgICQoJycgKyBjYl9kYnQpLmNzcygnZGlzcGxheScsICdibG9jaycpO1xyXG4gICAgICAgICQoJ2Rpdltyb2xlPXRhYnBhbmVsXTpub3QoJyArIGNiX2RidCArICcpJykuY3NzKCdkaXNwbGF5JywgJ25vbmUnKTtcclxuICAgICAgICBpZiAoY2JfaWQgPT0gJ2V2ZW50cy10YWInKSB7XHJcbiAgICAgICAgICAgIC8vVXNlciB3YW50IHNlZSBmbGlnaHQgZXZlbnRzIGxpc3RcclxuICAgICAgICAgICAgdmFyIGZlbF8xID0gbmV3IEZsaWdodEV2ZW50c0xpc3QoKTtcclxuICAgICAgICAgICAgZmVsXzEuZmxpZ2h0X2V2ZW50c19yZXF1ZXN0KCkudGhlbihmdW5jdGlvbiAocmVzcG9uc2UpIHtcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGZlbF8xLmh0bWwpO1xyXG4gICAgICAgICAgICAgICAgaWYgKGZlbF8xLmVycm5vID09IDApIHtcclxuICAgICAgICAgICAgICAgICAgICAvL05vIGVycm9ycyBIYXBwZW5lZFxyXG4gICAgICAgICAgICAgICAgICAgICQoJyNldmVudHMnKS5odG1sKGZlbF8xLmh0bWwpO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9KS5jYXRjaChmdW5jdGlvbiAoZXJyKSB7XHJcbiAgICAgICAgICAgIH0pO1xyXG4gICAgICAgIH0gLy9pZihjYl9pZCA9PSAnZXZlbnRzX3RhYicpe1xyXG4gICAgfSk7XHJcbn0pO1xyXG4iXSwibmFtZXMiOlsiJCIsImJ1dHRvbnMiLCJjbGlja2J1dHRvbiIsImV2ZW50IiwiY29uc29sZSIsImNiX2RidCIsImNiX2lkIiwiZmVsXzEiXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/welcome.ts\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
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
/******/ 	var __webpack_exports__ = __webpack_require__("./resources/js/welcome.ts");
/******/ 	
/******/ })()
;