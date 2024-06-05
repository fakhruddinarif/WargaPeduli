<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penduduk</title>
</head>
<body style="width: 100dvw; height: 100dvh; display: flex">
    <div style="width: 100%; position: relative; overflow-x: auto;">
        <table style="width: 100%; font-size: 0.875rem; text-align: left; color: #737373;">
            <thead style="text-transform: uppercase; font-size: 0.75rem; background-color: #e5e5e5; color: #e5e5e5">
                <tr style="color: #171717;">
                    <th style="padding: 1.5rem 0.75rem; border: 1px solid #404040;">No</th>
                    @foreach ($selected_columns as $column)
                        <th style="padding: 1.5rem 0.75rem; border: 1px solid #404040;">{{ ucfirst(str_replace('_', ' ', $column)) }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $row)
                    <tr style="color: #171717;">
                        <td style="padding: 1.5rem 0.75rem; border: 0.1px solid #404040;">{{ $key + 1 }}</td>
                        @foreach ($selected_columns as $column)
                            @if($column == 'tanggal_lahir')
                                <td style="padding: 1.5rem 0.75rem; border: 1px solid #404040;">{{ date('d/m/Y', strtotime($row->$column)) }}</td>
                            @else
                                <td style="padding: 1.5rem 0.75rem; border: 1px solid #404040;">{{ $row->$column }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
