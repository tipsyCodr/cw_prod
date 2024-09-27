<div class="wrapper">
    <div class="man px-4 m-2  rounded">
        <form class="" action="<?= base_url('kundli/result') ?>" method="post">
            <div class="sm:flex mx-auto justify-evenly  ">
                <div class="boy bg-white  p-2 rounded-lg shadow shadow-blue-500 border border-blue-500 my-4 ">
                    <h3 class="font-bold p-2">Enter Girl's Details</h3>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="boy_name" id="name"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Name" required>
                    <br>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" name="boy_dob" id="date_of_birth"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Date of Birth" required>
                    <br>
                    <label for="time_of_birth" class="block text-sm font-medium text-gray-700">Time of Birth</label>
                    <input type="time" name="time_of_birth" id="time_of_birth"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Time of Birth" required>
                    <br>
                    <label for="place_of_birth" class="block text-sm font-medium text-gray-700">Place of Birth</label>
                    <input type="text" name="place_of_birth" id="place_of_birth"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Place of Birth" required>
                    <br>
                </div>
                <div class="girl bg-white p-2 rounded-lg shadow shadow-pink-500 border border-pink-500  my-4 ">
                    <h3 class="font-bold p-2">Enter Girl's Details</h3>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="girl_name" id="name"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Name" required>
                    <br>
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" name="girl_dob" id="date_of_birth"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Date of Birth" required>
                    <br>
                    <label for="time_of_birth" class="block text-sm font-medium text-gray-700">Time of Birth</label>
                    <input type="time" name="time_of_birth" id="time_of_birth"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Time of Birth" required>
                    <br>
                    <label for="place_of_birth" class="block text-sm font-medium text-gray-700">Place of Birth</label>
                    <input type="text" name="place_of_birth" id="place_of_birth"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Place of Birth" required>
                    <br>
                </div>
            </div>
            <button type="submit"
                class="w-full  mt-4 px-4 py-2 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-700">Submit</button>
        </form>
    </div>
</div>