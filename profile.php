<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="profile.css">
</head>

<?php
$db = mysqli_connect("sql203.epizy.com", "epiz_28288046", "wSejTvlnICy", "epiz_28288046_fuelQuotes", "3306");

if(!$db){

    die("Connection Failed: " . mysqli_connect_error());
}

#session_start();
$username = $_SESSION["username"];

$profile = mysqli_query($db, "select * from profiledata where username='$username'");
$data = mysqli_fetch_array($profile);

?>

<h1 class="header">Profile Page</h1>

<form method="post" action="updateProfile.php" onload="getUser('<?php $username ?>')">
    <div class = "content">
        <div class="vertical-center">
            <div>
                <input type="hidden" name="username" value="<?php echo $username;?>">
            </div>
            <div class="field-header">
                <label>Full Name</label>
                <div>
                <input class="field" maxlength="50" type="text" name="name" value="<?php echo $data['name']?>" required>
                </div>
            </div>
            <div class="field-header">
                <label>Address 1</label>
                <div>
                <input class="field" maxlength="100" type="text" name="address1" value="<?php echo $data['address1']?>" required>
                </div>
            </div>
            <div class="field-header">
                <label>Address 2</label>
                <div>
                <input class="field" maxlength="100" type="text" name="address2" value="<?php echo $data['address2']?>">
                </div>
            </div>
            <div class="field-header">
                <label>City</label>
                <div>
                <input class="field" maxlength="100" type="text" name="city" value="<?php echo $data['city']?>" required>
                </div>
            </div>
            <div class="field-header">
                <label>State</label>
                <div>
                <select class="field" name="state" required>
                        <option value="AL" <?php if ($data['state'] == 'AL') echo "selected='selected'";?> >Alabama</option>
                        <option value="AK" <?php if ($data['state'] == 'AK') echo "selected='selected'";?>  >Alaska</option>
                        <option value="AZ" <?php if ($data['state'] == 'AZ') echo "selected='selected'";?>  >Arizona</option>
                        <option value="AR" <?php if ($data['state'] == 'AR') echo "selected='selected'";?>  >Arkansas</option>
                        <option value="CA" <?php if ($data['state'] == 'CA') echo "selected='selected'";?>  >California</option>
                        <option value="CO" <?php if ($data['state'] == 'CO') echo "selected='selected'";?>  >Colorado</option>
                        <option value="CT" <?php if ($data['state'] == 'CT') echo "selected='selected'";?>  >Connecticut</option>
                        <option value="DE" <?php if ($data['state'] == 'DE') echo "selected='selected'";?>  >Delaware</option>
                        <option value="DC" <?php if ($data['state'] == 'DC') echo "selected='selected'";?>  >District Of Columbia</option>
                        <option value="FL" <?php if ($data['state'] == 'FL') echo "selected='selected'";?>  >Florida</option>
                        <option value="GA" <?php if ($data['state'] == 'GA') echo "selected='selected'";?>  >Georgia</option>
                        <option value="HI" <?php if ($data['state'] == 'HI') echo "selected='selected'";?>  >Hawaii</option>
                        <option value="ID" <?php if ($data['state'] == 'ID') echo "selected='selected'";?>  >Idaho</option>
                        <option value="IL" <?php if ($data['state'] == 'IL') echo "selected='selected'";?>  >Illinois</option>
                        <option value="IN" <?php if ($data['state'] == 'IN') echo "selected='selected'";?>  >Indiana</option>
                        <option value="IA" <?php if ($data['state'] == 'IA') echo "selected='selected'";?>  >Iowa</option>
                        <option value="KS" <?php if ($data['state'] == 'KS') echo "selected='selected'";?>  >Kansas</option>
                        <option value="KY" <?php if ($data['state'] == 'KY') echo "selected='selected'";?>  >Kentucky</option>
                        <option value="LA" <?php if ($data['state'] == 'LA') echo "selected='selected'";?>  >Louisiana</option>
                        <option value="ME" <?php if ($data['state'] == 'ME') echo "selected='selected'";?>  >Maine</option>
                        <option value="MD" <?php if ($data['state'] == 'MD') echo "selected='selected'";?>  >Maryland</option>
                        <option value="MA" <?php if ($data['state'] == 'MA') echo "selected='selected'";?>  >Massachusetts</option>
                        <option value="MI" <?php if ($data['state'] == 'MI') echo "selected='selected'";?>  >Michigan</option>
                        <option value="MN" <?php if ($data['state'] == 'MN') echo "selected='selected'";?>  >Minnesota</option>
                        <option value="MS" <?php if ($data['state'] == 'MS') echo "selected='selected'";?>  >Mississippi</option>
                        <option value="MO" <?php if ($data['state'] == 'MO') echo "selected='selected'";?>  >Missouri</option>
                        <option value="MT" <?php if ($data['state'] == 'MT') echo "selected='selected'";?>  >Montana</option>
                        <option value="NE" <?php if ($data['state'] == 'NE') echo "selected='selected'";?>  >Nebraska</option>
                        <option value="NV" <?php if ($data['state'] == 'NV') echo "selected='selected'";?>  >Nevada</option>
                        <option value="NH" <?php if ($data['state'] == 'NH') echo "selected='selected'";?>  >New Hampshire</option>
                        <option value="NJ" <?php if ($data['state'] == 'NJ') echo "selected='selected'";?>  >New Jersey</option>
                        <option value="NM" <?php if ($data['state'] == 'NM') echo "selected='selected'";?>  >New Mexico</option>
                        <option value="NY" <?php if ($data['state'] == 'NY') echo "selected='selected'";?>  >New York</option>
                        <option value="NC" <?php if ($data['state'] == 'NC') echo "selected='selected'";?>  >North Carolina</option>
                        <option value="ND" <?php if ($data['state'] == 'ND') echo "selected='selected'";?>  >North Dakota</option>
                        <option value="OH" <?php if ($data['state'] == 'OH') echo "selected='selected'";?>  >Ohio</option>
                        <option value="OK" <?php if ($data['state'] == 'OK') echo "selected='selected'";?>  >Oklahoma</option>
                        <option value="OR" <?php if ($data['state'] == 'OR') echo "selected='selected'";?>  >Oregon</option>
                        <option value="PA" <?php if ($data['state'] == 'PA') echo "selected='selected'";?>  >Pennsylvania</option>
                        <option value="RI" <?php if ($data['state'] == 'RI') echo "selected='selected'";?>  >Rhode Island</option>
                        <option value="SC" <?php if ($data['state'] == 'SC') echo "selected='selected'";?>  >South Carolina</option>
                        <option value="SD" <?php if ($data['state'] == 'SD') echo "selected='selected'";?>  >South Dakota</option>
                        <option value="TN" <?php if ($data['state'] == 'TN') echo "selected='selected'";?>  >Tennessee</option>
                        <option value="TX" <?php if ($data['state'] == 'TX') echo "selected='selected'";?>  >Texas</option>
                        <option value="UT" <?php if ($data['state'] == 'UT') echo "selected='selected'";?>  >Utah</option>
                        <option value="VT" <?php if ($data['state'] == 'VT') echo "selected='selected'";?>  >Vermont</option>
                        <option value="VA" <?php if ($data['state'] == 'VA') echo "selected='selected'";?>  >Virginia</option>
                        <option value="WA" <?php if ($data['state'] == 'WA') echo "selected='selected'";?>  >Washington</option>
                        <option value="WV" <?php if ($data['state'] == 'WV') echo "selected='selected'";?>  >West Virginia</option>
                        <option value="WI" <?php if ($data['state'] == 'WI') echo "selected='selected'";?>  >Wisconsin</option>
                        <option value="WY" <?php if ($data['state'] == 'WY') echo "selected='selected'";?>  >Wyoming</option>
                    </select>				
            </div>
            <div class="field-header">
                <label>Zipcode</label>
                <div>
                <input class="field" maxlength="9" minlength="5" type="text" name="zip" value="<?php echo $data['zip']?>" required>
                </div>
                <input type="submit" value="Submit Changes">
            </div>
        </div>
    </div>
</form>
<form method = "POST" action = "FuelQuoteForm.php">
	<button type="submit">Fuel Quote</button><br>
</form>
<form method = "POST" action = "userHub.php">
	<button type="submit">User Hub</button><br>
</form>