<!DOCTYPE html>
<!-- 
    - File name: lab4b.html
    - Name/Author: Shubham Mohanty
    - Date (created): June 8th, 2023
    - Date (last edited): June 9th, 2023
    - Description: The index file that we did in class
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test PHP File</title>
</head>

<body>
    <!-- this is server-side script -->
    <h1>Hello: <?php echo "Hello World! Shubham"; ?></h1>
    <p>Math: 4 * 5 is <?php echo 4 * 5; ?> </p>

    <!-- this is client-side script -->
    <h1 style="color: green;" onmouseover="style.color='red'" onmouseout="style.color='blue'">
        Test Mouse Over
    </h1>
</body>

</html>