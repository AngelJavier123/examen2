<?php
// Include header file
include "includes/headers.php";
// Include database connection file
require 'includes/connectdb.php';

// Connect to the database
$db = conectarDB();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign form data to variables if they exist, otherwise set default values
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

    // SQL query to insert a new seller
    $query = "INSERT INTO sellers (name, email, phone) VALUES ('$name', '$email', '$phone');";
    $response = mysqli_query($db, $query);

    // Check if the query was successful
    if ($response) {
        echo "Seller created";
    } else {
        echo "Seller not created";
    }

    // Redirect to avoid resubmission on refresh
    header("Location: createsellers.php");
    exit();
}

// SQL query to get IDs and names of all sellers
$sellersQuery = "SELECT id, name FROM sellers";
$sellersResult = mysqli_query($db, $sellersQuery);
?>

<!-- Form Section -->
<section>
    <h2>Create a New Seller</h2>
    <div>
        <form action="createsellers.php" method="post">
            <fieldset>
                <legend>Fill all fields to create a new seller</legend>

                <!-- Input for seller's name -->
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name:" required>
                </div>
                
                <!-- Input for seller's email -->
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="your@email.com" required>
                </div>
                
                <!-- Input for seller's phone -->
                <div>
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" placeholder="666 6 6666 66" required>
                </div><br>

                <!-- Display existing sellers -->
                <div>
                <strong>Sellers created:</strong>
                <ul>
                    <?php while ($seller = mysqli_fetch_assoc($sellersResult)) : ?>
                        <li>ID: <?php echo $seller['id']; ?> - Name: <?php echo $seller['name']; ?></li>
                    <?php endwhile; ?>
                </ul>
                </div>

                <!-- Submit button to create seller -->
                <div>
                    <button type="submit">Create a new seller</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
// Include footer file
include "includes/footer.php";
?>
