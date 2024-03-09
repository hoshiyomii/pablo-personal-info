

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" a href="registration.css">

    <script src="https://kit.fontawesome.com/a7742dae7e.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body>

    <div class = "container">
    
        <form action = "registration.php" method = "post" class = "info-form"> 

            <h2> Personal Information </h2>
            <div class = "form-group">
                <label for="lastName">Last Name</label>
                <input type = "text" class = "form-control" name = "LastName" placeholder="Last Name: ">
            </div>

            <div class = "form-group">
                <label for="firstName">First Name</label>
                <input type = "text" class = "form-control" name = "FirstName" placeholder="First Name: ">
            </div>

            <div class = "form-group">
                <label for="password">Password</label>
                <input type = "password" class = "form-control" name = "password" placeholder="Password: ">
            </div>

            <div class = "form-group">
                <label for="repeat_password">Confirm Password</label>
                <input type = "password" class = "form-control" name = "repeat_password" placeholder="Repeat password: ">
            </div>


            <h2> Address Information </h2>
            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country" name="country" required>
                    <option selected>Choose...</option>
                </select>
            </div>

            <div class="form-group">
                <label for="state">State/Province</label>
                <select class="form-control" id="state" name="state" required>
                    <option selected>Choose...</option>
                </select>
            </div>

            <div class="form-group">
                <label for="city">City/Municipality</label>
                <select class="form-control" id="city" name="city" required>
                    <option selected>Choose...</option>
                </select>
            </div>
            
            <div class = "form-group">
                <label for="barangay">Barangay</label>
                <input type = "text" class = "form-control" name = "barangay" placeholder="Barangay: ">
            </div>

            <h2> Contact Information </h2>
            <div class="form-group">
                <label for="contactNumber">Contact Number</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="phoneCode" readonly>
                    <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Enter Contact Number">
                </div>
            </div>

            <div class = "form-group">
                <label for="Email">Email</label>
                <input type = "text" class = "form-control" name = "Email" placeholder="Email: ">
            </div>

            <div class = "form-group">
                <input type = "submit" class = "contact-btn nav-btn" name = "submit" placeholder="submit">
            </div>

        </form>
        <?php
    if(isset($_POST["submit"])){
        $FirstName = $_POST["FirstName"];
        $LastName = $_POST["LastName"];
        $email = $_POST["Email"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $errors = array();

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

            array_push($errors,"Email is not valid");
        }
        if(strlen($password)<8){
            array_push($errors,"Password must be at least 8 characters long");
        }
        if($password != $repeat_password){
            array_push($errors,"Password does not match");
        }
        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $rowCount = mysqli_num_rows($result);
        if ($rowCount>0) {
            array_push($errors, "Email Already Exist");
        }
        if (count($errors)>0){
            foreach( $errors as $error){
                echo"<div class = 'alert alert-danger'>$error</div>";
                }
            } else {
                require_once "database.php";
                $sql = "INSERT INTO users (First_name, Last_name, email, password) VALUES (?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                $preparestmt = mysqli_stmt_prepare($stmt, $sql);
                if ($preparestmt){
                    mysqli_stmt_bind_param($stmt,"ssss", $FirstName, $LastName, $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class = 'alert alert-success'> You are Registered Successfully! </div>";
                } else {
                    dir("Something went wrong");
                }
            }
        }  
    ?>

        
    <div><p> Already Registered? <a href = "login.php"> Login Here </a></div>

</div>

</div>
</form>

    <script>

    let data = [];

    document.addEventListener('DOMContentLoaded', function() {
        fetch('https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/master/countries%2Bstates%2Bcities.json')
            .then(response => response.json())
            .then(jsonData => {
                data = jsonData;
                const countries = data.map(country => country.name);
                populateDropdown('country', countries);
            })
            .catch(error => console.error('Error fetching countries:', error));
    });

    function populateDropdown(dropdownId, data) {
        const dropdown = document.getElementById(dropdownId);
        dropdown.innerHTML = '';
        data.forEach(item => {
            const option = document.createElement('option');
            option.value = item;
            option.text = item;
            dropdown.add(option);
        });
    }

    document.getElementById('country').addEventListener('change', function() {
        const selectedCountry = this.value;
        const countryData = data.find(country => country.name === selectedCountry);
        if (countryData && countryData.states) {
            const states = countryData.states.map(state => state.name);
            populateDropdown('state', states);
        }
        const phoneCode = countryData ? countryData.phone_code : '';
        document.getElementById('phoneCode').value = phoneCode;
    });

    document.getElementById('state').addEventListener('change', function() {
        const selectedState = this.value;
        const countryData = data.find(country => country.name === document.getElementById('country').value);
        if (countryData) {
            const stateData = countryData.states.find(state => state.name === selectedState);
            if (stateData && stateData.cities) {
                const cities = stateData.cities.map(city => city.name);
                populateDropdown('city', cities);
            } else {
                console.log('No cities found for state:', selectedState);
            }
        } else {
            console.log('Country data not found for state:', selectedState);
        }
    });

</script>

</body>
</html>