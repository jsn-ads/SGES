$(document).ready(function(){
    $('#cep').mask('00.000-000');
    $('#telefone').mask('(00)0 0000-0000');
    $('#data_nasc').mask('00/00/0000');
    $('#qd').mask('00000');
    $('#lt').mask('00000');
    $('#num').mask('00000');

    // $('#nome').mask("#", {
    //     maxlength: true,
    //     translation: {
    //         '#': {pattern: /[A-z À-ÿ]/, recursive: true}
    //     }
    // });

    // $('#cidade').mask("#", {
    //     maxlength: true,
    //     translation: {
    //         '#': {pattern: /[A-z À-ÿ]/, recursive: true}
    //     }
    // });

});