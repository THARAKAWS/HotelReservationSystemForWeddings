<!--Akith Perera IT23551152-->
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora Bliss</title>
    <link rel="stylesheet" href="styles/admin_login.css">
    <link rel="icon" href="images/icon/icon.ico" type="image/x-icon">
</head>
<header>
    <div class="container">
        <h1>Aurora Bliss</h1>
    </div>
</header>

<main>
    <section class="login-section">
        <div class="login-box">
            <h1>Employee Login</h1>
            <form action="./adminPHP/employee_login.php" class="login-form" method="post">
                <div class="input-group">
                    <label for="employee-id">Employee ID <span class="required">*</span></label>
                    <input type="text" id="employee-id" placeholder="Employee ID" name="empID" required>
                </div>
                <div class="input-group">
                    <label for="employee-password">Password <span class="required">*</span></label>
                    <input type="password" id="employee-password" placeholder="Password"  name="empPSW" required>
                </div>
                 <button type="submit" class="btn login-btn">Login</button>
            </form>
        </div>
    </section>
</main>

<footer>
    <div class="container">
        <p>&copy; 2024 Aurora Bliss. All rights reserved.</p>
    </div>
</footer>
