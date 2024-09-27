<div class="matrimonial-wrapper ">
    <!-- <h1>Matrimonial</h1> -->
    <h2 class=" pt-2 pb-1 font-bold text-xl text-center">Find Your Perfect Pair</h2>
    <div class="matrimonial-wrapper grid grid-cols-2 gap-4 py-0 px-4">

        <div class="col-span-1">
            <button type="submit" form="form_bride" formaction="<?= base_url('matrimonial/search') ?>"
                class="matrimonial-card">
                <div class="img-wrapper rounded-lg overflow-hidden h-[200px]">
                    <img class="img-fluid rounded-lg transition-all hover:scale-90"
                        src="<?= base_url('assets/images/bride.jpg') ?>" alt="">
                </div>
                <div class="matrimonial-card-body">
                    <p class="font-bold text-xl ">Bride</p>
                </div>
            </button>
        </div>
        <div class="col-span-1">
            <button type="submit" form="form_groom" formaction="<?= base_url('matrimonial/search') ?>"
                class="matrimonial-card">
                <div class="img-wrapper rounded-lg overflow-hidden h-[200px]">
                    <img class="img-fluid rounded-lg transition-all hover:scale-90"
                        src="<?= base_url('assets/images/groom.jpg') ?>" alt="">
                </div>
                <div class="matrimonial-card-body">
                    <p class="font-bold text-xl ">Groom</p>
                </div>
            </button>
        </div>

        <form action="<?= base_url('matrimonial/search') ?>" method="POST" id="form_groom">
            <input type="hidden" name="looking" value="M">
            <input type="hidden" name="from_age" value="18">
            <input type="hidden" name="to_age" value="65">

        </form>

        <form action="<?= base_url('matrimonial/search') ?>" method="POST" id="form_bride">
            <input type="hidden" name="looking" value="F">
            <input type="hidden" name="from_age" value="18">
            <input type="hidden" name="to_age" value="65">

        </form>



    </div>
    <div class="search-wrapper mx-auto max-w-md px-4 py-0 space-y-4  rounded-lg ">
        <form action="<?= base_url('matrimonial/search') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group flex flex-col sm:flex-row space-x-2">
                <div class="flex-1 ml-2 my-2">
                    <select
                        class="border-0 bg-white px-4 py-2 d rounded-lg  focus:outline-none focus:ring-2 focus:ring-indigo-200 w-full"
                        id="gender" name="looking">
                        <option value="">Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="flex-1 my-2">
                    <select
                        class=" border-0 bg-white px-4 py-2 rounded-lg  focus:outline-none focus:ring-2 focus:ring-indigo-200 w-full"
                        id="from_age" name="from_age">
                        <?php for ($i = 18; $i <= 65; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?> Years</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="flex-1 my-2">
                    <select
                        class=" border-0 bg-white px-4 py-2 rounded-lg  focus:outline-none focus:ring-2 focus:ring-indigo-200 w-full"
                        id="to_age" name="to_age">
                        <?php for ($i = 18; $i <= 65; $i++) { ?>
                            <option value="<?= $i ?>" <?= $i == 65 ? ' selected' : '' ?>><?= $i ?> Years</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="flex-1 my-2">
                    <select
                        class="border-0 bg-white px-4 py-2 rounded-lg  focus:outline-none focus:ring-2 focus:ring-indigo-200 w-full"
                        id="gotra" name="gotra">
                        <option value="">Select Gotra</option>
                        <?php foreach ($gotram as $gotra) { ?>
                            <option value="<?= strtolower($gotra['gotra_name']) ?>"><?= $gotra['gotra_name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit"
                    class="px-4 py-2 rounded-lg mt-2 bg-indigo-600 text-white font-semibold hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                    Go</button>
            </div>
        </form>
        <a href="<?= base_url('matrimonial/register/page') ?>"
            class="w-full my-4 px-4  my-4 block font-bold rounded-lg text-indigo-600 ">
            Don't have a Matrimonial account? Create one now
        </a>
        <div
            class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">
            <p class="text-center font-semibold mx-4 mb-0">OR</p>
        </div>
        <div class="flex flex-col items-center mb-8 mt-2 text-center">

            <a href="#" class="w-full py-2 mx-2  rounded-lg bg-magiColor text-white"> Match Your Kundli <i
                    class="fa fa-long-arrow-right"></i></a>

        </div>
    </div>




</div>