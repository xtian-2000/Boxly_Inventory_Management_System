<?php
    function createSideNav() {
        return '
        
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="home.php">Home</a>
            <a href="product_list.php">Product List</a>
            <a href="transaction_list.php">Transaction List</a>
            <a href="#">Logout</a>
        </div>


        <div class="container">
            <div class="fixed-top text-left">
                <span style="color:white;font-size:30px;padding: 10px 10px;cursor:pointer;" onclick="openNav()">&#9776;
                    Menu</span>
            </div>
        </div>

        <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "15%";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
        </script>
        ';
    }

?>