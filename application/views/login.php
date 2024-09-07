<?php if ($this->session->flashdata('error')) { ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold"><?php echo $this->session->flashdata('error'); ?></strong>
    </div>
<?php } ?>
<div class="container mx-auto px-4 pt-16 md:pt-24 flex flex-col items-center">
    <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Login</h1>
    <form class="w-full max-w-md"
        action="<?php echo base_url('logincontroller/Login_Controller/check_login_with_password') ?>" method="POST">
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
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">Login</button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800"
                href="<?php echo base_url('forgot_password') ?>">Forgot Password?</a>
        </div>
    </form>
</div>