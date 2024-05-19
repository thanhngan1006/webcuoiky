<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>

<div class="flex flex-col gap-4">
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
    <span class='font-semibold text-lg'>Quản lý nhân viên</span>
  </div>
  <div class="flex flex-col gap-5 p-5 bg-white rounded-sm border border-neutral-5 shadow overflow-hidden">
    <!-- FORM SEARCH AND BUTTON ADD -->
    <div class="flex justify-between items-end pb-5 border-b border-neutral-5">
      <form method="get" class="flex gap-2.5 items-end">
        <div class="flex flex-col gap-1.5">
          <label for="full_name">Tên nhân viên</label>
          <input type="text" name="full_name" id="full_name"
            value="<?= isset($_GET['full_name']) ? $_GET['full_name'] : '' ?>" placeholder="Tìm tên nhân viên"
            class="base-input-sm">
        </div>
        <button class="button-secondary-solid-md" type="submit">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="w-5 h-5">
            <g clip-path="url(#clip0_4223_152)">
              <path
                d="M11.909 10.9925L14.685 13.7679L13.7679 14.685L10.9925 11.909C9.95987 12.7368 8.67541 13.1871 7.35189 13.1852C4.13189 13.1852 1.51855 10.5719 1.51855 7.35186C1.51855 4.13186 4.13189 1.51852 7.35189 1.51852C10.5719 1.51852 13.1852 4.13186 13.1852 7.35186C13.1871 8.67538 12.7368 9.95984 11.909 10.9925ZM10.6088 10.5116C11.4314 9.66567 11.8908 8.53177 11.8889 7.35186C11.8889 4.84482 9.85828 2.81482 7.35189 2.81482C4.84485 2.81482 2.81485 4.84482 2.81485 7.35186C2.81485 9.85825 4.84485 11.8889 7.35189 11.8889C8.5318 11.8908 9.6657 11.4314 10.5116 10.6088L10.6088 10.5116Z"
                fill="white" />
            </g>
            <defs>
              <clipPath id="clip0_4223_152">
                <rect width="15.5556" height="15.5556" fill="white" transform="translate(0.222168 0.222229)" />
              </clipPath>
            </defs>
          </svg>

          <span>Tìm kiếm</span>
        </button>
      </form>
      <a href="/users/create" class="button-primary-solid-md">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
          <g clip-path="url(#clip0_4225_4719)">
            <path
              d="M7.35186 7.35186V4.75926H8.64815V7.35186H11.2407V8.64815H8.64815V11.2407H7.35186V8.64815H4.75926V7.35186H7.35186ZM8.00001 14.4815C4.42028 14.4815 1.51852 11.5797 1.51852 8.00001C1.51852 4.42028 4.42028 1.51852 8.00001 1.51852C11.5797 1.51852 14.4815 4.42028 14.4815 8.00001C14.4815 11.5797 11.5797 14.4815 8.00001 14.4815ZM8.00001 13.1852C9.3752 13.1852 10.6941 12.6389 11.6665 11.6665C12.6389 10.6941 13.1852 9.3752 13.1852 8.00001C13.1852 6.62481 12.6389 5.30594 11.6665 4.33353C10.6941 3.36112 9.3752 2.81482 8.00001 2.81482C6.62481 2.81482 5.30594 3.36112 4.33353 4.33353C3.36112 5.30594 2.81482 6.62481 2.81482 8.00001C2.81482 9.3752 3.36112 10.6941 4.33353 11.6665C5.30594 12.6389 6.62481 13.1852 8.00001 13.1852Z"
              fill="white" />
          </g>
          <defs>
            <clipPath id="clip0_4225_4719">
              <rect width="15.5556" height="15.5556" fill="white" transform="translate(0.222229 0.222229)" />
            </clipPath>
          </defs>
        </svg>

        <span>Thêm nhân viên</span>
      </a>
    </div>
    <!-- LIST PRODUCTS -->
    <div class="flex flex-col">
      <!-- PROPERTIES -->
      <div class="grid border-b-[2px] border-neutral-5 grid-cols-[1fr_1fr_1fr_1fr_1fr_1fr_1fr]">
        <span class="p-2.5 text-neutral-7">Hình ảnh</span>
        <span class="p-2.5 text-neutral-7">Tên đăng nhập</span>
        <span class="p-2.5 text-neutral-7">Tên nhân viên</span>
        <span class="p-2.5 text-neutral-7">Email</span>
        <span class="p-2.5 text-neutral-7">Vai trò</span>
        <span class="p-2.5 text-neutral-7">Trạng thái</span>
        <span class="p-2.5 text-neutral-7">Thao tác</span>

      </div>
      <div class="flex flex-col h-[50vh] overflow-y-auto not-show-scroll">

        <?php foreach ($users as $user): ?>
          <!-- PRODUCT INFO -->
          <div class="grid border-b-[2px] items-center border-neutral-5 grid-cols-[1fr_1fr_1fr_1fr_1fr_1fr_1fr]">
            <img class="w-16 h-16 px-1 py-1"
              src="<?= $user['profile_picture_url'] ?? 'https://1.bp.blogspot.com/-LjgFJBMTmeM/YZ-UJ2Mdb-I/AAAAAAAACMk/3iYczLi5BTQefjXjnJsNtaSYlP-A2jO6wCLcBGAsYHQ/s1200/2a.jpg' ?>"
              alt="">
            <span class="p-2.5 text-neutral-10"><?= $user['username'] ?></span>
            <span class="p-2.5 text-neutral-10"><?= $user['full_name'] ?></span>
            <span class="p-2.5 text-neutral-10"><?= $user['email'] ?></span>
            <span class="p-2.5 text-neutral-10"><?= convert_role_title($user['role']) ?></span>
            <span
              class="p-2.5 <?= $user['is_active'] ? "text-common-success" : "text-common-error/80" ?> font-semibold"><?= $user['is_active'] ? "Hoạt động" : "Tạm khoá" ?></span>
            <span class="p-2.5 text-neutral-10 flex items-center gap-2">
              <a class="button-primary-ghost-sm py-1 px-2" href="/user?id=<?= $user['id'] ?>">Xem</a>
            </span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?php require base_path('views/partials/footer.php') ?>