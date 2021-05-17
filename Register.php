
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Create user!</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
    <style>
       *{
            
            box-sizing:border-box ;
        }
        .row{
            background: white;
            border-radius: 30px;
            box-shadow: 12px 12px 12px;
        }
        .login img{
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        .login h1{
            font-size: 3rem;
            font-weight: 400;
            font-family: 'Anton', sans-serif;
            font-family: 'Gabriela', serif;
        }
        .inp{
            height:50px;
            width: 70%;
            border: none;
            outline: none;
            border-radius:60px;
            -webkit-box-shadow: -1px 1px 30px -11px rgb(248, 248, 248);
            -moz-box-shadow: -1px 1px 30px -11px rgb(255, 255, 255);
            box-shadow: -1px 1px 30px -11px rgb(192, 109, 157);
        }
        .btn1{
            height:50px;
            width:50%;
            border:none;
            outline: none;
            border-radius: 60px;
            font-weight: 600;
            background: rgb(223,56,56);
            color: white;
        }
        .btn1:hover{
            background: rgb(143, 61, 61);
            transition:0.5s;
        }
        

        #sideNav{
            width: 250px;
            height: 100vh;
            position: fixed;
            right: -250px;
            top:0;
            background: #863544;
            z-index: 2;
            transition: .5s;
        }
        nav ul li{
            list-style: none;
            margin: 50px 20px;
        }
        nav ul li a{
            text-decoration: none;
            color: #fff;
        }
        #menuBtn{
            width: 50px;
            position: fixed;
            right: 65px;
            top: 35px;
            z-index: 2;
            cursor: pointer;
        }
 </style>
  </head>
  <body >



  


        <section class="login py-5 bg-light">

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $gender = $_POST['gender'];
                    $balance=$_POST['balance'];
                
                // Connecting to the Database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "ritika";

                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);
                // Die if connection was not successful
                if (!$conn){
                    die("Sorry we failed to connect: ". mysqli_connect_error());
                }
                else{ 
                    // Submit these to a database
                    // Sql query to be executed 
                    $sql = "INSERT INTO `users` (`Name`, `Email Id`, `Gender`, `Balance`) VALUES ('$name', '$email', '$gender', $balance)";
                    $result = mysqli_query($conn, $sql);
            
                    if($result){
                    echo "<div class='alert alert-success alert-dismissible fade show hide' role='alert'>
                    <strong>Success!</strong> Your entry has been submitted successfully!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='errorClose' aria-hidden='true'>×</span>
                    </button>
                    </div>";
                    }
                    else{
                        // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                        echo "<div class='alert alert-danger alert-dismissible fade show hide' role='alert'>
                    <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='errorClose' aria-hidden='true'>×</span>
                    </button>
                    </div>";
                    }

                }

            }

                
        ?>

        <img src="images/menu.png" id="menuBtn">
            <div class="container pt-3">
                <div class="row g-0 pt-5">
                    <div class=" ps-5 pt-5 mt-5 col-lg-5 ">
                        <img src="images/customers.png" class="img-fluid">
                    </div>
                    <div class="col-lg-7 text-center py5">
                        <h1>Create New User</h1>
                        <form action="/cwh/Register.php" method="post">
                            <div class="form-row py-3 pt-5">
                                <div class="offset-1 col-lg-10">
                                    <input type="text" name="name" class="inp px-3" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-row pt-4">
                                <div class="offset-1 col-lg-10">
                                    <input name="email" type="email" class="inp px-3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-row pt-5 ">
                                <div  class="  offset-1 col-lg-10">
                                    <select  name="gender" class="inp px-3 form-selec " aria-label="Default select example">
                                        <option selected>Select Gender</option>
                                        <option value="F">Female</option>
                                        <option value="M">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row pt-5 ">
                                <div class="offset-1 col-lg-10">
                                    <input id="balance" name="balance" type="text" class="inp px-3" placeholder="Balance">
                                </div>
                            </div>
                            <div class="form-row pt-5 pb-5">
                                <div class="offset-1 col-lg-10">
                                    <button type="submit" class="btn1">SUBMIT</BUTTON>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                        


        </section>
        <nav id="sideNav">
            <ul>
                <li><a href="main.html">HOME</a></li>
                <li><a href="users.php">OUR CUSTOMERS</a></li>
                <li><a href="history.php">TRANSACTION HISTORY</a></li>
                <li><a href="users.php">TRANSFER MONEY</a></li>
                <li><a href="Register.php">NEW USER</a></li>
            </ul>
        </nav>
        <div id="hojaplz">
        <img src="images/menu.png" id="menuBtn">
</div>

        <script>
           let menuBtn = document.querySelector('#hojaplz');
            let sideNav = document.querySelector('#sideNav')
            let errorClose = document.querySelector('.errorClose')
            let hide= document.querySelector('.hide')
            let balance= document.querySelector('balance')
        
            let condition = true;

           menuBtn.addEventListener('click',function(){
               if(condition){
                   sideNav.style.right = '0px';
                   condition = false;
               }else{
                sideNav.style.right = '-250px';
                condition = true;
               }

           })

           errorClose.addEventListener('click',function(){
             hide.style.display='none'
           })
           
        </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    
  </body>
</html>