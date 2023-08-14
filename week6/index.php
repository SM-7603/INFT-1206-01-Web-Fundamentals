<!DOCTYPE html>
<!-- 
    INFT-1206-01 - Week 6 Demo Homepage
    Shubham Mohanty
    June 6th, 2023
-->

<html lang="en">

    <?php  
    
        $title = "Week 6 Homepage";

    ?>

    <?php include("head.php"); ?>
    
<body>
    
    <?php include("header.php"); ?>
    
    <section>

        <h1>Welcome to My Site</h1>

        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga nisi at alias. Ullam neque obcaecati quibusdam, quis quae repudiandae asperiores tempora rem cum necessitatibus facilis eligendi architecto odit qui? Quisquam!</p>

        <?php 

            $colors = array("Red", "Blue", "Yellow"); 
        
        ?>

        <h2>Colors</h2>

        <ul>
            <li><?php echo $colors[0]; ?></li>
            <li><?php echo $colors[1]; ?></li>
            <li><?php echo $colors[2]; ?></li>
        </ul>

        <ol>
            <?php 
                for ($i=0; $i < 3; $i++) { 
                    echo "<li>".$colors[$i]."</li>";
                }
            ?>
        </ol>

        <?php 
            $countries = array(
                "CA" => "Canada",
                "US" => "United States",
                "MX" => "Mexico"
            );

            echo $countries["MX"]; // Putting comments, to the right is also, gr8! :D

            // new topic
            /* comment block */

            $favs = array(4, 16, "Purple", "CA" => "Canada", "Cars", 7 => "Lucky Number");

            print_r($favs)

        ?>
    
    </section>
    
    <?php include("footer.php"); ?>

</body>

</html>