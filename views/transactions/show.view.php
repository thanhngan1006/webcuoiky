<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/header.php') ?>

<!-- phan noi dung chinh -->
<div class="relative flex flex-col gap-4 pb-6 overflow-x-clip">
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
    <span class='font-semibold text-lg'>Chi tiết giao dịch</span>
  </div>
  <div class="grid grid-cols-1 items-start gap-4">

    <div class="col-span-1 md:col-span-1 flex flex-col gap-4">
      <div class="flex flex-col gap-5 p-5 bg-white rounded border border-neutral-5 shadow
      overflow-hidden">
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Thông tin khách hàng</span>
          <div class="grid sm:grid-cols-[1fr_1fr] md:grid-cols-[1fr_1fr_2fr] gap-2.5">
            <div class="flex flex-col gap-1.5">
              <label for="customerPhone">
                Số điện thoại
              </label>
              <input type="text" name="customerPhone" id="customerPhone" placeholder="Nhập số điện thoại"
                class="base-input-sm" value="<?= $transaction['customer_phone'] ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5" id="form-field-customer-name">
              <label for="customerName">
                Họ và tên
              </label>
              <input type="text" name="customerName" id="customerName" placeholder="Nhập họ và tên"
                class="base-input-sm" value="<?= $transaction['customer_name'] ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5 sm:col-span-2 md:col-span-1" id="form-field-customer-address">
              <label for="customerAddress">
                Địa chỉ
              </label>
              <input type="text" name="customerAddress" id="customerAddress" placeholder="Nhập địa chỉ"
                class="base-input-sm" value="<?= $transaction['customer_address'] ?>" disabled>
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Thông tin đơn hàng</span>
          <div class="grid sm:grid-cols-[1fr_1fr_1fr] gap-2.5">
            <div class="flex flex-col gap-1.5">
              <label for="totalAmount">
                Tiền đơn hàng
              </label>
              <input type="text" name="totalAmount" id="totalAmount" placeholder="Nhập tiền nhận từ khách hàng"
                class="base-input-sm" value="<?= currency_format($transaction['total_amount']) ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5">
              <label for="paidAmount">
                Tiền đã nhận
              </label>
              <input type="text" name="paidAmount" id="paidAmount" placeholder="Nhập tiền nhận từ khách hàng"
                class="base-input-sm" value="<?= currency_format($transaction['paid_amount']) ?>" disabled>
            </div>
            <div class="flex flex-col gap-1.5">
              <label for="changeAmount">
                Tiền hoàn trả
              </label>
              <input type="text" name="changeAmount" id="changeAmount" placeholder="Nhập tiền nhận từ khách hàng"
                class="base-input-sm" value="<?= currency_format($transaction['change_amount']) ?>" disabled>
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-1.5">
          <span class="pb-2.5 text-[15px] font-semibold leading-5 border-b border-neutral-5">Danh sách sản phẩm đã
            mua</span>
          <div class="flex flex-col gap-1.5">
            <div class="grid grid-cols-[2fr_1fr_1fr] sm:grid-cols-[2fr_1fr_1fr_1fr] gap-2 items-center p-2">

              <span class="font-semibold">Tên sản phẩm</span>
              <span class="font-semibold">Số tiền</span>
              <span class="font-semibold  justify-self-center">Số lượng</span>
              <span class="font-semibold justify-self-center hidden sm:block">Thao tác</span>
            </div>
          </div>
          <div class="flex flex-col gap-4 max-h-[800px] overflow-y-auto not-show-scroll" id="selected-products">
            <?php foreach ($products as $product): ?>
              <div
                class="grid grid-cols-[2fr_1fr_1fr] sm:grid-cols-[2fr_1fr_1fr_1fr] gap-2 items-center p-2 border rounded ">
                <div class="flex items-center gap-1.5">
                  <img class="w-10" src="<?= $product['image_url'] ?>" alt="products" loading="lazy">
                  <span
                    class="text-md sm:text-lg font-semibold line-clamp-2 max-w-full sm:max-w-full"><?= $product['name'] ?></span>
                </div>
                <span class="font-semibold"><?= currency_format($product['product_retail_price']) ?></span>
                <div class="flex items-center gap-2 justify-self-center">
                  <span class="flex items-center justify-center size-8">2</span>
                </div>
                <a href="/product?barcode=<?= $product['product_barcode'] ?>"
                  class="button-primary-ghost-sm leading-none cursor-pointer h-8 px-4 w-max justify-self-center hidden sm:block">Chi
                  tiết</a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-end gap-2.5">
        <a href="/transactions" class="button-primary-solid-sm">Quay lại</a>
      </div>
    </div>
    <!-- PAYMENT SUMMARY -->
    <!-- top-16 because header height 16, + 4 for spacing top  -->
    <!-- <div class="col-span-1 md:col-span-1 md:sticky md:top-20">
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
    </div> -->
  </div>
</div>

<?php require base_path('views/partials/footer.php') ?>