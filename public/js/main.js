(function ($) {
    "use strict";

    $(document).ready(function () {
        // Dropdown on mouse hover
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

        // Link scrolling
        // $('a[href*="#"]').click(function (event) {
        //     event.preventDefault();
        //
        //     let offs = $($(this).attr('href')).offset().top;
        //
        //     $('body, html').animate({scrollTop: offs}, 500);
        // })

        // Language button
        $('#lang-btn').click(function () {
            $('.dropdown-language').toggle()
        })

        $('#sign-up-btn').click(function (event) {
            event.preventDefault()

            send({
                    name: $("#sign-up-name").val(),
                    phone: $("#sign-up-phone").val(),
                    course: $("#sign-up-course").val(),
                },
                "/sign-up",
                "#sign-up"
            )
        })

        $("#send-msg-btn").click(function (event) {
            send({
                    name: $("#snd-msg-name").val(),
                    phone: $("#snd-msg-phone").val(),
                    message: $("#snd-msg-message").val(),
                },
                "/send-message",
                "#send-message"
             )
        })

        function send(formData, url, formId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                dataType: "json",
                encode: true,
            }).done(function(response) {
                if (response.success == true) {
                    $(formId + ' .error').hide()
                    $('#overlay').show()

                    /*
                    The client must create a new bot using BotFather (https://t.me/BotFather), get a token from it
                    and begin a chat with a new bot.
                    The user also must find out his Chat ID by this bot https://t.me/get_id_bot.
                    In the string below '5539533542:AAG9gn8MTUukoFyJ0uVzeGqPyUVgMQxj07I' is a token,
                    '549290537' is a Chat ID. Change them by user data.
                    */
                    const botToken = '5539533542:AAG9gn8MTUukoFyJ0uVzeGqPyUVgMQxj07I'
                    const chatId = '549290537'
                    const url = `https://api.telegram.org/bot${botToken}/sendMessage?chat_id=${chatId}&text=`;

                    let orderMessage = 'На сайте сделан заказ. '

                    let formIdDict = {
                        '#send-message': 'Форма "Записаться"',
                        '#sign-up': 'Форма "Отправить сообщение"'
                    }

                    let formDataDict = {
                        'name': 'Имя',
                        'phone': 'Телефон',
                        'course': 'Курс',
                        'message': 'Сообщение',
                    }

                    orderMessage += `\n${formIdDict[formId]}. `

                    for (let prop in formData) {
                        orderMessage += `\n${formDataDict[prop]}: ${formData[prop]}. `
                    }

                    //orderMessage += JSON.stringify(formData);

                    console.log(url + orderMessage)

                    fetch(url + orderMessage)
                        .then(function(data) {
                            console.log(data)
                        })
                        .catch(function() {
                            console.log("Something is wrong with a request to the Telegram bot")
                        });

                    setTimeout(() => {$('#overlay').hide()}, 3000)
                } else {
                    let error_message = '';
                    let obj = response.fails

                    for (let prop in obj) {
                        error_message += `${obj[prop]}<br>`;
                    }

                    $('#result, #copy').hide()
                    $(formId + ' .error').html(error_message).show();
                }
            }).fail(function(response) {
                let responseString =  'Server did not respond';

                if (response.status === 403) {
                    responseString = response.responseJSON;
                }

                console.log(responseString);
                $(formId + ' .error').html(responseString).show();
            });
        }

        $('#overlay').click(function () {
            $('#overlay').hide()
        })

        // Try it for free button
        // $('.try-it-button button').click(function (event) {
        //     event.preventDefault();
        //
        //     let offs = $('#sign-up').offset().top;
        //
        //     $('body, html').animate({scrollTop: offs}, 500);
        // })
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
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });

    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Courses carousel
    $(".courses-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        loop: true,
        dots: false,
        nav : false,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });


    // Team carousel
    $(".team-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
    });


    // Related carousel
    $(".related-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 30,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:4
            }
        }
    });

})(jQuery);

