<div class="matrimonial-wrapper ">
    <!-- <h1>Matrimonial</h1> -->
    <h2 class="font-bold text-3xl text-center">Find Your Perfect Pair</h2>
    <div class="matrimonial-wrapper grid grid-cols-2 gap-4 py-6 px-4">
        <div class="col-span-1">
            <a href="<?= base_url('matrimonial') ?>">
                <div class="matrimonial-card">
                    <div class="img-wrapper  overflow-hidden">
                        <img class="img-fluid rounded-lg transition-all hover:scale-90"
                            src="<?= base_url('assets/images/bride.jpg') ?>" alt="">
                    </div>
                    <div class="matrimonial-card-body">
                        <p class="font-bold text-xl ">Bride</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-span-1">
            <a href="<?= base_url('matrimonial') ?>">
                <div class="matrimonial-card">
                    <div class="img-wrapper  overflow-hidden">
                        <img class="img-fluid rounded-lg transition-all hover:scale-90"
                            src="<?= base_url('assets/images/groom.jpg') ?>" alt="">
                    </div>
                    <div class="matrimonial-card-body">
                        <p class="font-bold text-xl ">Groom</p>
                    </div>
                </div>
            </a>
        </div>



    </div>
    <div class="search-wrapper mx-auto max-w-md px-4 py-6 space-y-4 bg-white rounded-lg shadow-lg">
        <form action="<?= base_url('matrimonial_find_match') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group flex flex-row space-x-2">
                <div class="flex-1 ">
                    <select
                        class="form-select px-4 py-2 rounded-lg  focus:outline-none focus:ring-2 focus:ring-indigo-200 w-full"
                        id="gender" name="looking">
                        <option value="">Select Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="flex-1 ">
                    <select
                        class="form-select px-4 py-2 rounded-lg  focus:outline-none focus:ring-2 focus:ring-indigo-200 w-full"
                        id="from_age" name="from_age">
                        <?php for ($i = 18; $i <= 65; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?> Years</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="flex-1 ">
                    <select
                        class="form-select px-4 py-2 rounded-lg  focus:outline-none focus:ring-2 focus:ring-indigo-200 w-full"
                        id="to_age" name="to_age">
                        <?php for ($i = 18; $i <= 65; $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?> Years</option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit"
                    class="btn btn-primary px-4 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-200"><i
                        class="fa fa-search text-white"></i></button>
            </div>
        </form>
    </div>
</div>