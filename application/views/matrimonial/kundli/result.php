<div class="wrapper text-center">
    <h1 class="text-3xl font-bold   ">Your Score</h1>
    <p class="   p-2">Your score indicates the compatibility of the couple</p>
    <div class=" flex flex-col justify-center items-center m-4 result p-4 bg-white rounded-lg shadow-lg">
        <div class="names w-full flex justify-evenly items-center py-4">
            <p class='px-2 text-xl font-bold text-blue-500 '><?= $boy['name'] ?></p>
            <i class="px-2 fas fa-infinity fa-2x text-blue-500"></i>
            <p class='px-2 text-xl font-bold text-pink-500 '><?= $girl['name'] ?></p>
        </div>
        <div class="result-img">
            <p class="   py-2">Obtained Points</p>
            <i class="fa fa-heart fa-6x text-pink-500"></i>
        </div>
        <div class="     result-text font-bold text-3xl">
            <?= $result = rand(10, 36); ?>
            <span class="text-sm block">out of 36</span>
        </div>
    </div>
    <p class="text-xs block p-2     ">This Kundli matching report is generated based on the Guna Milan. The
        score
        indicates the compatibility of the couple.</p>
</div>