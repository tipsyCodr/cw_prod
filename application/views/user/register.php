<div class="px-2 py-4">

    <h1 class="font-bold text-2xl text-center pb-8">Register For An Account</h1>
    <div class="form-wrapper">
        <form class="space-y-6" action="<?= base_url('register/submit') ?>" method="post">
            <div class="space-y-2">
                <label for="user_name" class="block text-base font-medium text-gray-700">Full Name</label>
                <input type="text" name="user_name" id="user_name"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
            </div>
            <div class="space-y-2">
                <label for="user_email" class="block text-base font-medium text-gray-700">Email</label>
                <input type="email" name="user_email" id="user_email"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
            </div>
            <div class="space-y-2">
                <label for="user_mobile" class="block text-base font-medium text-gray-700">Mobile</label>
                <input type="text" name="user_mobile" id="user_mobile"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
            </div>
            <div class="space-y-2">
                <label for="user_address" class="block text-base font-medium text-gray-700">Address</label>
                <textarea name="user_address" id="user_address"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base"
                    rows="3"></textarea>
            </div>
            <div class="space-y-2">
                <label for="user_city" class="block text-base font-medium text-gray-700">City</label>
                <input type="text" name="user_city" id="user_city"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
            </div>
            <div class="space-y-2">
                <label for="user_pincode" class="block text-base font-medium text-gray-700">Pincode</label>
                <input type="number" name="user_pincode" id="user_pincode"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
            </div>
            <div class="space-y-2">
                <label for="user_profile_pic" class="block text-base font-medium text-gray-700">Profile Picture</label>
                <input type="file" name="user_profile_pic" id="user_profile_pic"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-base">
            </div>
            <button type="submit"
                class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
        </form>
    </div>
</div>