<!DOCTYPE html>
<!-- 
    INFT-1206-01 - Week 6 Demo Contact Us
    Shubham Mohanty
    June 6th, 2023
-->

<html lang="en">

    <?php

    $title = "Contact Us";

    ?>

    <?php include("head.php"); ?>

<body>

    <?php include("header.php"); ?>

    <section>

        <style>
            label {
                width: 600px;
                padding-bottom: 20px;
            }
        </style>

        <form action="contact.php" method="get">

            <label>
                Reason for Contacting Us: <br>
                <select name="reason">
                    <option value="default" selected>Please select one:</option>
                    <option value="hrs">Office Hours</option>
                    <option>Billing</option>
                    <option value="techSup">Technical Support</option>
                    <option value="delivery">Delivery Tracking</option>
                    <option>Other</option>
                </select>
            </label>

            <label>
                Country of Origin: <br>
                <input type="text" name="country" list="countries">
                <datalist id="countries">
                    <option value="CA">Canada</option>
                    <option value="USA">United States of America</option>
                    <option value="MX">Mexico</option>
                    <option value="IN">India</option>
                    <option value="AF">Afghanistan</option>
                </datalist>
            </label>

            <label>
                On a scale of 1 to 5, how proficient are you at using a computer? <br>
                <input type="radio" name="proficiency" id="prof1" value="1">One <br>
                <input type="radio" name="proficiency" id="prof2" value="2">Two <br>
                <input type="radio" name="proficiency" id="prof3" value="3">Three <br>
                <input type="radio" name="proficiency" id="prof4" value="4">Four <br>
                <input type="radio" name="proficiency" id="prof5" value="5">Five <br>
                
            </label>

            <label>
                On a scale of 1 to 5, how much do you like your professor? <br>
                <input type="radio" name="profLike" id="profl1" value="1">One <br>
                <input type="radio" name="profLike" id="profl2" value="2">Two <br>
                <input type="radio" name="profLike" id="profl3" value="3">Three <br>
                <input type="radio" name="profLike" id="profl4" value="4">Four <br>
                <input type="radio" name="profLike" id="profl5" value="5">Five <br>
                
            </label>

            <label>
                Percent Complete: <br>
                <input type="number" name="percComplete" min="0" max="100" step="1" value="0">
            </label>

            <label>
                Date of Birth: <br>
                <input type="date" name="dob">
            </label>

            <label>
                Start Time: <br>
                <input type="time" name="startTime">
            </label>

            <label>
                Appointment: <br>
                <input type="datetime-local" name="appoint">
            </label>

            <label>
                Message: <br>
                <!-- Make sure to not have any spaces b/w the textarea start and end tag, or-else the placeholder won't work... as the textarea now has content i.e. the content is the blank spaces/new lines/characters -->
                <textarea name="message" cols="40" rows="6" placeholder="Enter Message Here" maxlength="500"></textarea>
            </label>

            <input type="hidden" name="keyToken" value="rlkasjdr">

            <br><br>

            <input type="submit" value="Submit">
            <input type="reset" value="Cancel">

        </form>

    </section>

    <?php include("footer.php"); ?>

</body>

</html>