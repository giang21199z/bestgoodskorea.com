var listItems = [];
window.onload = function() {
    var waitBtnCheckout = new Waiting(document.getElementById("btn_checkout"));
    waitBtnCheckout.show();
    var numberHelper = new NumberHelper();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        var templateItem =
            '<tr><td class="cart_product_img"><a href="#"><img src="{{image}}" alt="Product"></a></td><td class="cart_product_desc"><h5>{{name}}</h5></td><td class="price"><span>{{price}} VNĐ</span></td><td class="qty"><div class="qty-btn d-flex"><div class="quantity" data-index="{{index}}"><span class="qty-minus"><i class="fa fa-minus disable-event-pointer" aria-hidden="true"></i></span><input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{{quantity}}" readonly><span class="qty-plus"><i class="fa fa-plus disable-event-pointer" aria-hidden="true"></i></span></div></div></td></tr>';
        // update message
        if (this.readyState == 4 && this.status == 200) {
            listItems = JSON.parse(this.responseText);
            var idx = 0;
            $("#cart_container").empty();
            for (var item of listItems) {
                $("#cart_container").append(
                    templateItem
                    .replace("{{name}}", lang === 'kr' ? item.nameKr : item.name)
                    .replace("{{image}}", item.image)
                    .replace("{{quantity}}", item.quantity)
                    .replace("{{price}}", numberHelper.cash(item.price))
                    .replace("{{index}}", idx++)
                );
            }
            updateBill();
            // update message
            waitBtnCheckout.hide();
            document.getElementById('cart_message').innerText = lang === 'kr' ? '빈!' : 'Trống rỗng!';
            if (listItems.length) {
                // has item shopping
                document.getElementById('cart_table').style.display = 'block';
                document.getElementById('cart_message').style.display = 'none';
                // add event plus and minus
                document
                    .querySelectorAll(".quantity").forEach(function(elm) {
                        elm.addEventListener("click", function(event) {
                            var value = this.querySelector(".qty-text").value;
                            if (event.target.className === "qty-minus") {
                                if (value !== "1") {
                                    var quantity = +value - 1;
                                    this.querySelector(".qty-text").value = quantity;
                                    listItems[this.getAttribute("data-index")].quantity = quantity;
                                }
                            } else if (event.target.className === "qty-plus") {
                                var quantity = +value + 1;
                                this.querySelector(".qty-text").value = quantity;
                                listItems[this.getAttribute("data-index")].quantity = quantity;
                            }
                            updateBill();
                        });
                    })
                addEventButton();
            }
        }
    };
    xhttp.open("POST", "/get-cart", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    var cart = getCookie("CART");
    cart = cart
        .replace(/"/g, "")
        .replace(/{/g, "[")
        .replace(/}/g, "]")
        .replace(/:/g, ",");
    xhttp.send(cart);

    function updateBill() {
        var totalCash = 0;
        for (var item of listItems) {
            totalCash += item.price * item.quantity;
        }
        document.getElementById("cart_total_bill").innerText =
            numberHelper.cash(totalCash) + " VNĐ";
        document.getElementById("final_cart_total_bill").innerText =
            numberHelper.cash(totalCash) + " VNĐ";
    }

    function addEventButton() {
        // add event checkout button
        document.getElementById("btn_checkout").addEventListener("click", function() {
            document.getElementById("cart_page").style.display = "none";
            document.getElementById("checkout_page").style.display = "block";
        });
        // btn payment
        document.getElementById("btn_payment").addEventListener("click", function() {
            var fullname = document.getElementById("fullname").value;
            var phone = document.getElementById("phone").value;
            var address = document.getElementById("address").value;
            var note = document.getElementById("note").value;
            var totalCash = 0;
            for (var item of listItems) {
                totalCash += item.price * item.quantity;
            }
            if (fullname === "" || phone === "" || address === "" || note === "") {
                toastError(lang === "kr" ? "전체 정보를 작성하십시오" : "Bạn vui lòng nhập đầy đủ thông tin.");
                return;
            }

            var content = "";
            var order = {
                ten_khach: fullname,
                sdt: phone,
                dia_chi: address,
                note: note,
                noi_dung: "noi dung",
                tong_tien: numberHelper.cash(totalCash) + " VNĐ"
            };
            var isConfirm = true;
            if (document.getElementById('cb_online').checked) {
                isConfirm = lang === 'kr' ? confirm(
                    "제품에 관심을 가져 주셔서 감사합니다.\n 다음 방법 중 하나를 통해 지불 할 수 있습니다..\n" +
                    "은행 계좌 VCB: 0711000246610 - NGUYEN DINH GIANG - 지점 Thanh Xuân.\n" +
                    "Zalo Pay: 0349607996 - Nguyễn Đình Giang.\n" +
                    "VinID: 0349607996 - Nguyễn Đình Giang.\n" +
                    "(참고 : 내용에 전화 번호를 기입하십시오.)"
                ) : confirm(
                    "Cám ơn bạn đã quan tâm sản phẩm của chúng tôi.\n Bạn có thể thanh toán qua 1 số phương thức sau.\n" +
                    "STK VCB: 0711000246610 - NGUYEN DINH GIANG - Chi nhánh Thanh Xuân.\n" +
                    "Zalo Pay: 0349607996 - Nguyễn Đình Giang.\n" +
                    "VinID: 0349607996 - Nguyễn Đình Giang.\n" +
                    "(Chú ý: Vui lòng gửi kèm số điện thoại vào nội dung CK.)"
                );
            }
            if (isConfirm) {
                var xhttp = new XMLHttpRequest();
                xhttp.open("POST", "/order", true);
                xhttp.setRequestHeader("Content-type", "application/json");
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        toastSuccess(
                            lang === 'kr' ? "주문 성공 최대한 빨리 연락 드리겠습니다." : "Đặt hàng thành công. Chúng tôi sẽ liên hệ với bạn sớm nhất có thể."
                        );
                        // clear cookie
                        setCookie("CART", "");
                        window.location = "/";
                    } else {
                        toastError(lang === 'kr' ? "주문이 실패했습니다. 다시 시도하십시오." : "Đặt hàng thất bại. Vui lòng thử lại.");
                    }
                    waitBtnPayment.hide();
                };
                var waitBtnPayment = new Waiting(document.getElementById("btn_payment"));
                waitBtnPayment.show();
                xhttp.send(JSON.stringify(order));
            }
        });
        // btn back cart
        document
            .getElementById("btn_back_cart")
            .addEventListener("click", function() {
                document.getElementById("cart_page").style.display = "block";
                document.getElementById("checkout_page").style.display = "none";
            });

        // cb cod
        document
            .querySelector(".payment-method")
            .addEventListener("click", function(event) {
                var target = event.target.getAttribute("data-target");
                if (target) {
                    this.querySelectorAll(".payment-type").forEach(function(elm) {
                        if (elm.id === target) {
                            elm.checked = true;
                        } else {
                            elm.checked = false;
                        }
                    });
                }
            });
    }
};