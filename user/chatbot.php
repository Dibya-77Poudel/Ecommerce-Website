<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AI Chatbot</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


  

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
      background:rgb(247, 135, 228);
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
</head>
<body>


<div id="chat-icon">
<span id="chat-label">
 "Chat with us"<i class="fas fa-hand-paper"></i>
  </span>
  <img src="images/pink.jpg" alt="Chat" />
</div>



<div id="chatbot">
<div id="chat-header">
  <img src="images/logo.png" alt="Chatbot Logo" id="chat-logo" />
   <h4>Questions? Chat with us!<i class="fas fa-hand-paper"></i></h4>
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

<script>
    const chatIcon = document.getElementById("chat-icon");
    const chatbot = document.getElementById("chatbot");
    const closeBtn = document.querySelector(".close-btn");
    const messages = document.getElementById("messages");
    const input = document.getElementById("chat-input");
    const sendBtn = document.getElementById("send-btn");
  
    // Training data (hidden from the user)
    const trainingData = [
  { question: "What types of clothes are available on this website?", answer: "We offer a wide range of ladies' clothing, including Traditional dresses, Cultural dresses, Western dresses,Trending dresses, Winter dresses, Weeding dresses, and more." },
  { question: "Do you sell western wear for women?", answer: "Yes, we have a great collection of western wear such as dresses, tops, jeans, and skirts." },
  { question: "Can I find traditional Nepali wear on your website?", answer: "Absolutely! We have traditional Nepali outfits like sarees, kurtis, and lehengas." },
  { question: "What sizes are available for this dress?", answer:"XS, S, M, L, and XL. Check the size chart to confirm." },
  { question: "How can I place an order?", answer: "To place an order, browse our products, add items to your cart, and proceed to checkout." },
  { question: "What payment methods do you accept?", answer: "We accept online payments via QR code as well as cash on delivery." },
  { question: "Do you provide cash on delivery?", answer: "Yes, cash on delivery is available for selected locations." },
  { question: "What is your return policy?", answer: "We accept returns within 7 days of delivery if the item is unused and in its original packaging." },
  { question: "How long does delivery take?", answer: "Delivery typically takes 3-5 business days within Nepal." },
  { question: "Are there any discounts?", answer: "No, there are no discounts currently available. Please check our homepage for future updates!" },
  { question: "Are there any shipping charges?", answer: "Shipping charges depend on your location and order value. Free shipping is available for orders above a certain amount." },
  { question: "Do you sell accessories?", answer: "No, we currently do not offer accessories in our store." },
  { question: "Can I gift wrap my order?", answer: "Yes, we provide gift-wrapping services for a small additional fee." },
  { question: "What sizes do you offer?", answer: "We offer a range of sizes from XS to XL, depending on the product." },

  { question: "Can I cancel my order?", answer: "You can cancel your order within 24 hours of placing it." },
  { question: "Do you ship internationally?", answer: "Currently, we only ship within Nepal." },
  { question: "How can I contact customer service?", answer: "You can reach us via email at support@ladieswear.com.np or call us at our helpline number." },
  { question: "What brands do you carry?", answer: "We feature a mix of local and international brands to cater to diverse preferences." },
 
  { question: "Can I exchange an item?", answer: "Yes, we allow exchanges within 7 days of delivery if the item is unused and in its original condition." },
  { question: "Do you have any physical stores?", answer: "Currently, we operate exclusively online." },
  { question: "Are your products high quality?", answer: "Yes, we ensure all our products meet high-quality standards." },
  { question: "Do you have seasonal collections?", answer: "Yes, we launch new collections for every season." },
  { question: "Can I pre-order items?", answer: "Yes, pre-orders are available for select items. Check the product page for details." },
 
  { question: "Is my payment information secure?", answer: "Yes, we use secure payment gateways to ensure your information is safe." },
  { question: "How can I create an account?", answer: "Click on the 'Account' button and fill in your details to create an account." },
  { question: "Do you have an app?", answer: "Not yet, but our website is mobile-friendly for easy shopping on the go." },

  { question: "How can I leave a review?", answer: "You can leave a review on the product page after your purchase." },
  { question: "Can I update my delivery address after placing an order?", answer: "Yes, contact our customer support within 24 hours to update your delivery address." },
  { question: "Do you offer same-day delivery?", answer: "Same-day delivery is available for select locations. Check during checkout." },
  { question: "What if I receive a damaged item?", answer: "If you receive a damaged item, contact us immediately for a replacement or refund." },
  { question: "Can I order in bulk?", answer: "Yes, bulk orders are available. Contact us for special pricing." },

  { question: "Can I save items for later?", answer: "Yes, use the 'cart' feature to save items for later." },
  
  
  { question: "Do you offer bridal wear?", answer: "Yes, we have a stunning collection of bridal wear but not accessories." },
  { question: "Can I return sale items?", answer: "Sale items are non-returnable unless stated otherwise." },
  { question: "What materials are your clothes made of?", answer: "We use high-quality materials like cotton, silk, chiffon, and more. Details are listed on each product page." },
  { question: "How often do you update your collections?", answer: "We update our collections monthly to keep up with the latest trends." },
  { question: "Do you have a blog?",  answer: "No, we currently do not have a blog, but you can learn more about our fashionwear by visiting the About section on our website." 
}

  // Add more entries as needed
];


  
    // Toggle chatbot visibility
    chatIcon.addEventListener("click", () => {
      chatbot.style.display = "flex";
      chatIcon.style.display = "none";
    });
  
    closeBtn.addEventListener("click", () => {
      chatbot.style.display = "none";
      chatIcon.style.display = "flex";
    });
  
    // OpenAI API setup
    const OPENAI_API_KEY = ""; // Replace with your OpenAI API key
  
    async function sendMessageToOpenAI(userMessage) {
      try {
        const response = await fetch("https://api.openai.com/v1/chat/completions", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Authorization: `Bearer ${OPENAI_API_KEY}`,
        },
        body: JSON.stringify({
          model: "gpt-3.5-turbo",
          messages: [{ role: "user", content: userMessage }],
          max_tokens: 50,
          temperature: 0.7,
        }),
      });
      
        if (!response.ok) {
          throw new Error("Failed to connect to OpenAI API");
        }
  
        const data = await response.json();
        return data.choices[0].message.content;
      } catch (error) {
        console.error(error);
        return "Sorry, I couldn't process your request. Please try again.";
      }
    }
  
    function addMessage(content, sender) {
      const messageDiv = document.createElement("div");
      messageDiv.className = `message ${sender}`;
      messageDiv.textContent = content;
      messages.appendChild(messageDiv);
      messages.scrollTop = messages.scrollHeight;
    }
  
    // Match user input with training data
    function findTrainingResponse(userMessage) {
      const lowerCaseMessage = userMessage.toLowerCase();
      for (const data of trainingData) {
        if (lowerCaseMessage.includes(data.question.toLowerCase())) {
          return data.answer;
        }
      }
      return null;
    }
  
    sendBtn.addEventListener("click", async () => {
      const userMessage = input.value.trim();
      if (!userMessage) return;
  
      addMessage(userMessage, "user");
      input.value = "";
  
      // Check training data first
      const trainingResponse = findTrainingResponse(userMessage);
      if (trainingResponse) {
        addMessage(trainingResponse, "bot");
      } else {
        // Get response from OpenAI
        const botMessage = await sendMessageToOpenAI(userMessage);
        addMessage(botMessage, "bot");
      }
    });
  
    input.addEventListener("keydown", (event) => {
      if (event.key === "Enter") {
        sendBtn.click();
      }
    });
  </script>
  



</body>
</html>