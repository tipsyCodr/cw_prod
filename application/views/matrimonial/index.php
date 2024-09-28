<div class="matrimonial-wrapper ">
    <!-- <h1>Matrimonial</h1> -->
    <div class="flex items-center justify-center">
        <div class="relative mx-auto w-full" style="background-image:url('assets/images/banner/1.jpg');background-size: cover; background-position:center; background-repeat: no-repeat; height: 700px;margin-top: -58px;
  z-index: 1;
">
            <style>
                .title {
                    color: white;
                }
            </style>
            <div
                class="absolute bottom-5 left-1/2 transform -translate-x-1/2 bottom-bar p-6 bg-gray-900 filter bg-opacity-70 backdrop-blur-sm ">
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
                                    <option value="<?= strtolower($gotra['gotra_name']) ?>"><?= $gotra['gotra_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="flex justify-evenly items-center text-center">
                            <button type="submit"
                                class="w-1/2 px-2 py-2 rounded-lg mx-1 bg-indigo-600 text-white font-semibold hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200 text-nowrap">
                                <i class="fa fa-search p-2"></i> Go</button>
                            <a href="<?= base_url('kundli/form') ?>"
                                class="w-full px-4 py-2 mx-1 rounded-lg bg-orange-400 text-white text-nowrap"><i
                                    class="fa fa-infinity p-2"></i>
                                Match Your Kundli </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <h2 class=" hidden pt-2 pb-1 font-bold text-xl text-center">Find Your Perfect Pair</h2>
    <div class="hidden matrimonial-wrapper grid grid-cols-2 gap-4 py-0 px-4">

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
    <div class="hidden  search-wrapper mx-auto max-w-md px-4 py-0 space-y-4  rounded-lg ">
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
                <div class="flex justify-evenly items-center text-center">
                    <button type="submit"
                        class="w-1/2 px-2 py-2 rounded-lg mx-1 bg-indigo-600 text-white font-semibold hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200">
                        <i class="fa fa-search p-2"></i> Go</button>

                    <a href="<?= base_url('kundli/form') ?>"
                        class="w-full py-2 mx-1 rounded-lg bg-orange-400 text-white"><i class="fa fa-infinity p-2"></i>
                        Match Your Kundli </a>
                </div>

            </div>
        </form>
        <a href="<?= base_url('matrimonial/register/page') ?>"
            class="w-full my-4 px-4  my-4 block font-bold rounded-lg text-indigo-600 ">
            Don't have a Matrimonial account? Create one now
        </a>

        <!-- create a or seperator -->
        <!-- <div
            class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">
            <p class="text-center font-semibold mx-4 mb-0">OR</p>
        </div> -->
        <!-- create a or seperator -->


    </div>




</div>