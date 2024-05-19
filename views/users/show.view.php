<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>

<div class="relative flex flex-col gap-4 pb-6 overflow-x-clip">
  <div class='flex items-center gap-1.5'>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 512 512">
      <path d="M402 168c-2.93 40.67-33.1 72-66 72s-63.12-31.32-66-72c-3-42.31 26.37-72 66-72s69 30.46 66 72z"
        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
      <path
        d="M336 304c-65.17 0-127.84 32.37-143.54 95.41-2.08 8.34 3.15 16.59 11.72 16.59h263.65c8.57 0 13.77-8.25 11.72-16.59C463.85 335.36 401.18 304 336 304z"
        fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
      <path
        d="M200 185.94c-2.34 32.48-26.72 58.06-53 58.06s-50.7-25.57-53-58.06C91.61 152.15 115.34 128 147 128s55.39 24.77 53 57.94z"
        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
      <path
        d="M206 306c-18.05-8.27-37.93-11.45-59-11.45-52 0-102.1 25.85-114.65 76.2-1.65 6.66 2.53 13.25 9.37 13.25H154"
        fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" />
    </svg>
    <span class='font-semibold text-lg'>Thông tin nhân viên</span>
  </div>
  <div class="grid grid-cols-1 items-start gap-4">
    <div class="flex items-center justify-center">
      <img class="w-44 h-44 rounded-full"
        src="<?= $user['profile_picture_url'] ?? 'https://1.bp.blogspot.com/-LjgFJBMTmeM/YZ-UJ2Mdb-I/AAAAAAAACMk/3iYczLi5BTQefjXjnJsNtaSYlP-A2jO6wCLcBGAsYHQ/s1200/2a.jpg' ?>"
        alt="profile img">
    </div>
    <div class="col-span-1 md:col-span-1 flex flex-col gap-4">
      <div class="flex flex-col gap-5 p-5 bg-white rounded border border-neutral-5 shadow
      overflow-hidden">
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Thông tin chi tiết</span>
          <div class="grid sm:grid-cols-[1fr_1fr] md:grid-cols-[1fr_1fr_1fr] gap-2.5">
            <div class="flex flex-col gap-1.5">
              <label for="username">
                Tên đăng nhập
              </label>
              <input type="text" name="username" id="username" placeholder="Nhập số điện thoại" class="base-input-sm"
                value="<?= $user['username'] ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5">
              <label for="full_name">
                Họ và tên
              </label>
              <input type="text" name="full_name" id="full_name" placeholder="Nhập số điện thoại" class="base-input-sm"
                value="<?= $user['full_name'] ?>" disabled>
            </div>

            <div class="flex flex-col gap-1.5">
              <label for="email">
                Email
              </label>
              <input type="text" name="email" id="email" placeholder="Nhập số điện thoại" class="base-input-sm"
                value="<?= $user['email'] ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5">
              <label for="role">
                Vai trò
              </label>
              <input type="text" name="role" id="role" placeholder="Nhập số điện thoại" class="base-input-sm"
                value="<?= convert_role_title($user['role']) ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5">
              <label for="is_active">
                Trạng thái
              </label>
              <div class="flex items-center gap-4">
                <div class="flex items-center gap-1.5 !pointer-events-none">
                  <input type="radio" id="active-user" name="is_active" class="radio-input !pointer-events-none"
                    <?= $user['is_active'] == 1 ? "checked" : "" ?>>
                  <label for="active-user">Hoạt động</label>
                </div>
                <div class="flex items-center gap-1.5 !pointer-events-none">
                  <input type="radio" id="inactive-user" name="is_active" class="radio-input !pointer-events-none"
                    <?= $user['is_active'] == 0 ? "checked" : "" ?>>
                  <label for="inactive-user">Tạm khoá</label>
                </div>
              </div>
            </div>
            <div class="flex flex-col gap-1.5">
              <label for="profile_picture_url">
                Hình ảnh
              </label>
              <input type="text" name="profile_picture_url" id="profile_picture_url" class="base-input-sm"
                value="<?= $user['profile_picture_url'] ?? "Bạn chưa có thông tin hình ảnh" ?>" disabled>
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Thông kê cơ bản</span>
          <div class="grid sm:grid-cols-[1fr_1fr_1fr] gap-2.5">
            <div class="flex flex-col gap-1.5">
              <label for="totalAmount">
                Số đơn hàng
              </label>
              <input type="text" name="totalAmount" id="totalAmount" placeholder="Nhập tiền nhận từ khách hàng"
                class="base-input-sm" value="<?= count($transactions) ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5">
              <label for="totalAmount">
                Doanh thu
              </label>
              <input type="text" name="totalAmount" id="totalAmount" placeholder="Nhập tiền nhận từ khách hàng"
                class="base-input-sm" value="<?= currency_format(array_reduce($transactions, function ($sum, $transaction) {
                  return $sum + $transaction['total_amount'];
                })) ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5">
              <label for="changeAmount">
                Lợi nhuận
              </label>
              <input type="text" name="changeAmount" id="changeAmount" placeholder="Nhập tiền nhận từ khách hàng"
                class="base-input-sm" value="<?= currency_format(array_reduce($transactions, function ($sum, $transaction) {
                  return $sum + $transaction['total_amount'];
                }) - array_reduce($transactions, function ($sum, $transaction) {
                  return $sum + $transaction['total_import_price'];
                })) ?>" disabled>
            </div>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-end gap-2.5">
        <a href="/users" class="button-primary-solid-sm">Quay lại</a>
        <a href="/user/edit?id=<?= $user['id'] ?>" class="button-secondary-solid-sm">Chỉnh sửa thông tin</a>
      </div>
    </div>
  </div>
</div>
<?php require base_path('views/partials/footer.php') ?>