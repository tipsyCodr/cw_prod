<div class="wrapper pt-1">
    <div class="px-2  mb-1 w-full bg-gray-100">
        <p class="text-gray-600">Recent</p>
    </div>
    <?php if ($recent) { ?>
        <?php foreach ($recent as $request) { ?>
            <div class="item flex justify-between bg-accent-lightest p-2 rounded">
                <div class="flex">
                    <img src="<?= base_url('uploads/matrimonial_img/user_images/' . $request['matrimonial']['images']) ?>"
                        alt="<?= $request['matrimonial']['name'] ?>"
                        class="rounded-lg w-20 h-20 mr-2 overflow-hidden object-cover">

                    <div class="">
                        <p class="font-bold text-lg"><?= $request['matrimonial']['name'] ?>,
                            <?= (date('Y') - date('Y', strtotime($request['matrimonial']['dob']))) ?> years
                        </p>
                        <span class="font-md flex flex-col">
                            <p class="font-bold">Gotra: <span
                                    class="font-normal"><?= $request['matrimonial']['gotram'] ?></span>
                            </p>
                            <p class="font-bold">Height: <span class="font-normal"><?= $request['matrimonial']['height'] ?>
                                    ft</span></p>
                        </span>
                    </div>

                </div>
                <div id="btn_group" class="p-2 flex  ">
                    <div class="p-2">
                        <a href="#" class="text-nowrap p-2 text-white bg-green-500 hover:bg-green-400 rounded-full"
                            data-request-id="<?= $request['request_id'] ?>"
                            onclick="acceptRequest(event,<?= $request['request_id'] ?>)"><i class="fa fa-check"></i>
                            Accept</a>
                    </div>
                    <div class="p-2">
                        <a href="#" class="text-nowrap p-2 text-white bg-red-500 hover:bg-red-400 rounded-full"
                            data-request-id="<?= $request['request_id'] ?>"
                            onclick="rejectRequest(event,<?= $request['request_id'] ?>)"><i class="fa fa-times"></i>
                            Reject</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p class="text-center text-gray-500">No Recent Requests</p>
    <?php } ?>

    <div class="px-2  mb-1 w-full bg-gray-100">
        <p class="text-gray-600">Old Requests</p>
    </div>
    <?php if ($old) { ?>
        <?php foreach ($old as $request) { ?>
            <div class="item flex justify-between bg-accent-lightest p-2 rounded">
                <a href="<?= base_url('matrimonial/profile/') . $request['matrimonial']['matrimonial_id']; ?>">
                    <div class="flex">
                        <img src="<?= base_url('uploads/matrimonial_img/user_images/' . $request['matrimonial']['images']) ?>"
                            alt="<?= $request['matrimonial']['name'] ?>"
                            class="rounded-lg w-20 h-20 mr-2 overflow-hidden object-cover">
                        <div class="">
                            <p class="font-bold text-lg"><?= $request['matrimonial']['name'] ?>,
                                <?= (date('Y') - date('Y', strtotime($request['matrimonial']['dob']))) ?> years
                            </p>
                            <span class="font-md flex flex-col">
                                <p class="font-bold">Gotra: <span
                                        class="font-normal"><?= $request['matrimonial']['gotram'] ?></span>
                                </p>
                                <p class="font-bold">Height: <span class="font-normal"><?= $request['matrimonial']['height'] ?>
                                        ft</span></p>
                            </span>
                        </div>
                    </div>
                </a>
                <div id="btn_group" class="p-2 flex  items-center">
                    <div>
                        <a
                            class="p-2 rounded-lg capitalize cursor-pointer <?= $request['status'] == 'accepted' ? 'bg-green-300' : 'bg-red-300' ?>"><?= $request['status'] ?>!</a>
                    </div>

                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <p class="text-center text-gray-500">No History</p>
    <?php } ?>
</div>
<script>
    function acceptRequest(event, request_id) {
        console.log(request_id);
        event.preventDefault();
        var base_url = "<?= base_url() ?>";
        $.ajax({
            url: '<?= base_url('matrimonial/request/accept') ?>',
            type: 'post',
            data: {
                request_id: request_id,
            },
            success: function (response) {
                console.log(response);
                response = JSON.parse(response);
                $("#btn_group").html('<div><p class="p-2 bg-green-300 rounded text-green-500 font-bold">Accepted!</p></div>');

            }
        });
    }
    function rejectRequest(event, request_id) {
        console.log(request_id);
        event.preventDefault();
        var base_url = "<?= base_url() ?>";
        $.ajax({
            url: '<?= base_url('matrimonial/request/reject') ?>',
            type: 'post',
            data: {
                request_id: request_id,
            },
            success: function (response) {
                console.log(response);
                response = JSON.parse(response);
                $("#btn_group").html('<div><p class="p-2 bg-red-300 rounded text-red-500 font-bold">Rejected!</p></div>');
            }
        });
    }
</script>