<div class="px-4 py-6 bg-white rounded-md shadow-md">
    <div class="wrapper">
        <form>
            <h4 class="text-2xl font-bold mb-4">Register for Matrimonial</h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="job_occupation" class="block text-sm font-medium text-gray-700">Job / Occupation</label>
                    <input id="job_occupation" name="job_occupation" type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="flex items-center">
                    <label for="dob" class="block text-sm font-medium text-gray-700 mr-4">D.O.B.</label>
                    <input id="dob" name="dob" type="date"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="flex items-center">
                    <label for="height" class="block text-sm font-medium text-gray-700 mr-4">Height</label>
                    <input id="height" name="height" type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="flex items-center">
                    <label for="weight" class="block text-sm font-medium text-gray-700 mr-4">Weight</label>
                    <input id="weight" name="weight" type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="flex items-center">
                    <label for="gender" class="block text-sm font-medium text-gray-700 mr-4">Gender</label>
                    <select id="gender" name="gender"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="mother_tongue" class="block text-sm font-medium text-gray-700">Mother Tongue</label>
                    <input id="mother_tongue" name="mother_tongue" type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="gotram" class="block text-sm font-medium text-gray-700">Gotram</label>
                    <input id="gotram" name="gotram" type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="zodiac" class="block text-sm font-medium text-gray-700">Zodiac</label>
                    <input id="zodiac" name="zodiac" type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="education" class="block text-sm font-medium text-gray-700">Education</label>
                    <input id="education" name="education" type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
                    <input id="salary" name="salary" type="text"
                        class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

            <div class="mt-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>

            <div class="mt-4">
                <label for="images" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <input id="images" name="images" type="file"
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <button type="submit"
                class="mt-4 px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
        </form>
    </div>
</div>