<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Album PDF</title>
    <style>

    </style>
</head>
<body>
    <h1>Album</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>QR Code</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Genre</th>
                <th>Release Date</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $sa)
                <tr>
                    <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(50)->generate($sa->id)) }}" alt="QR Code"></td>
                    <td>{{ $sa->title }}</td>
                    <td>{{ $sa->artist }}</td>
                    <td>{{ $sa->genre }}</td>
                    <td>{{ $sa->release_date }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
