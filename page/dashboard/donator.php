<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduMaterial | Donator</title>
    <link rel="stylesheet" type="text/css" href="/src/css/header.css">
    <link rel="stylesheet" type="text/css" href="/src/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    
    <nav id="header">
        <a href="/index.php" class="logo">EduMaterial</a>
        <div class="toggle"></div>
        <ul class="navigation">
            <li><a href="/index.php">Home</a></li>
            <li><a href="/page/donate/donate.php">Donate</a></li>
            <li><a href="/page/material/math.php">Material</a></li>
            <li><a class="active" href="/page/about-us/about_us.php">About Us</a></li>
            <li><a id="log" href="#"><i class="fas fa-user"></i></a>
                <ul>
                    <li><a href="/page/login/login.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</head>
<body>
    <div class="sidebar">
        <h1 id="title">Donator Dashboard</h1>
        <hr>  
        <ul id="subject-list">
            <li class="active">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span class="link-text">Manage Materials</span>
                </a>
            </li>
            <!-- <li>
                <a href="">
                    <i class="fas fa-address-book"></i>
                    <span class="link-text">Manage Info</span>
                </a>
            </li> -->
        </ul>
    </div>
    <div class="main">
        <h1>Donator Dashboard</h1>
        <h2>Material List</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Material Name</th>
                    <th>Type</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Material Name">Calculus Introduction</td>
                    <td data-label="Type">Video</td>
                    <td data-label="Edit">
                        <button type="button" class="edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <!-- <tr class="active-row"> -->
                <tr>
                    <td data-label="Material Name">Calculus for Beginners</td>
                    <td data-label="Type">Ebook</td>
                    <td data-label="Edit">
                        <button type="button" class="edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-label="Material Name">Statistics For Noobies</td>
                    <td data-label="Type">Ebook</td>
                    <td data-label="Edit">
                        <button type="button" class="edit-btn">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <!-- and so on... -->
            </tbody>
        </table>
    </div>
    <script src="/src/js/header.js"></script>
</body>
</html>