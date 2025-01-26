const TEXTO_COMUN_REGEXP = /^[A-z0-9\u00C0-\u00ff\ \.,-\/#()&@\"]+$/;
const TEXTO_COMUN_MESSAGE = 'Por favor solo ingrese letras, números y signos: . , - / # ( ) & @ " ';

const CP_MX_REGEXP = /^\d{4,5}$/;
const CP_MX_MESSAGE = 'Por favor ingrese un código postal válido';

const CP_MX_ERRONEO1_REGEXP = /0{4,5}/;
const CP_MX_ERRONEO2_REGEXP = /1{4,5}/;
const CP_MX_ERRONEO3_REGEXP = /2{4,5}/;

const TELEFONO_REGEXP = /^[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){2}\d{3}|(\d{2}[\*\.\-\s]){3}\d{2}|(\d{4}[\*\.\-\s]){1}\d{4})|\d{8}|\d{10}|\d{12}$/;
const TELEFONO_MESSAGE = 'Por favor ingrese un número de teléfono válido';

const CORREO_REGEXP = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
const CORREO_MESSAGE = 'Por favor ingrese un correo válido';
const FOLIO_REGEXP = /^[A-z0-9\u00C0-\u00ff\.,-\/#()]+$/;

const CURP_MX_REGEXP = /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}$/;
const CURP_MX_MESSAGE = 'Por favor ingrese un CURP válido';


const strongPassword = function () {
    return {
        validate: function (input) {
            const value = input.value;
            if (value === '') {
                return {
                    valid: true,
                };
            }

            // Check the password strength
            if (value.length < 5) {
                return {
                    valid: false,
                };
            }

            // The password does not contain any uppercase character
            if (value === value.toLowerCase()) {
                return {
                    valid: false,
                };
            }

            // The password does not contain any uppercase character
            if (value === value.toUpperCase()) {
                return {
                    valid: false,
                };
            }

            // The password does not contain any digit
            if (value.search(/[0-9]/) < 0) {
                return {
                    valid: false,
                };
            }

            return {
                valid: true,
            };
        },
    };
};

// Register the validator
FormValidation.validators.checkPassword = strongPassword;