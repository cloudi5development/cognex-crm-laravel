<table cellpadding="0" cellspacing="0" width="100%" border="0" align="center"
    style="padding:25px 0 15px 0;font-family:Arial,sans-serif;">
    <tbody>
        <tr>
            <td width="100%" valign="top">
                <table cellpadding="0" cellspacing="0" width="600" align="center" bgcolor="f6fdff"
                    style="border: 1px solid #ccedff;">
                    <tbody>
                        <tr>
                            <td valign="top">
                                <table cellpadding="0" cellspacing="0" width="600" border="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td valign="top" width="300"
                                                style="background-color:#eefaff;padding-top:10px">
                                                <a href="{{ url('/') }}" target="_blank">
                                                    <img src="{{ asset('assets/images/logo.jpg') }}"
                                                        style="margin-left: auto;margin-right: auto;display:block;padding:10px;padding-left:30px;"
                                                        width="70px" alt="{{ config('settings.system_name') }}"
                                                        border="0">
                                                </a>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td width="540" style="background-color: #fffcf0;width: 540px; vertical-align: top;"
                                background: #fffce8; align="center">
                                <table width="100%" cellspacing="0" cellpadding="0"
                                    style="max-width:600px;border-left:solid 1px #e6e6e6;border-right:solid 1px #e6e6e6">
                                    <tbody>
                                        <tr>
                                            <td align="left" valign="top"
                                                style="color:#565656;;display:block;font-weight:300;margin:0 auto;clear:both;border-bottom:1px solid #e6e6e6;background-color:#f9f9f9;padding:20px"
                                                bgcolor="#F9F9F9">
                                                <p
                                                    style="padding:0;margin:0;color:#565656;font-size:16px;font-size:13px">
                                                    Hi <strong>{{ $user->name ?? '' }}</strong>,</p><br>
                                                <p style="padding:0;margin:0;color:#565656;font-size:13px">Greetings!
                                                </p><br>

                                                <p
                                                    style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px">
                                                    You recently requested to reset your password for your
                                                    {{ config('app.name') }} account. To complete the password reset
                                                    process, click the below link:</p><br>
                                                <p
                                                    style="padding:0;margin:0;color:#565656;line-height:20px;font-size:13px">
                                                    Reset Password Link:
                                                    <strong> <a
                                                            href="{{ route('backend.auth.reset-password', ['token' => $token]) }}">Click
                                                            here</a></strong>
                                                    <br> Expires in: <strong>15 minutes</strong>
                                                </p><br>
                                                <p
                                                    style="padding:0;margin:0;color:#565656;line-height:18px;font-size:13px">
                                                    If you did not request a password reset, please ignore this email or
                                                    contact our support team if you have any concerns.</p><br>
                                                <p
                                                    style="padding:0;margin:0;color:#565656;line-height:20px;font-size:13px">
                                                    Best Regards,
                                                    <br> {{ config('app.name') }}
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table  width="100%" cellspacing="0"
                                    cellpadding="0" style="max-width:600px;border:solid 1px #e6e6e6;border-top:none">
                                    <tbody>
                                        <tr>
                                            <td valign="top" align="center"
                                                style="text-align:center;background-color:#f9f9f9;display:block;margin:0 auto;clear:both;padding:15px 40px"
                                                bgcolor="#F9F9F9">
                                                <p style="padding:10px 0 0 0;margin:0;font-size:11px;color:#565656;">
                                                    This email was sent from a notification-only address that cannot
                                                    accept incoming email. <br>
                                                    Please
                                                    do not reply to this message.</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
