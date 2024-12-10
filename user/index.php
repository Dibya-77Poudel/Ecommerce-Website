<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home-page</title>
    <?php
    include 'header.php';
    ?>

    <style>
        /* Product card styling */
        .card {
            position: relative;
            width: 18rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Image container with fixed size */
        .image-container {
            width: 100%;
            height: 200px; /* Set a fixed height for uniformity */
            overflow: hidden;
        }

        /* Ensure image fills the container and maintains aspect ratio */
        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cover the container while maintaining aspect ratio */
        }

        .card-body {
            padding: 15px;
            text-align: center;
        }

        .container-fluid {
            display: flex;
            flex-wrap: wrap;
        }

        .col-md-4 {
            padding: 10px;
        }


        <style>
    #productDetails p {
        font-size: 0.85rem; /* Make the font size smaller */
        margin-left: 15px; /* Add a gap from the left */
        color: #555; /* Optional: Change the text color for readability */
        line-height: 1.5; /* Optional: Improve line spacing */
    }



    
</style>

        
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">
        <h1 class="text-danger font-monospace text-center my-3">OUTFITS</h1>

        <!-- Example horizontal line styling -->
        <div class="d-flex justify-content-center mb-4">
            <div style="width: 100px; height: 4px; background-color: red; border-radius: 5px;"></div>
        </div>

        <?php
// Include your database configuration file
include 'Config.php';

// Fetch products from the database
$Record = mysqli_query($con, "SELECT id, PName, PPrice, PDescription, PImage, PCategory, PStock, PColor FROM tblproduct");

// Loop through products
while ($row = mysqli_fetch_array($Record)) {
    $check_page = $row['PCategory'];
    if ($check_page === 'Home') ; {
        // Dynamically generate product card with a popup icon
        echo "
        <div class='col-md-4'>
            <form action='Insertcart.php' method='POST'>
                <div class='card m-auto' style='width: 300px; height: 450px;'> <!-- Fixed size for uniformity -->
    
                    <!-- Image container for uniform sizing -->
                    <div class='image-container' style='position: relative; height: 200px;'>
    
                        <!-- Product Stock Overlay -->
                        <div style='position: absolute; top: 1px; left: 1px; background: rgba(0, 0, 0, 0.6); color: white; padding: 5px 10px; font-size: 1rem; border-radius: 5px;'>
                            Stock: {$row['PStock']}
                        </div>
    
                        <!-- Product Price Overlay -->
                        <div style='position: absolute; top: 1px; right: 1px; background: rgba(255, 0, 0, 0.8); color: white; padding: 5px 10px; font-size: 1rem; border-radius: 5px;'>
                            Rs: {$row['PPrice']}
                        </div>
    
                        <!-- Image with modal trigger -->
                        <img src='../admin/product/{$row['PImage']}' class='card-img-top' style='width: 100%; height: 100%; object-fit: cover; cursor: pointer;' onclick='showImageModal(\"../admin/product/{$row['PImage']}\")'>
                    </div>
    
                    <div class='card-body text-center'>
                        <h5 class='card-title text-danger fs-5 fw-bold'>{$row['PName']}</h5>
    
                        <input type='hidden' name='PName' value='{$row['PName']}'>
                        <input type='hidden' name='PPrice' value='{$row['PPrice']}'>
                        <input type='hidden' name='PStock' value='{$row['PStock']}'>
                        <input type='hidden' name='PColor' value='{$row['PColor']}'>
                        
                        <!-- Hidden popup display -->
                        <div id='productDetails{$row['id']}' style='font-size: 0.85rem; margin: 10px 15px 0; color: #555; line-height: 1.5; max-width: 260px; word-wrap: break-word; white-space: normal;'>
                            <p>{$row['PDescription']}</p>
                        </div>
    
                        <div style='width: 60%; margin: auto; margin-top: 10px; text-align: left;'>
                            <!-- Quantity Input -->
                            <input type='number' name='PQuantity' min='1' max='20' placeholder='Quantity'  
                                style='width: 100%; padding: 10px; font-size: 1rem; box-sizing: border-box; height: 25px; margin-bottom: 10px;' required>
    
                            <!-- Size Select -->
                            <select name='PSize' class='form-select' 
                                style='width: 100%; padding: 8px; font-size: 0.9rem; box-sizing: border-box; height: 34px;' required>
                                <option value='' disabled selected>Select Size</option>
                                <option value='S'>Small</option>
                                <option value='M'>Medium</option>
                                <option value='L'>Large</option>
                            </select>
                        </div>
                        
                        <br>
                        
                        <!-- Add to Cart Button -->
                        <input type='submit' name='addCart' class='btn btn-warning text-white fw-bold' style='width: 80%;' value='Add To Cart'>
                    </div>
                </div>
            </form>
        </div>
    ";
                }
                }
                ?>
                
                <!-- Modal for image popup -->
                <div id='imageModal' style='display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); z-index: 1000; justify-content: center; align-items: center;'>
                    <img id='modalImage' src='' style='max-width: 90%; max-height: 90%; border: 5px solid white;'>
                    <span style='position: absolute; top: 10px; right: 10px; color: white; font-size: 30px; cursor: pointer;' onclick='closeImageModal()'>&times;</span>
                </div>
                
                <script>
                    function showImageModal(imageSrc) {
                        const modal = document.getElementById('imageModal');
                        const modalImage = document.getElementById('modalImage');
                        modalImage.src = imageSrc;
                        modal.style.display = 'flex';
                    }
                
                    function closeImageModal() {
                        const modal = document.getElementById('imageModal');
                        modal.style.display = 'none';
                    }
                </script>

</body>
</html>
