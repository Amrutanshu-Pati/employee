<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>register</title>
    <style>
        /* .error {
            color: red;
        }

        input.error,
        select.error {
            border: 1px solid red;
        } */
        .checkerror {
            color: red;
        }

        .hide {
            display: none;
        }
    </style>
</head>

<body>


    <div class="container bg-light border border-danger w-50 my-5 py-2">
        <h3 class="text-center text-white bg-danger p-2">Registration Form</h3>
        <?php
        if (isset($_COOKIE['success'])) {
            echo "<p>" . $_COOKIE['success'] . "</p>";
        }
        if (isset($_COOKIE['error'])) {
            echo "<p>" . $_COOKIE['error'] . "</p>";
        }


        function filter($data)
        {
            return addslashes(strip_tags(trim($data)));
        }

        if (isset($_POST['submit'])) {
            $name = (isset($_POST['name'])) ? filter($_POST['name']) : "";
            $email = (isset($_POST['email'])) ? filter($_POST['email']) : "";
            $password = (isset($_POST['password'])) ? filter($_POST['password']) : "";
            $hashpassword = password_hash($password, PASSWORD_DEFAULT);
            $mobile = (isset($_POST['mobile'])) ? filter($_POST['mobile']) : "";
            $city = (isset($_POST['city'])) ? filter($_POST['city']) : "";
            $gender = (isset($_POST['gender'])) ? filter($_POST['gender']) : "";
            $ip = $_SERVER['REMOTE_ADDR'];
            $token = md5(str_shuffle($name . $email . $mobile . time()));

            include("connection.php");

            $sql = "INSERT INTO client(name,email,password,mobile,city,gender,ip,token) VALUES ('$name','$email','$hashpassword','$mobile','$city','$gender','$ip','$token')";

            $result = $connect->query($sql);

            if ($result) {
                // echo "data inserted";
                setcookie("success", "Registration successful", time() + 3);
                header("Location:register.php");
            } else {
                setcookie("error", "Unable to Register", time() + 3);
                echo mysqli_error($connect);
            }
        }
        ?>
        <form action="" method="post" id="register-form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
                <small class="checkerror hide" id="checkname">Please Enter your name</small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
                <small class="checkerror hide" id="checkemail">Please Enter your Email</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                <small class="checkerror hide" id="checkpassword">Please Enter your Password</small>
            </div>
            <div class="form-group">
                <label for="cpassword">Conform Password</label>
                <input type="password" class="form-control" name="cpassword" id="cpassword">
                <small class="checkerror hide" id="checkcpassword">Conform your password</small>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile No.</label>
                <input type="tel" pattern="[0-9]{10}" class="form-control" name="mobile" id="mobile">
                <small class="checkerror hide" id="checkmobile">Enter your mobile number</small>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" name="city" id="city">
                    <option value="" selected>Choose...</option>
                    <option value="bbsr">Bhubaneswar</option>
                    <option value="blr">Bangalore</option>
                    <option value="hyd">Hyderabad</option>
                    <option value="mb">Mumbai</option>
                </select>
                <small class="checkerror hide" id="checkcity">Select a city</small>
            </div>
            <div class="form-group">
                <span>Gender: </span>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="text-center">
                <button type="reset" class="btn btn-secondary mr-2" name="reset" id="reset">Reset</button>
                <button type="submit" class="btn btn-success" name="submit" id="submit">Submit</button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="register.js"></script>
</body>

</html>