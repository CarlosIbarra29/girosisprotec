/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
var __webpack_exports__ = {};
/*!***********************************************************!*\
  !*** ../demo1/src/js/pages/custom/login/login-general.js ***!
  \***********************************************************/


// Class Definition
    var Login = function() {
        var _login;
        var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';

        var _showForm = function(form) {
            var cls = 'login-' + form + '-on';
            var form = 'kt_login_' + form + '_form';

            _login.removeClass('login-forgot-on');
            _login.removeClass('login-signin-on');
            _login.addClass(cls);

            KTUtil.animateClass(KTUtil.getById(form), 'animate__animated animate__backInUp');
        }

        var _handleSignInForm = function() {

            var formSubmitButton = KTUtil.getById('kt_login_signin_submit');
            var validation;
            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_signin_form'),
                {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese su Usuario'
                                },
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese su Contraseña'
                                }
                            }
                        },
                        captcha: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese el captcha'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            $('#kt_login_signin_submit').on('click', function (e) {
                e.preventDefault();

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        KTUtil.btnWait(formSubmitButton, _buttonSpinnerClasses);
                        var form1 = KTUtil.getById('kt_login_signin_form');
                        form1.submit();
                    }
                });
            });

            // Handle forgot button
            $('#kt_login_forgot').on('click', function (e) {
                e.preventDefault();
                _showForm('forgot');
            });

        }


        var _handleForgotForm = function(e) {
            var validation;

            validation = FormValidation.formValidation(
                KTUtil.getById('kt_login_forgot_form'),
                {
                    fields: {
                        email: {
                            validators: {
                                notEmpty: {
                                    message: 'Ingrese su correo'
                                },
                                emailAddress: {
                                    message: 'Su correo no es valido'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            $('#kt_login_forgot_submit').on('click', function (e) {
                e.preventDefault();

                validation.validate().then(function(status) {
                    if (status == 'Valid') {
                        // Submit form

                    } else {

                    }
                });
            });

            $('#kt_login_forgot_cancel').on('click', function (e) {
                e.preventDefault();

                _showForm('signin');
            });
        }

        var _initEvents = function () {
            $('#refresh-captcha').click(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: 'refresh-captcha',
                    success: function (data) {
                        $(".captcha span").html(data.captcha);
                    }
                });
            });
        }

        return {
            init: function() {
                _login = $('#kt_login');
                _handleSignInForm();
                _handleForgotForm();
                _initEvents();
            }
        };
    }();

    jQuery(document).ready(function() {
        Login.init();
    });

/******/ })()
;
//# sourceMappingURL=login-general.js.map
