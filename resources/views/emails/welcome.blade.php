<!DOCTYPE>
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <!--[if !mso]-->
    <!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel="stylesheet">
    <!-- <![endif]-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>welcome </title>

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }

        p,
            {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        span.preheader {
            display: none;
            font-size: 1px;
        }

        html {
            width: 100%;
        }

        table {
            font-size: 14px;
            border: 0;
        }

        /* ----------- responsivity ----------- */

        @media only screen and (max-width: 640px) {

            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }

            .main-section-header {
                font-size: 28px !important;
            }

            .show {
                display: block !important;
            }

            .hide {
                display: none !important;
            }

            .align-center {
                text-align: center !important;
            }

            .no-bg {
                background: none !important;
            }

            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }

            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }

            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }

            .container580 {
                width: 400px !important;
            }

            .main-button {
                width: 220px !important;
            }

            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }

            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media only screen and (max-width: 479px) {

            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }

            .main-section-header {
                font-size: 26px !important;
            }

            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }

            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }

            .container590 {
                width: 280px !important;
            }

            .container580 {
                width: 260px !important;
            }

            /*-------- secions ----------*/
            .section-img img {
                width: 100% !important;
                height: auto !important;
            }
        }

        tr td h1 {

            text-align: center;
        }

        tr td h1 a {
            text-decoration: none;
        }
    </style>

</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div
                    style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">

                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->

    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0"
                    class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0"
                                class="container590">

                                <tr>
                                    <td height="70" style="height:70px;">
                                        <h1>
                                            <a href="#">
                                                {{ config('app.name') }}

                                            </a>
                                        </h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->

    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0"
                    class="container590">
                    <tr>

                        <td>
                            <a href="#">
                                <img src="{{ asset('images/welcome-club.jpg') }}" class="w-100" alt="" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center"
                            style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                            class="main-header">


                            <div style="line-height: 35px">

                                Hi <span style="color: #5caad2;">{{ $name ?? '' }}</span>

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="40" align="center" cellpadding="0" cellspacing="0"
                                bgcolor="eeeeee">
                                <tr>
                                    <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="400" align="center" cellpadding="0" cellspacing="0"
                                class="container590">
                                <tr>
                                    <td align="center"
                                        style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">


                                        <div style="line-height: 24px">
                                            We’re glad you want to get to know us better. Now that you’re on our
                                            insider list, you’ll be the first to hear
                                            about
                                            our newest arrivals, latest trends and not-to-be-missed promotions. Prepare
                                            to be clued up and tuned in to
                                            everything happening at the number one fashion destination in the Middle
                                            East.
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" align="center" width="160" cellpadding="0" cellspacing="0"
                                bgcolor="5caad2" style="">

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="center"
                                        style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">


                                        <div style="line-height: 26px;">
                                            <button type="button"
                                                style="color: #ffffff; text-decoration: none; background:none; border:none;">HAPPY
                                                SHOPPING
                                                !</button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                            </table>
                        </td>
                    </tr>


                </table>

            </td>
        </tr>

    </table>
    <!-- end section -->

    <!-- contact section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr class="hide">
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>
        <tr>
            <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
        </tr>

        <tr>
            <td height="60" style="border-top: 1px solid #e0e0e0;font-size: 60px; line-height: 60px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0"
                    class="container590 bg_color">

                    <tr>
                        <td>
                            <table border="0" width="300" align="left" cellpadding="0" cellspacing="0"
                                style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">

                                <tr>
                                    <!-- logo -->
                                    <td align="left">
                                        <h2> <a href="#" style="text-decoration: none">
                                                {{ config('app.name') }}

                                            </a>
                                        </h2>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="left"
                                        style="color: #888888; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 23px;"
                                        class="text_color">
                                        <div
                                            style="color: #333333; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; font-weight: 600; mso-line-height-rule: exactly; line-height: 23px;">

                                            Email us: <br /> <a href="mailto:"
                                                style="color: #888888; font-size: 14px; font-family: 'Hind Siliguri', Calibri, Sans-serif; font-weight: 400;">tur.august1@gmail.com</a>

                                        </div>
                                    </td>
                                </tr>

                            </table>

                            <table border="0" width="2" align="left" cellpadding="0" cellspacing="0"
                                style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td width="2" height="10" style="font-size: 10px; line-height: 10px;">
                                    </td>
                                </tr>
                            </table>

                            <table border="0" width="200" align="right" cellpadding="0" cellspacing="0"
                                style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">

                                <tr>
                                    <td class="hide" height="45" style="font-size: 45px; line-height: 45px;">
                                        &nbsp;</td>
                                </tr>



                                <tr>
                                    <td height="15" style="font-size: 15px; line-height: 15px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td>

                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
    <!-- end section -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
