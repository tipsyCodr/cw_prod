<div
    class="flex w-full max-w-2xls mx-auto mt-10 mb-16   overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800 lg:max-w-4xl">
    <div class="hidden bg-cover lg:block lg:w-1/2"
        style="background-image: url('https://images.unsplash.com/photo-1606660265514-358ebbadc80d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1575&q=80');">
    </div>

    <div class="w-full px-6 py-8 md:px-8 lg:w-1/2">
        <div class="flex justify-center mx-auto">
            <img class="w-auto h-20 sm:h-8" src="<?= base_url() ?>assets/images/logo.png" alt="Patel Samaj"
                class="mx-auto">

            <!-- <img class="w-auto h-7 sm:h-8" src="https://merakiui.com/images/logo.svg" alt=""> -->
        </div>

        <p class="mt-3 text-xl text-center text-gray-600 dark:text-gray-200">
            Welcome back!
        </p>

        <button href="#" id="google-login" name="google-login"
            class="w-full flex items-center justify-center mt-4 text-gray-600 transition-colors duration-300 transform border rounded-lg dark:border-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
            <div class="px-4 py-2">
                <svg class="w-6 h-6" viewBox="0 0 40 40">
                    <path
                        d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                        fill="#FFC107" />
                    <path
                        d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z"
                        fill="#FF3D00" />
                    <path
                        d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z"
                        fill="#4CAF50" />
                    <path
                        d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z"
                        fill="#1976D2" />
                </svg>
            </div>

            <span class="w-5/6 px-4 py-3 font-bold text-center">Sign in with Google</span>
        </button>

        <div class="flex items-center justify-between mt-4">
            <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>

            <a href="#" class="text-xs text-center text-gray-500 uppercase dark:text-gray-400 hover:underline">or login
                with email</a>

            <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
        </div>
        <?php if (validation_errors()): ?>
            <div class="mt-4">
                <?php $errors = array_filter((array) validation_errors()); ?>
                <?php if (!empty($errors)): ?>
                    <ul class="list-disc text-red-500 text-sm">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo base_url('authenticate') ?>" method="POST">
            <div class="mt-4">
                <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                    for="LoggingEmailAddress">Email Address</label>
                <input id="LoggingEmailAddress" name="user_name"
                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"
                    type="email" />
            </div>

            <div class="mt-4">
                <div class="flex justify-between">
                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-200"
                        for="loggingPassword">Password</label>
                    <a href="#" class="text-xs text-gray-500 dark:text-gray-300 hover:underline">Forget Password?</a>
                </div>

                <input id="loggingPassword" name="user_pass"
                    class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300"
                    type="password" />
            </div>

            <div class="mt-6">
                <button
                    class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50">
                    Sign In
                </button>
            </div>

        </form>
        <div class="flex items-center justify-between mt-4">
            <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>

            <a href="#" class="text-xs text-gray-500 uppercase dark:text-gray-400 hover:underline">or sign up</a>

            <span class="w-1/5 border-b dark:border-gray-600 md:w-1/4"></span>
        </div>
    </div>
</div>

<script type="module">
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
                                window.location.href = "<?= base_url() ?>";
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

</script>