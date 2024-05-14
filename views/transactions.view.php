<?php require('partials/head.php') ?>
<?php require('partials/header.php') ?>

<!-- phan noi dung chinh -->
<div class="flex flex-col gap-4">
  <div class='flex items-center gap-1.5'>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 512 512">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M344 280l88-88M232 216l64 64M80 320l104-104" />
      <circle cx="456" cy="168" r="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
      <circle cx="320" cy="304" r="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
      <circle cx="208" cy="192" r="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
      <circle cx="56" cy="344" r="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
    </svg>
    <span class='font-semibold text-lg'>Quản lý giao dịch</span>
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