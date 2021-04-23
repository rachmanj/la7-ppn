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
        <th>Month</th>
        <th>Creator</th>
        <th>Count</th>
      </tr>
      @foreach ($byCreatorCount as $item)
      <tr>
        <td>{{ date('F', strtotime('2021-0' . $item['month'] . '-01')) }}</td>
        <td>{{ $item['creator'] }}</td>
        <td>{{ $item['count'] }}</td>
      </tr>
      @endforeach
    </table>
    
</body>
</html>