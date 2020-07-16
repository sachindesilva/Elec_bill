<html>  
    <head>
        <title>Electricity Bill Calculator</title>
        
        <style>
            body {
                font-family: 'Courier New';
               

				div {
  background-image: url('img.jpg');
}


                color: #FFFFFF;
                text-align: center;
                margin-top: 100px;
            }
            h1 {
                color: #F39C12;  
            }
            .results {
                line-height: 1.5em;
            }
            .error {
                color: #E74C3C;
            }
        </style>
    </head>
    <body> 
	<style>
body {
  background-image: url('images/img.jpg');
}
</style>
	
    <center>
        
        <marquee behavior="alternate"><h1 style="color:black;"><b> Electricity Bill Calculator<b></h1></marquee><br/><br/><br/><br/><br/>
        
    <form method="post">  
        
        Enter Last Reading :   
        <input type="text" name="lastread" size="100"/><br/><br/>  
        
        Enter Current Reading:  
        <input type="text" name="currentread" size="100"/><br/><br/> 
        
        Enter Last Balance :   
        <input type="text" name="lastbalance" size="100"/><br/><br/> 
        
        Choose Customer Category:<br/>  
        <input type="radio" id="domestic" name="category" value="Domestic" checked="checked"/>
        <label for="domestic">Domestic</label><br/>
        <input type="radio" id="religious" name="category" value="Religious"/>
        <label for="religious">Religious</label><br/>
        <input type="radio" id="industrial" name="category" value="Industrial"/>
        <label for="industrial">Industrial</label><br/><br/>
        
        <input type="submit" name="submit" value="Find">
        <input type="submit" name="reset" value="Reset">
        
    </form> 
        <div class="results">
<?php
        
    $lastread = "";
    $currentread = ""; 
    $category = "";
    $lastbalance = "";
        
if(isset($_POST["submit"]))
{  
    $lastread = $_POST["lastread"];
    $currentread = $_POST["currentread"]; 
    $category = $_POST["category"];
    $lastbalance = $_POST["lastbalance"];
    
    if($lastread=="" || $currentread=="" || $lastbalance=="" || $category==null) 
    {
        echo "<div class='error'>Please Fill All Fields!</div>";
    } else { 
        if($lastread > $currentread) 
        {
            echo "<div class='error'>Invalid Readings!</div>";
        } else {
            $unitcount = $currentread - $lastread;
            if($category=="Domestic") 
            {
                if($unitcount <= 30) {
                    $fixedprice = 30;
                    $unitprice = $unitcount * 2.50; }
                
                if($unitcount >= 31 && $unitcount <= 60) {
                    $fixedprice = 60;
                    $unitprice = (30 * 2.50) + (($unitcount - 30) * 4.85); }
                
                if($unitcount >= 61 && $unitcount <= 90) {
                    $fixedprice = 90;
                    $unitprice = (60 * 7.85) + (($unitcount - 60) * 10.00); }
                
                if($unitcount >= 91 && $unitcount <= 120) {
                    $fixedprice = 480;
                    $unitprice = (60 * 7.85) + (30 * 10.00) + (($unitcount - 90) * 27.75); }
                
                if($unitcount >= 121 && $unitcount <= 180) {
                    $fixedprice = 480;
                    $unitprice = (60 * 7.85) + (30 * 10.00) + (30 * 27.75) + (($unitcount - 120) * 32.00); }
                
                if($unitcount >= 181){
                    $fixedprice = 540;
                    $unitprice = (60 * 7.85) + (30 * 10.00) + (30 * 27.75) + (60 * 32.00) + (($unitcount - 180) * 45.00); }
            
            } elseif($category=="Religious")
            {
                if($unitcount <= 30) {
                    $fixedprice = 30;
                    $unitprice = $unitcount * 1.90; }
                
                if($unitcount >= 31 && $unitcount <= 90) {
                    $fixedprice = 60;
                    $unitprice = (30 * 1.90) + (($unitcount - 30) * 2.80); }
                
                if($unitcount >= 91 && $unitcount <= 120) {
                    $fixedprice = 180;
                    $unitprice = (30 * 1.90) + (60 * 2.80) + (($unitcount - 90) * 6.75); }
                
                if($unitcount >= 121 && $unitcount <= 180) {
                    $fixedprice = 180;
                    $unitprice = (30 * 1.90) + (60 * 2.80) + (30 * 6.75) + (($unitcount - 120) * 7.50); }
                
                if($unitcount >= 181) {
                    $fixedprice = 240;
                    $unitprice = (30 * 1.90) + (60 * 2.80) + (30 * 6.75) + (60 * 7.50) + (($unitcount - 120) * 9.40); }
                
            } elseif($category=="Industrial")
            {
                if($unitcount <= 300) {
                    $fixedprice = 600;
                    $unitprice = $unitcount * 10.80; }
                
                if($unitcount >= 301) {
                    $fixedprice = 600;
                    $unitprice = (300 * 10.80) + (($unitcount - 300) * 12.20); }
            }
            echo "Unit Count: ".$unitcount;
            echo "<br/>";
            echo "Fixed Price: ".$fixedprice;
            echo "<br/>";
            echo "Unit Price: ".round($unitprice, 2);
            echo "<br/>";
            echo "Charges for This Month : ".(round($unitprice, 2) + $fixedprice);
            echo "<br/>";
            echo "<b>Total BIll: ".(round($unitprice, 2) + $fixedprice + $lastbalance."</b>");
        }    
    }
}
        
if(isset($_POST["reset"]))
{
    header("Refresh:0");
}
?>
            </div>
    </center>
</body>
</html>