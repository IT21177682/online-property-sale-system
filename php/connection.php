<?php
    $city = $_POST['city'];
    $street = $_POST['street'];
    $ammount = $_POST['ammount'];
    $negotiable = $_POST['negotiable'];
    $publish_date = $_POST['publish_date'];
    $current_status = $_POST['current_status'];

    $bedrooms = $_POST['bedrooms'];
    $bathrooms = $_POST['bathrooms'];
    $floar_area = $_POST['floar_area'];
    $land_area = $_POST['land_area'];
    $heading = $_POST['heading'];
    $description = $_POST['description'];

    $firniture = $_POST['firniture'];
    $new = $_POST['new'];
    $with_ac = $_POST['with_ac'];
    $hot_water = $_POST['hot_water'];
    $saterlite = $_POST['saterlite'];
    $servent_room = $_POST['servent_room'];
    $garden = $_POST['garden'];
    $swimming_pool = $_POST['swimming_pool'];

    $img = $_POST['img'];

    $name = $_POST['name'];
    $owner = $_POST['owner'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    //Database Connection
    $conn = new mysqli('localhost'.'admin','admin');
    if($conn->connect_error){
        die('Connection Fail: ', $conn->connect_error);
    }else{
        $statement = $conn->prepare("inser into registration(city,street,ammount,negotiable,publish_date,current_status,bedrooms
        ,bathrooms,floar_area,land_area,heading,description,firniture,new,with_ac,hot_water,hot_water,saterlite,servent_room,garden
        ,swimming_pool,img,name,owner,email,phone_number)
        values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute();

        echo"registration successful";
        $statement->close();
    }
?>