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



    <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    #chat-logo {
  height: 43px; /* Adjust the height as needed */
  margin-left: 10px; /* Adds some space on the left */
}

#chat-icon {
  position: fixed;
  bottom: 20px;
  right: 20px;
  width: 60px;
  height: 60px;
  background: #007bff;
  border-radius: 50%;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  z-index: 1000;
}

#chat-label {
  position: absolute;
  left: -143px; /* Adjust for position relative to the chat icon */
  bottom: 17px; /* Aligns vertically with the chat icon */
  background: #fff;
  color: #333;
  font-size: 16px;
  padding: 8px 12px;
  border-radius: 12px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  white-space: nowrap; /* Prevents text wrapping */
}
#chat-label::after {
  content: ''; /* Empty content for the arrow */
  position: absolute;
  top: 50%; /* Vertically centered */
  right: -8px; /* Adjust position to the right */
  transform: translateY(-50%); /* Center align the arrow vertically */
  width: 0;
  height: 0;
  border-left: 8px solid #fff; /* Arrow color */
  border-top: 6px solid transparent; /* Transparent top */
  border-bottom: 6px solid transparent; /* Transparent bottom */
}

#chat-label .fas {
  color: #ffc107; /* Yellow color for the hand icon */
  font-size: 14px; /* Adjust icon size */
}


    #chat-icon img {
      width: 53px;
      height: 53px;
    }

    #chatbot {
  position: fixed;
  bottom: 22px;
  right: 20px;
  width: 350px;
  height: 500px; /* Increased height */
  background: #f9f9f9;
  border-radius: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  font-family: Arial, sans-serif;
  border: 1px solid #ddd;
  display: none;
  flex-direction: column; /* Enables flexbox for vertical layout */
  z-index: 1000;
}

    #chat-header {
      background:rgb(233, 98, 161);
      color: #fff;
      padding: 15px;
      text-align: center;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #chat-header img {
      width: 45px; /* Adjust image size */
      height: 45px; /* Adjust image size */
      margin-right: 2px; /* Adds spacing between the image and the close button */
    }

    
    #chat-headerr img {
      width: 130px; /* Adjust image size */
      height: 47px; /* Adjust image size */
      margin-right: 10px; /* Adds spacing between the image and the close button */
    }

    #chat-header h3 {
    display: flex;
    align-items: center;
    margin: 0;
  }

  #chat-header .fas.fa-hand-paper {
    color: #ffc107; /* Yellow color for the hand icon */
    font-size: 20px; /* Adjust icon size */
    margin-left: 5px; /* Adds spacing between the text and the icon */
  }


    #chat-header .close-btn {
  cursor: pointer;
  color: #fff;
  font-size: 35px; /* Increased font size */
  background: none;
  border: none;
  padding: 8px; /* Added padding for a larger clickable area */
  line-height: 1; /* Ensures proper alignment */
}



    #chat-body {
  flex: 1; /* Takes up available space */
  max-height: calc(100% - 50px); /* Ensures body height adjusts dynamically */
  overflow-y: auto;
  padding: 10px;
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}

    #messages {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .message {
      max-width: 80%;
      padding: 8px 12px;
      border-radius: 8px;
    }

    .user {
      align-self: flex-end;
      background: #007bff;
      color: #fff;
    }

    .bot {
      align-self: flex-start;
      background: #f1f1f1;
      color: #333;
    }

    #chat-footer {
  display: flex;
  padding: 10px 16px;/* Slightly increased padding for the footer */
  border-top: 1px solid #ddd;
}

#chat-input {
  flex: 1;
  padding: 5px; /* Increased padding for a larger input box */
  font-size: 16px; /* Slightly larger font size */
  border: 1px solid #ddd;
  border-radius: 8px; /* Slightly rounded corners */
  height: 37px; /* Increased height for better appearance */
}

#send-btn {
  background:rgb(123, 123, 223);
  color: #fff;
  border: none;
  padding: 1px 16px; /* Larger padding for a bigger button */
  margin-left: 10px;
  border-radius: 6px; /* Rounded corners */
  font-size: 14px; /* Slightly larger font size */
  cursor: pointer;
  height: 44px; /* Matches input box height */
}

#send-btn:hover {
  background: #0056b3;
}


    #company-name {
      font-size: 12px;
      text-align: center;
      color: #666;
      padding: 5px;
    }
  </style>

    
</style>

        
    </style>
</head>

<body>

<script>
    // Store scroll position before refreshing
    window.addEventListener("beforeunload", function () {
        localStorage.setItem("scrollPosition", window.scrollY);
    });

    // Restore scroll position after page loads
    window.addEventListener("load", function () {
        let scrollPosition = localStorage.getItem("scrollPosition");
        if (scrollPosition !== null) {
            window.scrollTo(0, scrollPosition);
            localStorage.removeItem("scrollPosition"); // Remove after restoring to prevent issues
        }
    });
</script>

<div class="container-fluid">
    <div class="row">
        <h1 class="text-danger font-monospace text-center my-3">OUTFITS</h1>

        <!-- Example horizontal line styling -->
        <div class="d-flex justify-content-center mb-4">
            <div style="width: 100px; height: 4px; background-color: red; border-radius: 5px;"></div>
        </div>





        <div id="chat-icon">
<span id="chat-label">
 "Chat with us"<i class="fas fa-hand-paper"></i>
  </span>
  <img src="images/pink.jpg" alt="Chat" />
</div>



<div id="chatbot">
<div id="chat-header">
  <img src="images/logo.png" alt="Chatbot Logo" id="chat-logo" />
   <h6>Questions? Chat with us!<i class="fas fa-hand-paper"></i></h6>
  <button class="close-btn">&times;</button>
 </div>
      <!-- Image added to the header -->
       <div id="chat-headerr">
      <img src="images/top.png" alt="Header Image" />
      
      </div>

  <div id="chat-body">
    <div id="messages"></div>
  </div>
  <div id="chat-footer">
    <input type="text" id="chat-input" placeholder="Compose your message..." />
    <button id="send-btn">Send</button>
  </div>
  <div id="company-name">A B2C Fashonwear Application</div>
</div>




<?php
// Include your database configuration file
include 'Config.php';

// Get sorting option from user selection (default is ascending by name)
$order_by = isset($_GET['order_by']) ? $_GET['order_by'] : 'PName'; // Default to name
$sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC'; // Default to ascending

// Validate input to prevent SQL injection
$allowed_columns = ['PName', 'id']; // Allow sorting only by name or ID (ID for newest/oldest)
$allowed_orders = ['ASC', 'DESC'];

if (!in_array($order_by, $allowed_columns)) {
    $order_by = 'PName';
}

if (!in_array($sort_order, $allowed_orders)) {
    $sort_order = 'ASC';
}

// Fetch products from the database with sorting
$Record = mysqli_query($con, "SELECT id, PName, PPrice, PDescription, PImage, PCategory, PStock, PColor FROM tblproduct ORDER BY $order_by $sort_order");

?>

<!-- Sorting Buttons -->
<div style="margin-bottom: 20px; margin-left: 817px;">
<a href="?order_by=id&sort_order=DESC" class="btn sort-btn custom-light-pink">Newest First</a>
<a href="?order_by=id&sort_order=ASC" class="btn sort-btn custom-light-pink">Oldest First</a>
    <a href="?order_by=PName&sort_order=ASC" class="btn sort-btn custom-light-pink">Sort by Name (A-Z)</a>
    <a href="?order_by=PName&sort_order=DESC" class="btn sort-btn custom-light-pink">Sort by Name (Z-A)</a>
</div>

<?php
// Loop through products
while ($row = mysqli_fetch_array($Record)) {
    $check_page = $row['PCategory'];
    if ($check_page === 'Home'); {
        echo "
<div class='product-card' data-product='{$row['PName']}' data-color='{$row['PColor']}' style='width: 290px; height: 390px; margin-left: 40px; margin-bottom: 20px;'>
    <div class='card m-auto col-md-3' style='width: 100%; height: 100%;'>
        
        <div class='image-container' style='position: relative; height: 290px;'>
         <form action='Insertcart.php' method='POST'>
            <div style='position: absolute; top: 1px; left: 1px; background: rgba(0, 0, 0, 0.6); color: white; padding: 5px 10px; font-size: 0.9rem; border-radius: 5px;'>
                Stock: {$row['PStock']}
            </div>
            <div style='position: absolute; top: 1px; right: 1px; background: rgba(255, 0, 0, 0.8); color: white; padding: 5px 10px; font-size: 0.9rem; border-radius: 5px;'>
                Rs: {$row['PPrice']}
            </div>
            <img src='../admin/product/{$row['PImage']}' class='card-img-top' style='width: 100%; height: 100%; object-fit: cover; cursor: pointer;' onclick='showImageModal(\"../admin/product/{$row['PImage']}\")'>
        </div>
        <div class='card-body text-center'>
            <h5 class='card-title text-danger fs-6 fw-bold' style='font-size: 0.8rem;'>{$row['PName']}</h5>
            <div id='productDetails{$row['id']}' style='font-size: 0.8rem; margin: 3px 10px 0; margin-top: -5px; color: #555; line-height: 1.3; max-width: 220px; word-wrap: break-word; white-space: normal;'>
                <p>{$row['PDescription']}</p>
            </div>
            <div style='width: 70%; margin: auto; margin-top: 1px; text-align: left;'>
                <input type='number' name='PQuantity' min='1' max='20' placeholder='Quantity'  
                    style='width: 100%; padding: 6px; font-size: 0.8rem; box-sizing: border-box; height: 25px; margin-bottom: 2px;' required>
                <select name='PSize' class='form-select' 
                    style='width: 100%; padding: 6px; font-size: 0.8rem; box-sizing: border-box; height: 30px; margin-bottom: 2px;' required>
                    <option value='' disabled selected>Select Size</option>
                    <option value='S'>Small</option>
                    <option value='M'>Medium</option>
                    <option value='L'>Large</option>
                </select>
            </div>
        </div>
        <!-- Add to Cart Button -->
        <input type='hidden' name='PName' value='{$row['PName']}'>
        <input type='hidden' name='PPrice' value='{$row['PPrice']}'>
        <input type='hidden' name='PImage' value='{$row['PImage']}'>
        <input type='hidden' name='PStock' value='{$row['PStock']}'>
        <input type='submit' name='addCart' class='btn btn-warning text-white fw-bold' style='width: 80%; margin: -10px auto 5%;' value='Add To Cart'>
        
    </form>
    </div>
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



                                        // JavaScript to filter products
const searchBox = document.getElementById('searchBox');
const colorFilter = document.getElementById('colorFilter');
const productCards = document.querySelectorAll('.product-card');

searchBox.addEventListener('input', filterProducts);
colorFilter.addEventListener('change', filterProducts);

function filterProducts() {
    const query = searchBox.value.toLowerCase();
    const selectedColor = colorFilter.value.toLowerCase();

    productCards.forEach(card => {
        const productName = card.getAttribute('data-product').toLowerCase();
        const productColor = card.getAttribute('data-color').toLowerCase();

        if ((productName.includes(query) || query === '') && (productColor.includes(selectedColor) || selectedColor === '')) {
            card.style.display = 'block'; // Show matching cards
        } else {
            card.style.display = 'none'; // Hide non-matching cards
        }
    });
}

                </script>
                </script>
 <script src="chatbot.js">

 </script>

<style>
    .custom-light-pink {
        background-color:rgb(230, 165, 221) !important; /* Light pink */
        border-color:rgb(75, 74, 74) !important;
        color: #050505 !important; /* White text */
        font-size: 13px;
    }
</style>

</body>
</html>
