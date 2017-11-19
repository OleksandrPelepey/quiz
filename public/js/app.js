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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 35);
/******/ })
/************************************************************************/
/******/ ({

/***/ 35:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(36);


/***/ }),

/***/ 36:
/***/ (function(module, exports) {

(function ($) {
    'use strict';

    var deleteQuestionSelector = '[data-delete-question]';

    function getQuestionHtml() {
        var index = getQuestionHtml.counter++;
        var $questionTmpl = $('\n            <div class="question" data-quiz-question>\n                <input type="hidden" name="questions[' + index + '][answers]" value="[]">\n\n                <div class="form-group">\n                    <input type="text" name="questions[' + index + '][body]"\n                     class="form-control" placeholder="Question" required>\n                </div>\n\n                <div class="form-group text-right">\n                    <button type="button" class="btn btn-danger" data-delete-question>Delete</button>\n                </div>\n            </div>\n        ');

        return $questionTmpl;
    }

    getQuestionHtml.counter = 0;

    // function getQuestionHtml(question) {
    //     $questionTmpl = $questionTmpl.clone();
    //     $questionTmpl.find('[name="question[]"]').val(question.body);
    // }

    $('[data-quiz-questions-input]').each(function () {
        var $questionsInput = $(this);
        var $questionsWrap = $questionsInput.find('[data-quiz-questions-input-wrap]');
        var $addQuestionBtns = $questionsInput.find('[data-add-question]');
        // var $deleteQuestionBtns = $questionsInput.find(deleteQuestionSelector);
        // var questions = $questionsInput.find('[name="questions"]').val();

        $addQuestionBtns.click(function (e) {
            e.preventDefault();
            $questionsWrap.append(getQuestionHtml());
        });

        $questionsWrap.on('click', deleteQuestionSelector, function (e) {
            e.preventDefault();
            var $this = $(this);

            $this.parents('[data-quiz-question]').remove();
        });
    });
})(jQuery);

/***/ })

/******/ });