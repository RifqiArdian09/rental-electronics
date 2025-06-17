<!DOCTYPE html>
<html>
<head>
    <title>Balasan dari Rental Elektronik</title>
</head>
<body>
    <p>Halo {{ $contact->name }},</p>

    <p>Terkait pesan Anda:</p>
    <blockquote style="border-left: 4px solid #ccc; margin: 10px 0; padding-left: 10px; color: #555; white-space: pre-line;">
        {{ $contact->message }}
    </blockquote>

    <p>Balasan kami:</p>
    <blockquote style="border-left: 4px solid #ccc; margin: 10px 0; padding-left: 10px; color: #333; font-weight: 600; white-space: pre-line;">
        {{ $contact->reply }}
    </blockquote>

    <p>Terima kasih telah menghubungi kami.</p>
</body>
</html>
