<!-- MOD_SCRIPT -->
<?php if (empty(session()->get('johnNoMessage'))) : ?>
    <style>
        .typewriter {
            overflow: hidden;
            /* Ensures the content is not revealed until the animation */
            border-right: .15em solid orange;
            /* The typwriter cursor */
            white-space: nowrap;
            /* Keeps the content on a single line */
            margin: 0 auto;
            /* Gives that scrolling effect as the typing happens */
            letter-spacing: .15em;
            /* Adjust as needed */
            animation:
                typing 3.5s steps(40, end),
                blink-caret .75s step-end infinite;
        }

        /* The typing effect */
        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        /* The typewriter cursor effect */
        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: orange;
            }
        }
    </style>

    <script>
        <?php helper('useraccount') ?>
        $(document).ready(function() {
            if ("<?= getIdNo() ?>" == "2018-2-03248") {
                alert("Hey jade, you have a message from John Mistica!")

                $('.greet-container').addClass("typewriter");
                $('.greeting').text("I Love You ");
                $('.exclamation').text("(~˘ ³˘)~❤️");
                $('div.row.mb-5').css('opacity', 0);
                setInterval(function() {
                    $('div.row.mb-5').animate({
                        opacity: 1
                    }, 1000);
                }, 4000);
            }
        });
    </script>
<?php endif; ?>
<?php
$userAccountModel = model('App\Models\LyceansAccountModel');
$userModel = model('App\Models\LyceansModel');
$user = $userAccountModel->where('username', session()->get('uid'))->where('password', session()->get('pwd'))->first();
if ($user != []) {
    $userInfo = $userModel->find($user['id_no']);
    $default_password = hash('sha256', str_replace(' ', '', strtoupper($userInfo['last_name'])));
    if ($user['password'] !== $default_password) {
        session()->set("johnNoMessage", 'done');
    }
}
?>
<!-- /MOD_SCRIPT -->