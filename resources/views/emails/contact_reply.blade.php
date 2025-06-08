<!DOCTYPE html>
<html>
<head>
    <title>Balasan dari Rental Elektronik</title>
</head>
<body>
    <p>Halo {{ $contact->name }},</p>
    <p>Ini balasan dari admin kami untuk pesan Anda:</p>
    <blockquote>{{ $contact->reply }}</blockquote>
    <p>Terima kasih telah menghubungi kami.</p>
</body>
</html>
