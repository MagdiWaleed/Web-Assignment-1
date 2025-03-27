<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include "Header.php"; ?>
    
    <main>
        <form action="" method="post">
            <div class="form">
                <label><i class="fas fa-user-tag"></i> Full Name</label>
                <input type="text" name="full_name" required placeholder="John Doe">
            </div>
            
            <div class="form">
                <label><i class="fas fa-user-circle"></i> Username</label>
                <input type="text" name="username" required placeholder="johndoe123">
            </div>
            
            <div class="form">
                <label><i class="fas fa-mobile-alt"></i> Phone Number</label>
                <input type="tel" name="phone" required placeholder="+1 234 567 890">
            </div>
            
            <div class="form">
                <label><i class="fab fa-whatsapp"></i> WhatsApp Number</label>
                <input type="tel" name="whatsapp_number" placeholder="+1 234 567 890">
            </div>
            
            <div class="form">
                <label><i class="fas fa-map-marker-alt"></i> Address</label>
                <input type="text" name="address" required placeholder="123 Main Street">
            </div>
            
            <div class="form">
                <label><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" required placeholder="••••••••">
            </div>
            
            <div class="form">
                <label><i class="fas fa-lock"></i> Confirm Password</label>
                <input type="password" name="confirm_password" required placeholder="••••••••">
            </div>
            
            <div class="form">
                <label><i class="fas fa-envelope"></i> E-mail</label>
                <input type="email" name="email" required placeholder="john@example.com">
            </div>

            <div class="form">
                <button type="submit">
                    <i class="fas fa-rocket"></i> Launch Your Account
                </button>
            </div>
        </form>
    </main>

    <?php include "../example.php"; ?>
</body>
</html>