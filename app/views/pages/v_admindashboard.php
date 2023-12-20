<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_admindashboard.css">


<div class="sidebar">
    <a href="#" onclick="showAdminDashboard()">Admin Dashboard</a>
    <a href="#" onclick="showReportedAds()">Reported Ads</a>
    <a href="#" onclick="showViewAccounts()">View Accounts</a>
    <a href="#" onclick="logout()">Logout</a>
</div>

<div class="content">
    <div id="adminDashboard">
        <h2>Admin Dashboard</h2>

</div>
    <!--  -->

    <div id="reportedAds" style="display: none;">
        <h2>Reported Ads</h2>
            <div class="adds">
            <table>
                <thead>
                <tr>
                    <th>Post ID</th>
                    <th>Post</th>
                    <th>Action</th>
                </tr>
                </thead>
     
    <tr>
        <td>1</td>
        <td>
            <img src="../public/img/collectorpage/img2.jpg" alt="Sample Image 1" class="post-image">
            Sample Post 1
        </td>
        <td>
            <button onclick="viewPost(1)">View</button>
            <button onclick="removePost(1)">Remove</button>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td>
            <img src="../public/img/wishlist/product1.png" alt="Sample Image 2" class="post-image">
            Sample Post 2
        </td>
        <td>
            <button onclick="viewPost(2)">View</button>
            <button onclick="removePost(2)">Remove</button>
        </td>
    </tr>
    <!-- Add more rows as needed -->
</tbody>

                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
</div>

    </div>

        <!-- Add content for Reported Ads section as needed -->
    </div>

    <div id="viewAccounts" style="display: none;">
        
      
    <div class="account-container">
    <h2>View Accounts</h2>
        <!-- Display accounts and buttons here -->
        <!-- Inside the "View Accounts" section -->
        <table>
        <thead>
            <tr>
                <th>Account ID</th>
                <th>Account Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $dummyAccounts = [
                ['id' => 1, 'username' => 'John Doe'],
                ['id' => 2, 'username' => 'Jane Smith'],
                ['id' => 3, 'username' => 'Alice Johnson'],
            ];
            // Assuming $accounts is an array containing dummy account information
            foreach ($dummyAccounts as $account) {
                echo '<tr>';
                echo '<td>' . $account['id'] . '</td>';
                echo '<td>' . $account['username'] . '</td>';
                echo '<td>';
                echo '<button onclick="viewAccount(' . $account['id'] . ')">View</button>';
                echo '<button onclick="removeAccount(' . $account['id'] . ')">Remove</button>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
    </div>
</div>

    </div>
</div>
<div>

        </div>
</div>

<!-- JavaScript (you should have this in a separate script file or inline in your HTML) -->
<script>
    function showAdminDashboard() {
        document.getElementById('adminDashboard').style.display = 'block';
        document.getElementById('reportedAds').style.display = 'none';
        document.getElementById('viewAccounts').style.display = 'none';
    }

    function showReportedAds() {
        document.getElementById('adminDashboard').style.display = 'none';
        document.getElementById('reportedAds').style.display = 'block';
        document.getElementById('viewAccounts').style.display = 'none';
    }

    function showViewAccounts() {
        document.getElementById('adminDashboard').style.display = 'none';
        document.getElementById('reportedAds').style.display = 'none';
        document.getElementById('viewAccounts').style.display = 'block';
    }

    // Add similar functions for other actions
</script>
