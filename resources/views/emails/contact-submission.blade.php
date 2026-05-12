<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Submission</title>
</head>
<body style="margin:0; padding:0; background-color:#f6f7fb; font-family:Arial, Helvetica, sans-serif; color:#111827;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f6f7fb; padding:24px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="0" cellspacing="0" width="600" style="max-width:600px; background:#ffffff; border:1px solid #e5e7eb; border-radius:10px; overflow:hidden;">
                    <tr>
                        <td style="padding:20px 24px; background:#0f4c81; color:#ffffff;">
                            <h1 style="margin:0; font-size:20px; font-weight:700;">New Contact Submission</h1>
                            <p style="margin:6px 0 0; font-size:13px; opacity:0.9;">GREVX Website</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 24px;">
                            <p style="margin:0 0 16px; font-size:14px; line-height:1.6; color:#374151;">
                                You have received a new contact request. Details are below:
                            </p>

                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;">
                                <tr>
                                    <td style="padding:10px 12px; border:1px solid #e5e7eb; background:#f9fafb; font-size:13px; width:140px;">Name</td>
                                    <td style="padding:10px 12px; border:1px solid #e5e7eb; font-size:13px;">{{ $contact->name }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 12px; border:1px solid #e5e7eb; background:#f9fafb; font-size:13px;">Phone</td>
                                    <td style="padding:10px 12px; border:1px solid #e5e7eb; font-size:13px;">{{ $contact->phone ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 12px; border:1px solid #e5e7eb; background:#f9fafb; font-size:13px;">Email</td>
                                    <td style="padding:10px 12px; border:1px solid #e5e7eb; font-size:13px;">{{ $contact->email ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 12px; border:1px solid #e5e7eb; background:#f9fafb; font-size:13px;">Subject</td>
                                    <td style="padding:10px 12px; border:1px solid #e5e7eb; font-size:13px;">{{ $contact->subject }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:10px 12px; border:1px solid #e5e7eb; background:#f9fafb; font-size:13px; vertical-align:top;">Message</td>
                                    <td style="padding:10px 12px; border:1px solid #e5e7eb; font-size:13px; white-space:pre-line;">{{ $contact->message }}</td>
                                </tr>
                            </table>

                            <p style="margin:16px 0 0; font-size:12px; color:#6b7280;">
                                Received on {{ $contact->created_at?->format('d M Y, h:i A') ?? now()->format('d M Y, h:i A') }}.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:16px 24px; background:#f9fafb; font-size:12px; color:#6b7280; text-align:center;">
                            This email was sent automatically from the GREVX contact form.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
