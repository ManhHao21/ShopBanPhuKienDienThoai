$(function() {
    var INDEX = 0;

    // Mảng các nội dung chào mừng
    var welcomeMessages = [
        "Chào mừng bạn đến với hệ thống phụ kiện điện thoại ABC!",
        "Bạn đang tìm kiếm phụ kiện nào cho dế yêu của mình?",
        "Chúng tôi có đa dạng phụ kiện chất lượng cao. Hãy chọn danh mục bên dưới."
    ];

    // Danh mục phụ kiện điện thoại dựa trên hình ảnh bạn cung cấp
    var buttonOptions = [
        { name: 'Sạc & Cáp sạc', value: 'sac_cap_sac' },
        { name: 'Tai nghe', value: 'tai_nghe' },
        { name: 'Pin dự phòng', value: 'pin_du_phong' },
        { name: 'Phụ kiện thay thế', value: 'phu_kien_thay_the' },
        { name: 'Màn hình', value: 'man_hinh' },
        { name: 'Tai nghe có dây', value: 'tai_nghe_co_day' },
        { name: 'Tai nghe không dây', value: 'tai_nghe_khong_day' }
    ];

    // Câu trả lời tương ứng với các danh mục mới
    var responseMessages = {
        sac_cap_sac: [
            "Bạn đang tìm kiếm sạc nhanh, cáp sạc bền bỉ cho điện thoại? Chúng tôi có đủ loại cho iPhone, Android...",
            "Xem tất cả sản phẩm sạc & cáp sạc tại đây: <a href='/products/sac-cap-sac' target='_blank'>Sạc & Cáp sạc</a>"
        ],
        tai_nghe: [
            "Tai nghe không dây, tai nghe có dây, tai nghe bluetooth... tất cả đều có chất lượng âm thanh tuyệt vời.",
            "Khám phá các loại tai nghe: <a href='/products/tai-nghe' target='_blank'>Tai nghe</a>"
        ],
        pin_du_phong: [
            "Pin dự phòng dung lượng cao, thiết kế nhỏ gọn, tiện lợi mang theo mọi lúc mọi nơi để điện thoại bạn không bao giờ hết pin.",
            "Mua pin dự phòng giá tốt: <a href='/products/pin-du-phong' target='_blank'>Pin dự phòng</a>"
        ],
        phu_kien_thay_the: [
            "Tìm kiếm phụ kiện thay thế chính hãng cho điện thoại của bạn như loa, mic, camera...",
            "Xem các phụ kiện thay thế: <a href='/products/phu-kien-thay-the' target='_blank'>Phụ kiện thay thế</a>"
        ],
        man_hinh: [
            "Màn hình điện thoại chính hãng, chất lượng cao để thay thế cho thiết bị của bạn. Đảm bảo hiển thị sắc nét.",
            "Tìm màn hình phù hợp: <a href='/products/man-hinh' target='_blank'>Màn hình</a>"
        ],
        tai_nghe_co_day: [
            "Các mẫu tai nghe có dây với âm thanh chân thực, độ bền cao, phù hợp cho mọi nhu cầu.",
            "Xem các sản phẩm tai nghe có dây: <a href='/products/tai-nghe-co-day' target='_blank'>Tai nghe có dây</a>"
        ],
        tai_nghe_khong_day: [
            "Tận hưởng sự tiện lợi và chất lượng âm thanh đỉnh cao với các dòng tai nghe không dây mới nhất.",
            "Khám phá tai nghe không dây: <a href='/products/tai-nghe-khong-day' target='_blank'>Tai nghe không dây</a>"
        ]
    };

    // Khi mở khung chat
    $("#chat-circle").click(function() {
        $("#chat-circle").toggle('scale');
        $(".chat-box").toggle('scale');

        var randomMessage = welcomeMessages[Math.floor(Math.random() * welcomeMessages.length)];
        generate_message(randomMessage, 'user');

        setTimeout(function() {
            generate_button_message("Vui lòng chọn danh mục phụ kiện bạn quan tâm:", buttonOptions);
        }, 1000);
    });

    // Hàm tạo tin nhắn văn bản
    function generate_message(msg, type) {
        INDEX++;
        var str = `<div id='cm-msg-${INDEX}' class="chat-msg ${type}">
            <span class="msg-avatar"></span>
            <div class="cm-msg-text">${msg}</div>
        </div>`;
        $(".chat-logs").append(str);
        $("#cm-msg-" + INDEX).hide().fadeIn(300);
        $(".chat-logs").stop().animate({
            scrollTop: $(".chat-logs")[0].scrollHeight
        }, 1000);
    }

    // Hàm tạo tin nhắn kèm nút lựa chọn
    function generate_button_message(msg, buttons) {
        INDEX++;
        var btn_obj = buttons.map(button =>
            `<li class="button"><a href="javascript:;" class="btn btn-primary chat-btn" chat-value="${button.value}">${button.name}</a></li>`
        ).join('');
        var str = `<div id='cm-msg-${INDEX}' class="chat-msg user">
            <span class="msg-avatar"></span>
            <div class="cm-msg-text">${msg}</div>
            <div class="cm-msg-button"><ul>${btn_obj}</ul></div>
        </div>`;
        $(".chat-logs").append(str);
        $("#cm-msg-" + INDEX).hide().fadeIn(300);
        $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight }, 1000);
    }

    // Khi click chọn danh mục
    $(document).delegate(".chat-btn", "click", function() {
        var value = $(this).attr("chat-value");
        var name = $(this).text();
        generate_message(name, 'self');
        show_response(value);
    });

    function show_response(value) {
        if (responseMessages[value]) {
            responseMessages[value].forEach(message => {
                setTimeout(() => {
                    generate_message(message, 'user');
                }, 500);
            });
        }
    }

    $("#chat-submit").click(function(e) {
        e.preventDefault(); // Ngăn chặn gửi form mặc định

        let input = $("#chat-input").val().trim(); // Lấy giá trị từ input
        $("#chat-input").val(''); // Reset input

        if (input === "") return; // Thoát nếu input rỗng

        // Hiển thị tin nhắn người dùng
        generate_message(input, 'self');

        // Gọi API từ server Laravel
        callChatAI(input);
    });

    // Hàm gọi API Chat AI
    // Hàm gọi API Chat AI với async/await
    function cleanResponse(text) {
        // Use a simple regex or other techniques to clean repetitive content
        let cleanedText = text.replace(/(\b\w+\b)(?=.*\1)/g, '').trim();
        return cleanedText;
    }


    async function callChatAI(message) {
        try {
            const response = await fetch('/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                body: JSON.stringify({
                    message
                }),
            });

            if (!response.ok) {
                throw new Error("Lỗi server khi gọi API.");
            }

            const data = await response.json();

            // Kiểm tra nếu có phản hồi từ bot
            if (Array.isArray(data) && data.length > 0) {
                // Lấy câu trả lời đầu tiên từ phản hồi
                const answer = data[0].text || "Xin lỗi, tôi không hiểu yêu cầu của bạn.";

                console.log(answer);
                generate_message(answer, 'user');
            } else {
                console.error("Không có phản hồi hợp lệ.");
                generate_message("Xin lỗi, tôi không hiểu yêu cầu của bạn.", 'user');
            }
        } catch (error) {
            console.error('Lỗi khi gọi API:', error);
            generate_message("Đã xảy ra lỗi. Vui lòng thử lại sau.", 'user');
        }
    }
});