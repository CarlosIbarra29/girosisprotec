/******/ (() => {
  // webpackBootstrap
  /******/ "use strict";
    var __webpack_exports__ = {};
    // Class definition
    var KTAppChat = (function () {
        var _chatAsideEl;
        var _chatAsideOffcanvasObj;
        var _chatContentEl;

        // Private functions
        var _initAside = function () {
            // Mobile offcanvas for mobile mode
            _chatAsideOffcanvasObj = new KTOffcanvas(_chatAsideEl, {
                overlay: true,
                baseClass: "offcanvas-mobile",
                //closeBy: 'kt_chat_aside_close',
                toggleBy: "kt_app_chat_toggle",
            });

            // User listing
            var cardScrollEl = KTUtil.find(_chatAsideEl, ".scroll");
            var cardBodyEl = KTUtil.find(_chatAsideEl, ".card-body");
            var searchEl = KTUtil.find(_chatAsideEl, ".input-group");

            if (cardScrollEl) {
                // Initialize perfect scrollbar(see:  https://github.com/utatti/perfect-scrollbar)
                KTUtil.scrollInit(cardScrollEl, {
                    mobileNativeScroll: true, // Enable native scroll for mobile
                    desktopNativeScroll: false, // Disable native scroll and use custom scroll for desktop
                    resetHeightOnDestroy: true, // Reset css height on scroll feature destroyed
                    handleWindowResize: true, // Recalculate hight on window resize
                    rememberPosition: true, // Remember scroll position in cookie
                    height: function () {
                        // Calculate height
                        var height;

                        if (KTUtil.isBreakpointUp("lg")) {
                            height = KTLayoutContent.getHeight();
                        } else {
                            height = KTUtil.getViewPort().height;
                        }

                        if (_chatAsideEl) {
                            height =
                                height -
                                parseInt(KTUtil.css(_chatAsideEl, "margin-top")) -
                                parseInt(KTUtil.css(_chatAsideEl, "margin-bottom"));
                            height =
                                height -
                                parseInt(KTUtil.css(_chatAsideEl, "padding-top")) -
                                parseInt(KTUtil.css(_chatAsideEl, "padding-bottom"));
                        }

                        if (cardScrollEl) {
                            height =
                                height -
                                parseInt(KTUtil.css(cardScrollEl, "margin-top")) -
                                parseInt(KTUtil.css(cardScrollEl, "margin-bottom"));
                        }

                        if (cardBodyEl) {
                            height =
                                height -
                                parseInt(KTUtil.css(cardBodyEl, "padding-top")) -
                                parseInt(KTUtil.css(cardBodyEl, "padding-bottom"));
                        }

                        if (searchEl) {
                            height = height - parseInt(KTUtil.css(searchEl, "height"));
                            height =
                                height -
                                parseInt(KTUtil.css(searchEl, "margin-top")) -
                                parseInt(KTUtil.css(searchEl, "margin-bottom"));
                        }

                        // Remove additional space
                        height = height - 2;

                        return height;
                    },
                });
            }
        };

        return {
            // Public functions
            init: function () {
                // Elements
                _chatAsideEl = KTUtil.getById("kt_chat_aside");
                _chatContentEl = KTUtil.getById("kt_chat_content");

                // Init aside and user list
                _initAside();

                KTLayoutChat.setup(KTUtil.getById("kt_chat_content"));

                var scroll_el = $(".scroll");
                if (scroll_el) {
                    var ps = KTUtil.data(scroll_el).get("ps");
                    if (ps) {
                        ps.update();
                    }
                    scroll_el.scrollTop(0);
                }
            },
        };
    })();

    jQuery(document).ready(function () {
        KTAppChat.init();

        $("#user_select").select2({
            placeholder: "Select a state",
        });

        const socket = io("http://ec2-54-236-5-7.compute-1.amazonaws.com:3000");

        let conversationId = $("#conversationId").val();
        let myUserId = $("#userId").val();
        let urlSaveMessage = $("#urlSaveMessage").val();

        socket.emit("join_conversation", conversationId);

        $("#sendMessageButton").click(() => {
            sendMessage();

            // Scroll to bottom
            var scroll_el = $(".scroll");
            if (scroll_el) {
                var ps = KTUtil.data(scroll_el).get("ps");
                if (ps) {
                    ps.update();
                }
                scroll_el.scrollTop(0);
            }
        });

        $("#messageInput").on("keydown", (event) => {
            if (event.key === "Enter" && !event.shiftKey) {
                event.preventDefault();
                sendMessage();
            } else if (event.key === "Enter" && event.shiftKey) {
                let messageInput = $("#messageInput");
                messageInput.val(messageInput.val() + "\n");
            }
        });

        function sendMessage() {
            if ($("#messageInput").val() == "") {
                Swal.fire({
                    icon: "warning",
                    title: "Oops...",
                    text: "No puedes enviar un mensaje vacío",
                });
                return;
            }

            $.ajax({
                url: urlSaveMessage,
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    conversation_id: conversationId,
                    message: $("#messageInput").val(),
                },
                success: function (response) {
                    socket.emit("message", {
                        userId: $("#userId").val(),
                        conversationId: conversationId,
                        message: $("#messageInput").val(),
                    });

                    $("#messageInput").val("");

                    // Scroll to bottom
                    var scroll_el = $(".scroll");
                    if (scroll_el) {
                        var ps = KTUtil.data(scroll_el).get("ps");
                        if (ps) {
                            ps.update();
                        }
                        scroll_el.scrollTop(0);
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }

        // function to verify if avatar is "no" then show only the first letter of the name
        function avatarOrName(avatar, avatar_url, user_name) {
            if (avatar == "no") {
                return `<div class="symbol-label symbol font-size-h5 font-weight-bold text-uppercase">${user_name.charAt(0)}</div>`;
            } else {
                return `<img src="${avatar_url}" class="symbol-label rounded-circle symbol symbol-50 mr-3" alt="image">`;
            }
        }        


        socket.on("message", (data) => {
            myUserId = $("#userId").val();
            let my_avatar = $("#avatar").val(); // nombre y extension del archivo
            let my_avatar_url = $("#avatar_url").val(); // url del archivo (ruta completa)
            let reciver_avatar_url = $("#reciver_avatar_url").val();
            let reciver_avatar = $("#reciver_avatar").val();
            let message = data.message;
            let userId = data.userId;
            let my_user_name = $("#user_name").val();
            let reciver_user_name = $("#reciver_user_name").val();

            if (userId == myUserId) {
                $("#messages").prepend(
                    `<div class="d-flex flex-column mb-5 align-items-end">
                    <div class="d-flex align-items-center">
                        <div class="mr-2">
                            <a href="#"
                                class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Tu</a>
                        </div>
                        <div class="d-flex align-items-center chat-list-item">
                            <div class="symbol symbol-circle symbol-40 mr-3">
                                ` + avatarOrName(my_avatar, my_avatar_url, my_user_name) + `
                            </div>
                            <div class="d-flex flex-column">
                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mr-2">
                            ${my_user_name}
                            </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mt-2 rounded p-5 bg-primary text-white font-weight-bold font-size-lg text-right max-w-400px">${message}</div>
                </div>`
                );

                // Scroll to bottom
                var scroll_el = $(".scroll");
                if (scroll_el) {
                    scroll_el.scrollTop(0);
                }
            }

            if (userId != myUserId) {
                $("#messages").prepend(
                    `<div class="d-flex flex-column mb-5 align-items-start">
                    <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center chat-list-item">
                    <div class="symbol symbol-circle symbol-40 mr-3">
                    ` + avatarOrName(reciver_avatar, reciver_avatar_url, reciver_user_name) + `
                    </div>
                    <div class="d-flex flex-column">
                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mr-2">
                    ${reciver_user_name}
                    </a>
                    </div>
                </div>
                        <div>
                        </div>
                    </div>
                    <div
                        class="mt-2 rounded p-5 bg-secondary text-dark-70 font-weight-bold font-size-lg text-left max-w-400px">${message}</div>
                </div>`
                );

                // Scroll to bottom
                var scroll_el = $(".scroll");
                if (scroll_el) {
                    var ps = KTUtil.data(scroll_el).get("ps");
                    if (ps) {
                        ps.update();
                    }
                    scroll_el.scrollTop(0);
                }
            }
        });
    });

    /******/
})();
