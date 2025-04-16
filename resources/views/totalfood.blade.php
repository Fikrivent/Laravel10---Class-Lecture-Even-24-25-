<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Category Table with Total Food</h2>        
  <table class="table">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Total Food</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($report as $r)
      <tr>
        <td>{{ $r->name }}</td>
        <td>{{ $r->TotalFood }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
