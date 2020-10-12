<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link href="asset/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" href="asset/js/bootstrap.min.js"></script>
  <script href="asset/js/jquery.min.js" type="text/javascript"></script>
  <script>
  $(document).ready(function () {
    $('#save').click(function (e) {
      e.preventDefault();
      var name = $('#name').val();
      var city = $('#city').val();
      var occ = $('#occ').val();
      if (name && city && occ) {
        $.ajax
        ({
          type: "POST",
          url: "insert.php",
          data: { "nm": name, "city": city, "occ": occ },
          success: function (data) {
            console.log('data', data);
            var count = $('.table tr').length;
            // $(".table").html(data);
            $('.table tr').last().after(`<tr><td>${count}</td><td>${name}</td><td>${city}</td><td>${occ}</td></tr>`);
            $('#name').val('');
            $('#city').val('');
            $('#occ').val('');
          }
        });
      } else {
        alert("All fields are required")
      }
    });
  });
</script>
  
</head>
<body>
<main>
<nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</nav>
      <section>
        <div class='container'>
          <div class="col-sm-12 mt-5">
          	 <h2 class="text-danger text-center">Form Data</h2>
          	 <!-- <form method="post" id="form" action=""> -->
             <label class='text-danger'> <?php echo $msg;?></label>
          	<div class="form-group">
              <label class="text-info font-weight-bold">Name</label>
              <input type="text" class="form-control font-weight-bold" value="" name="nm" placeholder="Enter your Name" required="" id="name">
          	</div>
            
          	<div class="form-group">
              <label class="text-info font-weight-bold">City</label>
              <input type="text" class="form-control font-weight-bold" value="" name="city" placeholder="Enter your City" required="" id="city">
          	</div>
            
          	<div class="form-group">
              <label class="text-info font-weight-bold">Occuption</label>
              <input type="text" class="form-control font-weight-bold" value="" name="occ" placeholder="Enter your Occuption" required="" id="occ">
          	</div>
            <button name="sub" id ="save" type="submit" class="btn btn-primary">Submit</button>
            
          	<!-- </form> -->
           <table class="table mt-5">
            <tr>
              <th>Sr.No.</th>
              <th>Name</th>
              <th>City</th>
              <th>Occupation</th>
              
             </tr>
             <tr>
              <?php
               $qry = "SELECT * FROM `form_data`";
               $run = mysqli_query($conn,$qry);
               $sn=1;
               while($arr = mysqli_fetch_assoc($run))
               {
                $id = $arr['id'];
               ?>              
              <td><?php echo $sn;?></td>
              <td><?php echo $arr['name'];?></td>
              <td><?php echo $arr['city'];?></td>
              <td><?php echo $arr['occupation'];?></td>
             <!--  <?php
              echo "<td><a href='index.php?del=$id;' class='btn btn-danger'>Delete</td>"
              ?>  -->
             </tr>
             <?php 
              $sn++;
            }
            ?>
            </table>
          </div>
        </div>
      </section>
	</main>
</body>
</html>
