<?php
$USER_ID = '';
$SCHOOL_ID = '';
$PASSWORD = '';
$CPASSWORD = '';
$USERNAME = '';
$exist = '';
$exist1 = '';
$a = '';

if (isset($_POST['submit'])) {
    if (isset($_POST['USER_ID'])) {
        $USER_ID = $_POST['USER_ID'];
        $SCHOOL_ID = $_POST['USER_ID'];
    }

    if (isset($_POST['PASSWORD'])) {
        $PASSWORD = $_POST['PASSWORD'];
    }

    if (isset($_POST['CPASSWORD'])) {
        $CPASSWORD = $_POST['CPASSWORD'];
    }

    if (isset($_POST['USERNAME'])) {
        $USERNAME = $_POST['USERNAME'];
    }

    $query = mysqli_query($connection, "SELECT * FROM LISTING WHERE `SCHOOL_ID`='$SCHOOL_ID'");
    $count = mysqli_num_rows($query);

    if ($count > 0) {
        $query = mysqli_query($connection, "SELECT * FROM LISTING WHERE `SCHOOL_ID`='$SCHOOL_ID' AND `STATUS`=''");
        $result = mysqli_num_rows($query);
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($query)) {
                $FIRSTNAME = $row['FIRSTNAME'];
                $LASTNAME = $row['LASTNAME'];
                $MI = $row['MI'];
                $SROLE = $row['SROLE'];
            }

            $query = mysqli_query($connection, "SELECT * FROM USERS WHERE USERNAME='$USERNAME'");
            $count1 = mysqli_num_rows($query);

            if ($count1 > 0) {
                $exist1 = 'USERNAME ALREADY TAKEN.';
                echo "<script>alert('$exist1');</script>";
            } else {
                if ($CPASSWORD != $PASSWORD) {
                    $a = "Passwords don't match";
                    echo "<script>alert('$a');</script>";
                } else {
                    $a = '';
                    $sql = "INSERT INTO `USERS`(`USERNAME`, `PASSWORD`,`USER_ID`,`FIRSTNAME`,`LASTNAME`,`MI`,`SROLE`) VALUES ('$USERNAME','$PASSWORD','$SCHOOL_ID','$FIRSTNAME','$LASTNAME','$MI','$SROLE')";
                    $result = mysqli_query($connection, $sql);

                    if ($result) {
                        $exist = 'Success...';
                        $welcomeMessage = " $FIRSTNAME $LASTNAME!";
?>

<script>
    let modal = document.createElement('div');
    modal.innerHTML = `
        <div class="confetti1">
                        
            <div class='modal'>
                <div class='modal-content'>
                    <span class='close' onclick='closeModal()'>×</span>
                    <span class="emoji">👏</span>
                    <h1>Welcome!</h1>
                    <h1><?php echo $welcomeMessage; ?><h1><br><p class="text-sample"> Registration was successful.</p></br>
                    <p class="text-sample">You finished giving feedback to all your peers. We think that’s pretty awesome! Thanks for taking the time!</p>
                    <a href="../views/login_form.php" class="modal-btn">Great, now take me to Log in</a>
                </div>
            </div>
            
        </div>
        
    `;
    modal.classList.add('modal-container');
    document.body.appendChild(modal);

    function closeModal() {
        document.body.removeChild(modal);
        document.body.classList.remove('confetti');
    }

    // Create confetti pieces
    setTimeout(() => {
        for (i = 0; i < 200; i++) {
            // Random rotation
            var randomRotation = Math.floor(Math.random() * 360);
            // Random width & height between 0 and viewport
            var randomWidth = Math.floor(Math.random() * Math.max(document.documentElement.clientWidth, window.innerWidth || 0));
            var randomHeight =  Math.floor(Math.random() * Math.max(document.documentElement.clientHeight, window.innerHeight || 0));
          
            // Random animation-delay
            var randomAnimationDelay = Math.floor(Math.random() * 10);
          
            // Random colors
            var colors = ['#0CD977', '#FF1C1C', '#FF93DE', '#5767ED', '#FFC61C', '#8497B0']
            var randomColor = colors[Math.floor(Math.random() * colors.length)];
          
            // Create confetti piece
            var confetti = document.createElement('div');
            confetti.className = 'confetti';
            confetti.style.top=randomHeight + 'px';
            confetti.style.left=randomWidth + 'px';
            confetti.style.backgroundColor=randomColor;
            confetti.style.transform='skew(15deg) rotate(' + randomRotation + 'deg)';
            confetti.style.animationDelay=randomAnimationDelay + 's';
            document.getElementById("confetti-wrapper").appendChild(confetti);
        }
    }, 1000);
</script>

<?php
                    }
                }
            }
        } else {
            $exist = 'ID ALREADY TAKEN.';
            echo "<script>alert('$exist');</script>";
        }
    } else {
        $exist = 'ID Number not Found!';
        echo "<script>alert('$exist');</script>";
    }

    if ($CPASSWORD != $PASSWORD) {
        $a = "Passwords don't match";
        echo "<script>alert('$a');</script>";
    } else {
        $a = '';
    }
}
?>
