<!DOCTYPE html>
<html>
<head>
    <title>Profile Page</title>
    <style>

        .containers {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            /* margin-top: 60px; */

            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }


        .profile {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .profile img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }

        .profile .info {
            font-size: 18px;
        }

        .info-item {
            margin-bottom: 10px;
        }

        .info-item label {
            font-weight: bold;
        }

        .info-item span {
            margin-left: 10px;
        }

        .logout-btn {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .logout-btn button {
            padding: 10px 20px;
            background-color: #f44336;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        include_once'includes/header.php';
    ?>
    <div class="containers">
        <h1>Delete account permanently</h1>


        <div class="profile">
           <b>Are you sure you want to delete account?</b>
                 
        </div>
        <br>

        <form action="profile.php" method="post">
            <div class="logout-btn">
                <button name="logout">No</button>  
            </div> 
        </form>
        <br>
        <form action="includes/delete.in.php" method="post">
            <div class="logout-btn">
                <button name="delete">Yes, Delete Account</button>  
            </div> 
        </form>
    </div>

</body>
</html>
