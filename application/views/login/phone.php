<!-- Phone number input -->
<div class="flex items-center border-b border-b-2 border-teal-500 py-2">
    <input type="tel" id="phone-number" placeholder="Enter your phone number"
        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
    <button id="send-verification-code"
        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
        Send Verification Code
    </button>
</div>

<!-- Verification code input -->
<div class="flex items-center border-b border-b-2 border-teal-500 py-2">
    <input type="text" id="verification-code" placeholder="Enter verification code"
        class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none">
    <button id="verify-code"
        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
        Verify Code
    </button>
</div>
<!-- reCAPTCHA widget -->
<div id="recaptcha-container"></div>

<script type="module">
    // Import the functions you need from the SDKs
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-analytics.js";
    import {
        getAuth,
        PhoneAuthProvider,
        signInWithPopup,
        RecaptchaVerifier
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
    auth.languageCode = 'it';

    window.recaptchaVerifier = new RecaptchaVerifier(auth, 'sign-in-button', {
        'size': 'invisible',
        'callback': (response) => {
            // reCAPTCHA solved, allow signInWithPhoneNumber.
            onSignInSubmit();
        }
    });
    // Step 1: Request a verification code
    const phoneNumber = document.getElementById("phone-number"); // Replace with the user's phone number
    const appVerifier = window.recaptchaVerifier; // Replace with your reCAPTCHA verifier

    const verificationId = await PhoneAuthProvider.verifyPhoneNumber(
        auth,
        phoneNumber,
        appVerifier
    );

    // Step 2: Sign in with the verification code
    const verificationCode = prompt("Please enter the verification code:");

    const credential = PhoneAuthProvider.credential(
        verificationId,
        verificationCode
    );
    const userCredential = await signInWithCredential(auth, credential);

    const user = userCredential.user;
    console.log("User signed in:", user);

</script>