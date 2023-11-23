(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });


    $(window).scroll(function () {
        const menu = document.querySelector(".header");
        const scrollY = window.scrollY;
        if (scrollY >= 450) {
            menu.style.position = "fixed"; // Sử dụng thuộc tính .style để thiết lập kiểu dáng
            menu.style.top = "0";
            menu.style.width = "100%";
        } else if (scrollY > 0 && scrollY < 450) {
            menu.style.top = "-300px";
        }
        else {
            menu.style.position = ""; // Sử dụng thuộc tính .style để thiết lập kiểu dáng
            menu.style.top = "";
        }
    });
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 100, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 500,
        responsive: {
            0: {
                items: 2
            },
            576: {
                items: 3
            },
            768: {
                items: 4
            },
            992: {
                items: 5
            },
            1200: {
                items: 6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });


    // Product Quantity
    // $('.quantity button').on('click', function () {
    //     var button = $(this);
    //     var oldValue = button.parent().parent().find('input').val();
    //     if (button.hasClass('btn-plus')) {
    //         var newVal = parseFloat(oldValue) + 1;
    //     } else {
    //         if (oldValue > 0) {
    //             var newVal = parseFloat(oldValue) - 1;
    //         } else {
    //             newVal = 0;
    //         }
    //     }
    //     button.parent().parent().find('input').val(newVal);
    // });

    $(document).ready(function () {
        // Xử lý sự kiện khi người dùng chọn size
        $('input[name="size"]').on('change', function () {
            var selectedSize = $('input[name="size"]:checked').val();
            // Gán giá trị vào trường input có id="selectedSize"
            $('#selectedSize').val(selectedSize);
        });

        // Xử lý sự kiện khi người dùng chọn màu sắc
        $('input[name="color"]').on('change', function () {
            var selectedColor = $('input[name="color"]:checked').val();
            // Gán giá trị vào trường input có id="selectedColor"
            $('#selectedColor').val(selectedColor);
        });
        $('input[name="rate"]').on('change', function () {
            var selectedRate = $('input[name="rate"]:checked').val();
            // Gán giá trị vào trường input có id="selectedColor"
            $('#selectedRate').val(selectedRate);
        });
        $('input[name="quantity"]').val(1);
        $('#selectedQuantity').val(1);
        // Xử lý sự kiện khi người dùng thay đổi số lượng
        $('.btn-minus, .btn-plus').on('click', function () {
            var quantityInput = $('input[name="quantity"]');
            var currentQuantity = parseInt(quantityInput.val());

            if ($(this).hasClass('btn-minus')) {
                // Giảm số lượng khi nhấn nút -
                currentQuantity = Math.max(currentQuantity - 1, 0);
            } else {
                // Tăng số lượng khi nhấn nút +
                currentQuantity++;
            }

            // Cập nhật giá trị vào trường input và input ẩn số lượng
            quantityInput.val(currentQuantity);
            $('#selectedQuantity').val(currentQuantity);
        });
    });

})(jQuery);

function confirmdelete(){
    return confirm("Bạn có chắc muốn xóa không ?");
};     
function confirmrestore(){
    return confirm("Bạn có chắc muốn khôi phục không ?");
};     

