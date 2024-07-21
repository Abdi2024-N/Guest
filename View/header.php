<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
   
}

body {
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    background-color: black;
}

.menu-icon {
    display: none;
}

.navbar {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
}

nav {
    flex: 1;
    text-align: right;
}

nav ul {
    display: inline-block;
    list-style-type: none;
}

nav ul li {
    display: inline-block;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    padding: 5px 5px;
    transition: color 0.3s, background-color 0.3s;
}

nav ul li a:hover {
    color: cyan;
    background-color: black;
    border-radius: 5px;
}

a {
    text-decoration: none;
    color: #fff;
}

.container {
    max-width: 1200px;
    margin: auto;
    padding: 0 20px;
}

.header {
    background-color: #000;
}

.row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px 0;
}

.col-2 {
    flex: 1;
    margin: 20px;
    padding: 20px;
}

.image-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.image-grid img {
    width: 100%;
    border-radius: 10px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
} 

.image-grid img:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.col-3 {
    flex: 1;
    margin: 20px;
}

h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #fff;
}

h2 {
    font-size: 2rem;
    margin-bottom: 15px;
    color: #fff;
}

p {
    margin-bottom: 15px;
    color: #fff;
    font-size: 1.1rem;
}

ul {
    list-style-type: none;
    padding-left: 0;
}

ul li {
    background: #000;
    padding: 5px;
    margin-bottom: 10px;
    border-radius: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 1.1rem;
    color: #333;
    transition: background-color 0.3s, color 0.3s;
}

ul li:hover {
    background-color: #f4f4f4;
    color: cyan;
}

.footer {
    background: #000;
    color: #8a8a8a;
    font-size: 10px;
    padding: 25px 0 20px;
}

.footer p {
    color: #8a8a8a;
}

.footer h3 {
    color: #fff;
    margin-bottom: 20px;
}

.footer-col-1,
.footer-col-2,
.footer-col-3,
.footer-col-4 {
    min-width: 200px;
    margin-bottom: 20px;
}

.footer-col-1 {
    flex-basis: 30%;
}

.footer-col-2 {
    flex: 1;
    text-align: center;
}

.footer-col-2 img {
    width: 180px;
    margin-bottom: 20px;
}

.footer-col-3,
.footer-col-4 {
    flex-basis: 12%;
    text-align: center;
}

.app-logo {
    margin-top: 20px;
}

.app-logo img {
    width: 140px;
}

.footer hr {
    border: none;
    background: #b5b5b5;
    height: 1px;
    margin: 20px 0;
}

.copyright {
    text-align: center;
}
@media only screen and (max-width: 800px) {
    nav ul {
        position: absolute;
        top: 70px;
        left: 0;
        background: #fff;
        width: 100%;
        max-height: 0;
        overflow: hidden;
        opacity: 0;
        visibility: hidden;
        transition: max-height 0.5s ease-in-out, opacity 0.5s ease-in-out, visibility 0.5s;
    }

    nav ul.active {
        max-height: 200px;
        opacity: 1;
        visibility: visible;
    }

    nav ul li {
        display: block;
        margin-right: 50px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    nav ul li a {
        text-decoration: none;
        color: #fff;
        padding: 5px 10px;
        transition: color 0.3s, background-color 0.3s;
    }

    nav ul li a:hover {
        color: cyan;
        background-color: black;
        border-radius: 5px;
    }

    .menu-icon {
        display: block;
        cursor: pointer;
    }
} 

@media only screen and (max-width: 600px) {
    .row {
        text-align: center;
    }

    .col-2,
    .col-3,
    .col-4 {
        flex-basis: 100%;
    }
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ibex Open Guest House</title>
    <link rel="icon" href="img/Logo1.png">
    <script src="js/script.js" defer></script>
</head>
<body>
<div class="header">
  <div class="container">    
    <div class="navbar">
        <div class="logo">
          <img src="img/logo1.png" width="225px" />
        </div>
        <nav>
          <ul id="MenuItems">
            <li><a class="anch" href="">Home</a></li>
            <li><a class="anch" href="">About</a></li>
            <li><a class="anch" href="#contact">Contact</a></li>
            <li><a class="anch" href="..\Control\Destroy.php">Log-out</a></li>
            
          </ul>
        </nav>
        <img src="img/menu2.jpg" height="20px" class="menu-icon" onclick="menutoggle2()">
         </div>
    </div>
</div>
