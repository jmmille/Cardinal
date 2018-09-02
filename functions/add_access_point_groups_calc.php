<?php

/* Cardinal - An Open Source Cisco Wireless Access Point Controller

MIT License

Copyright © 2017 falcon78921

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

*/

// Cardinal Login Session

session_start();

// If user is not logged into Cardinal, then redirect them to the login page

if (!isset($_SESSION['username'])) {
header('Location: index.php');
}

// Cardinal Configuration Information

require_once(__DIR__ . '/../includes/cardinalconfig.php');

// MySQL connection information

require_once(__DIR__ . '/../includes/cardinalconfig.php');


// Gather data from form and submit information to MySQL database

if ($_POST) {
   $phpMySQLUpdate = "INSERT INTO access_point_groups (ap_group_name) VALUES ('".$_POST["ap_group_name"]."')";
   $phpMySQLQuery = mysqli_query($conn,$phpMySQLUpdate);
   $phpMySQLValue = mysqli_fetch_object($phpMySQLQuery);
   // Redirect to this page.
   header('Location: ../add_access_point_groups.php?Success=1');
   exit();
}

$conn->close();

?>

