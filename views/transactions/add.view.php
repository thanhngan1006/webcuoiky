<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>
<script src="/js/addTransaction.js" defer>
</script>

<script type='text/javascript'>
  window.addEventListener('load', function () {
    getAllProducts(<?= json_encode($products) ?>);
  });
</script>
<div class="flex flex-col gap-4 pb-6 overflow-x-clip">
  <div class='flex items-center gap-1.5'>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 512 512">
      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"
        d="M344 280l88-88M232 216l64 64M80 320l104-104" />
      <circle cx="456" cy="168" r="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="32" />
      <circle cx="320" cy="304" r="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="32" />
      <circle cx="208" cy="192" r="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="32" />
      <circle cx="56" cy="344" r="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
        stroke-width="32" />
    </svg>
    <span class='font-semibold text-lg'>Tạo giao dịch</span>
  </div>
  <div class="grid grid-cols-1 md:grid-cols-[62.5fr_37.5fr] items-start gap-4">

    <form class="col-span-1 md:col-span-1 flex flex-col gap-4">
      <div class="flex flex-col gap-5 p-5 bg-white rounded border border-neutral-5 shadow
      overflow-hidden">
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Thông tin khách hàng</span>
          <div class="grid grid-cols-[1fr_1fr_1fr] gap-2.5">
            <div class="flex flex-col gap-1.5">
              <label for="customerPhone">Số điện thoại</label>
              <input type="text" name="customerPhone" id="customerPhone" placeholder="Nhập số điện thoại"
                class="base-input-sm">
            </div>
            <div class="flex flex-col gap-1.5 opacity-0 invisible" id="form-field-customer-name">
              <label for="customerName">Họ và tên</label>
              <input type="text" name="customerName" id="customerName" placeholder="Nhập họ và tên"
                class="base-input-sm">
            </div>
            <div class="flex flex-col gap-1.5 opacity-0 invisible" id="form-field-customer-address">
              <label for="customerAddress">Địa chỉ</label>
              <input type="text" name="customerAddress" id="customerAddress" placeholder="Nhập địa chỉ"
                class="base-input-sm">
            </div>
          </div>
          <div class="grid grid-cols-[1fr_1fr_1fr] gap-2.5 items-end">
            <div class="flex flex-col gap-1.5">
              <label for="totalAmount">Tiền đã nhận</label>
              <input type="text" name="totalAmount" id="totalAmount" placeholder="Nhập tiền nhận từ khách hàng"
                class="base-input-sm">
            </div>
            <button type="button" class="button-secondary-solid-sm" id="btn-check-info-customer">Kiểm tra thông
              tin</button>
          </div>
        </div>
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Tìm kiếm sản phẩm</span>
          <input type="text" id="search-products" placeholder="Nhập tên sản phẩm" class="base-input-sm">
          <div class="relative">
            <div
              class="absolute flex flex-col gap-1.5 w-full max-h-[200px] bg-white overflow-y-auto not-show-scroll rounded border opacity-0 invisible"
              id="search-products-show"></div>


          </div>
        </div>
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Danh sách sản phẩm đã
            chọn</span>
          <div class="flex flex-col gap-1.5">
            <div class="grid grid-cols-[2fr_1fr_1fr_1fr] items-center p-2">

              <span class="font-semibold">Sản phẩm</span>
              <span class="font-semibold">Số tiền</span>
              <span class="font-semibold  justify-self-center">Số lượng</span>
              <span class="font-semibold justify-self-center">Thao tác</span>
            </div>
          </div>
          <div class="flex flex-col gap-4 max-h-[800px] overflow-y-auto not-show-scroll" id="selected-products">
            <!-- <div class="grid grid-cols-[2fr_1fr_1fr_1fr] items-center p-2 border rounded ">
                <div class="flex items-center gap-1.5">
                  <img class="w-20"
                    src="https://cdn.tgdd.vn/Products/Images/42/322096/samsung-galaxy-a55-5g-blue-thumbnew-600x600.jpg"
                    alt="products" loading="lazy">
                  <span class="text-lg font-semibold">Iphone 14 Promax</span>
                </div>
                <span class="font-semibold"><?= currency_format(15400000) ?></span>
                <div class="flex items-center gap-2 justify-self-center">
                  <button type="button" class="button-primary-solid-sm size-8 p-0">-</button>
                  <span class="flex items-center justify-center size-8">2</span>
                  <button type="button" class="button-primary-solid-sm size-8 p-0">+</buttont>
                </div>
                <button type="button" class="button-red-ghost-sm h-8 px-4 w-max justify-self-center">Xoá</button>
              </div> -->
          </div>
        </div>
      </div>
      <div class="flex items-center justify-end gap-2.5">
        <a href="/transactions" class="button-red-ghost-sm">Huỷ bỏ</a>
        <button type="button" onclick="postJSON()" class="button-primary-solid-sm">Tạo giao dịch</button>
      </div>
    </form>
    <!-- PAYMENT SUMMARY -->
    <!-- top-16 because header height 16, + 4 for spacing top  -->
    <div class="col-span-1 md:col-span-1 md:sticky md:top-20">
      <div class="flex flex-col gap-1.5 bg-white p-5">
        <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Thông tin hoá đơn</span>
        <div class="flex flex-col  gap-1.5 p-3 bg-white rounded border border-neutral-5 overflow-hidden">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Thông tin khách hàng</span>
          <div class="flex flex-col gap-2.5">
            <div class="flex flex-col gap-1.5">
              <span class="w-28 text-neutral-7">Tên khách hàng:</span>
              <span class="flex-1" id="customerNameLabel"></span>
            </div>
            <div class="flex flex-col gap-1.5">
              <span class="w-28 text-neutral-7">Số điện thoại:</span>
              <span class="flex-1" id="customerPhoneLabel"></span>
            </div>
            <div class="flex flex-col gap-1.5">
              <span class="w-28 text-neutral-7">Địa chỉ:</span>
              <span class="flex-1" id="customerAddressLabel"></span>
            </div>
          </div>
        </div>
        <div class="flex flex-col  gap-1.5 p-3 bg-white rounded border border-neutral-5 overflow-hidden">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Danh sách đơn hàng</span>
          <div class="flex flex-col justify-between gap-2.5">
            <div class="flex flex-col gap-1.5">
              <div class="grid grid-cols-[3fr_20px_2fr]">
                <span class="text-neutral-7">Tên SP</span>
                <span class="text-neutral-7 justify-self-center">SL</span>
                <span class="text-neutral-7 justify-self-end">Thành tiền</span>
              </div>
              <div class="flex flex-col gap-1.5 max-h-[150px] overflow-y-auto not-show-scroll"
                id="selected-products-summary">
              </div>
            </div>
            <div class="flex flex-col pt-2.5 border-t border-neutral-5">
              <div class="flex gap-2">
                <span class="flex-1">Tổng tiền nhận:</span>
                <span class="text-left font-semibold" id="total-amount-customer"></span>
              </div>
              <div class="flex gap-2">
                <span class="flex-1">Tổng đơn hàng:</span>
                <span class="text-left font-semibold" id="total-amount-summary"></span>
              </div>
              <div class="flex gap-2">
                <span class="flex-1">Số tiền phải trả lại:</span>
                <span class="text-left font-semibold" id="change-amount-customer"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require base_path('views/partials/footer.php') ?>