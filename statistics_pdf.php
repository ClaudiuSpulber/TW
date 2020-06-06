<?php include('server.php') ?>
<?php include_once('fpdf182/fpdf.php') ?>

<?php

class PDF extends FPDF
{
	// Page header
	function Header()
	{
		// Logo
		$this->Image('logo.png',10,-1,70);
		$this->SetFont('Arial','B',13);
		// Move to the right
		$this->Cell(80);
		// Title
		$this->Cell(80,10,'Statistics',1,0,'C');
		// Line break
		$this->Ln(20);
	}

	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

if(!empty($_POST["download_pdf_statistics"])) {
	
	
	$select = $dbh->prepare("SELECT COUNT(*) AS user_number FROM users");
	if ($select->execute()) {
		if ($raw = $select->fetch()) {
			$user_number = $raw['user_number'];
		}
	}
	
	$stack = array();
	$select = $dbh->prepare("SELECT product_name FROM `favorites` LIMIT 5");
	if ($select->execute()) {
		while ($raw = $select->fetch()) {
			array_push($stack, $raw['product_name']);
		}
	}
	
	$select = $dbh->prepare("SELECT COUNT(*) AS allergic_users FROM `users` WHERE `allergies` IS NULL OR `allergies` = ''");
	if ($select->execute()) {
		if ($raw = $select->fetch()) {
			$allergic_users = $raw['allergic_users'];
		} else {
			$allergic_users = 0;
		}
	}
	
	$select = $dbh->prepare("SELECT COUNT(*) AS not_allergic_users FROM `users` WHERE `allergies` IS NOT NULL OR `allergies` != ''");
	if ($select->execute()) {
		if ($raw = $select->fetch()) {
			$not_allergic_users = $raw['not_allergic_users'];
		} else {
			$not_allergic_users = 0;
		}
	} 
	
	$select = $dbh->prepare("SELECT COUNT(*) AS allergic_products FROM `products` WHERE `allergens` IS NULL OR `allergens` = ''");
	if ($select->execute()) {
		if  ($raw = $select->fetch()) {
			$allergic_products = $raw['allergic_products'];
		} else {
			$allergic_products = 0;
		}
	}
	
	$select = $dbh->prepare("SELECT COUNT(*) AS not_allergic_products FROM `products` WHERE `allergens` IS NOT NULL OR `allergens` != ''");
	if ($select->execute()) {
		if ($raw = $select->fetch()) {
			$not_allergic_products = $raw['not_allergic_products'];
		} else {
			$not_allergic_products = 0;
		}
	}
	
	$pdf = new PDF();
	//header
	$pdf->AddPage();
	//foter page
	$pdf->AliasNbPages();
	$pdf->SetFont('Arial','B',12);

	$pdf->Ln(20);

	$pdf->Cell(60,12,"NoAllergicUsers",1);
	$pdf->Cell(60,12,"NoNotAllergicUsers",1);
	$pdf->Cell(60,12,"NoAllergensProducts",1);
	$pdf->Ln(12);
	$pdf->Cell(60,12,$allergic_users,1);
	$pdf->Cell(60,12,$not_allergic_users,1);
	$pdf->Cell(60,12,$allergic_products,1);
	
	$pdf->Ln(20);
	
	$pdf->Cell(60,12,"NoNotAllergensProducts",1);
	$pdf->Cell(60,12,"NoUsers",1);
	$pdf->Ln(12);
	$pdf->Cell(60,12,$not_allergic_products,1);
	$pdf->Cell(60,12,$user_number,1);
	
	$pdf->Ln(30);
	$pdf->Cell(60,12,"Top5FavoriteProducts",1);
	foreach ($stack as &$value) {
		$pdf->Ln(12);
		$pdf->Cell(60,12,$value,1);
	}
	

	$pdf->Output();
}
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="principal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="page-wrapper">
        <header class="header-web">
            <div class="logo-wrapper">
                <img class="logo" src="logo.jpg">
            </div>
            <div class="search-wrapper">
                <form class="search" action="cautare.php">
                    <input type="text" class="searchbar" placeholder="Căutare.." name="searched_product2">
                    <button type="submit" class="buttonsearch" name="search_for_product2"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="header-links-wrapper">
                <a href="#" class="header-link">
                    <img src="persoana.png">
                </a>
                <a href="#" class="header-link">
                    <img src="grup.png">
                </a>
                <a href="#" class="header-link">
                    <img src="list.png">
                </a>
            </div>

            <div class="logout-wrapper">
                <a href="/">Logout</a>
                <i class="fa fa-sign-out"></i>
            </div>
        </header>
        <div class="header-mobile">
            <div class="header-mobile-burger" id="show-menu">
                <i class="fa fa-bars"></i>
            </div>
            <div class="logo-mobile">
                <img class="logo" src="logo.jpg">
            </div>
        </div>
        <div class="subheader-mobile">
            <div class="search-wrapper-mobile">
                <form class="search" action="cautare.php">
                    <input type="text" class="searchbar" placeholder="Căutare.." name="searched_product">
                    <button type="submit" class="buttonsearch" name="search_for_product"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="mobile-menu" id="mobile-menu">
            <div class="infos-wrapper">
                <div class="close-menu-icon" id="close-menu">
                    <i class="fa fa-times"></i>
                </div>
                <div class="logo-mobile">
                    <img class="logo" src="logo.jpg">
                </div>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Pui.png">
                </div>
                <div class="submenu-claus-container">
                    <a href="carne.asp" class="menu-text">Meat products</a>

                    <div class="submenu-claus">
                        <div>
                            <a href="pui.asp" class="submenu-text">Chicken</a>
                        </div>
                        <div>
                            <a href="vita.asp" class="submenu-text">Beef</a>
                        </div>
                        <div>
                            <a href="rata.asp" class="submenu-text">Duck</a>
                        </div>
                        <div>
                            <a href="curcan.asp" class="submenu-text">Turkey</a>
                        </div>
                        <div>
                            <a href="porc.asp" class="submenu-text">Pork</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Vegetarian.png">
                </div>
                <a href="vegetarian.asp" class="menu-text">Vegetarian products</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Peste.png">
                </div>
                <a href="peste.asp" class="menu-text">Fish and Seafood</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Ciorba.png">
                </div>
                <a href="supe.asp" class="menu-text">Soups</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="garnituri.png">
                </div>
                <a href="Garnituri.asp" class="menu-text">Sides</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Salata.png">
                </div>
                <a href="salate.asp" class="menu-text">Salads</a>
            </div>
            <div class="menu-element">
                <div>
                    <img class="menu-image" src="Tort.png">
                </div>
                <a href="desert.asp" class="menu-text">Dessert</a>
            </div>
            <div class="header-links-wrapper">
                <a href="#" class="header-link">
                    <img src="persoana.png">
                </a>
                <a href="#" class="header-link">
                    <img src="grup.png">
                </a>
                <a href="#" class="header-link">
                    <img src="list.png">
                </a>
            </div>
            <div class="logout-wrapper">
                <a href="/">Logout</a>
                <i class="fa fa-sign-out"></i>
            </div>
        </div>
        <div class="content">
            <div class="container">
				<span class="text-center descriere-principal">Descriere pompoasa despre statistici. Mai jos puteti downlaoda numarul de utilizatori, numarul de produse ce nu au alergeni, numarul de produse ce au alergeni, numarul de persoane alergice, top 5 produse favorite.</span>
				<form class="search" action="statistics_pdf.php" method="post">
                    <input style="width:100%;" type="submit" class="buttonsearch" name="download_pdf_statistics" value="Donwload PDF Statistics"></button>
                </form>

            </div>
            <div class="menu">
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Pui.png">
                    </div>
                    <div class="submenu-claus-container">
                        <a href="carne.asp" class="menu-text">Meat products</a>

                        <div class="submenu-claus">
                            <div>
                                <a href="pui.asp" class="submenu-text">Chicken</a>
                            </div>
                            <div>
                                <a href="vita.asp" class="submenu-text">Beef</a>
                            </div>
                            <div>
                                <a href="rata.asp" class="submenu-text">Duck</a>
                            </div>
                            <div>
                                <a href="curcan.asp" class="submenu-text">Turkey</a>
                            </div>
                            <div>
                                <a href="porc.asp" class="submenu-text">Pork</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Vegetarian.png">
                    </div>
                    <a href="vegetarian.asp" class="menu-text">Vegetarian products</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Peste.png">
                    </div>
                    <a href="peste.asp" class="menu-text">Fish and Seafood</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Ciorba.png">
                    </div>
                    <a href="supe.asp" class="menu-text">Soups</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="garnituri.png">
                    </div>
                    <a href="Garnituri.asp" class="menu-text">Sides</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Salata.png">
                    </div>
                    <a href="salate.asp" class="menu-text">Salads</a>
                </div>
                <div class="menu-element">
                    <div>
                        <img class="menu-image" src="Tort.png">
                    </div>
                    <a href="desert.asp" class="menu-text">Dessert</a>
                </div>
            </div>
        </div>


        <footer style="background-color:#381D2A">
            <div class="contact">
                <a href="contact.html" target="_blank">Contact</a>
            </div>
        </footer>
    </div>
    <script src="./principal.js"></script>
</body>



</html>