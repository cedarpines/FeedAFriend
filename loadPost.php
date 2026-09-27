<?php
include 'start.php';


if(!isset($_GET["filterPost"])){
$result = $conn->query("SELECT * FROM FARMPOST ORDER BY currentPledge/targetPledge DESC");
}else{
    
    $result = $conn->query("SELECT * FROM FARMPOST WHERE UID = '$_GET[filterPost]' ORDER BY
    currentPledge/targetPledge DESC");
}
if(!isset($_GET["page"])){
    $_GET["page"]=1;
}
$offset = ($_GET["page"] - 1 )*5;
for($i = 0; $i<$offset; $i++){
    $row = $result->fetch_assoc();
}

if(isset($_SESSION["typeUser"]) && $_SESSION["typeUser"]== "farmer"){
echo '<a href="postForm.php"><button class="btnMini">New</button></a>';
}

for($x = 0; $x<5; $x++){
    if($row = $result->fetch_assoc()){
    $result2 = $conn->query("SELECT * FROM USER WHERE ID = '$row[UID]'");
    $row2 = $result2->fetch_assoc();
    echo '

        <div class="forum-post">
            <div class="row1-1">
                <a href="farming.php?filter='.$row["UID"].'">
                <h3>'.$row2["username"].'</h3></a>
            </div>
            <div class="row1-2">
                <a href="farming.php?filter='.$row["UID"].'">
                <img src="profilePicture/' . $row2["ID"] . '.' . $row2["imageExt"].'" alt="">
                </a>
            </div>

            
            <div class="row2">
                <h3>'.$row["title"].'</h3>
            </div>
            <div class="row3-1">
                <div class="forum-image">
                    <img src="images/'.$row["image"].".".$row["imageExt"].'"
                        alt="">  
                </div>
            </div>
            <div class="row3-2">
                <p>'.$row["text"].'</p>
            </div>
            <div class="row3">
                '.$row["currentPledge"] . ' out of '.$row["targetPledge"].'
            </div>
            <a href="pledge.php?post='.$row["PID"].'"><button class="btnMini">Pledge</button></a>';
            if(isset($_SESSION["ID"])){
                if($row["UID"] == $_SESSION["ID"]){
                echo '<a href="deletePost.php?post='.$row["PID"].'"><button class="btnMini">Delete</button></a>';
            }
            }
        echo '</div>';
    }
    echo '</div>';

}
if(!($_GET["page"]==1)){
    echo '<a href="farming.php?page='.($_GET["page"]-1).'"><button>Previous</button></a>';
}
if($row = $result->fetch_assoc()){
    echo '<a href="farming.php?page='.($_GET["page"]+1).'"><button>Next</button></a>';
}

?>