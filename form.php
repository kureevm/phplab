<?php if ($_GET["action"]=="addData"){?>
    <html>
    <form method="POST" action="index.php?action=addData">
        <meta charset= "UTF8">
        <p>VIN:
            <input name="VIN_KMS" placeholder="XTA|6 цифр|A-Z/0-9| 7 цифр" style="width: 265px" /> </p>
        <p>RELEASE:
            <input name="RELEASE_KMS" placeholder="Год выпуска (4 цифры)" style="width: 223px"/> </p>
        <p>BRAND:
            <select style="width: 237px" name="BRAND_KMS" required>
                <option name="" value="" >Select</option>
                <option name="BMW" value="BMW" >BMW</option>
                <option value="AUDI">AUDI</option>
                <option value="CHEVROLET">CHEVROLET</option>
                <option value="HONDA">HONDA</option>
                <option value="MAZDA">MAZDA</option>
                <option value="RENAULT">RENAULT</option>
                <option value="FORD">FORD</option>
                <option value="FIAT">FIAT</option>
                <option value="TOYOTA">TOYOTA</option>
            </select> <p>
        <p>COLOUR:
            <select name="COLOUR_KMS" style="width: 230px"  required>
                <option name="" value="" >Select</option>
                <option name="RED" value="RED" >RED</option>
                <option value="BLACK">BLACK</option>
                <option value="WHITE">WHITE</option>
                <option value="ORANGE">ORANGE</option>
                <option value="GREEN">GREEN</option>
                <option value="BLUE">BLUE</option>
                <option value="CYAN">CYAN</option>
                <option value="BROWN">BROWN</option>
                <option value="YELLOW">YELLOW</option>
                <option value="GREY">GREY</option>
            </select> <p>
        <p>TECHNICAL INSPECTION:
            <input name="DATE_KMS" type = "date" style="width: 104px"/> </p>
        <p>
            <button style="width: 300px" type="submit">ADD</button> </p>
        <p>
    </form>
    </html>
<?php }
if ($_GET["action"]=="updateData1"){
    $VIN_KMS=$_GET["VIN_KMS"];
    $COLOUR_KMS=$_GET["COLOUR_KMS"];
    ?>
    <html>
    <form method="POST" action="index.php?action=updateData&a=a&N=<?php echo $_GET['N'];?>&list=<?php echo $_GET['list'];?>">
        <meta charset= "UTF8">
        <p>VIN:
            <input placeholder="XTA|6 цифр|A-Z/0-9| 7 цифр" value="<?php echo $VIN_KMS; ?>" name="VIN_KMS" style="width: 264px"/> </p>
        <p>COLOUR:
            <select name="COLOUR_KMS"  required>
                <option name="" value="" >Select</option>
                <option name="RED" value="RED" <?php if($COLOUR_KMS == 'RED'){echo "selected";}?>>RED</option>
                <option value="BLACK"  <?php if($COLOUR_KMS == 'BLACK'){echo "selected";}?>>BLACK</option>
                <option value="WHITE"  <?php if($COLOUR_KMS == 'WHITE'){echo "selected";}?>>WHITE</option>
                <option value="ORANGE"  <?php if($COLOUR_KMS == 'ORANGE'){echo "selected";}?>>ORANGE</option>
                <option value="GREEN"  <?php if($COLOUR_KMS == 'GREEN'){echo "selected";}?>>GREEN</option>
                <option value="CYAN"  <?php if($COLOUR_KMS == 'CYAN'){echo "selected";}?>>CYAN</option>
                <option value="BROWN"  <?php if($COLOUR_KMS == 'BROWN'){echo "selected";}?>>BROWN</option>
                <option value="YELLOW"  <?php if($COLOUR_KMS == 'YELLOW'){echo "selected";}?>>YELLOW</option>
                <option value="GREY"  <?php if($COLOUR_KMS == 'GREY'){echo "selected";}?>>GREY</option>
            </select>
        </p>
        <p>
            <button style="width: 300px" type="submit">EDIT</button> </p>
        </p>
    </form>
    </html>

<?php }
if ($_GET["action"]=="updateData2"){
    $VIN_KMS=$_GET["VIN_KMS"];
    $DATE_KMS=$_GET["DATE_KMS"];
    ?>
    <html>
    <form method="POST" action="index.php?action=updateData&a=b&N=<?php echo $_GET['N'];?>&list=<?php echo $_GET['list'];?>">
        <meta charset= "UTF8">
        <p>VIN:
            <input placeholder="XTA|6 цифр|A-Z/0-9| 7 цифр" value="<?php echo $VIN_KMS; ?>" name="VIN_KMS" style="width: 263px"/> </p>
        <p>TECHNICAL INSPECTION:
            <input value="<?php echo date("Y-m-d", strtotime($DATE_KMS)); ?>" type = "date"  name="DATE_KMS" style="width: 104px" /> </p>
        <p>
            <button style="width: 300px" type="submit">EDIT</button> </p>
        <p>
    </form>
    </html>
<?php }
if ($_GET["action"]=="updateData3"){
    $VIN_KMS=$_GET["VIN_KMS"];
    $RELEASE_KMS=$_GET["RELEASE_KMS"];
    $BRAND_KMS=$_GET["BRAND_KMS"];
    ?>
    <html>
    <form method="POST" action="index.php?action=updateData&a=c&N=<?php echo $_GET['N'];?>&list=<?php echo $_GET['list'];?>">
        <meta charset= "UTF8">
        <p>VIN:
            <input placeholder="XTA|6 цифр|A-Z/0-9| 7 цифр" value="<?php echo $VIN_KMS; ?>" name="VIN_KMS" style="width: 265px" /> </p>
        <p>RELEASE:
            <input placeholder="Год выпуска (4 цифры)" style="width: 223px" value="<?php echo $RELEASE_KMS; ?>" name="RELEASE_KMS" /> </p>
        <p>BRAND:
            <select style="width: 237px" name="BRAND_KMS" required>
                <option name="" value="" >Select</option>
                <option name="BMW" value="BMW" <?php if($BRAND_KMS == 'BMW'){echo "selected";}?>>BMW</option>
                <option value="AUDI" <?php if($BRAND_KMS == 'AUDI'){echo "selected";}?>>AUDI</option>
                <option value="CHEVROLET" <?php if($BRAND_KMS == 'CHEVROLET'){echo "selected";}?>>CHEVROLET</option>
                <option value="HONDA" <?php if($BRAND_KMS == 'HONDA'){echo "selected";}?>>HONDA</option>
                <option value="MAZDA" <?php if($BRAND_KMS == 'MAZDA'){echo "selected";}?>>MAZDA</option>
                <option value="RENAULT" <?php if($BRAND_KMS == 'RENAULT'){echo "selected";}?>>RENAULT</option>
                <option value="FORD" <?php if($BRAND_KMS == 'FORD'){echo "selected";}?>>FORD</option>
                <option value="FIAT" <?php if($BRAND_KMS == 'FIAT'){echo "selected";}?>>FIAT</option>
                <option value="TOYOTA" <?php if($BRAND_KMS == 'TOYOTA'){echo "selected";}?>>TOYOTA</option>
            </select> </p>
        <button style="width: 300px" type="submit">EDIT</button> </p>
        <p>
    </form>
    </html>
<?php }
?>