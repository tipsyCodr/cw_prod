<div class="container mx-auto p-4 pt-6 md:p-6 md:pt-12">
    <div class="flex flex-col items-center">
        <h2 class="text-3xl font-bold mb-4">Create Admin</h2>
        <?php echo validation_errors(); ?>
        <form action="<?php echo base_url('cw_yaris3556/admin/create/store'); ?>" method="post" class="w-full md:w-1/2">
            <div class="form-group mb-4">
                <label for="name" class="block font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="<?php echo set_value('name'); ?>"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Name">
            </div>
            <div class="form-group mb-4">
                <label for="email" class="block font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="<?php echo set_value('email'); ?>"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Email">
            </div>
            <div class="form-group mb-4">
                <label for="password" class="block font-medium text-gray-700">Password</label>
                <input type="password" name="password" value="<?php echo set_value('password'); ?>"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Password">
            </div>
            <div class="form-group mb-4">
                <label for="cpassword" class="block font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="cpassword" value="<?php echo set_value('cpassword'); ?>"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="Confirm Password">
            </div>
            <div class="form-group mb-4">
                <label for="role" class="block font-medium text-gray-700">Role</label>
                <select name="role"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="admin">Admin</option>
                    <option value="moderator">Moderator</option>
                </select>
            </div>
            <button type="submit"
                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md w-full">Submit</button>
        </form>
    </div>
</div>