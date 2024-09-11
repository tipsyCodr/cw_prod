// Import the functions you need from the SDKs
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-analytics.js";
import {
	getAuth,
	GoogleAuthProvider,
	PhoneAuthProvider,
	signInWithPopup,
} from "https://www.gstatic.com/firebasejs/10.13.1/firebase-auth.js";

// Your web app's Firebase configuration
const firebaseConfig = {
	apiKey: "AIzaSyCK8tduZqTnJRS2xHcQfRflNQW4zR_nQK0",
	authDomain: "community-website-7757e.firebaseapp.com",
	projectId: "community-website-7757e",
	storageBucket: "community-website-7757e.appspot.com",
	messagingSenderId: "63119085208",
	appId: "1:63119085208:web:ebdbc057fe91b7f82e4aed",
	measurementId: "G-SRMNFHMN7H",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

// Initialize Firebase Authentication and set up Google provider
const auth = getAuth();
const provider = new GoogleAuthProvider();
console.log("Provider: " + provider);

// Event listener for Google login
// Event listener for Google login
document.getElementById("google-login").addEventListener("click", function () {
	signInWithPopup(auth, provider)
		.then((result) => {
			// This gives you a Google Access Token. You can use it to access Google API.
			const credential = GoogleAuthProvider.credentialFromResult(result);
			const token = credential ? credential.accessToken : null;
			// The signed-in user info.
			const user = result.user;

			if (user) {
				// alert("Welcome " + user.displayName);

				// Create a new XMLHttpRequest object
				const xhr = new XMLHttpRequest();
				xhr.open("POST", "<?= base_url('google-auth') ?>", true);
				xhr.setRequestHeader("Content-Type", "application/json");

				// Define what happens on successful data submission
				/**
				 * This is the callback function that will be called when the data has been
				 * successfully submitted. It will check the server response and redirect
				 * the user to the main page if the login was successful.
				 * @param {Object} e The event containing the response from the server.
				 */
				xhr.onload = function (e) {
					const response = JSON.parse(xhr.responseText);
					if (xhr.status >= 200 && xhr.status < 300) {
						console.log(response);
						// If the login was successful, redirect to the main page
						if (response.success) {
							window.location.href = "/";
						} else {
							console.log(response);
							// Handle case where login was not successful on server-side
							alert("Login failed on server-side. Please try again.");
						}
					} else {
						// Handle failed network request or server error
						console.log(xhr.responseText);
						alert("Error during authentication. Please try again later.");
					}
				};

				// Define what happens in case of an error
				xhr.onerror = function () {
					console.log(xhr.responseText);
					alert("Error during authentication. Please try again later.");
				};

				// Send the request with user data
				const data = JSON.stringify({
					uid: user.uid,
					email: user.email,
					name: user.displayName,
					token: token,
					emailVerified: user.emailVerified,
					photoURL: user.photoURL,
				});
				xhr.send(data);
			}
		})
		.catch((error) => {
			// Handle Errors here.
			const errorCode = error.code;
			const errorMessage = error.message;

			// Log the full error message
			console.error("Error during sign-in:", errorMessage);

			// Optional: Provide feedback to the user
			alert("Authentication failed: " + errorMessage);
		});
});
