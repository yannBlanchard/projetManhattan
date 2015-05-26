/**
 * Created by thaonzo on 13/04/2015.
 */





$(document).ready(function(){

//minimum 8 characters
    var bad = /(?=.{8,}).*/;
//Alpha Numeric plus minimum 8
    var good = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/;
//Must contain at least one upper case letter, one lower case letter and (one number OR one special char).
    var better = /^(?=\S*?[A-Z])(?=\S*?[a-z])((?=\S*?[0-9])|(?=\S*?[^\w\*]))\S{8,}$/;
//Must contain at least one upper case letter, one lower case letter and (one number AND one special char).
    var best = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/;

    $('#password').on('keyup', function () {
        var password = $(this);
        var pass = password.val();
        var passLabel = $('[for="password"]');
        var stength = 'Weak';
        var pclass = 'danger';
        if (best.test(pass) == true) {
            stength = 'Very Strong';
            pclass = 'success';
        } else if (better.test(pass) == true) {
            stength = 'Strong';
            pclass = 'warning';
        } else if (good.test(pass) == true) {
            stength = 'Almost Strong';
            pclass = 'warning';
        } else if (bad.test(pass) == true) {
            stength = 'Weak';
        } else {
            stength = 'Very Weak';
        }

        var popover = password.attr('data-content', stength).data('bs.popover');
        popover.setContent();
        popover.$tip.addClass(popover.options.placement).removeClass('danger success info warning primary').addClass(pclass);

    });

    $('input[data-toggle="popover"]').popover({
        placement: 'top',
        trigger: 'focus'
    });



})

//AJAX REQUEST
$(".up").click(function(){

    request(result,"up");
});

$(".down").click(function(){

    request(result,"down");
});

function result(sData) {
    if(sData =="up"){
        $(".up").children("h3").html(parseInt($(".up").children("h3").html())+1)
        $(".up").addClass("disabled").removeClass("up");
        $(".down").addClass("disabled").removeClass("down");
    }
    else if(sData=="down"){
        $(".down").children("h3").html(parseInt($(".down").children("h3").html())+1)
        $(".up").addClass("disabled").removeClass("up");
        $(".down").addClass("disabled").removeClass("down");
    }
    else
    $(".errorajax").html("<h3>Erreur de vote</h3>")

}

function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
}
function request(callback, $tmp) {
    var xhr = getXMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
        }
    };

    xhr.open("POST", "controler/like_controler.php", true);

    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.send("type="+$tmp+"&pseudo="+$pseudo+"&cle="+$cle);

}

//END AJAX REQUEST
