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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/blocks/editor.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/blocks/content-section/index.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
var _jsxFileName = "D:\\OpenServer\\domains\\hpractic.loc\\wp-content\\plugins\\rodkin-custom-gutenberg-blocks\\assets\\blocks\\content-section\\index.js";



Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__["registerBlockType"])("gutenberg-custom-block/section", {
  title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])("Секция контента", "hpractice-gb"),
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])("Блок позволяет использовать секции с заголовком слева и контентом справа", "hpractice-gb"),
  category: "layout",
  icon: wp.element.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 24 24",
    fill: "black",
    width: "24px",
    height: "24px",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 9
    },
    __self: undefined
  }, wp.element.createElement("path", {
    d: "M0 0h24v24H0z",
    fill: "none",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 9
    },
    __self: undefined
  }), wp.element.createElement("path", {
    d: "M3 19h6v-7H3v7zm7 0h12v-7H10v7zM3 5v6h19V5H3z",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 9
    },
    __self: undefined
  })),
  keywords: [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])("section", "hpractice-gb")],
  attributes: {
    sectionTitle: {
      type: 'string'
    }
  },
  edit: function edit(_ref) {
    var className = _ref.className,
        attributes = _ref.attributes,
        setAttributes = _ref.setAttributes;
    var sectionTitle = attributes.sectionTitle;
    return wp.element.createElement("article", {
      className: className + ' article',
      __source: {
        fileName: _jsxFileName,
        lineNumber: 22
      },
      __self: this
    }, wp.element.createElement("div", {
      className: "block-title",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 23
      },
      __self: this
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])("Секция контента", "hpractice-gb")), wp.element.createElement("div", {
      className: "article__inner section__inner",
      style: {
        display: 'flex'
      },
      __source: {
        fileName: _jsxFileName,
        lineNumber: 24
      },
      __self: this
    }, wp.element.createElement("div", {
      className: "article__aside section__main",
      style: {
        width: '300px',
        flexShrink: 0
      },
      __source: {
        fileName: _jsxFileName,
        lineNumber: 25
      },
      __self: this
    }, wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["RichText"], {
      onChange: function onChange(value) {
        return setAttributes({
          sectionTitle: value
        });
      },
      value: sectionTitle,
      tagName: 'h3',
      placeholder: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Section header', 'hpractice-gb'),
      className: 'heading heading--md heading--primary',
      __source: {
        fileName: _jsxFileName,
        lineNumber: 26
      },
      __self: this
    })), wp.element.createElement("div", {
      className: "article__content section__content",
      style: {
        width: '100%'
      },
      __source: {
        fileName: _jsxFileName,
        lineNumber: 34
      },
      __self: this
    }, wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["InnerBlocks"], {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 35
      },
      __self: this
    }))));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    var sectionTitle = attributes.sectionTitle;
    return wp.element.createElement("article", {
      className: "article",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 45
      },
      __self: this
    }, wp.element.createElement("div", {
      className: "article__inner section__inner",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 46
      },
      __self: this
    }, wp.element.createElement("div", {
      className: "article__aside section__main",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 47
      },
      __self: this
    }, wp.element.createElement("h3", {
      className: "heading heading--md heading--primary",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 48
      },
      __self: this
    }, sectionTitle)), wp.element.createElement("div", {
      className: "article__content section__content",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 52
      },
      __self: this
    }, wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["InnerBlocks"].Content, {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 53
      },
      __self: this
    }))));
  }
});

/***/ }),

/***/ "./assets/blocks/editor.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _content_section__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("./assets/blocks/content-section/index.js");


/***/ }),

/***/ "@wordpress/blocks":
/***/ (function(module, exports) {

module.exports = wp["blocks"];

/***/ }),

/***/ "@wordpress/editor":
/***/ (function(module, exports) {

module.exports = wp["editor"];

/***/ }),

/***/ "@wordpress/i18n":
/***/ (function(module, exports) {

module.exports = wp["i18n"];

/***/ })

/******/ });
//# sourceMappingURL=editor.js.map