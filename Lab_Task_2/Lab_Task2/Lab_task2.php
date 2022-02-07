<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    // define variables and set to empty values
    $nameErr = $emailErr = $dateofbirthErr = $genderErr = $degreeErr = $bloodgroupErr = "";
    $name = $email = $dateofbirth = $gender = $bloodgroup = "";
    $degree = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
                $errormessage = "at least two words";
                $name = "";
            }
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                $email = "";
            }
        }

        if (empty($_POST["dateofbirth"])) {
            $dateofbirthErr = "required";
        } else {
            if ($_POST["dateofbirth"] < "1953-01-31") {
                $dateofbirthErr = "date range crossed";
            }
            elseif($_POST["dateofbirth"] > "1998-01-12") {
                $dateofbirthErr = "date range crossed";
            }
            else {
                $dateofbirth = test_input($_POST["dateofbirth"]);
            }
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        #error_reporting(0);

        if (!isset($_POST["degree"])) {
            $degreeErr = "degree is required";
        } else {
            # error_reporting(0);
            $checked = 0;
            $values = $_POST['degree'];
            $checked = count($values);

            if ($checked < 2) {
                $degreeErr = 'You need to select any two.';
            } elseif ($checked >= 3) {
                $degreeErr = 'You need to select two.';
            } else {
                $degree = $_POST["degree"];
            }
            
        }
    }
    if (empty($_POST["bloodgroup"])) {
        $bloodgroupErr = "bloodgroup is required";
    } else {
        $bloodgroup = test_input($_POST["bloodgroup"]);
    }


    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        E-mail:
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>

        Date Of Birth:
        <input type="date" name="dateofbirth" value="<?php
                                                        echo $dateofbirth; ?>">
        <span class="error">* <?php echo $dateofbirthErr; ?></span>
        <br><br>
        Gender:
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other") echo "checked"; ?> value="other">Other
        <span class="error">* <?php echo $genderErr; ?></span>
        <br><br>

        Degree:
        <input type="checkbox" name="degree[]" value="SSC">SSC
        <input type="checkbox" name="degree[]" value="HSC">HSC
        <input type="checkbox" name="degree[]" value="BSc">BSc
        <input type="checkbox" name="degree[]" value="MSc">MSc
        <span class="error"> *<?php echo $degreeErr;  ?></span>
        <br><br>

        Blood Group:
        <label for="blood Group"></label>
        <select name="bloodgroup" id="bloodgroup">
            <option value="">--- Choose a Blood Group ---</option>
            <option value="A+">A+ </option>
            <option value="A-">A_</option>
            <option value="B+">B+</option>
            <option value="O+">O+</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O-">O-</option>
        </select>
        <span class="error">* <?php echo $bloodgroupErr; ?></span><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <h2>Your input</h2>
    <?php
    echo $name . "<br>";
    echo $email . "<br>";
    echo $dateofbirth . "<br>";
    echo $gender . "<br>";
    // echo $degree . "<br>";
    if ($degree) {
        foreach ($degree as $key => $value) {
            echo $value . "<br>";
        }
    }
    echo $bloodgroup . "<br>";
    ?>
</body>

</html>