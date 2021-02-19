<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
    <style type='text/css'>
        .ExternalClass,.ExternalClass div,.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td,h1,img{line-height:100%}h1,h2{display:block;font-family:Helvetica,sans-serif;font-style:normal;font-weight:700}.body{font-family:Helvetica,sans-serif}#outlook a{padding:0}.ExternalClass,.ReadMsgBody{width:100%}a,blockquote,body,li,p,table,td{-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%}table,td{mso-table-lspace:0;mso-table-rspace:0}img{-ms-interpolation-mode:bicubic;border:0;height:auto;outline:0;text-decoration:none}table{border-collapse:collapse!important}tr{height:25px}#bodyCell,#bodyTable,body{height:100%!important;margin:0;padding:0;width:100%!important}#bodyCell{padding:20px}#templateContainer{width:800px;border:1px solid #ddd;background-color:#fff}#bodyTable,body{background-color:#fafafa}h1{color:#202020!important;font-size:26px;letter-spacing:normal;text-align:left;margin:0 0 10px}h2{color:#404040!important;font-size:20px;line-height:100%;letter-spacing:normal;text-align:left;margin:0 0 10px}h3,h4{display:block;font-style:italic;font-weight:400;letter-spacing:normal;text-align:left;margin:0 0 10px;font-family:Helvetica,sans-serif;line-height:100%}h3{color:#606060!important;font-size:16px}h4{color:grey!important;font-size:14px}code{font-family:Consolas}.text-center{text-align:center;font-family:Helvetica,sans-serif}.headerContent{background-color:#f8f8f8;border-bottom:1px solid #ddd;color:#505050;font-family:Helvetica,sans-serif;font-size:20px;font-weight:700;line-height:100%;text-align:left;vertical-align:middle;padding:0}.bodyContent,.footerContent{font-family:Helvetica,sans-serif;line-height:150%;text-align:left}.footerContent{text-align:center}.bodyContent pre{padding:15px;background-color:#444;color:#f8f8f8;border:0}.bodyContent pre code{white-space:pre;word-break:normal;word-wrap:normal}.bodyContent table{margin:10px 0;background-color:#fff;border:1px solid #ddd}.bodyContent table th{padding:4px 10px;background-color:#f8f8f8;border:1px solid #ddd;font-weight:700;text-align:center}.bodyContent table td{padding:3px 8px;border:1px solid #ddd}.table-responsive{border:0}.bodyContent a{word-break:break-all}.headerContent a .yshortcuts,.headerContent a:link,.headerContent a:visited{color:#1f5d8c;font-weight:400;text-decoration:underline}#headerImage{height:auto;max-width:300px;padding:20px;max-height:50px}#templateBody{background-color:#fff}.bodyContent{color:#505050;font-size:14px;padding:20px}.bodyContent a .yshortcuts,.bodyContent a:link,.bodyContent a:visited{color:#1f5d8c;font-weight:400;text-decoration:underline}.bodyContent a:hover{text-decoration:none}.bodyContent img{display:inline;height:auto;max-width:560px}.footerContent{color:grey;font-size:12px;padding:20px}.footerContent a .yshortcuts,.footerContent a span,.footerContent a:link,.footerContent a:visited{color:#606060;font-weight:400;text-decoration:underline}@media only screen and (max-width:640px){h1,h2,h3,h4{line-height:100%!important}#templateContainer{max-width:600px!important;width:100%!important}#templateContainer,body{width:100%!important}a,blockquote,body,li,p,table,td{-webkit-text-size-adjust:none!important}body{min-width:100%!important}#bodyCell{padding:10px!important}h1{font-size:24px!important}h2{font-size:20px!important}h3{font-size:18px!important}h4{font-size:16px!important}#templatePreheader{display:none!important}.headerContent{font-size:20px!important;line-height:125%!important}.footerContent{font-size:14px!important;line-height:115%!important}.footerContent a{display:block!important}.hide-mobile{display:none}}
    </style>
</head>
<body leftmargin='0' marginwidth='0' topmargin='0' marginheight='0' offset='0'>
    <center>
        <table align='center' border='0' cellpadding='0' cellspacing='0' id='bodyTable'>
            <tr>
                <td align='center' valign='top' id='bodyCell'>
                    <table border='0' cellpadding='0' cellspacing='0' id='templateContainer'>
                        <tr>
                            <td align='center' valign='top'>
                                <table border='0' cellpadding='0' cellspacing='0' id='templateHeader'>
                                    <tr>
                                        <td valign='top' class='headerContent'>
                                            <a href='https://avalanchecalculator.com'>Avalanche Calculator</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align='center' valign='top'>
                                <table border='0' cellpadding='0' cellspacing='0' id='templateBody'>
                                    <tr>
                                        <td valign='top' class='bodyContent'>
                                            <p>{{ $salutation }} {{ $name }},</p>
                                            {{ $slot }}
                                            <br/>
                                            <hr/>
                                            <p>Kindest Regards,<br/>
                                                Avalanche Calculator</p>
                                            <p style='font-size:11px;'>GDPR: For GDPR compliance, you are able to delete your account entirely on the website. (along with any data related to your account)</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align='center' valign='top'>
                                <table border='0' cellpadding='0' cellspacing='0' id='templateFooter'>
                                    <tr>
                                        @auth
                                        <td valign='top' class='footerContent'>
                                            <a href='https://avalanchecalculator.com/login'>login</a>
                                        </td>
                                        @else
                                        <td valign='top' class='footerContent'>
                                            <a href='https://avalanchecalculator.com/register'>register</a>
                                        </td>
                                        @endauth
                                        <td valign='top' class='footerContent'>
                                            <a href='https://avalanchecalculator.com/'>visit the website</a>
                                        </td>
                                        <td valign='top' class='footerContent'>
                                            <a href='https://avalanchecalculator.com/debts'>manage your debts</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>
</html>