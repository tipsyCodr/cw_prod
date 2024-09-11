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
