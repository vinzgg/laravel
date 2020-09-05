<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>{{ $mail->no_surat }}</title>
</head>
<body>

    <table class="table table-striped table-bordered">
        <tr>
            <td colspan="2">{{ $mail->no_surat }}</td>
        </tr>
        <tr>
            <td>{{ date('D, Y M d', $mail->tanggal_masuk) }}</td>
            <td><span class="btn btn-success">{{ $mail->tingkat_keamanan }}</span></td>
        </tr>
    </table>

</body>
</html>
