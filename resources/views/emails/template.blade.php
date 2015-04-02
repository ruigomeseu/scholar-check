<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ScholarCheck</title>
    <style>
        a:hover {
            text-decoration: underline !important;
        }
        td.promocell p {
            font-size:20px;
            line-height:26px;
            font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;
            margin-top:0;
            margin-bottom:0;
            padding-top:0;
            padding-bottom:14px;
            font-weight:normal;
        }
        td.contentblock h4 {
            color:#444444 !important;
            font-size:16px;
            line-height:24px;
            font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;
            margin-top:0;
            margin-bottom:10px;
            padding-top:0;
            padding-bottom:0;
            font-weight:normal;
        }
        td.contentblock h4 a {
            color:#444444;
            text-decoration:none;
        }
        td.contentblock p {
            color:#888888;
            font-size:13px;
            line-height:19px;
            font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;
            margin-top:0;
            margin-bottom:12px;
            padding-top:0;
            padding-bottom:0;
            font-weight:normal;
        }
        td.contentblock p a {
            color:#3ca7dd;
            text-decoration:none;
        }
        @media only screen and (max-device-width: 480px) {
            div[class="header"] {
                font-size: 16px !important;
            }
            table[class="table"], td[class="cell"] {
                width: 300px !important;
            }
            table[class="promotable"], td[class="promocell"] {
                width: 325px !important;
            }
            td[class="footershow"] {
                width: 300px !important;
            }
            table[class="hide"], img[class="hide"], td[class="hide"] {
                display: none !important;
            }
            img[class="divider"] {
                height: 1px !important;
            }
            td[class="logocell"] {
                padding-top: 15px !important;
                padding-left: 15px !important;
                width: 300px !important;
            }
            img[id="screenshot"] {
                width: 325px !important;
                height: 127px !important;
            }
            img[class="galleryimage"] {
                width: 53px !important;
                height: 53px !important;
            }
            p[class="reminder"] {
                font-size: 11px !important;
            }
            h4[class="secondary"] {
                line-height: 22px !important;
                margin-bottom: 15px !important;
                font-size: 18px !important;
            }
        }
    </style>
</head>
<body bgcolor="#e4e4e4" topmargin="0" leftmargin="0" marginheight="0" marginwidth="0" style="-webkit-font-smoothing: antialiased;width:100% !important;background:#e4e4e4;-webkit-text-size-adjust:none;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#e4e4e4">
    <tr>
        <td bgcolor="#e4e4e4" width="100%">

            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
                <tr>
                    <td width="600" class="cell">

                        <table width="600" cellpadding="25" cellspacing="0" border="0" class="promotable">
                            <tr>
                                <td bgcolor="#d3d3d3" width="600" class="promocell">

                                    <multiline label="ScholarCheck"><p>ScholarCheck</p></multiline>

                                </td>
                            </tr>
                        </table>

                        <img border="0" src="{{! \URL::asset('images/spacer.gif') }}" width="1" height="15" class="divider"><br>

                        @yield('content')

                    </td>
                </tr>
            </table>

            <img border="0" src="{{! \URL::asset('images/spacer.gif') }}" width="1" height="25" class="divider"><br>

            <table width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#f2f2f2">
                <tr>
                    <td>

                        <img border="0" src="{{! \URL::asset('images/spacer.gif') }}" width="1" height="30"><br>

                        <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="table">
                            <tr>
                                <td width="600" nowrap bgcolor="#f2f2f2" class="cell">

                                    <table width="600" cellpadding="0" cellspacing="0" border="0" class="table">
                                        <tr>
                                            <td width="380" valign="top" class="footershow">

                                                <img border="0" src="{{! \URL::asset('images/spacer.gif') }}" width="1" height="8"><br>

                                                <p style="color:#a6a6a6;font-size:12px;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:15px;padding-top:0;padding-bottom:0;line-height:18px;" class="reminder">You’re receiving this because you’re an awesome ScholarCheck customer or subscribed via <a href="http://www.scholarcheck.io/" style="color:#a6a6a6;text-decoration:underline;">our site</a>.</p>

                                            </td>
                                            <td align="right" width="220" style="color:#a6a6a6;font-size:12px;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;text-shadow: 0 1px 0 #ffffff;" valign="top" class="hide">

                                                <table cellpadding="0" cellspacing="0" border="0">
                                                    <tr>
                                                        <td><a href="http://twitter.com/scholarcheck"><img border="0" src="{{! \URL::asset('images/twitter.gif') }}" width="42" height="32" alt="Follow us on Twitter"></a></td>
                                                    </tr>
                                                </table>

                                                <img border="0" src="{{! \URL::asset('images/spacer.gif') }}" width="1" height="10"><br><p style="color:#b3b3b3;font-size:11px;line-height:15px;font-family:Helvetica,Arial,sans-serif;margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0;font-weight:bold;">ScholarCheck</p></td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>

                        <img border="0" src="{{! \URL::asset('images/spacer.gif') }}" width="1" height="25"><br>

                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>

</body>
</html>
