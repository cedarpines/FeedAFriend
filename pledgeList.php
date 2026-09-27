<?php
include 'start.php';
include 'header.php';

if(!isset($_SESSION["ID"])){
header("location: loginForm.php");
}else{
    $result = $conn->query("SELECT * FROM PLEDGELIST P , FARMPOST F WHERE P.UID = '$_SESSION[ID]'
    AND P.PID = F.PID ORDER BY F.currentPledge/F.targetPledge DESC");
}
if(!isset($_GET["page"])){
    $_GET["page"]=1;
}
$offset = ($_GET["page"] - 1 )*5;
for($i = 0; $i<$offset; $i++){
    $row = $result->fetch_assoc();
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
                Post Title '.$row["title"].'
            </div>
            <div class="row3-1">
                <div class="forum-image">
                    <img src="images/'.$row["image"].".".$row["imageExt"].'"
                        alt="">  
                </div>
            </div>
            <div class="row3-2">
                DESCRIPTION
                <p>'.$row["text"].'</p>
            </div>
            <div class="row3">
                Progress bar
                '.$row["currentPledge"] . ' out of '.$row["targetPledge"].'
            </div>
            <a href="unpledge.php?post='.$row["PID"].'"><button>Unpledge</button></a>';
            if($row["UID"] = $_SESSION["ID"]){
                echo '<a href="deletePost.php?post='.$row["PID"].'"><button>Delete</button></a>';
            }
        echo '</div>
        </div>';
    }
    echo '</div>';

}
if(!($_GET["page"]==1)){
    echo '<a href="pledgeList.php?page='.($_GET["page"]-1).'"><button>Previous</button></a>';
}
if($row = $result->fetch_assoc()){
    echo '<a href="pledgeList.php?page='.($_GET["page"]+1).'"><button>Next</button></a>';
}

?> 