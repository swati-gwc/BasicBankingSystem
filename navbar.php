<!DOCTYPE html>
<html>
<head>
<style>
body {margin:0;}
.nav{
    margin-bottom:12px;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.title) {
  background-color: #ed8a18;
}
.title {
  background-color: #dbb425;
}

</style>
</head>
<body>
   <nav class="Nav">
    <ul>
    <li>
    <a class="title" href="#">Bank of Sparks</a>
    </li>
    <li>
    <a href="index.php">Home</a>
    </li>
    <li>
    <a href="ViewCustomers.php">Customers Details</a>
    </li>
    <li>
    <a href="Transfer.php">Fund Transfer</a>
    </li>
    <li>
    <a href="RecordsPage.php">Transaction History</a>
    </li>
    </ul>
   </nav>
<body>
</html>

