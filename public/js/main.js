var cart = getCookie("CART");
var waitBtnSearch;
orderItems = [];
if (cart !== "") {
    orderItems = JSON.parse(cart);
}
document.getElementById("cart_quantity").innerText =
    "(" + orderItems.length + ")";
document.getElementById("search").addEventListener("focus", function(event) {
    setTimeout(function() {
        document.getElementById('nice_select').className = 'nice-select w-100 open';
    }, 100);
});
document.getElementById("search").addEventListener("keyup", delay(function(e) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $('#search_results').empty();
            var domAppend = "";
            var template = '<li class="option"><a href="/{{idProduct}}/{{urlSeo}}">{{name}} - {{nameKr}}</a></li>';
            if (this.responseText.length === 2) {
                domAppend = '<li class="option">Không có dữ liệu.</li>';
            } else {
                for (var item of JSON.parse(this.responseText)) {
                    domAppend += template
                        .replace('{{idProduct}}', item.idProduct)
                        .replace('{{urlSeo}}', item.urlSeo)
                        .replace('{{name}}', item.ten)
                        .replace('{{nameKr}}', item.tenKr);
                }
            }
            $('#search_results').append(domAppend);
        }
    };
    xhttp.open("GET", "/search?keyword=" + this.value, true);
    xhttp.send();
}, 500));

function delay(callback, ms) {
    var timer = 0;
    return function() {
        var context = this,
            args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function() {
            callback.apply(context, args);
        }, ms || 0);
    };
}