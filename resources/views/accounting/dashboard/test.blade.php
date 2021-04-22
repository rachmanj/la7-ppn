<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
    {{-- <h1>DAYS : {{ number_format($days, 0) }}</h1> --}}
    <table>
      <tr>
        <th>Year</th>
        <th>Month</th>
        <th>Avg</th>
      </tr>
      @foreach ($list as $item)
        <tr>
          <td>{{ $item['year'] }}</td>
          {{-- <td>{{ date_format(strtotime('2021-0' . $item['month'] . '-01'), 'm') }}</td> --}}
          <td>{{ date('F Y', strtotime('2021-0' . $item['month'] . '-01')) }}</td>
          <td>{{ number_format($item['days'], 2) }}</td>
        </tr>
      @endforeach
    </table>
    
</body>
</html>