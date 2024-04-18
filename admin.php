<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solo Leveling Web</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="app.js"></script>
    <?php 
    require "config.php";
    session_start();
    $current_user = $_SESSION["username"];
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $current_user);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    $stmt2 = $conn->prepare("SELECT * FROM tasks WHERE id = ?");
    $id = 1;
    $stmt2->bind_param("s", $id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $task = $result2->fetch_assoc();
    ?>
</head>
<body style="background-image: url(img/home-background.png);">
    <div class="navbar">
        <div class="links">
        <button type="button" id="status-btn" class="navbtn-selected" onclick="status()">Status</button>
        <button type="button" id="tasks-btn" class="navbtn" onclick="tasks()">Daily Tasks</button>
        <button type="button" id="inventory-btn" class="navbtn" onclick="inventory()">Inventory</button>
        </div>
        <span class="navuser"><img src="img/user.png" height="30px" width="30px" alt="User"><?php echo $current_user; ?><a href="logout.php"><button style="margin-left: 7px;">Logout</button></a></span>
    </div>
    <section class="content" id="Status">
        <div class="title">
            STATUS
        </div>
        <div style="display: flex;">
        <div class="level">
            <span><?php echo $user['level']; ?></span><div id="lvl-text">LEVEL</div>
        </div>
        <div class="title-job">
            <div>JOB  <b><?php echo $user['job']; ?></b></div>
            <div>TITLE  <b><?php echo $user['title']; ?></b></div>
        </div>
        </div>
        <div class="lateral-bar">
            <div class="hp-icon">
                <span style="font-size: 40px;"><i class="fa-solid fa-plus"></i></span><div style="margin-left:7px; font-weight: 800;">HP</div>
            </div>
            <div class="chart-bar">
                <div id="bar-percentage"><div style="width: <?php echo $user['hp']; ?>%;">.</div></div>
                <div style="margin-left:78px;"><?php echo $user['hp']; ?>/100</div>
            </div>
            <div class="energy-icon">
                <span style="margin-left: 15px; font-size: 40px;"><i class="fa-solid fa-bolt"></i></span><div style="font-weight: 800;">ENERGY</div>
            </div>
            <div class="chart-bar">
                <div id="bar-percentage"><div style="width: <?php echo $user['energy']; ?>%;">.</div></div>
                <div style="margin-left:78px;"><?php echo $user['energy']; ?>/100</div>
            </div>
            <div class="fatigue-icon">
                <div class="fatigue-circle-icon">.</div><div style="font-weight: 800;">FATIGUE</div>
            </div>
        </div>
        <div class="stats-table">
            <div class="stat-line">
            <span class="stat">
                <i class="fa-solid fa-dumbbell"></i> STR : <b><?php echo $user['str']; ?></b>
            </span>
            <span class="stat">
                <i class="fa-solid fa-heart"></i> VIT : <b><?php echo $user['vit']; ?></b>
            </span></div>
            <div class="stat-line">
            <span class="stat">
                <i class="fa-solid fa-person-running"></i> AGI : <b><?php echo $user['agi']; ?></b>
            </span>
            <span class="stat">
                <i class="fa-solid fa-brain"></i> INT : <b><?php echo $user['int']; ?></b>
            </span></div>
            <div class="stat-line">
            <span class="stat">
                <i class="fa-solid fa-person-rays"></i> PER : <b><?php echo $user['per']; ?></b>
            </span>
                <div style="align-self: flex-end; font-size: 50px; display: flex;"><p style="font-size: 11px; max-width:70px; text-align: right; margin-right: 5px;">AVAILABLE ABILITY POINTS</p><?php echo $user['aap']; ?></div>
            </div>
        </div>
        </div>
    </section>
    <section class="content" id="Tasks">
        <div class="title">
            GOAL
        </div>
        <div class="stats-table">
            <div class="stat-line">
            <span class="stat">
            <?php echo $task['task']; ?>
            </span>
            <span class="stat">
            [<?php echo $user['taskp1']; ?>/<?php echo $task['target'].$task['unit']; ?>] <i class="fa-regular fa-square-check"></i>
            </span></div>
            <div class="stat-line">
            <span class="stat">
            <?php $id = 2;
            $stmt2->bind_param("s", $id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $task = $result2->fetch_assoc();
            echo $task['task'];?>
            </span>
            <span class="stat">
            [<?php echo $user['taskp2']; ?>/<?php echo $task['target'].$task['unit']; ?>] <i class="fa-regular fa-square-check"></i>
            </span></div>
            <div class="stat-line">
            <span class="stat">
            <?php $id = 3;
            $stmt2->bind_param("s", $id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $task = $result2->fetch_assoc();
             echo $task['task'];?>
            </span>
            <span class="stat">
            [<?php echo $user['taskp3']; ?>/<?php echo $task['target'].$task['unit']; ?>] <i class="fa-regular fa-square-check"></i>
            </span>
            </div>
            <div class="stat-line">
            <span class="stat">
            <?php $id = 4;
            $stmt2->bind_param("s", $id);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $task = $result2->fetch_assoc();
            echo $task['task'];?>
            </span>
             <span class="stat">
            [<?php echo $user['taskp4']; ?>/<?php echo $task['target'].$task['unit']; ?>] <i class="fa-regular fa-square-check"></i>
             </span>
              </div>
              <div class="stat-line">
               <div style="font-weight: 200; letter-spacing: 2px; margin-top: 30px;">WARNING : Failure to complete the daily tasks will result in an appropriate <span style="color: red; text-shadow: 0px 0px 25px red;">penalty</span>.</div> 
              </div>
              <div class="stat-line" style="align-self: center; margin-top: 19px;">
                <div style="border: 1px solid rgba(182, 225, 248, 0.9); padding-inline: 10px; padding-block: 5px;"><i class="fa-regular fa-square-check"></i></div>
               </div>
        </div>
        </div>
    </section>
    <section class="content" id="Inventory">
        <div class="title">
            INVENTORY
        </div>
        <div class="stats-table">
            <div class="stat-line">
            <span class="stat">
                <img src="" alt="">
            </span>
            <span class="stat">
                <img src="" alt="">
            </span>
            <span class="stat">
                <img src="" alt="">
            </span>
            <span class="stat">
                <img src="" alt="">
            </span>
        </div>
        <div class="stat-line">
            <span class="stat">
                <img src="" alt="">
            </span>
            <span class="stat">
                <img src="" alt="">
            </span>
            <span class="stat">
                <img src="" alt="">
            </span>
            <span class="stat">
                <img src="" alt="">
            </span>
        </div>
        <div class="stat-line">
            <span class="stat">
                <img src="" alt="">
            </span>
            <span class="stat">
                <img src="" alt="">
            </span>
            <span class="stat">
                <img src="" alt="">
            </span>
            <span class="stat">
                <img src="" alt="">
            </span>
        </div>
            
        </div>
        </div>
    </section>
</body>
</html>