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
    <p>Dear {{$requestData['username']}}</p>
    <p>Anda mendapatkan permintaan pinjaman dokumen dari divisi {{$requestData['division']}} yaitu :</p>
    <p>Nama Dokumen : {{$requestData['documenName']}}</p>
    <p>Silahkan periksa inbox anda pada link <a href="{{$requestData['link']}}">Ini</a>
</body>
</html>