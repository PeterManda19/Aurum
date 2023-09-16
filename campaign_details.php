<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
    <title>forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <link rel="stylesheet" href="css/progressbar.css">
    <script src="js/progressbar.js"></script>
    <style>
        /* Additional styles for proper separation */
        .campaign-container {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }

        .progress-container {
            text-align: center;
        }
        #btnreply {
      background-color: green;
    }
    #butsave{
      background-color: green;
    }
    </style>
</head>
<body>
    <?php
    require_once 'includes/conn.inc.php';
    include_once 'includes/header.php';

    if (isset($_GET['id'])) {
        $campaignId = $_GET['id'];

        // Fetch campaign details using the campaignId
        $sql = "SELECT * FROM donees WHERE id = $campaignId";
        $result = mysqli_query($conn, $sql);

        // ... (previous PHP code)

        if ($result && mysqli_num_rows($result) > 0) {
            echo '<div class="campaign-container">';
            $campaignData = mysqli_fetch_assoc($result);
            echo '<h1 style="font-size: 28px; margin-bottom: 10px;">' . $campaignData['tittle'] . '</h1>';
            echo '<p style="margin-bottom: 5px; font-size: 18px;"><strong>Category:</strong> ' . $campaignData['category'] . '</p>';
            echo '<p style="margin-bottom: 5px; font-size: 18px;"><strong>Course:</strong> ' . $campaignData['course'] . '</p>';
            echo '<p style="margin-bottom: 5px; font-size: 18px;"><strong>Goal:</strong> $' . $campaignData['goal'] . '</p>';
            echo '<img src="uploads/' . $campaignData['image'] . '" alt="Campaign Image" style="max-width: 300px; max-height: 300px; border-radius: 5px; margin-top: 10px;">';
            echo '<p style="margin-top: 20px; font-size: 20px;">' . $campaignData['description'] . '</p>';
            echo '</div>';
        } else {
            echo '<p>Campaign not found.</p>';
        }

        mysqli_close($conn);
    } else {
        echo '<p>No campaign ID provided.</p>';
    }
    ?>

    <!-- Progress bar -->
    <div class="progress-container">
        <div class="donation--container" style="margin-top: 20px;">
            <h1 id="donation--user" class="donation--user">Your Progress</h1>
            <main role="main">
    <!-- progress bar -->
      <span class="donation--title">Reached:</span>
      <span id="donation--goal" class="donation--goal"></span>
      <div class="donation--bar">
        <div class="donation--rounded">
          <div id="donation--progress" class="donation--progress" style="width: 0;"></div>
        </div>
        <div id="donation--number" class="donation--number" style="left: 0;"></div>
        <span id="donation--status" class="donation--status"></span>
      </div>
      <form class="form--container">
        <input id="donation--amount" class="input" type="number" min="1" placeholder="R enter amount">
        <input id="donate" class="button" type="submit" value="Donate">
        
      </form>
  
    </div>
  </main>
        </div>
    </div>
    <!--body-->
<!-- Modal -->
<div id="ReplyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reply Question</h4>
      </div>
      <div class="modal-body">
        <form name="frm1" method="post">
            <input type="hidden" id="commentid" name="Rcommentid">
          <div class="form-group">
            <label for="usr">Write your name:</label>
            <input type="text" class="form-control" name="Rname" required>
          </div>
            <div class="form-group">
              <label for="comment">Write your reply:</label>
              <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
            </div>
           <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
      </form>
      </div>
    </div>

  </div>
</div>

<div class="container">

<div class="panel panel-default" style="margin-top:50px">
  <div class="panel-body">
    <h3>Comments</h3>
    <hr>
    <form name="frm" method="post">
        <input type="hidden" id="commentid" name="Pcommentid" value="0">
  <div class="form-group">
    <label for="usr">Write your name:</label>
    <input type="text" class="form-control" name="name" required>
  </div>
    <div class="form-group">
      <label for="comment">Write your comment</label>
      <textarea class="form-control" rows="5" name="msg" required></textarea>
    </div>
   <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
  </form>
  </div>
</div>
  

<div class="panel panel-default">
  <div class="panel-body">
    <h4>Recent comments</h4>           
  <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
    <tbody id="record">
    
    </tbody>
  </table>
  </div>
</div>

</div>



</body>
</html>
