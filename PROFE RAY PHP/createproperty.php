<?php
// Include header file
include "includes/headers.php";
// Include database connection file
require 'includes/connectdb.php';

// Connect to the database
$db = conectarDB();

// Check if the database connection is successful
if ($db) {
    echo "Connected";
} else {
    echo "Not connected";
}

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign form values to variables
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $description = $_POST['description'];
    $rooms = $_POST['rooms'];
    $wc = $_POST['wc'];
    $garage = $_POST['garage'];
    $timestamp = $_POST['timestamp'];
    $id_sellers = $_POST['id_sellers'];

    // Debugging step: Check id_sellers value
    var_dump($id_sellers);

    // Validate that id_sellers is not empty
    if (empty($id_sellers)) {
        die("Error: No seller ID selected.");
    }

    // Handle image upload
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    move_uploaded_file($imageTmpName, "images/" . $imageName);

    // Insert property data into the database
    $query = "INSERT INTO properties (title, price, image, description, rooms, wc, garage, timestamp, id_seller) 
              VALUES ('$title', '$price', '$imageName', '$description', '$rooms', '$wc', '$garage', '$timestamp', '$id_sellers')";
    $response = mysqli_query($db, $query);

    // Check if the insert was successful
    if ($response) {
        echo "Property was created successfully.";
    } else {
        echo "Property was not created: " . mysqli_error($db);
    }
}

// Fetch sellers from the database for the dropdown
$sellersQuery = "SELECT id, name FROM sellers";
$sellersResult = mysqli_query($db, $sellersQuery);
?>

<section>
    <h2>Properties form</h2>
    <div>
        <form action="createproperty.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Fill all form fields to create a new property</legend>
                <div>
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Title of property" required>
                </div>
                <div>
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" placeholder="Price" required>
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image">
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea id="description" name="description" placeholder="Property description" required></textarea>
                </div>
                <div>
                    <label for="rooms">Rooms</label>
                    <input type="number" id="rooms" name="rooms" placeholder="Quantity of rooms" required>
                </div>
                <div>
                    <label for="wc">Bathrooms</label>
                    <input type="number" name="wc" id="wc" placeholder="Number of bathrooms" required>
                </div>
                <div>
                    <label for="garage">Garages</label>
                    <input type="number" name="garage" id="garage" placeholder="Number of garages" required>
                </div>
                <div>
                    <label for="timestamp">Timestamp</label>
                    <input type="date" name="timestamp" id="timestamp" required>
                </div>
                <div>
                    <label for="id_sellers">Seller</label>
                    <select name="id_sellers" id="id_sellers" required>
                        <?php while ($seller = mysqli_fetch_assoc($sellersResult)) : ?>
                            <option value="<?php echo $seller['id']; ?>"><?php echo $seller['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div>
                    <button type="submit">Create a new property</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

<?php
// Include footer file
include "includes/footer.php";
?>
