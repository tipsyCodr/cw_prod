<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <a href="javascript:window.history.back()"
        class="inline-block mt-6 mb-4 text-white bg-accent <hover:bg-accent-dark></hover:bg-accent-dark> focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 py-2 px-4 rounded-md">
        <i class="fas fa-chevron-left"></i> Back
    </a>
    <?php echo form_open_multipart('services/post/business/store'); ?>

    <h4 class="font-bold text-2xl  text-gray-800 mb-6">Post A New Business</h4>

    <label for="company_name" class="text-gray-600 block font-bold mb-2">Name of the Business</label>
    <input id="company_name" name="company_name" type="text"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="<?php echo set_value('company_name'); ?>">
    <?php echo form_error('company_name', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="address_1" class="text-gray-600 block font-bold mt-4 mb-2">Address 1</label>
    <textarea id="address_1" name="address_1" rows="2"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo set_value('address_1'); ?></textarea>
    <?php echo form_error('address_1', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="address_2" class="text-gray-600 block font-bold mt-4 mb-2">Address 2</label>
    <textarea id="address_2" name="address_2" rows="2"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo set_value('address_2'); ?></textarea>
    <?php echo form_error('address_2', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="job_country" class="text-gray-600 block font-bold mt-4 mb-2">State</label>
    <select id="job_country" name="job_country"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">Select States</option>
        <?php foreach ($states as $state) { ?>
            <option value="<?= $state['id'] ?>" <?php echo set_select('job_country', $state['id']); ?>>
                <?= $state['name']; ?>
            </option>
        <?php } ?>
    </select>
    <?php echo form_error('country', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="job_city" class="text-gray-600 block font-bold mt-4 mb-2">City</label>
    <select id="job_city" name="job_city"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">Select City</option>
    </select>
    <?php echo form_error('job_city', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="opening_time" class="text-gray-600 block font-bold mt-4 mb-2">Opening Time</label>
    <input id="opening_time" name="opening_time" type="text"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="<?php echo set_value('opening_time'); ?>">
    <?php echo form_error('opening_time', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="closing_time" class="text-gray-600 block font-bold mt-4 mb-2">Closing Time</label>
    <input id="closing_time" name="closing_time" type="text"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="<?php echo set_value('closing_time'); ?>">
    <?php echo form_error('closing_time', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="business_category" class="text-gray-600 block font-bold mt-4 mb-2">Business Category</label>
    <select id="business_category" name="business_category"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="">Category</option>
        <option value="Web Developer" <?php echo set_select('business_category', 'Web Developer'); ?>>Web Developer
        </option>
        <option value="PHP Developer" <?php echo set_select('business_category', 'PHP Developer'); ?>>PHP Developer
        </option>
        <option value="Web Designer" <?php echo set_select('business_category', 'Web Designer'); ?>>Web Designer
        </option>
        <option value="Graphic Designer" <?php echo set_select('business_category', 'Graphic Designer'); ?>>Graphic
            Designer
        </option>
    </select>
    <?php echo form_error('business_category', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="pin_code" class="text-gray-600 block font-bold mt-4 mb-2">Pin Code</label>
    <input id="pin_code" name="pin_code" type="text"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="<?php echo set_value('pin_code'); ?>">
    <?php echo form_error('pin_code', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="website" class="text-gray-600 block font-bold mt-4 mb-2">Website</label>
    <input id="website" name="website" type="url"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="<?php echo set_value('website'); ?>">
    <?php echo form_error('website', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="email_address" class="text-gray-600 block font-bold mt-4 mb-2">Email Address</label>
    <input id="email_address" name="email_address" type="text"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="<?php echo set_value('email_address'); ?>">
    <?php echo form_error('email_address', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="phone_number" class="text-gray-600 block font-bold mt-4 mb-2">Phone Number</label>
    <input id="phone_number" name="phone_number" type="text"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="<?php echo set_value('phone_number'); ?>">
    <?php echo form_error('phone_number', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="fax" class="text-gray-600 block font-bold mt-4 mb-2">Fax</label>
    <input id="fax" name="fax" type="text"
        class="border shadow p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="<?php echo set_value('fax'); ?>">
    <?php echo form_error('fax', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <label for="business_image" class="text-gray-600 block font-bold mt-4 mb-2">Upload Files</label>
    <input id="business_image" name="business_image" type="file" class="border shadow p-2 w-full rounded">
    <?php echo form_error('business_image', '<div class="text-red-500 mt-1">', '</div>'); ?>

    <button type="submit" class="bg-blue-500 text-white p-2 mt-6 w-full rounded hover:bg-blue-600">Submit
        Business</button>

    <?php echo form_close(); ?>
</div>