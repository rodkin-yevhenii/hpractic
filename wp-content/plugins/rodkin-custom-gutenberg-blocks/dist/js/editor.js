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

/***/ "./assets/blocks/content-block/index.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_editor_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("./assets/blocks/content-block/styles.editor.scss");
/* harmony import */ var _styles_editor_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_styles_editor_scss__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
var _jsxFileName = "D:\\OpenServer\\domains\\hpractic.loc\\wp-content\\plugins\\rodkin-custom-gutenberg-blocks\\assets\\blocks\\content-block\\index.js";




Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("gutenberg-custom-block/container", {
  title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Контейнер изображений", "hpractice-gb"),
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Контейнер для изображений", "hpractice-gb"),
  category: "layout",
  icon: wp.element.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    height: "24px",
    viewBox: "0 0 24 24",
    width: "24px",
    fill: "#000000",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 10
    },
    __self: undefined
  }, wp.element.createElement("path", {
    d: "M0 0h24v24H0z",
    fill: "none",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 10
    },
    __self: undefined
  }), wp.element.createElement("path", {
    d: "M4 4h7V2H4c-1.1 0-2 .9-2 2v7h2V4zm6 9l-4 5h12l-3-4-2.03 2.71L10 13zm7-4.5c0-.83-.67-1.5-1.5-1.5S14 7.67 14 8.5s.67 1.5 1.5 1.5S17 9.33 17 8.5zM20 2h-7v2h7v7h2V4c0-1.1-.9-2-2-2zm0 18h-7v2h7c1.1 0 2-.9 2-2v-7h-2v7zM4 13H2v7c0 1.1.9 2 2 2h7v-2H4v-7z",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 10
    },
    __self: undefined
  })),
  keywords: [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Контейнер изображений", "hpractice-gb"), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Блок изображений", "hpractice-gb")],
  edit: function edit(_ref) {
    var className = _ref.className;
    return wp.element.createElement("div", {
      className: className,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 17
      },
      __self: this
    }, wp.element.createElement("div", {
      className: "block-title",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 18
      },
      __self: this
    }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Контейнер изображений", "hpractice-gb")), wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["InnerBlocks"], {
      allowedBlocks: ['core/image'],
      __source: {
        fileName: _jsxFileName,
        lineNumber: 19
      },
      __self: this
    }));
  },
  save: function save() {
    return wp.element.createElement("div", {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 25
      },
      __self: this
    }, wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["InnerBlocks"].Content, {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 26
      },
      __self: this
    }));
  }
});

/***/ }),

/***/ "./assets/blocks/content-block/styles.editor.scss":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/blocks/content-section/index.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_editor_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("./assets/blocks/content-section/styles.editor.scss");
/* harmony import */ var _styles_editor_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_styles_editor_scss__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
var _jsxFileName = "D:\\OpenServer\\domains\\hpractic.loc\\wp-content\\plugins\\rodkin-custom-gutenberg-blocks\\assets\\blocks\\content-section\\index.js";




Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("gutenberg-custom-block/section", {
  title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Секция контента", "hpractice-gb"),
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Блок позволяет использовать секции с заголовком слева и контентом справа", "hpractice-gb"),
  category: "layout",
  icon: wp.element.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    viewBox: "0 0 24 24",
    fill: "black",
    width: "24px",
    height: "24px",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 10
    },
    __self: undefined
  }, wp.element.createElement("path", {
    d: "M0 0h24v24H0z",
    fill: "none",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 10
    },
    __self: undefined
  }), wp.element.createElement("path", {
    d: "M3 19h6v-7H3v7zm7 0h12v-7H10v7zM3 5v6h19V5H3z",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 10
    },
    __self: undefined
  })),
  keywords: [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("section", "hpractice-gb")],
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
    return wp.element.createElement("div", {
      className: className + " article__inner section__inner",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 23
      },
      __self: this
    }, wp.element.createElement("div", {
      className: "article__aside section__main",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 24
      },
      __self: this
    }, wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["RichText"], {
      onChange: function onChange(value) {
        return setAttributes({
          sectionTitle: value
        });
      },
      value: sectionTitle,
      tagName: 'h3',
      placeholder: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Section header', 'hpractice-gb'),
      className: 'heading heading--md heading--primary',
      __source: {
        fileName: _jsxFileName,
        lineNumber: 25
      },
      __self: this
    })), wp.element.createElement("div", {
      className: "article__content section__content",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 33
      },
      __self: this
    }, wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["InnerBlocks"], {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 34
      },
      __self: this
    })));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    var sectionTitle = attributes.sectionTitle;
    return wp.element.createElement("div", {
      className: "article__inner section__inner",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 43
      },
      __self: this
    }, wp.element.createElement("div", {
      className: "article__aside section__main",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 44
      },
      __self: this
    }, wp.element.createElement("h3", {
      className: "heading heading--md heading--primary",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 45
      },
      __self: this
    }, sectionTitle)), wp.element.createElement("div", {
      className: "article__content section__content",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 49
      },
      __self: this
    }, wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["InnerBlocks"].Content, {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 50
      },
      __self: this
    })));
  }
});

/***/ }),

/***/ "./assets/blocks/content-section/styles.editor.scss":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/blocks/delivery-block/index.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_editor_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("./assets/blocks/delivery-block/styles.editor.scss");
/* harmony import */ var _styles_editor_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_styles_editor_scss__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__("@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
var _jsxFileName = "D:\\OpenServer\\domains\\hpractic.loc\\wp-content\\plugins\\rodkin-custom-gutenberg-blocks\\assets\\blocks\\delivery-block\\index.js";






Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("gutenberg-custom-block/delivery", {
  title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Блок для страницы доставка и оплата", "hpractice-gb"),
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Блок позволяет использовать секции с плавающим меню слева", "hpractice-gb"),
  category: "layout",
  icon: wp.element.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    height: "24px",
    viewBox: "0 0 24 24",
    width: "24px",
    fill: "#000000",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 13
    },
    __self: undefined
  }, wp.element.createElement("path", {
    d: "M0 0h24v24H0V0z",
    fill: "none",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 13
    },
    __self: undefined
  }), wp.element.createElement("path", {
    d: "M3 15h8v-2H3v2zm0 4h8v-2H3v2zm0-8h8V9H3v2zm0-6v2h8V5H3zm10 0h8v14h-8V5z",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 13
    },
    __self: undefined
  })),
  keywords: [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])("Блок для страницы доставка и оплата", "hpractice-gb")],
  attributes: {
    title: {
      type: 'string'
    },
    anchor: {
      type: 'string'
    },
    iconTitle: {
      type: 'string'
    }
  },
  edit: function edit(_ref) {
    var className = _ref.className,
        attributes = _ref.attributes,
        setAttributes = _ref.setAttributes;
    var title = attributes.title,
        anchor = attributes.anchor,
        iconTitle = attributes.iconTitle;
    return wp.element.createElement("div", {
      className: className,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 32
      },
      __self: this
    }, wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["InspectorControls"], {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 33
      },
      __self: this
    }, wp.element.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelBody"], {
      title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Настройки блока', 'v-catena-gutenberg'),
      initialOpen: true,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 34
      },
      __self: this
    }, wp.element.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 38
      },
      __self: this
    }, wp.element.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: "\u042F\u043A\u043E\u0440\u044C \u0431\u043B\u043E\u043A\u0430 (\u0438\u0441\u043F\u043E\u043B\u044C\u0437\u0443\u0439\u0442\u0435 \u0442\u043E\u043B\u044C\u043A\u043E \u0430\u043D\u0433\u043B\u0438\u0439\u0441\u043A\u0438\u0439 \u0431\u0435\u0437 \u043F\u0440\u043E\u0431\u0435\u043B\u043E\u0432)",
      value: anchor,
      onChange: function onChange(value) {
        return setAttributes({
          anchor: value
        });
      },
      __source: {
        fileName: _jsxFileName,
        lineNumber: 39
      },
      __self: this
    })), wp.element.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: "ID \u0438\u043A\u043E\u043D\u043A\u0438",
      value: iconTitle,
      onChange: function onChange(value) {
        return setAttributes({
          iconTitle: value
        });
      },
      __source: {
        fileName: _jsxFileName,
        lineNumber: 45
      },
      __self: this
    }), wp.element.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["PanelRow"], {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 50
      },
      __self: this
    }))), wp.element.createElement("div", {
      className: "article__section",
      id: anchor,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 54
      },
      __self: this
    }, wp.element.createElement("h3", {
      className: "heading heading--md heading--primary",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 55
      },
      __self: this
    }, wp.element.createElement("span", {
      className: "heading__icon",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 56
      },
      __self: this
    }, wp.element.createElement("svg", {
      className: "icon",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 57
      },
      __self: this
    }, wp.element.createElement("use", {
      xlinkHref: '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#' + iconTitle,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 58
      },
      __self: this
    }))), wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["RichText"], {
      onChange: function onChange(value) {
        return setAttributes({
          title: value
        });
      },
      value: title,
      tagName: 'span',
      placeholder: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__["__"])('Название секции', 'hpractice-gb'),
      className: "heading__text",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 61
      },
      __self: this
    })), wp.element.createElement("div", {
      className: "article__section-content",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 69
      },
      __self: this
    }, wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["InnerBlocks"], {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 70
      },
      __self: this
    }))));
  },
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    var title = attributes.title,
        anchor = attributes.anchor,
        iconTitle = attributes.iconTitle;
    var xref = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])('use', {
      'xlink:href': '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#' + iconTitle
    });
    return wp.element.createElement("div", {
      className: "article__section",
      "data-anhor-item": true,
      id: anchor,
      __source: {
        fileName: _jsxFileName,
        lineNumber: 83
      },
      __self: this
    }, wp.element.createElement("h3", {
      className: "heading heading--md heading--primary",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 84
      },
      __self: this
    }, wp.element.createElement("span", {
      className: "heading__icon",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 85
      },
      __self: this
    }, wp.element.createElement("svg", {
      className: "icon",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 86
      },
      __self: this
    }, xref)), wp.element.createElement("span", {
      className: "heading__text",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 90
      },
      __self: this
    }, title)), wp.element.createElement("div", {
      className: "article__section-content",
      __source: {
        fileName: _jsxFileName,
        lineNumber: 92
      },
      __self: this
    }, wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_2__["InnerBlocks"].Content, {
      __source: {
        fileName: _jsxFileName,
        lineNumber: 93
      },
      __self: this
    })));
  }
});

/***/ }),

/***/ "./assets/blocks/delivery-block/styles.editor.scss":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/blocks/editor.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _content_block__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("./assets/blocks/content-block/index.js");
/* harmony import */ var _content_section__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("./assets/blocks/content-section/index.js");
/* harmony import */ var _delivery_block__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("./assets/blocks/delivery-block/index.js");
/* harmony import */ var _link__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("./assets/blocks/link/index.js");





/***/ }),

/***/ "./assets/blocks/link/edit.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return LinkEdit; });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);
var _jsxFileName = "D:\\OpenServer\\domains\\hpractic.loc\\wp-content\\plugins\\rodkin-custom-gutenberg-blocks\\assets\\blocks\\link\\edit.js";

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }






var LinkEdit =
/*#__PURE__*/
function (_Component) {
  _inherits(LinkEdit, _Component);

  function LinkEdit() {
    var _getPrototypeOf2;

    var _this;

    _classCallCheck(this, LinkEdit);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _possibleConstructorReturn(this, (_getPrototypeOf2 = _getPrototypeOf(LinkEdit)).call.apply(_getPrototypeOf2, [this].concat(args)));

    _defineProperty(_assertThisInitialized(_this), "state", {
      selectedItem: null
    });

    _defineProperty(_assertThisInitialized(_this), "addItem", function () {
      var _this$props = _this.props,
          setAttributes = _this$props.setAttributes,
          attributes = _this$props.attributes;
      var items = attributes.items;
      var newItems = [].concat(_toConsumableArray(items), [{
        value: ''
      }]);
      setAttributes({
        items: newItems
      });

      _this.setState({
        selectedItem: newItems.length - 1
      });
    });

    _defineProperty(_assertThisInitialized(_this), "removeItem", function (i) {
      var _this$props2 = _this.props,
          setAttributes = _this$props2.setAttributes,
          attributes = _this$props2.attributes;
      var items = attributes.items;

      var newItems = _toConsumableArray(items);

      newItems.splice(i, 1);
      setAttributes({
        items: newItems
      });

      _this.setState({
        selectedItem: null
      });
    });

    _defineProperty(_assertThisInitialized(_this), "updateItem", function (value, i) {
      var _this$props3 = _this.props,
          setAttributes = _this$props3.setAttributes,
          attributes = _this$props3.attributes;
      var items = attributes.items;

      var newItems = _toConsumableArray(items);

      newItems[i].value = value;
      setAttributes({
        items: newItems
      });
    });

    return _this;
  }

  _createClass(LinkEdit, [{
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$props4 = this.props,
          className = _this$props4.className,
          attributes = _this$props4.attributes,
          setAttributes = _this$props4.setAttributes,
          isSelected = _this$props4.isSelected;
      var items = attributes.items,
          type = attributes.type;
      return wp.element.createElement(wp.element.Fragment, null, wp.element.createElement("div", {
        className: isSelected ? className + ' active' : className,
        __source: {
          fileName: _jsxFileName,
          lineNumber: 51
        },
        __self: this
      }, wp.element.createElement("div", {
        className: "block-title",
        __source: {
          fileName: _jsxFileName,
          lineNumber: 52
        },
        __self: this
      }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])("Контейнер ссылок", "hpractice-gb")), wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["InspectorControls"], {
        __source: {
          fileName: _jsxFileName,
          lineNumber: 53
        },
        __self: this
      }, wp.element.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelBody"], {
        title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])('Настройки блока ссылок', 'v-catena-gutenberg'),
        initialOpen: true,
        __source: {
          fileName: _jsxFileName,
          lineNumber: 54
        },
        __self: this
      }, wp.element.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["PanelRow"], {
        __source: {
          fileName: _jsxFileName,
          lineNumber: 58
        },
        __self: this
      }, wp.element.createElement(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__["SelectControl"], {
        label: "\u0422\u0438\u043F \u0441\u0441\u044B\u043B\u043E\u043A (\u0422\u0435\u043B\u0435\u0444\u043E\u043D / Email)",
        value: type,
        options: [{
          label: 'Телефон',
          value: 'phone'
        }, {
          label: 'Email',
          value: 'email'
        }],
        onChange: function onChange(val) {
          return setAttributes({
            type: val
          });
        },
        __source: {
          fileName: _jsxFileName,
          lineNumber: 59
        },
        __self: this
      })))), items.length > 0 && items.map(function (item, i) {
        if ('' === item.phone) {
          return wp.element.createElement(wp.element.Fragment, null, 0 < i && wp.element.createElement("br", {
            __source: {
              fileName: _jsxFileName,
              lineNumber: 76
            },
            __self: this
          }), wp.element.createElement("a", {
            key: i,
            onClick: function onClick() {
              return _this2.setState({
                selectedItem: i
              });
            },
            className: isSelected && i === _this2.state.selectedItem ? 'link link--secondary link--md active' : 'link link--secondary link--md',
            __source: {
              fileName: _jsxFileName,
              lineNumber: 78
            },
            __self: this
          }, wp.element.createElement("span", {
            className: "link__inner",
            __source: {
              fileName: _jsxFileName,
              lineNumber: 83
            },
            __self: this
          }, wp.element.createElement("svg", {
            className: "icon",
            __source: {
              fileName: _jsxFileName,
              lineNumber: 84
            },
            __self: this
          }, wp.element.createElement("use", {
            xlinkHref: 'phone' === type ? '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-phone' : '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-mail',
            __source: {
              fileName: _jsxFileName,
              lineNumber: 85
            },
            __self: this
          })), wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["RichText"], {
            onChange: function onChange(value) {
              return _this2.updateItem(value, i);
            },
            value: "",
            tagName: "span",
            placeholder: "+38 050 000-00-00",
            __source: {
              fileName: _jsxFileName,
              lineNumber: 90
            },
            __self: this
          }))), isSelected && i === _this2.state.selectedItem && wp.element.createElement("span", {
            className: "item__remove",
            onClick: function onClick() {
              return _this2.removeItem(i);
            },
            __source: {
              fileName: _jsxFileName,
              lineNumber: 99
            },
            __self: this
          }, wp.element.createElement("svg", {
            className: "icon",
            __source: {
              fileName: _jsxFileName,
              lineNumber: 103
            },
            __self: this
          }, wp.element.createElement("use", {
            xlinkHref: "/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-circle-x",
            __source: {
              fileName: _jsxFileName,
              lineNumber: 104
            },
            __self: this
          }))));
        } else {
          return wp.element.createElement(wp.element.Fragment, null, 0 < i && wp.element.createElement("br", {
            __source: {
              fileName: _jsxFileName,
              lineNumber: 112
            },
            __self: this
          }), wp.element.createElement("a", {
            key: i,
            onClick: function onClick() {
              return _this2.setState({
                selectedItem: i
              });
            },
            className: isSelected && i === _this2.state.selectedItem ? 'link link--secondary link--md active' : 'link link--secondary link--md',
            __source: {
              fileName: _jsxFileName,
              lineNumber: 114
            },
            __self: this
          }, wp.element.createElement("span", {
            className: "link__inner",
            __source: {
              fileName: _jsxFileName,
              lineNumber: 119
            },
            __self: this
          }, wp.element.createElement("svg", {
            className: "icon",
            __source: {
              fileName: _jsxFileName,
              lineNumber: 120
            },
            __self: this
          }, wp.element.createElement("use", {
            xlinkHref: 'phone' === type ? '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-phone' : '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-mail',
            __source: {
              fileName: _jsxFileName,
              lineNumber: 121
            },
            __self: this
          })), wp.element.createElement(_wordpress_editor__WEBPACK_IMPORTED_MODULE_1__["RichText"], {
            onChange: function onChange(value) {
              return _this2.updateItem(value, i);
            },
            value: item.value,
            tagName: "span",
            placeholder: "+38 050 000-00-00",
            __source: {
              fileName: _jsxFileName,
              lineNumber: 126
            },
            __self: this
          }))), isSelected && i === _this2.state.selectedItem && wp.element.createElement("span", {
            className: "item__remove",
            onClick: function onClick() {
              return _this2.removeItem(i);
            },
            __source: {
              fileName: _jsxFileName,
              lineNumber: 135
            },
            __self: this
          }, wp.element.createElement("svg", {
            className: "icon",
            __source: {
              fileName: _jsxFileName,
              lineNumber: 139
            },
            __self: this
          }, wp.element.createElement("use", {
            xlinkHref: "/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-circle-x",
            __source: {
              fileName: _jsxFileName,
              lineNumber: 140
            },
            __self: this
          }))));
        }
      }), isSelected && items[items.length - 1].phone !== '' && wp.element.createElement(wp.element.Fragment, null, wp.element.createElement("div", {
        className: "item__add",
        __source: {
          fileName: _jsxFileName,
          lineNumber: 150
        },
        __self: this
      }, wp.element.createElement("button", {
        onClick: this.addItem,
        __source: {
          fileName: _jsxFileName,
          lineNumber: 151
        },
        __self: this
      }, "\u0414\u043E\u0431\u0430\u0432\u0438\u0442\u044C \u043D\u043E\u0432\u0443\u044E \u0441\u0441\u044B\u043B\u043A\u0443")))));
    }
  }]);

  return LinkEdit;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Component"]);



/***/ }),

/***/ "./assets/blocks/link/index.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_editor_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__("./assets/blocks/link/styles.editor.scss");
/* harmony import */ var _styles_editor_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_styles_editor_scss__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__("@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__("@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__("./assets/blocks/link/edit.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__("@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__);
var _jsxFileName = "D:\\OpenServer\\domains\\hpractic.loc\\wp-content\\plugins\\rodkin-custom-gutenberg-blocks\\assets\\blocks\\link\\index.js";





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__["registerBlockType"])("gutenberg-custom-block/link", {
  title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])("Ссылка на Телефоны / Email", "hpractice-gb"),
  description: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])("Вставка номера телефона со ссылкой и иконкой", "hpractice-gb"),
  category: "text",
  icon: wp.element.createElement("svg", {
    xmlns: "http://www.w3.org/2000/svg",
    enableBackground: "new 0 0 24 24",
    height: "24px",
    viewBox: "0 0 24 24",
    width: "24px",
    fill: "#000000",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 12
    },
    __self: undefined
  }, wp.element.createElement("g", {
    __source: {
      fileName: _jsxFileName,
      lineNumber: 12
    },
    __self: undefined
  }, wp.element.createElement("rect", {
    fill: "none",
    height: "24",
    width: "24",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 12
    },
    __self: undefined
  }), wp.element.createElement("path", {
    d: "M17,15l1.55,1.55c-0.96,1.69-3.33,3.04-5.55,3.37V11h3V9h-3V7.82C14.16,7.4,15,6.3,15,5c0-1.65-1.35-3-3-3S9,3.35,9,5 c0,1.3,0.84,2.4,2,2.82V9H8v2h3v8.92c-2.22-0.33-4.59-1.68-5.55-3.37L7,15l-4-3v3c0,3.88,4.92,7,9,7s9-3.12,9-7v-3L17,15z M12,4 c0.55,0,1,0.45,1,1s-0.45,1-1,1s-1-0.45-1-1S11.45,4,12,4z",
    __source: {
      fileName: _jsxFileName,
      lineNumber: 12
    },
    __self: undefined
  }))),
  keywords: [Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])("Ссылка", "hpractice-gb"), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])("Ссылка на телефон", "hpractice-gb"), Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__["__"])("Ссылка на email", "hpractice-gb")],
  attributes: {
    items: {
      type: 'array',
      default: [{
        value: ''
      }],
      query: [{
        value: {
          type: 'string'
        }
      }]
    },
    type: {
      type: 'string',
      default: 'phone'
    }
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_3__["default"],
  save: function save(_ref) {
    var attributes = _ref.attributes;
    var items = attributes.items,
        type = attributes.type;
    var isPhone = 'phone' === type;
    var icon = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_4__["createElement"])('use', {
      'xlink:href': isPhone ? '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-phone' : '/wp-content/themes/hpractic/frontend/src/img/icons-sprite.svg#icon-mail'
    });
    return wp.element.createElement(wp.element.Fragment, null, items.length > 0 && items.map(function (item, i) {
      return wp.element.createElement(wp.element.Fragment, null, i > 0 && wp.element.createElement("br", {
        __source: {
          fileName: _jsxFileName,
          lineNumber: 50
        },
        __self: this
      }), wp.element.createElement("a", {
        key: i,
        href: isPhone ? 'tel:' + item.value.replace(/(\s|\(|\)|-)/g, '') : 'mailto:' + item.value,
        className: "link link--secondary link--md",
        __source: {
          fileName: _jsxFileName,
          lineNumber: 52
        },
        __self: this
      }, wp.element.createElement("span", {
        className: "link__inner",
        __source: {
          fileName: _jsxFileName,
          lineNumber: 57
        },
        __self: this
      }, wp.element.createElement("svg", {
        className: "icon",
        __source: {
          fileName: _jsxFileName,
          lineNumber: 58
        },
        __self: this
      }, icon), wp.element.createElement("span", {
        __source: {
          fileName: _jsxFileName,
          lineNumber: 61
        },
        __self: this
      }, item.value))));
    }));
  }
});

/***/ }),

/***/ "./assets/blocks/link/styles.editor.scss":
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "@wordpress/blocks":
/***/ (function(module, exports) {

module.exports = wp["blocks"];

/***/ }),

/***/ "@wordpress/components":
/***/ (function(module, exports) {

module.exports = wp["components"];

/***/ }),

/***/ "@wordpress/editor":
/***/ (function(module, exports) {

module.exports = wp["editor"];

/***/ }),

/***/ "@wordpress/element":
/***/ (function(module, exports) {

module.exports = wp["element"];

/***/ }),

/***/ "@wordpress/i18n":
/***/ (function(module, exports) {

module.exports = wp["i18n"];

/***/ })

/******/ });
//# sourceMappingURL=editor.js.map