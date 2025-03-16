<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an account - AMU</title>
    <link rel="stylesheet" href="/application/assets/css/log.css">
</head>

<body>
    <div class="container">
        <div class="left-section">
            <div class="logo">AMU</div>
            <a href="#" class="back-link">Back to website →</a>
            <div class="hero-content">
                <h2>Capturing Moments,<br>Creating Memories</h2>
                <div class="dots">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot active"></span>
                </div>
            </div>
        </div>
        <div class="right-section">
            <div class="form-container">
                <h1>Create an account</h1>
                <p class="login-text">Already have an account? <a href="#">Log in</a></p>

                <?= $this->view('log/register') ?>

            </div>
        </div>
    </div>
</body>

</html>