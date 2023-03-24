<?php
if($_GET['Id']){
    $id=$_GET['Id'];
    require_once("connect.php");
    $sql="SELECT * FROM bdf where Id='$id'";
    if(isset($conn)) {
        $ser = mysqli_query($conn, $sql);
    }
    $row=mysqli_fetch_assoc($ser);
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Forms</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Forms</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="#">Add person</a>
                <a class="nav-link" href="#">Manage persons</a>
            </div>
        </div>
    </div>
</nav>
<h1>Registration Form</h1>


<form class="row g-3" action="update.php?Id=<?php echo $_GET['Id']; ?>" method="POST">
    <div class="col-md-5">
        <label for="inputID" class="form-label">National Identity Number</label>
        <input type="text" class="form-control" id="inputID" placeholder="National Identity Number" name="Id" value="<?=$row['Id']?>">
    </div>
    <?php
    if(isset($errors['ID'])) {
        echo "<span class='error' style='color: red'>" . $errors['ID'] . "</span>";
    }
    ?>
    <div class="col-md-5">
        <label for="inputFN" class="form-label">First Name</label>
        <input type="text" class="form-control" id="inputFN" placeholder="First Name" name="FirstName" value="<?=$row['FirstName']?>">
    </div>
    <?php
    if(isset($errors["first"])) {
        echo "<span class='error' style='color: red'>" . $errors["first"] . "</span>";
    }
    ?>
    <div class="col-md-5">
        <label for="inputLN" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="inputLN" placeholder="Last Name" name="LastName" value="<?=$row['LastName']?>">
    </div>
    <?php
    if(isset($errors["last"])) {
        echo "<span class='error' style='color: red'>" . $errors["last"] . "</span>";
    }
    ?>
    <div class="col-md-5">
        <label for="Age" class="form-label">Age</label>
        <input type="number" class="form-control" id="Age" placeholder="0" name="Age" value="<?=$row['Age']?>">
    </div>
    <?php
    if(isset($errors['Age'])) {
        echo "<span class='error' style='color: red'>" . $errors['Age']. "</span>";
    }
    ?>

    <div class="col-md-5">
        <label for="Email" class="form-label">Email</label>
        <input type="email" class="form-control" id="Email" placeholder="Email" name="Email" value="<?=$row['Email']?>">
    </div>
    <?php
    if(isset($errors["email"])) {
        echo "<span class='error' style='color: red'>" . $errors["email"] . "</span>";
    }
    ?>
    <div class="col-md-5">
        <label for="pwhold" class="form-label">Password</label>
        <input type="password" class="form-control" id="pwhold" placeholder="Password" name="Password" value="<?=$row['Password']?>">
    </div>
    <?php
    if(isset($errors["password"])) {
        echo "<span class='error' style='color: red'>" . $errors["password"] . "</span>";
    }
    ?>

    <div class="col-md-5">
        <label for="adress" class="form-label">Adress</label>
        <input type="url" class="form-control" id="adress" placeholder="...,Morocco" name="Adress" value="<?=$row["Adress"]?>">
    </div>
    <?php
    if(isset($errors["address"])) {
        echo "<span class='error' style='color: red'>" . $errors["address"] . "</span>";
    }
    ?>
    <div class="col-md-5">
        <label for="state" class="form-label">State</label>
        <input type="text" class="form-control" id="state" placeholder="Morocco" name="State" value="<?=$row['State']?>">
    </div>
    <?php
    if(isset($errors["state"])) {
        echo "<span class='error' style='color: red'>" . $errors["state"] . "</span>";
    }
    ?>


    <div class="col-md-5">
        Community
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Spring" id="flexCheckDefault" name="Community[]" <?php if (str_contains($row['Community'], 'Spring')) { echo 'checked'; } ?>>
                Spring
        </div>
        <div class="form-_check">
            <input class="form-check-input" type="checkbox" value="JAKARTA EE" id="flexCheckDefault2" name="Community[]" <?php if (str_contains( $row['Community'],'JAKARTA EE' )) { echo 'checked'; } ?>>
                JAKARTA EE
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="Hibernate" id="flexCheckbox" name="Community[]" <?php if (str_contains($row['Community'],'Hibernate' )) { echo 'checked'; } ?>>
                Hibernate
        </div>
    </div>
    <?php
    if(isset($errors["Community"])) {
        echo "<span class='error' style='color: red'>" . $errors["Community"] . "</span>";
    }
    ?>
    <div class="col-md-5">
        Gender
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault1" <?php if ($row['Gender'] == 'Female') { echo 'checked'; } ?>>
                Female
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="Gender" id="flexRadioDefault2" <?php if ($row['Gender'] == 'Male') { echo 'checked'; } ?>>
                Male
        </div>
    </div>
    <?php
    if(isset($errors["gender"])) {
        echo "<span class='error' style='color: red'>" . $errors["gender"] . "</span>";
    }
    ?>

    <div class="row">
        <div class="col-md-3 offset-md-9">
            <button class="btn btn-primary" name="submit">Register</button>
            <button class="btn btn-secondary">Reset</button>
        </div>
    </div>
</form>


<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Age</th>
        <th scope="col">Community</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php include_once("connect.php");
    $sql="SELECT * FROM bdf";
    if(isset($conn)){
        $req = mysqli_query($conn, $sql);
    }
    while($row=mysqli_fetch_assoc($req)){
    ?>
    <tr>
        <td><?=$row['Id']?></td>
        <td><?=$row['FirstName']?></td>
        <td><?=$row['LastName']?></td>
        <td><?=$row['Email']?></td>
        <td><?=$row['Age']?></td>
        <td><?=$row['Community']?></td>
        <td>
            <ul>
                <li><a href="delete.php?Id=<?= $row['Id'] ?>">Delete</li>
                <li><a href="update-view.php?Id=<?= $row['Id'] ?>">Update</li>
            </ul>
        </td>
        <?php
        }
        ?>
    </tr>
    </tbody>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>

