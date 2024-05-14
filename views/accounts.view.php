<?php require('partials/head.php') ?>
<?php require('partials/header.php') ?>

<div class="flex flex-col gap-4">
  <div class='flex items-center gap-1.5'>
    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
      <path d="M16.6666 18.8333H3.33331V17.1667C3.33331 16.0616 3.7723 15.0018 4.5537 14.2204C5.3351 13.439 6.39491 13 7.49998 13H12.5C13.605 13 14.6649 13.439 15.4463 14.2204C16.2277 15.0018 16.6666 16.0616 16.6666 17.1667V18.8333ZM9.99998 11.3333C9.34337 11.3333 8.69319 11.204 8.08656 10.9527C7.47993 10.7015 6.92874 10.3332 6.46445 9.86888C6.00015 9.40458 5.63186 8.85339 5.38058 8.24676C5.12931 7.64013 4.99998 6.98995 4.99998 6.33334C4.99998 5.67673 5.12931 5.02655 5.38058 4.41993C5.63186 3.8133 6.00015 3.2621 6.46445 2.79781C6.92874 2.33352 7.47993 1.96522 8.08656 1.71395C8.69319 1.46267 9.34337 1.33334 9.99998 1.33334C11.3261 1.33334 12.5978 1.86013 13.5355 2.79781C14.4732 3.73549 15 5.00726 15 6.33334C15 7.65943 14.4732 8.9312 13.5355 9.86888C12.5978 10.8066 11.3261 11.3333 9.99998 11.3333Z" fill="currentColor" />
    </svg>
    <span class='font-semibold text-lg'>Quản lý tài khoản</span>
  </div>
  <div class="flex flex-col gap-5 p-5 bg-white rounded-sm border border-neutral-5 shadow overflow-hidden">
    <!-- FORM SEARCH AND BUTTON ADD -->
    <div class="flex justify-between items-end pb-5 border-b border-neutral-5">
      <form method="get" class="flex gap-2.5 items-end">
        <div class="flex flex-col gap-1.5">
          <label for="name">Tên sản phẩm</label>
          <input type="text" name="name" id="name" placeholder="Tìm tên sản phẩm" class="base-input-sm">
        </div>
        <div class="flex flex-col gap-1.5">
          <label for="barcode">Mã sản phẩm</label>
          <input type="text" name="barcode" id="barcode" placeholder="Tìm mã sản phẩm" class="base-input-sm">
        </div>
        <button class="button-secondary-solid-md" type="submit">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
            <g clip-path="url(#clip0_4223_152)">
              <path d="M11.909 10.9925L14.685 13.7679L13.7679 14.685L10.9925 11.909C9.95987 12.7368 8.67541 13.1871 7.35189 13.1852C4.13189 13.1852 1.51855 10.5719 1.51855 7.35186C1.51855 4.13186 4.13189 1.51852 7.35189 1.51852C10.5719 1.51852 13.1852 4.13186 13.1852 7.35186C13.1871 8.67538 12.7368 9.95984 11.909 10.9925ZM10.6088 10.5116C11.4314 9.66567 11.8908 8.53177 11.8889 7.35186C11.8889 4.84482 9.85828 2.81482 7.35189 2.81482C4.84485 2.81482 2.81485 4.84482 2.81485 7.35186C2.81485 9.85825 4.84485 11.8889 7.35189 11.8889C8.5318 11.8908 9.6657 11.4314 10.5116 10.6088L10.6088 10.5116Z" fill="white" />
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
      <a href="/products/add" class="button-primary-solid-md">
        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
          <g clip-path="url(#clip0_4225_4719)">
            <path d="M7.35186 7.35186V4.75926H8.64815V7.35186H11.2407V8.64815H8.64815V11.2407H7.35186V8.64815H4.75926V7.35186H7.35186ZM8.00001 14.4815C4.42028 14.4815 1.51852 11.5797 1.51852 8.00001C1.51852 4.42028 4.42028 1.51852 8.00001 1.51852C11.5797 1.51852 14.4815 4.42028 14.4815 8.00001C14.4815 11.5797 11.5797 14.4815 8.00001 14.4815ZM8.00001 13.1852C9.3752 13.1852 10.6941 12.6389 11.6665 11.6665C12.6389 10.6941 13.1852 9.3752 13.1852 8.00001C13.1852 6.62481 12.6389 5.30594 11.6665 4.33353C10.6941 3.36112 9.3752 2.81482 8.00001 2.81482C6.62481 2.81482 5.30594 3.36112 4.33353 4.33353C3.36112 5.30594 2.81482 6.62481 2.81482 8.00001C2.81482 9.3752 3.36112 10.6941 4.33353 11.6665C5.30594 12.6389 6.62481 13.1852 8.00001 13.1852Z" fill="white" />
          </g>
          <defs>
            <clipPath id="clip0_4225_4719">
              <rect width="15.5556" height="15.5556" fill="white" transform="translate(0.222229 0.222229)" />
            </clipPath>
          </defs>
        </svg>

        <span>Thêm sản phẩm</span>
      </a>
    </div>
    <!-- LIST PRODUCTS -->
    <div class="flex flex-col">

    </div>
  </div>
</div>
<?php require('partials/footer.php') ?>