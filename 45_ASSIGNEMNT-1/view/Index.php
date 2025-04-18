<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../view/style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <?php include "Header.php"; ?>
    
    <main>
        <form id="RegisterForm" action="" method="post">
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
                <input type="tel" name="phone" required placeholder="010 234 567 89">
                <span id="error-phone"></span>
            </div>
            
            <div class="form">
                <label><i class="fab fa-whatsapp"></i> WhatsApp Number</label>
                <input type="tel" name="whatsapp_number" id="whatsapp_number" placeholder="010 234 567 89">
                <input type="button" value="check" onclick="whatsappNumber()">
                <span id="error-whatsapp_number" ></span>
            </div>
            <div class="form">
                <label><i class="fas fa-map-marker-alt"></i> Address</label>
                <input type="text" name="address" required placeholder="123 Main Street">
            </div>
            <div class="form">
                <label><i class="fas fa-envelope"></i> E-mail</label>
                <input type="email" name="email" required placeholder="john@example.com">
                <span id="error-email"></span>
            </div>
            <div class="form">
                <label><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" required placeholder="••••••••">
                <span id="error-password" ></span>
                <div class="password-notice">
                    <ul>
                        <li>at least 8 characters with at least 1 number literal and 1 special
                        character</li>
                    </ul>
                </div>
            </div>
            <div class="form">
                <label><i class="fas fa-lock"></i> Confirm Password</label>
                <input type="password" name="confirm_password" required placeholder="••••••••">  
                <span id="error-confirm_password" ></span>             
            </div>
            <div class="mb-3">
                <label for="formFileSm" class="form-label">
                <i class="bi bi-camera-fill"></i> Personal Photo</label>
                <input class="form-control form-control-sm" id="formFileSm" name="photo" type="file">
            </div>
            <div class="form">
                <button type="button" onclick="register()">
                    <i class="fas fa-rocket"></i> Launch Your Account
                </button>
            </div>
        </form>
    </main>
    <script src="../view/js/Validation.js"></script>
</body>
<?php include "Footer.php"; ?>
</html>
