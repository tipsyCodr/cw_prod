<div class="container mx-auto p-4 pt-6 md:p-6 md:pt-12">
    <h2 class="text-3xl font-bold mb-4">Membership Verification Form</h2>
    <div class="bg-white rounded-lg shadow p-4 md:p-6">
        <form action="<?= base_url('membership/verify') ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?= $user->uid ?>">
            <div class="mb-4">
                <label for="selfie" class="block text-gray-700 text-sm font-bold mb-2">Take a Selfie</label>
                <input type="file" name="selfie" id="selfie" capture="user" accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required />
                <span class="text-blue-500 text-sm italic"><b> Note:</b> Make sure you are in a well lit enviroment, and
                    make
                    sure
                    your face is clearly visible.</span>
            </div>
            <div class="mb-4">
                <label for="aadhar_card" class="block text-gray-700 text-sm font-bold mb-2">Aadhar Card</label>
                <input type="file" name="aadhar_card" id="aadhar_card" capture="enviroment" accept="image/*"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <span class="text-blue-500 text-sm italic"> <b>Note</b>: Make sure take full photo of aadhar card</span>
            </div>

            <?php if ($this->session->userdata('login') && !empty($user->user_mobile) && $user->user_mobile != 0 && $user->user_mobile != null) { ?>

                <label for="mobile" class="block text-gray-700 text-sm font-bold mb-2"> Your Mobile No:</label>
                <input type="tel" id="mobile" value="<?= $user->user_mobile ?>" pattern="[0-9]{10}" name="mobile"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                <span class="text-gray-500">The mobile number should be 10 digits.</span>
            <?php } else { ?>
                <div class="mb-4">
                    <label for="mobile" class="block text-gray-700 text-sm font-bold mb-2">Mobile</label>
                    <input type="tel" id="mobile" value="" pattern="[0-9]{10}" name="mobile"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    <span class="text-gray-500">The mobile number should be 10 digits.</span>
                </div>
            <?php } ?>

            <div class="mb-4">
                <label for="gotra" class="block text-gray-700 text-sm font-bold mb-2">Gotra</label>
                <select name="gotra" id="gotra" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select Gotra</option>
                    <?php foreach ($gotra_list as $gotra) { ?>
                        <option value="<?= strtolower($gotra['gotra_name']) ?>"><?= $gotra['gotra_name'] ?></option>
                    <?php } ?>
                </select>
                <span class="text-gray-500">Select a gotra</span>
            </div>
            <button type="submit"
                class="bg-accent hover:bg-accent-dark text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                <i class="fa fa-user-clock"></i> Start
                Verification Process</button>
        </form>
        <span class="inline-block text-blue-500 italic py-4"><b>Note:</b> Verification might take few days. You will be
            notified.</span>
    </div>
</div>