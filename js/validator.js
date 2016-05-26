$(document).ready(function() {
    $('#formularioBusquedaSimple').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            textoBusqueda: {
                validators: {
                    notEmpty: {
                        message: 'El texto es requerido'
                    }
                }
            }
        }
    });

    $('#formularioBusquedaAvanzada').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            run: {
                validators: {
                    stringLength: {
                        max: 12,
                        message: 'El run debe contener máximo 12 caracteres'
                    }
                }
            },
            nombre: {
                validators: {
                    stringLength: {
                        max: 60,
                        message: 'El nombre debe contener máximo 60 caracteres'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'El nombre solo puede tener letras'
                    }
                }
            },
            apellido: {
                validators: {
                    stringLength: {
                        max: 60,
                        message: 'El apellido debe contener máximo 60 caracteres'
                    }
                }
            },
            mail:{
                validators: {
                    emailAddress: {
                        message: 'El mail no es valido'
                    },
                    stringLength: {
                        max: 60,
                        message: 'El mail debe contener máximo 60 caracteres'
                    }
                }   
            },
            fono: {
                validators: {
                    stringLength: {
                        max: 30,
                        message: 'El teléfono debe contener máximo 30 caracteres'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'El teléfono solo puede contener números'
                    }
                }
            },
            direccion: {
                validators: {
                    stringLength: {
                        max: 60,
                        message: 'La dirección debe contener máximo 60 caracteres'
                    }
                }
            },
            genero: {
                validators: {
                    stringLength: {
                        max: 1,
                        message: 'El genero no puede contener más de 1 caracter'
                    }
                }
            }
        }
    });
});