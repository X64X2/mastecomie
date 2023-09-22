<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no">
    <title>Mastecomies</title>

    <?php
    include_once("./incl/header.php");
    ?>

</head>

<body>
     
    
    <!-- Upper Bar -->

    <div class="upper-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe"></i> Select Language
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item disabled" href="#">Arabic (soon)</a></li>
                        <li><a class="dropdown-item disabled" href="#">Russian(soon)</a></li>
                        <li><a class="dropdown-item disabled" href="#">Chinese (soon)</a></li>
                    </ul>
                </div>
                <div class="col-sm" id="btn-upper-bar">
                    <div class="btn-group">
                        <a href="./header.php"><button class=" btn col-sm ">Upload comies</button></a>
                        <a href="./match.php"><button class="btn col-sm">Watch Live round</button></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <form action="/upload.php">
      <input type="file" id="myFile" name="filename">
      <input type="submit">
    </form>
    <!-- First Box -->

    <div class="first-box " id="Home">
        <div class="text ">
            <h1 class="fuze ">Mastecomies</h1>
            <h1>Coom to ya Waifu</h1>
        </div>
        <a href="upload.php"><button type="button" class="btn">Upload comies</button></a>

    <!-- Slider -->

    <div id="Top-Coomed" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators ">
            <button type="button " data-bs-target="#Top-Coomed" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button " data-bs-target="#Top-Coomed" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <p class="title-slider "><i class="fas fa-grip-lines-vertical "></i> Top Coomed Niggers</p>
        <div class="carousel-inner ">
            <div class="carousel-item active ">
                <img src="./assests/images/maaaaadd.jpg" class="d-block w-100" alt="coom">
                </div>
            </div>
         
    <!-- Second Box -->

    <div class="container container-1 " id="Featured-Coomers ">
        <p><i class="fas fa-grip-lines-vertical "></i> Featured Coomers with Waifu</p>
        <!-- Stack the columns on mobile by making one full-width and the other half-width -->
        <div class="row ">
            <div class="col-md-8 "><img src="./assests/images/maaa.jpg " alt="maaataacoom "></div>
        </div>

    <!-- Scroll Spy -->

    <div class="container-fluid container-6 ">
        <div class="col ">
            <p><a href="#Home"><i class="fas fa-grip-lines "></i> Home / 1</a></p>
            <p><a href="#Top-Coomed"><i class="fas fa-grip-lines "></i> Top Coomers / 2</a></p>
            <p><a href="#Featured-Coomers"><i class="fas fa-grip-lines "></i> Featured Coomers/ 3</a></p>
        </div>

    </div>

    <!-- Go Up -->

    <span class="doom-scroll "><a href="# "><i class="fas fa-arrow-alt-circle-up "></i>
            <p>Doom scroll</p>
        </a></span>
    
    <tr>
      <td>How did you coom</td>
      <td><select name=”coom”>
            <option value = “a”>Vidya
            <option value = “b”> TV
            <option value = “c”> Lit
        </select>
      </td>
    </tr>

</body>

<?php include_once("./incl/footer.php"); ?>
<script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 2000
        })
    });
</script>

</html>