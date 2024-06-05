<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bantuan Sosial</title>
</head>
<body style="width: 100dvw; height: 100dvh; display: flex">
<div style="width: 100%; position: relative; overflow-x: auto;">
    <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #737373;">
        <thead style="text-transform: uppercase; font-size: 0.75rem; background-color: #e5e5e5; color: #e5e5e5">
        <tr style="color: #171717;">
            @foreach ($selected_columns as $column)
            <th style="padding: 1.5rem 0.75rem; border: 1px solid #404040;">{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $key => $row)
        <tr style="color: #171717;">
            @foreach ($selected_columns as $column)
            <td style="padding: 1.5rem 0.75rem; border: 1px solid #404040;">{{ $row[$column] }}</td>
            @endforeach
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
