<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
	<form action="<?= base_url('services/post/job/store') ?>" method="POST" class="w-full"
		enctype="multipart/form-data">
		<h4 class="text-2xl font-bold mb-4">Post A New Job</h4>
		<div class="mb-4">
			<label for="job_title" class="block text-gray-700 text-sm font-bold mb-2">Job Title</label>
			<input id="job_title" name="job_title" type="text"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		</div>
		<div class="mb-4">
			<label for="job_type" class="block text-gray-700 text-sm font-bold mb-2">Job Type</label>
			<select id="job_type" name="job_type"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				<option value="1">Full Time</option>
				<option value="2">Part Time</option>
			</select>
		</div>
		<div class="mb-4">
			<label for="job_category" class="block text-gray-700 text-sm font-bold mb-2">Job Category</label>
			<select id="job_category" name="job_category"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				<option value="1">Web Developer</option>
				<option value="2">PHP Developer</option>
				<option value="3">Web Designer</option>
				<option value="4">Graphic Designer</option>
			</select>
		</div>
		<div class="mb-4">
			<label for="job_country" class="block text-gray-700 text-sm font-bold mb-2">Country</label>
			<select id="job_country" name="job_country"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				<!-- options will be populated dynamically -->
			</select>
		</div>
		<div class="mb-4">
			<label for="job_city" class="block text-gray-700 text-sm font-bold mb-2">City</label>
			<select id="job_city" name="job_city"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				<!-- options will be populated dynamically -->
			</select>
		</div>
		<div class="mb-4">
			<label for="job_minimum_salary" class="block text-gray-700 text-sm font-bold mb-2">Minimum Salary</label>
			<input id="job_minimum_salary" name="job_minimum_salary" type="number"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		</div>
		<div class="mb-4">
			<label for="job_maximum_salary" class="block text-gray-700 text-sm font-bold mb-2">Maximum Salary</label>
			<input id="job_maximum_salary" name="job_maximum_salary" type="number"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		</div>
		<div class="mb-4">
			<label for="job_education_level" class="block text-gray-700 text-sm font-bold mb-2">Education Level</label>
			<select id="job_education_level" name="job_education_level"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				<option value="1">Level-1</option>
				<option value="2">Level-2</option>
				<option value="3">Level-3</option>
				<option value="4">Level-4</option>
			</select>
		</div>
		<div class="mb-4">
			<label for="job_experience" class="block text-gray-700 text-sm font-bold mb-2">Year of Experience</label>
			<select id="job_experience" name="job_experience"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				<option value="1">1 Year</option>
				<option value="2">2 Year</option>
				<option value="3">3 Year</option>
			</select>
		</div>
		<div class="mb-4">
			<label for="job_website" class="block text-gray-700 text-sm font-bold mb-2">Website</label>
			<input id="job_website" name="job_website" type="url"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		</div>
		<div class="mb-4">
			<label for="job_email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
			<input id="job_email" name="job_email" type="text"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		</div>
		<div class="mb-4">
			<label for="job_number" class="block text-gray-700 text-sm font-bold mb-2">Phone Number</label>
			<input id="job_number" name="job_number" type="number"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		</div>
		<div class="mb-4">
			<label for="job_gender" class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
			<select id="job_gender" name="job_gender"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				<option value="1">Male</option>
				<option value="2">Female</option>
			</select>
		</div>
		<div class="mb-4">
			<label for="job_shift" class="block text-gray-700 text-sm font-bold mb-2">Shift</label>
			<select id="job_shift" name="job_shift"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
				<option value="1">Morning</option>
				<option value="2">Evening</option>
			</select>
		</div>
		<div class="mb-4">
			<label for="job_description" class="block text-gray-700 text-sm font-bold mb-2">Job Description</label>
			<textarea id="job_description" name="job_description"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
		</div>
		<div class="mb-4">
			<label for="job_image" class="block text-gray-700 text-sm font-bold mb-2">Upload Files</label>
			<input id="job_image" name="job_image" type="file"
				class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
		</div>
		<button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Post a
			Job</button>
	</form>
</div>