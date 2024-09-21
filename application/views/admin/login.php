<div class="container mx-auto px-4 pt-16 md:pt-24 flex flex-col items-center">
    <h1 class="text-3xl md:text-5xl font-bold text-gray-800 mb-4">Admin Login</h1>
    <form class="w-full max-w-md" action="<?php echo base_url('cw_yaris3556/admin/login/authorize') ?>" method="POST">
        <div class="mb-4">
            <label for="email" class="block text-base font-medium text-gray-700">Email </label>
            <input type="text" id="email" name="email" required
                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="Email">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-base font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" required
                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="Password">
        </div>
        <button type="submit"
            class="bg-accent hover:bg-accent-dark text-white font-bold py-2 px-4 rounded-full w-full">Login</button>
    </form>
</div>