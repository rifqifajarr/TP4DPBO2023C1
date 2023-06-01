<!DOCTYPE html>
<html>
  <head>
    <title>CRUD</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <script src="jquery.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

      * {
        font-family: "Rubik", sans-serif;
      }

      .img-logo {
        height: 52px;
        width: auto;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <img class="img-logo" src="../assets/logo1.png" />
        <a class="navbar-brand" href="index.php">F1 Team</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../team.php">Team List</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="col-lg-6 m-auto">
      <form method="post" action="../team.php">
        <br /><br />
        <div class="card">
          <div class="card-header bg-primary">
            <h1 class="text-white text-center">Edit Team</h1>
          </div>
          <br />

          <input type="text" name="id_edit" class="form-control" value="<?php echo $_GET['id_team']; ?>" hidden /> <br />
          
          <label> Team Name: </label>
          <input type="text" name="team_name" class="form-control" value="<?php echo $_GET['team_name']; ?>"/> <br />

          <label> Team Base: </label>
          <input type="text" name="team_base" class="form-control" value="<?php echo $_GET['team_base']; ?>"/> <br />

          <button class="btn btn-success" type="submit" name="edit">
            Update</button
          ><br />
          <a class="btn btn-info" type="submit" name="cancel" href="index.php">
            Cancel </a
          ><br />
        </div>
      </form>
    </div>
  </body>
</html>
