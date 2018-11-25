/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 10);
/******/ })
/************************************************************************/
/******/ ({

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(11);
module.exports = __webpack_require__(36);


/***/ }),

/***/ 11:
/***/ (function(module, exports) {

throw new Error("Module build failed: SyntaxError: Unexpected token (12:0)\n\n\u001b[0m \u001b[90m 10 | \u001b[39m    console\u001b[33m.\u001b[39mlog(\u001b[32m\"ready\"\u001b[39m)\u001b[33m;\u001b[39m\n \u001b[90m 11 | \u001b[39m\n\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 12 | \u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<<\u001b[39m\u001b[33m<\u001b[39m \u001b[33mHEAD\u001b[39m\n \u001b[90m    | \u001b[39m\u001b[31m\u001b[1m^\u001b[22m\u001b[39m\n \u001b[90m 13 | \u001b[39m    \u001b[36mvar\u001b[39m small \u001b[33m=\u001b[39m $(\u001b[32m\"small\"\u001b[39m)\u001b[33m;\u001b[39m\n \u001b[90m 14 | \u001b[39m    \u001b[36mvar\u001b[39m clicks \u001b[33m=\u001b[39m \u001b[35m0\u001b[39m\u001b[33m;\u001b[39m\n \u001b[90m 15 | \u001b[39m\u001b[33m===\u001b[39m\u001b[33m===\u001b[39m\u001b[33m=\u001b[39m\u001b[0m\n");

/***/ }),

/***/ 36:
/***/ (function(module, exports) {

throw new Error("Module build failed: ModuleBuildError: Module build failed: \n    }\n    ^\n      Invalid CSS after \"    }\": expected \"}\", was \"<<<<<<< HEAD\"\n      in /Users/tay/Documents/code/taybroski/laravel/taybroski/resources/sass/style.scss (line 131, column 6)\n    at runLoaders (/Users/tay/Documents/code/taybroski/laravel/taybroski/node_modules/webpack/lib/NormalModule.js:195:19)\n    at /Users/tay/Documents/code/taybroski/laravel/taybroski/node_modules/loader-runner/lib/LoaderRunner.js:364:11\n    at /Users/tay/Documents/code/taybroski/laravel/taybroski/node_modules/loader-runner/lib/LoaderRunner.js:230:18\n    at context.callback (/Users/tay/Documents/code/taybroski/laravel/taybroski/node_modules/loader-runner/lib/LoaderRunner.js:111:13)\n    at Object.asyncSassJobQueue.push [as callback] (/Users/tay/Documents/code/taybroski/laravel/taybroski/node_modules/sass-loader/lib/loader.js:55:13)\n    at Object.done [as callback] (/Users/tay/Documents/code/taybroski/laravel/taybroski/node_modules/neo-async/async.js:8077:18)\n    at options.error (/Users/tay/Documents/code/taybroski/laravel/taybroski/node_modules/node-sass/lib/index.js:294:32)");

/***/ })

/******/ });