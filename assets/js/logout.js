/**
 * Created by lapsh on 26.03.2016.
 */
function logout(){
    $.get('?p=login&logout=1', {}, function(res) {
        window.location.href = "?p=index";
    });
}

function login(){
    $.post('?p=login', {login: $('#inputEmail').val(), pass: $('#inputPassword').val()}, function(res){
        console.log(res);
        if(res == 'err'){
            alert('Ошибка авторизации, попрубейте еще раз. (test/test)')
        } else {
            window.location.href = "?p=index";
        }
    })
}

window.alert = function(text){
    $.snackbar({content: text});
}