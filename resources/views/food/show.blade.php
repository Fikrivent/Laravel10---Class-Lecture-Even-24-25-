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
<h2>Detail of Food</h2>
<br>
  <div class="card" style="width:400px">
    <img class="card-img-top" src="https://media.istockphoto.com/id/1457433817/id/foto/kelompok-makanan-sehat-untuk-diet-flexitarian.jpg?s=612x612&w=0&k=20&c=SY6W5rBi002F4PpV_5bk16mkT3poTttodXlMSwe8jzo=" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">{{ $current_food->name}}</h4>
      <p class="card-text">{{ $current_food->description }}</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>
  <br>
</body>
</html>
