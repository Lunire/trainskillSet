<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrainSkill-เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: linear-gradient(to right, #d3d3d3, #1e3c72);
        }

        /* ปรับแต่งให้ popup ปรากฏขึ้นที่ด้านบน */
        .popup-message {
            position: fixed;
            margin-top: 20px;
            top: 10px;
            /* ตำแหน่งจากด้านบนของหน้า */
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            /* ให้ popup อยู่ข้างบนสุด */
            max-width: 270px;
            width: 100%;
            padding: 10px 20px;
            background-color: rgb(220, 72, 72);
            /* สีพื้นหลัง (สีเขียว) */
            color: white;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            display: none;
            /* ซ่อนก่อน */
            opacity: 0;
            /* ซ่อนก่อน */
            transition: opacity 0.3s ease, top 0.3s ease;
            /* ทำให้แสดงอย่างค่อยเป็นค่อยไป */
        }

        /* แสดงผลเมื่อ popup ถูกแสดง */
        .popup-message.show {
            display: block;
            opacity: 1;
            top: 20px;
            /* ปรับให้ขึ้นมาจากด้านบน */
        }

        .password-container {
            position: relative;
            width: 100%;
        }

        .password-container input {
            width: 100%;
            padding-right: 40px;
        }

        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: gray;
        }

        @media (max-width: 768px) {
            .card {
                width: 50%;
                padding: 30px;
            }

            .popup-message {
                margin-top: 10px;
                max-width: 240px;
                font-size: smaller;
            }
        }

        @media (max-width: 992px) {
            .card {
                width: 310px;
            }
        }

        @media (min-width: 992px) {
            .card {
                width: 350px;
            }
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg">
        <h3 class="text-center mb-3">RESET YOUR PASSWORD</h3>
        <form action="/change_password" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="exemple@gmail.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <div class="password-container">
                    <input type="password" id="password" name="password" class="form-control" required>
                    <i class="fa fa-eye eye-icon" id="eyeIcon1"></i>
                </div>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <div class="password-container">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                    <i class="fa fa-eye eye-icon" id="eyeIcon2"></i>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
        </form>
        <p class="text-center mt-3">Don't have an account? <a href="/register">Sign up now</a></p>
        <a class="text-center" href="/login">Login?</a>
        <?php
        if (isset($_SESSION['message'])):
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
            <div id="popupMessage" class="popup-message text-center">
                ❌ <?= $message; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="public/script.js"></script>
</body>

</html>