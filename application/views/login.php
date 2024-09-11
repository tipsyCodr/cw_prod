<div class="container mx-auto px-4 pt-16 md:pt-24 flex flex-col items-center">
    <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Login</h1>
    <form class="w-full max-w-md" action="<?php echo base_url('authenticate') ?>" method="POST">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">Username</label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="username" name="user_name" type="text" placeholder="Username" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="password" name="user_pass" type="password" placeholder="******************" required>
        </div>
        <div class="flex items-center justify-center">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">Login</button>
            <p class="p-2"><a
                    class="inline-block align-baseline font-bold  bg-blue-500 rounded  p-2 ml-4 text-white hover:bg-blue-800"
                    href="<?php echo base_url('register/page') ?>">Register</a></p>

        </div>
        <div class="w-full text-center p-2"><a
                class="p-2  inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                href="<?php echo base_url('forgot_password') ?>">Forgot Password?</a></div>
    </form>
    <div class="flex justify-center">
        <div class="col-sm-4">
            <button type="button" id="google-login" name="google-login"
                class="p-2 font-bold text-lg bg-red-500 text-white rounded"><i class="fa-brands fa-google mx-2"></i>
                Login with Google</button>
        </div>
    </div>
</div>
<script type="module">
    // Import the functions you need from the SDKs
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-analytics.js";
    import { getAuth, GoogleAuthProvider, signInWithPopup } from "https://www.gstatic.com/firebasejs/10.13.1/firebase-auth.js";

    // Your web app's Firebase configuration
    const firebaseConfig = {
        apiKey: "AIzaSyCK8tduZqTnJRS2xHcQfRflNQW4zR_nQK0",
        authDomain: "community-website-7757e.firebaseapp.com",
        projectId: "community-website-7757e",
        storageBucket: "community-website-7757e.appspot.com",
        messagingSenderId: "63119085208",
        appId: "1:63119085208:web:ebdbc057fe91b7f82e4aed",
        measurementId: "G-SRMNFHMN7H"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);

    // Initialize Firebase Authentication and set up Google provider
    const auth = getAuth();
    const provider = new GoogleAuthProvider();
    console.log("Provider: " + provider);

    // Event listener for Google login
    document.getElementById("google-login").addEventListener("click", function () {
        signInWithPopup(auth, provider)
            .then((result) => {
                // This gives you a Google Access Token. You can use it to access Google API.
                const credential = GoogleAuthProvider.credentialFromResult(result);
                const token = credential.accessToken;
                // The signed-in user info.
                const user = result.user;
                alert("Welcome " + user.displayName);

                console.log(user);
            })
            .catch((error) => {
                // Handle Errors here.
                const errorCode = error.code;
                const errorMessage = error.message;
                console.log("Error: " + errorMessage);
                const email = error.customData.email;
                const credential = GoogleAuthProvider.credentialFromError(error);
            });
    });
</script>