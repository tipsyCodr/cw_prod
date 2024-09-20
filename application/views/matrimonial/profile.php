<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet"
    href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

<section class="pt-16 bg-accent-lightest">


    <div class="w-full lg:w-4/12 px-4 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
            <div class="px-6">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4 flex justify-center">
                        <div class="relative">
                            <img alt="..."
                                src="<?= base_url('uploads/matrimonial_img/user_images/' . $profile['images']) ?>"
                                class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"
                                style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                        </div>
                    </div>

                    <div class="w-full px-4 text-center mt-20">
                        <h3 class=" mt-6 text-center text-2xl font-bold leading-normal mb-2 text-blueGray-700 mb-2">
                            <?= $profile['name'] ?>
                        </h3>
                        <div class="flex justify-evenly items-center ">
                            <div class="capitalize font-semibold text-blueGray-400">
                                <i class="fas fa-heart mr-2 text-lg text-pink-400"></i>
                                <?= $profile['marrital_status'] ?>
                            </div>
                            <div class="capitalize font-semibold text-blueGray-400">
                                <i class="fas fa-briefcase mr-2 text-lg text-gray-500"></i>
                                <?= $profile['job_occupation'] ?>
                            </div>
                            <div class="capitalize font-semibold text-blueGray-400">
                                <i class="fas fa-university mr-2 text-lg text-blue-400"></i>
                                <?= $profile['education'] ?>
                            </div>
                        </div>
                        <div
                            class="flex justify-center py-4 lg:pt-4 pt-8 sm:flex-row flex-col sm:space-x-4 space-x-0 sm:space-y-0 space-y-4">
                            <div class="mr-4 p-3 text-center">
                                <span class="text-md font-bold block capitalize tracking-wide text-blueGray-600">
                                    Gotra
                                </span>
                                <span class="text-sm text-blueGray-600"><?= $profile['gotram'] ?></span>
                            </div>
                            <div class="mr-4 p-3 text-center">
                                <span class="text-md font-bold block capitalize tracking-wide text-blueGray-600">
                                    Zodiac
                                </span>
                                <span class="text-sm text-blueGray-600"><?= $profile['zodiac'] ?></span>
                            </div>
                            <div class="lg:mr-4 p-3 text-center">
                                <span
                                    class="text-md font-bold block capitalize tracking-wide text-blueGray-600 text-nowrap">
                                    Mother Tongue
                                </span>
                                <span class="text-sm text-blueGray-600"><?= $profile['mother_tongue'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-2 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                        <div class="w-full lg:w-9/12 px-4">
                            <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                <?= $profile['description'] ?>

                            </p>
                            <!-- <a href="javascript:void(0);" class="font-normal text-pink-500">
                                Show more
                            </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="relative  pt-8 pb-6 mt-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap items-center md:justify-between justify-center">
                <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                    <div class="text-sm text-blueGray-500 font-semibold py-1">
                        <!-- Made with <a href="https://www.creative-tim.com/product/notus-js"
                            class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a
                            href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800"
                            target="_blank"> Creative Tim</a>. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
</section>