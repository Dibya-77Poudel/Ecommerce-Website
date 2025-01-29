
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
