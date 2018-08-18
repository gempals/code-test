<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>
<body>
    <p>Dear {{$replyData['username']}}</p>
    <p>Berikut informasi peminjaman dokumen anda</p>
    <p>Nama Dokumen : {{$replyData['documenName']}}</p>
    <p>Divisi : {{$replyData['fromDivision']}} <p>
    @if(!empty($replyData['duedate']))
    <p>Tanggal : {{$replyData['duedate']}}</p>
    @endif
    <p>Status : {{$replyData['status']}} </p>    
    <p>Silahkan periksa inbox anda pada link <a href="{{$replyData['link']}}">Ini</a>
</body>
</html>