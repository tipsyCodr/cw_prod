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
    <div class="flex flex-col w-full  sm:flex-row sm:justify-center sm:space-x-4">
        <button type="button" id="google-login" name="google-login"
            class="my-2 block w-full sm:w-auto px-4 py-2 text-xl font-bold text-white bg-red-500 rounded-full shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:px-6 sm:py-3 sm:text-base sm:rounded-md"
            style="width: 100%">
            <i class="fa-brands fa-google mx-2"></i>
            Login with Google
        </button>

        <a href='<?= base_url('phone-login') ?>' type="button" id="google-phone-login" name="google-phone-login"
            class="text-center my-2 block w-full sm:w-auto px-4 py-2 text-xl font-bold text-white bg-black rounded-full shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:px-6 sm:py-3 sm:text-base sm:rounded-md"
            style="width: 100%">
            <i class="fa-solid fa-phone mx-2"></i>
            Login with Phone
        </a>
    </div>
</div>
<script type="module" src="<?= base_url('assets/js/login.js'); ?>"></script>
<script type="module">
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