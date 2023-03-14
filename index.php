<!DOCTYPE html>
<html>
<head>
  <title>Tugas Prak TCC</title>
  <style>
    hr {
      height: 2px;
      color: black;
      background-color: black;
      width: 95%;
    }
    
    table {
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      border: 1px solid #ddd;
    }
    
    .contents {
      margin-left: 5%;
      margin-right: 5%;
    }
    
    .child-content {
      border: 2px solid black;
      padding-bottom: 2%;
      margin-bottom: 1%;
    }
    
    .form-element {
      margin: 2%;
    }
    
    #user-form {
      width: 50%;
      height: 40%;
    }
    
    #user-list {
      margin-top: 1%;
      width: 55%;
    }
    
    #instructions-list {
      margin-left: 1%;
      margin-right: 1%;
    }
  </style>
</head>
<body>
<h1 align="center">Penambahan User Baru</h1>
<div class="contents" align="center">
  
  <div class="child-content" id="user-form">
    <h2>Form User Data</h2>
    <hr>
    <form id="form-data-user" action="" method="POST">
      <div class="form-element">
        <label for="nama">Nama user:</label><br>
        <input id="nama" type="text" name="nama" placeholder="Nama user" value="" maxlength="10"><br>
      </div>
      <div class="form-element">
        <label for="umur">Umur user:</label><br>
        <input id="umur" type="text" name="umur" placeholder="Umur user" value="" maxlength="2"><br>
      </div>
      <div class="form-element">
        <label for="domisili">Domisili user:</label><br>
        <input id="domisili" type="text" name="domisili" placeholder="Domisili user" value="" maxlength="10"><br>
      </div>
      <div class="form-element">
        <input type="submit" name="submit">
      </div>
    </form>
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $domisili = $_POST['domisili'];
        
        include("config.php");     
        // Insert user data into table
        mysqli_query($konek, "INSERT INTO user(nama,umur,domisili) VALUES('$nama','$umur','$domisili')");
    }
    ?>
  </div>
  <div class="child-content" id="user-list">
    <h2>User List</h2>
    <hr>
    <table id=user-list-table>
      <thead>
        <tr>
          <th>Nama</th>
          <th>Umur</th>
          <th>Domisili</th>
        </tr>
      </thead>
      <tbody id="user-list-detail" align="center">
      <?php
          $konek = mysqli_connect("localhost", "root", "", "data_tugas_praktcc" );
          $SQL = mysqli_query($konek, "SELECT * FROM user");
          while($data=mysqli_fetch_array($SQL)){
      ?>
        <tr>
          <td><?php echo $data['nama'];?></td>
          <td><?php echo $data['umur'];?></td>
          <td><?php echo $data['domisili'];?></td>
          <?php }?>
        </tr>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>