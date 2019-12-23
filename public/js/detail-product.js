document.querySelector(".qty-minus").addEventListener("click", function() {
    var value = document.getElementById("qty").value;
    if (value !== "1") {
        document.getElementById("qty").value = +value - 1;
    }
});
document.querySelector(".qty-plus").addEventListener("click", function() {
    var value = document.getElementById("qty").value;
    document.getElementById("qty").value = +value + 1;
});
document.getElementById("add_cart").addEventListener("click", function() {
    var idProduct = this.getAttribute("data-product");
    var quantity = +document.getElementById("qty").value;
    var orderItem = [];
    var dataCart = getCookie("CART");
    if (dataCart !== "") {
        orderItem = JSON.parse(dataCart);
    }
    var item = {};
    item[idProduct] = quantity;
    for (var _item of orderItem) {
        if (_item[idProduct]) {
            toastError(lang === "kr" ? "장바구니에 제품이 이미 존재합니다" : "Sản phẩm đã tồn tại trong giỏ hàng.");
            return;
        }
    }
    orderItem.push(item);
    setCookie("CART", JSON.stringify(orderItem));
    document.getElementById("cart_quantity").innerText =
        "(" + orderItem.length + ")";
    toastSuccess(lang === "kr" ? "장바구니에 제품이 추가되었습니다!" : "Sản phẩm đã được thêm vào giỏ hàng!");
});