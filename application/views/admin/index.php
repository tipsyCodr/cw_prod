<div class="wrapper px-2">
    <h1 class="font-bold text-2xl ">Dashboard</h1>
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4 text-center">
        <div class="bg-accent-lightest p-4 cursor-pointer rounded-lg shadow-sm hover:-translate-y-1 hover:bg-accent-light transition-all"
            onclick="location.href='<?= base_url('cw_yaris3556/admin/users/verified/list') ?>';">
            <h2 class="font-bold text-lg">Verified Members</h2>
            <p class="text-3xl font-black text-accent-dark"><?= $verifiedUsersCount ?></p>
        </div>
        <div class="bg-accent-lightest p-4 cursor-pointer rounded-lg shadow-sm hover:-translate-y-1 hover:bg-accent-light transition-all"
            onclick="location.href='<?= base_url('cw_yaris3556/admin/users/unverified/list') ?>';">
            <h2 class="font-bold text-lg">Unverified Members</h2>
            <p class="text-3xl font-black text-accent-dark"><?= $unverifiedUsersCount ?></p>
        </div>
        <div class="bg-accent-lightest p-4 cursor-pointer rounded-lg shadow-sm hover:-translate-y-1 hover:bg-accent-light transition-all"
            onclick="location.href='<?= base_url('cw_yaris3556/admin/requests/list/pending') ?>';">
            <h2 class="font-bold text-md">Pending Membership Requests</h2>
            <p class="text-3xl font-black text-accent-dark"><?= $pendingMembershipRequestsCount ?></p>
        </div>
        <div class="bg-accent-lightest p-4 cursor-pointer rounded-lg shadow-sm hover:-translate-y-1 hover:bg-accent-light transition-all"
            onclick="location.href='<?= base_url('cw_yaris3556/admin/requests/list/processed') ?>';">
            <h2 class="font-bold text-md">Processed Membership Requests</h2>
            <p class="text-3xl font-black text-accent-dark"><?= $processedMembershipRequestsCount ?></p>
        </div>
        <div class="bg-accent-lightest p-4 cursor-pointer rounded-lg shadow-sm hover:-translate-y-1 hover:bg-accent-light transition-all"
            onclick="location.href='<?= base_url('cw_yaris3556/admin/matrimonial/list') ?>';">
            <h2 class="font-bold text-lg">Matrimonial Profiles</h2>
            <p class="text-3xl font-black text-accent-dark"><?= $matrimonialCount ?></p>
        </div>
        <div class="bg-accent-lightest p-4 cursor-pointer rounded-lg shadow-sm hover:-translate-y-1 hover:bg-accent-light transition-all"
            onclick="location.href='<?= base_url('cw_yaris3556/admin/posts/list') ?>';">
            <h2 class="font-bold text-lg">Community Hub Posts</h2>
            <p class="text-3xl font-black text-accent-dark"><?= $postCount ?></p>
        </div>
        <div class="bg-accent-lightest p-4 cursor-pointer rounded-lg shadow-sm hover:-translate-y-1 hover:bg-accent-light transition-all"
            onclick="location.href='<?= base_url('cw_yaris3556/admin/users/list') ?>';">
            <h2 class="font-bold text-lg">Jobs Listings</h2>
            <p class="text-3xl font-black text-accent-dark"><?= $jobsCount ?></p>
        </div>
        <div class="bg-accent-lightest p-4 cursor-pointer rounded-lg shadow-sm hover:-translate-y-1 hover:bg-accent-light transition-all"
            onclick="location.href='<?= base_url('cw_yaris3556/admin/users/list') ?>';">
            <h2 class="font-bold text-lg">Business Listings</h2>
            <p class="text-3xl font-black text-accent-dark"><?= $businessCount ?></p>
        </div>
    </div>
</div>