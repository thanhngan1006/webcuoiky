<?php require('partials/head.php') ?>
<?php require('partials/header.php') ?>

<!-- phan noi dung chinh -->
<div class="flex flex-col gap-4">
  <div class='flex items-center gap-1.5'>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
      <path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path>
    </svg>
    <span class='font-semibold text-lg'>Quản lý khách hàng</span>
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